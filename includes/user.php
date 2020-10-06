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
 * Because this may set cookies, it is read before any header are sent.
 *
 * $strRegister is either a form to send the email address or the email that is logged in folloed by sign out.
 * $strRegister = $formIN ;
 * $registeredUser = $email;
 * $registered = 'yes'
 */
function checkUser($info)
{
    
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
        
            while ($row = mysqli_fetch_array($results))
                if ($row['doorbell']== 'ringing') {
                         $user['response'] = 'Please complete your registration process - Check your inbox';
                        $user['loggedin'] = 'no';
                } else {
                    $user['response'] = 'User registered and Verified';
                    $user['loggedin'] = 'yes';           
                }
       } else {
           $user['response'] = 'Login failed ! '.$query;
           $user['loggedin'] = 'no';
       }
    }
    
    return $user;
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
        if ($user['loggedin'] == 'yes') {
            setcookie($cookie_email_lbl, $cookie_email_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        } else {;}
    }
} else {

    // there is a cookie so I check if I want it deleted.
    if (isset($_POST['delete'])) {
        if ($_POST['delete'] == 'delete') {
            $cookie_email_lbl = "email";
            $cookie_email_value = $_POST['email'];
            setcookie($cookie_email_lbl, "", time() - (86400 * 30), "/"); // 86400 = 1 day
        }
    }
}


if (isset($_COOKIE['email'])) {
    $email = $_COOKIE['email'];
    $registered = 'yes';
    $loggedIn = 'yes' ;
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $user = checkUser($email);
    $loggedIn = $user['loggedin'];
}

$formIN = "<div class=\"mt-3\">
<form  action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"post\">
<div class=\"form-group\">
        <input type=\"hidden\" name=\"email\" value=\"delete\">
        <input type=\"hidden\" name=\"delete\" value=\"delete\"> You are logged is as: 
		" . $email . "  <input type=\"submit\"value=\"Log Out!\">
	</div>
    </form>
    </div>";

$formOUT = "<div class=\"mt-3\">
<form  action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"post\">
<div class=\"form-group\">
<input type=\"text\" class=\"form-control\" id=\"email\" name=\"email\"
    placeholder=\"Enter email\"><input type=\"submit\" Value=\"Log in!\">
    </div>
    </form>
    </div>
	";
$registeredUser = "Login / Register";
$strRegister = $formOUT;

if ($loggedIn == 'yes' && $email != 'delete') {

    $strRegister = $formIN ;
    $strMessage = $user['response'];
    $registeredUser = $email;
} else {
    $strRegister = $formOUT ;
    $strMessage = $user['response'];
    $registeredUser = "Login/Register";
}

?>



