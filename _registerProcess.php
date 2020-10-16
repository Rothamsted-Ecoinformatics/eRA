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





/** ******************************************** **/
/**
 *
 * @var string $vprocess : tells the application where the process is:
 *      values: question: provides the form
 *      process: start processing it: so sends an email, records stuff in db and even writes a cookie.
 *
 */
$vprocess = "question";
if (isset($_POST['process'])) {
    $vprocess = "post - :". $_POST['process'];
}
if (isset($_GET['process'])) {
    $vprocess = "get - ". $_GET['process'];
}
if (isset($_REQUEST['process'])) {
    $vprocess = $_REQUEST['process'];
}

echo $vprocess;

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
				class="form-control selectpicker countrypicker" data-flag="true" data-default="GB" id="inputCountry" name="inputCountry" required>

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
    
    echo ("TODO: ");
    echo ("put email, timecode and vericodes in cookies");
    echo ("because this is a cookie thing, it has to be done before the headers are sent. ");

} else if ($vprocess == "confirm") {
    echo "I am in: when the user comes back to this page, : ";
    echo "<br />TODO: ";
    echo "<br /> compare what comes in with cookie";
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


