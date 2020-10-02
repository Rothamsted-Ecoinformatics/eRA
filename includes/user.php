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
 */



if (!isset($_COOKIE['email'])) {
    // there is no cookie, therefore I check that there is a form set and set the cookie

    if (isset($_POST['email'])) {
        $cookie_email_lbl = "email";
        $cookie_email_value = $_POST['email'];
        setcookie($cookie_email_lbl, $cookie_email_value, time() + (86400 * 30), "/"); // 86400 = 1 day
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
$registeredUser = "Login";
$strRegister =  $formOUT;
$registered = 'no';
if(isset($_COOKIE['email'])) {$email = $_COOKIE['email']; $registered = 'yes';}
if(isset($_POST['email'])) {$email = $_POST['email']; $registered = 'yes';}


$formIN = "<div class=\"mt-3\">
<form  action=\"".$_SERVER['PHP_SELF']."\" method=\"post\">
<div class=\"form-group\">
        <input type=\"hidden\" name=\"email\" value=\"delete\">
        <input type=\"hidden\" name=\"delete\" value=\"delete\"> You are logged is as: 
		".$email."  <input type=\"submit\"value=\"Log Out!\">
	</div>
    </form>
    </div>";



$formOUT = "<div class=\"mt-3\">
<form  action=\"".$_SERVER['PHP_SELF']."\" method=\"post\">
<div class=\"form-group\">
<input type=\"text\" class=\"form-control\" id=\"email\" name=\"email\"
    placeholder=\"Enter email\"><input type=\"submit\" Value=\"Log in!\">
    </div>
    </form>
    </div>
	";
$registeredUser = "Login/Register";
$strRegister =  $formOUT;

if ($registered == 'yes' && $email != 'delete') {
  
    $strRegister =  $formIN;
    $registeredUser = $email;

} else {
    $strRegister =  $formOUT;
    $registeredUser = "Login/Register";
}


?>



