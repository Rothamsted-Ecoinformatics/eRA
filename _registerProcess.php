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
        "institute" => "RRES",
        "info" => "Some text that will need cleaning",
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
        $details['institute'] = cleanQuery($_POST['InputInstitute']);
    }
    if (isset($_POST['information'])) {
        $details['info'] = cleanQuery($_POST['information']);
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

function buildemail($details = array())
{}

function makeCode() {
    
    $time  = gettimeofday();
    $code = $time['sec'];
    return $code;
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
				class="form-control" id="InputEmail" name="InputEmail" aria-describedby="emailHelp"
				placeholder="Enter email" required> <small id="emailHelp"
				class="form-text text-muted">We'll never share your email with
				anyone else.</small>
			<div class="invalid-feedback">Please enter a valid email address.</div>
		</div>
		<div class="form-group">
			<label for="InputFirstName">First Name</label> <input type="text"
				class="form-control" id="InputFirstName"  name="InputFirstName" placeholder="First Name"
				required>
		</div>
		<div class="form-group">
			<label for="InputLastName">Last Name</label> <input type="text"
				class="form-control" id="InputLastName" name="InputLastName" placeholder="Last Name"
				required>
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
			<textarea class="form-control" id="information" name="information" rows="3" required></textarea>
			<small id="infoHelp" class="form-text text-muted">Describe in a few
				words how you will use the data.</small>
		</div>
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="understandCheck" name="understandCheck">
			<label class="form-check-label" for="understandCheck" required>I
				undertand that eRA collects information useful to understand how the
				data is used and for funding purposes</label>
		</div>
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="consentCheck" name="consentCheck"> <label
				class="form-check-label" for="consentCheck">I agree to receiving
				occasional communication from the eRA team</label>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>


<?php
} 
else if ($vprocess == "process") {

    ?>
<div class="container">

	<div class="row">

		<div class="col-xl-8 offset-xl-2 py-5">
			<h1>Confirmation</h1>

			
<?php
$answers = getInput();
$vericode = makeCode();
$link = "http://local-info.rothamsted.ac.uk/eRA/era2018-new/newUser.php?process=confirm&email=".$answers['email']."&vericode=".$vericode;

$message = "Dear ".$answers['fname']." ".$answers['lname']." , \n please confirm your registration by following this link: 
<a href=\"".$link."\">".$link."</a>";
echo "We are going to eventually send this message: <br />".$message;
    ?>
    
   
<p>Thank you for your submission. Please check your email for validation</p>
			
				

		</div>

	</div>

</div>
<?php
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


