<?php
/**
 * @file _registerProcess.php
 * @brief email form
 *
 * @author Nathalie Castells-Brooke
 * @date 6/4/2019
 */
/**
 *
 * @var string $InputEmail: email entered by user
 */
/**
 *
 * @var string $fromEmail : email sending address. Could be the eRA email or a noreply?
 */
$fromEmail = 'nathalie.castells@rothamsted.ac.uk';

/**
 *
 * @var array $details : will contain all the variables we need to feed the function
 */
function getInput()
{
    $details = array(
        "email" => "nathalie.brooke@gmail.com",
        "fname" => "Nathalie",
        "lname" => "Brooke",
        "institution" => "RRES",
        "information" => "Some text that will need cleaning",
        "country" => "United Kingdom",
        "consentData" => 1,
        "consentEmail" => 1
    );
    if (isset($_POST['InputFirstName'])) {
        $details['fname'] = cleanQuery($_POST['InputFirstName']);
    }
    
    if (isset($_POST['InputLastName'])) {
        $details['lname'] = cleanQuery($_POST['InputLastName']);
    }
    if (isset($_POST['InputEmail'])) {
        $details['email'] = cleanQuery($_POST['InputEmail']);
    }
    if (isset($_POST['InputInstitute'])) {
        $details['institution'] = cleanQuery($_POST['InputInstitute']);
    }
    if (isset($_POST['information'])) {
        $details['information'] = cleanQuery($_POST['information']);
    }
    if (isset($_POST['consentCheck'])) {
        
        $details['consentEmail'] = cleanQuery($_POST['consentCheck']);
    }
    if (isset($_POST['understandCheck'])) {
        $details['consentData'] = cleanQuery($_POST['understandCheck']);
    }
    
    if (isset($_POST['inputCountry'])) {
        $details['country'] = cleanQuery($_POST['inputCountry']);
    }
    return $details;
}
/**
 *
 * @var string $vprocess : tells the application where the process is:
 *      values: question: provides the form
 *      process: start processing it: so sends an email, records stuff in db and even writes a cookie.
 *
 */
$vprocess = "question";
if (isset($_POST['process'])) {
    $vprocess = $_POST['process'];
}

function buildemail($answers = array())
{
    global $Web_base;
    $to = $answers['email'];
    $subject = "TEST-Confirm your login!";
    
    $message = "
<html>
<head>
<link rel=\"stylesheet\"
	href=\"https://fonts.googleapis.com/css?family=Raleway:400,800\">
<link rel='stylesheet'
	href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\">
        
<link rel=\"stylesheet\"
	href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\"
	integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\"
	crossorigin=\"anonymous\">
        
<link rel=\"stylesheet\" href=\"".$Web_base."css/bootstrap.css\">
<link rel=\"stylesheet\" href=\"".$Web_base."css/style.css\">
    
<title>Login or register email</title>
</head>
<body>
<P>Dear " . $answers['fname'] . " <br />
    
<br />
You, or someone pretending to be you has requested login into eRA
<br />
Confirm by  following the link, </p>
    
<p> Link not working.. </p>
    
<a class=\"btn btn-info mx-1\"
				href=\"".$Web_base."newUser.php?process=confirm&VC="
				. $answers['vericode'] . "&TC="
				. $answers['timecode'] . "&VC2="
				. $answers['vericode2'] . "\"> <i class=\"fa fa-user\"></i> Confirm !
			</a></li>
				    
				    
				    
<p></p>
</body>
</html>
";
				
				$answers['vericode'] = $randString;
				$answers['timecode'] = $timecode;
				
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
            $queryReturn = $queryCheck;
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

if ($vprocess == "question") {
    ?>
<h1 class="mt-5">Register for prepared datasets</h1>
<div class="m-5">

	<form action="newUser.php" method="post" class="needs-validation"
		novalidate>
		<input type="hidden" name="process" value="process">
		<div class="form-group">
			<label for="InputEmail">Email address</label> <input type="email"
				class="form-control" id="InputEmail" name="InputEmail"
				aria-describedby="emailHelp" placeholder="Enter email" required> <small
				id="emailHelp" class="form-text text-muted">We'll never share your
				email with anyone else.</small>
			<div class="invalid-feedback">Please enter a valid email address.</div>
		</div>
		<div class="form-group">
			<label for="InputFirstName">First Name</label> <input type="text"
				class="form-control" id="InputFirstName" name="InputFirstName"
				placeholder="First Name" required>
		</div>
		<div class="form-group">
			<label for="InputLastName">Last Name</label> <input type="text"
				class="form-control" id="InputLastName" name="InputLastName"
				placeholder="Last Name" required>
		</div>
		<div class="form-group">
			<label for="InputInstitute">Institute</label> <input type="text"
				class="form-control" id="InputInstitute" name="InputInstitute"
				placeholder="Academic Institution or Industry"> <small id="instHelp"
				class="form-text text-muted">Please provide the name of your
				institution or N/A if this is for your private use</small>
		</div>
		<div class="form-group">
			<label for="inputCountry">Country</label> <select
				class="form-control" id="inputCountry" name="inputCountry" required>
				<option>United Kingdom</option>
				<option>Tattouine</option>
				<option>Genovia</option>
				<option>Ank Morport</option>
			</select>
		</div>
		<div class="form-group">
			<label for="information">Data Use</label>
			<textarea class="form-control" id="information" name="information"
				rows="3" required></textarea>
			<small id="infoHelp" class="form-text text-muted">Describe in a few
				words how you will use the data.</small>
		</div>
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="understandCheck"
				name="understandCheck"> <label class="form-check-label"
				for="understandCheck" required>I undertand that eRA collects
				information useful to understand how the data is used and for
				funding purposes</label>
		</div>
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="consentCheck"
				name="consentCheck"> <label class="form-check-label"
				for="consentCheck">I agree to receiving occasional communication
				from the eRA team</label>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>


<?php
} else if ($vprocess == "process") {

    $answers = getInput();

    $answers['vericode']  = generateRandomString(10);
    $answers['vericode2'] = generateRandomString(72);
    $answers['timecode'] = makeCode();
    
    $emailsent = buildemail($answers);
    
    $dbanswer = reg2db($answers);
    
    $output = '<ul>';
    foreach ($answers as $key => $value) {
        $output .= "<li>" . $key . " : " . $value . "</li>";
    }
    $output .= '</ul>';

    echo $output;
    echo ("<p>".$emailsent."</p>");
    echo ("<p>".$dbanswer."</p>");

}
?>

<!-- JavaScript for disabling form submissions if there are invalid fields -->
<script>
        // Self-executing function
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>


