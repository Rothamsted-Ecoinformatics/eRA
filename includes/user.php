<?php

/*
 * file: user.php
 * created 2/10/2020
 *
 *
 * This is where the application decided if the user is verified or no
 *
 * the Login only takes as email address. The database does not keep privatge information, so
 * there is no need for password.
 * The database keeps a record of it is registered or not,
 * it could also keep information of downloads of datasets and when
 * We need to ensure that this is open to the user.
 *
 * this has the functions to send the email too. 
 * Because this may set cookies, it is read before any header are sent.
 *
 * $strRegister is either a form to send the email address or the email that is logged in folloed by sign out.
 * $strRegister = $formIN ;
 * $registeredUser = $email;
 * $registered = 'yes'
 */
function checkUser($info) {    
    $link = LogAsGuest();
    $info = cleanQuery($info);
    $query = "Select * from `newmarkers` where `position` LIKE '$info'";
    $results = mysqli_query($link, $query);
    
    if (!$results) {
        print("query failed");
        echo $query;
    } else {
        $i = 0;
        $nbResults = mysqli_num_rows($results);
       if ($nbResults == 1) {
           while ($row = mysqli_fetch_array($results)) {
                                   
                    $user['dbresponse'] = 'yes';
                    $user['vericode'] = $row['vericode'];
                    $user['fname'] = $row['fname'];
                    $user['lname'] = $row['lname'];
                    
           }
       } else {
           $user['dbresponse'] = 'no';
           
       }
    }
    
    return $user;
}
/**
 * Sends the preliminary parameters to the db
 *
 * position: the email address
 * vericode: code to match with the cookie to identify machine
 * doorbell: ringing if waiting for registration - and
 * fname:
 * lname:
 * institution: research group, name of institution or N/A
 * information: information about the research
 * allowEmails
 *
 * checks that the emails is not already in the database (just in case) if it is not, it preregisters the user. If it is, it does nothing
 * @param Array $answer
 * @return String (the query...)
 *
 */
function reg2db($answer) {
    $link = LogAsAdmin();
    $consentEmail = 0;
    if (isset($answer['consentEmail'])) {
        if ($answer['consentEmail'] == 'on') {
            $consentEmail = 1;
        }
    }
    
    $queryCheck = "SELECT * from newmarkers where position LIKE '".$answer['email']."'";
    
    
    
    $results = mysqli_query($link, $queryCheck);
    
    if (!$results) {
        print("query failed - ".$queryCheck);
        
        
    } else {
        $i = 0;
        $nbResults = mysqli_num_rows($results);
        if ($nbResults >= 1) {
            if ($nbResults >= 1) {
                while ($row = mysqli_fetch_array($results)) {
                $queryReturn = "UPDATE newmarkers
                            SET  doorbell='" .$answer['vericode2']."'
                            WHERE `position`='".$answer['email']."' and vericode='".$row['vericode']."' ";
                }
            }
        } else {
            $queryReturn = "INSERT INTO newmarkers
            (`position`, vericode, doorbell, fname, lname, institution, information, allowEmails, country)
            VALUES('".$answer['email']."', '"
                .$answer['vericode']."', 'Ringing', '"
                    .$answer['fname']."', '"
                        .$answer['lname']."', '"
                            .$answer['institution']."', '"
                                .$answer['information']."', "
                                    .$consentEmail.", '"
                                        .$answer['country']."');";
                                        
                                        $results = mysqli_query($link, $queryReturn);
        }
    }
    
    return $queryReturn;
}
/**
 * generated any length random string
 * @param number $length
 * @return string
 */
function generateRandomString($length = 10)
{
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}


/**
 * returns timestamp
 *
 * @return mixed
 */
function makeCode()
{
    $time = gettimeofday();
    $code = $time['sec'];
    return $code;
}
/**
 * generate the confirmation email
 * @param array $answers
 * @return string
 */
function buildemail($answers = array())
{
    global $Web_base;
    $to = $answers['email'];
    $subject = "TEST - Confirm your login!";
    
    $message = "
<html>
<head>
        
        
<title>Confirmation email</title>
</head>
<body>
<P>Dear " . $answers['fname'] . " <br />
    
<br />
You, or someone pretending to be you has requested login into eRA
<br />
Confirm by  following the link, </p>
    

    
<a class=\"btn btn-info mx-1\"
				href=\"".$Web_base."index.php?process=confirm&VC="
				    . $answers['vericode'] . "&TC="
				        . $answers['timecode'] . "&VC2="
				            . $answers['vericode2'] . "\"> <i class=\"fa fa-user\"></i> Confirm !
			</a></li>
				                
				                
				                
<p></p>
</body>
</html>
";
				            
				    
				            
				            // Always set content-type when sending HTML email
				            $headers = "MIME-Version: 1.0" . "\r\n";
				            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				            
				            // More headers
				            $headers .= 'From: <nathalie.castells@rothamsted.ac.uk>' . "\r\n";
				            $headers .= 'Cc: nathalie.castells@rothamsted.ac.uk' . "\r\n";
				            
				            if (mail($to, $subject, $message, $headers)) {
				                
				                
				                return "Please Check your mailbox for validation";
				            } else { return "Unable to send mail" ; }
}



$registeredUser = "Login / Register";
$strRegister = $formOUT;
$registered = 'no';
$loggedIn = 'no';


if (!isset($_COOKIE['email'])) {
    // there is no cookie, therefore I check that there is a form set and set the cookie if the email is in the database

    if (isset($_POST['email'])) {
        $cookie_email_lbl = "email";
        $cookie_email_value = $_POST['email'];
        $user = checkUser($cookie_email_value);
        $time = makecode();
        if ($user['dbresponse'] == 'yes') {
            setcookie('email', $cookie_email_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie('doorbell', 'ringing', time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie('time', $time, time() + (86400 * 30), "/"); // 86400 = 1 day
        } else {;}
    }
} else {

    // there is a cookie so I check if I want it deleted.
    if (isset($_POST['delete'])) {
        if ($_POST['delete'] == 'delete') {
            $cookie_email_lbl = "email";
            $cookie_email_value = $_POST['email'];
            setcookie('email', "", time() - (86400 * 30), "/"); 
            setcookie('doorbell', "", time() - (86400 * 30), "/"); 
            setcookie('time', "", time() - (86400 * 30), "/"); 
        }
    }
    
}

if (isset($_COOKIE['email'])) {
    $email = $_COOKIE['email'];
    $doorbell = $_COOKIE['doorbell'];
    $registered = 'yes'; // to see if I need the register button or not
    if ($doorbell == 'ringing') {
    $loggedIn = 'no' ;
    } else {
        $loggedIn = 'yes' ;
    }
}
/** 
 * this is if we are coming from the login form: we should send the email and wait for it: so result is always
 * 
 */
if (isset($_POST['email']) ) {
    $email = $_POST['email'];
    if ($email != 'delete') {
    $user = checkUser($email);
    $answers = checkUser($email);
    
    $answers['vericode2'] = generateRandomString(72);
    $answers['timecode'] = makeCode();
    $answers['email'] = $email;
    
    $emailsent = buildemail($answers);
    
    $output = '<ul>';
    foreach ($answers as $key => $value) {
        $output .= "<li>" . $key . " : " . $value . "</li>";
    }
    $output .= '</ul>';
    if ($answers['dbresponse']=='yes') {
    $registered = 'yes';
    $strMessage = "An email has been sent to ".$answers['email'].". Please check your mail box to confirm your login.";
    }
    else {$strMessage = "This email is not recognised. Try again or register";}
    }
$loggedIn = 'no';
}
/** 
 * this is if we are coming from an email Link.
 */
if (isset($_REQUEST['process'])) {
    $answer['email'] = $_COOKIE['email'];
    $answer = checkUser($answer['email']);
    $answer['vericode']  = $user['vericode'];
    $answer['vericode2'] = $_REQUEST['VC2'];
    $dbanswer = reg2db($answer);
    $loggedIn = 'yes';
    $email = $answer['email'];
    $registeredUser = $email;
    setcookie('doorbell', $_REQUEST['VC2'], time() + (86400 * 30), "/"); // 86400 = 1 day
}

$formIN = "<div class=\"mt-3\">
<form  action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"post\">
<div class=\"form-group\">
        <input type=\"hidden\" name=\"email\" value=\"delete\">
        <input type=\"hidden\" name=\"delete\" value=\"delete\"> You are logged in as: 
		" . $email . "  </div>
<button type=\"submit\" class=\"btn btn-primary\" >Log out!</button>
	
    </form>
    </div>";

$formOUT = "<div class=\"mt-3\">
<form novalidate class=\"needs-validation\" action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"post\">

<div class=\"form-group\">
        <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\"
        placeholder=\"Enter email\" aria-describedby=\"emailHelp\"  required>
        <small id=\"emailHelp\" class=\"form-text text-muted\">We'll never share your email with anyone else.</small>
    <div class=\"invalid-feedback\">Please enter a valid email address.</div>

</div>

    <button type=\"submit\" class=\"btn btn-primary\" >Log in</button>
    <a  class=\"btn btn-secondary\" href=\"newUser.php\">Register</a>
</form>
</div>
	";
$registeredUser = "Login / Register";
$strRegister = $formOUT;

if ($loggedIn == 'yes' && $email != 'delete') {
    
    $strRegister = $formIN ;
    
    $registeredUser =  $_COOKIE['email'];    
    $_SESSION["email"] = $email;
        
} else {
    
    $strRegister = $formOUT;
    
    $registeredUser = "Login/Register";  
    
    
}


?>



