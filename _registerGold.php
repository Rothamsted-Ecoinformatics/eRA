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

/**
 * ******************************************** *
 */
/**
 *
 * @var string $vprocess : tells the application where the process is:
 *      values: question: provides the form
 *      process: start processing it: so sends an email, records stuff in db and even writes a cookie.
 *     
 */
// setting some default values.
$vRGEmaildisabled = "required";
$vRGunderstandCheckChecked = "checked";
$vRGSecCheckAC = "checked";
$vRGSecCheckCO = "";
$vRGSecCheckSC = "";
$vRGSecCheckPB = "";

$vprocess = "Q1";
if (isset($_POST['process'])) {
    $vprocess = "post - :" . $_POST['process'];
}
if (isset($_GET['process'])) {
    $vprocess = "get - " . $_GET['process'];
}
if (isset($_REQUEST['process'])) {
    $vprocess = $_REQUEST['process'];
}

if ($loggedIn == 'yes') {
    // fetch data from database and fill in these variables
    $vRGEmail = $_COOKIE['email'];
    $vRGEmaildisabled = "disabled";
    $sqlManga = "Select * from newmarkers where position like '" . $vRGEmail . "'";
    $link = LogMangaGuest();
    $results = mysqli_query($link, $sqlManga);

    if (! $results) {
        print("query failed - " . $sqlManga);
    } else {
        $i = 0;
        $nbResults = mysqli_num_rows($results);
        if ($nbResults >= 1) {

            while ($row = mysqli_fetch_array($results)) {
                if ($RGFirstName) {
                    $vRGFirstName = $RGFirstName;
                } else {
                    $vRGFirstName = $row['fname'];
                }
                $vRGLastName = $row['lname'];

                $vRGunderstandCheck2 = $row['fname'];
                $vRGconsentCheck = $row['fname'];
                if (strstr($vRGEmail, 'rothamsted')) {
                    $vRGinstitution = "Rothamsted Research (RRES)";
                    $vRGIsRoth = 1;
                    $vRGSector = "AC";
                } else {
                    $vRGinstitution = $row['institution'];
                    $vRGIsRoth = 0;
                    $vRGSector = "AC"; // default for role anyway
                }
                $vRGcountry = $row['country'];

                if ($row['role'] > 'A') {
                    $vRGSector = $row['role'];
                }
                switch ($vRGSector) {
                    case 'AC':
                        $vRGSecCheckAC = "checked";
                        $vRGSecCheckCO = "";
                        $vRGSecCheckSC = "";
                        $vRGSecCheckPB = "";

                        break;
                    case 'CO':
                        $vRGSecCheckAC = "";
                        $vRGSecCheckCO = "checked";
                        $vRGSecCheckSC = "";
                        $vRGSecCheckPB = "";

                        break;
                    case 'SC':
                        $vRGSecCheckAC = "";
                        $vRGSecCheckCO = "";
                        $vRGSecCheckSC = "checked";
                        $vRGSecCheckPB = "";

                        break;
                    case 'PB':
                        $vRGSecCheckAC = "";
                        $vRGSecCheckCO = "";
                        $vRGSecCheckSC = "";
                        $vRGSecCheckPB = "checked";

                        break;

                    default:
                        $vRGSecCheckAC = "checked";
                        $vRGSecCheckCO = "";
                        $vRGSecCheckSC = "";
                        $vRGSecCheckPB = "";
                        break;
                }
                $vRGStudent = $row['isStudent'];
                $vRGStdCheckedNo = "";
                $vRGStdCheckedYes = "";
                if ($vRGStudent == 1) {
                    $vRGStdCheckedNo = "";
                    $vRGStdCheckedYes = "checked";
                } else {
                    $vRGStdCheckedNo = "checked";
                    $vRGStdCheckedYes = "";
                }
                $vRGFunding = $row['Funding'];
                $vRGISPG = $row['ISPG'];
                $vRGunderstandCheck2Checked = "";
                $vRGunderstandCheck2 = $row['agreeCOU'];
                if ($vRGunderstandCheck2 == 1) {
                    $vRGunderstandCheck2Checked = "checked";
                }
                $vRGconsentCheckChecked = "";
                $vRGconsentCheck = $row['allowEmails'];
                if ($vRGconsentCheck == 1) {
                    $vRGconsentCheckChecked = "checked";
                }
                $vRGinformation = $row['information'];
                $vRGsupEmail = $row['supervisor_email'];
                $vRGsup_name = $row['supervisor_name'];
                $vRGRothColls = $row['RothColls'];
            }
        }
    }
}
if ($vprocess == "Q1") {
    ?>
<h1 class="mt-5">Request for eRA raw data - page 1 of 3</h1>

<div class="m-5">
	<div class="progress" style="height: 40px;">
		<div class="progress-bar progress-bar-striped bg-success  text-dark"
			role="progressbar" style="width: 33%" aria-valuenow="25"
			aria-valuemin="0" aria-valuemax="100">About you</div>


		<div class="progress-bar progress-bar-striped bg-info"
			role="progressbar" style="width: 33%" aria-valuenow="25"
			aria-valuemin="0" aria-valuemax="100">Your occupation</div>


		<div class="progress-bar progress-bar-striped bg-info"
			role="progressbar" style="width: 34%" aria-valuenow="25"
			aria-valuemin="0" aria-valuemax="100">Data Requested</div>

	</div>

	<p><?php echo $sqlManga; ?>
</p>
	<form action="newGold.php" method="post" class="needs-validation"
		novalidate>
		<input type="hidden" name="process" value="Q2">
		<div class="form-group my-3">
			<label for="RGEmail"><h5>Email address</h5></label> <input type="email"
				class="form-control" id="RGEmail" name="RGEmail"
				aria-describedby="emailHelp" placeholder="Enter email"
				value="<?php echo $vRGEmail; ?>" <?php echo $vRGEmaildisabled?>> <small
				id="emailHelp" class="form-text text-muted">We'll never share your
				email with anyone else.</small>
			<div class="invalid-feedback">Please enter a valid email address.</div>
		</div>
		<div class="form-group my-3">
			<label for="RGFirstName"><h5>First Name</h5></label> <input type="text"
				class="form-control" id="RGFirstName" name="RGFirstName"
				placeholder="First Name" value="<?php echo $vRGFirstName; ?>"
				required>
		</div>
		<div class="form-group my-3">
			<label for="RGLastName"><h5>Last Name</h5></label> <input type="text"
				class="form-control" id="RGLastName" name="RGLastName"
				value="<?php echo $vRGLastName; ?>" placeholder="Last Name" required>
		</div>
		<div class="form-group my-3">
			<label for="RGStudent"><h5>Are you a student?</h5></label>

			<div class="form-check">
				<label class="form-check-label"> <input type="radio"
					class="form-check-input" name="RGStudent" Value="1"
					<?php echo $vRGStdCheckedYes; ?>>Yes
				</label>
			</div>
			<div class="form-check">
				<label class="form-check-label"> <input type="radio"
					class="form-check-input" name="RGStudent" value="0"
					<?php echo $vRGStdCheckedNo; ?>>No
				</label>
			</div>
		</div>

		<div class="form-group my-3">
			<label for="RGSector"><h5>What is your sector of activity</h5></label>

			<div class="form-check">
				<label class="form-check-label"> <input type="radio"
					class="form-check-input" name="RGSector" Value="AC"
					<?php echo $vRGSecCheckAC; ?>>Academia
				</label>
			</div>
			<div class="form-check">
				<label class="form-check-label"> <input type="radio"
					class="form-check-input" name="RGSector" value="CO"
					<?php echo $vRGSecCheckCO; ?>>Industry
				</label>
			</div>
			<div class="form-check">
				<label class="form-check-label"> <input type="radio"
					class="form-check-input" name="RGSector" value="SC"
					<?php echo $vRGSecCheckSC; ?>>Teacher or School Pupil
				</label>
			</div>
			<div class="form-check">
				<label class="form-check-label"> <input type="radio"
					class="form-check-input" name="RGSector" value="PB"
					<?php echo $vRGSecCheckPB; ?>>General Public
				</label>
			</div>
		</div>


		<div class="form-check">
			<input type="checkbox" class="form-check-input"
				id="RGunderstandCheck" name="RGunderstandCheck"
				<?php echo $vRGunderstandCheckChecked; ?> required> <label
				class="form-check-label" for="RGunderstandCheck">By registering, I
				understand that eRA collects information useful to understand how
				the data is used and for funding purposes</label>
		</div>
		<div class="form-check">
			<input type="checkbox" class="form-check-input"
				id="RGunderstandCheck2" name="RGunderstandCheck2"
				<?php echo $vRGunderstandCheck2Checked; ?>> <label
				class="form-check-label" for="RGunderstandCheck2">I agree to the <a
				target="_blank" href="info.php?FileName=conditions">Conditions of
					Use</a>
			</label>
		</div>
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="RGconsentCheck"
				name="RGconsentCheck"> <label class="form-check-label"
				for="RGconsentCheck">I agree to receiving occasional communication
				from the eRA team</label>
		</div>

		<button type="submit" class="btn mt-5 btn-primary">Next</button>
	</form>
</div>


<?php
} else if ($vprocess == "Q2") {

    ?>

<h1 class="mt-5">Request for eRA raw data - page 2 of 3</h1>

<div class="m-5">
	<div class="progress" style="height: 40px;">
		<div class="progress-bar progress-bar-striped bg-success  text-dark"
			role="progressbar" style="width: 33%" aria-valuenow="25"
			aria-valuemin="0" aria-valuemax="100">About you</div>


		<div class="progress-bar progress-bar-striped bg-success   text-dark"
			role="progressbar" style="width: 33%" aria-valuenow="25"
			aria-valuemin="0" aria-valuemax="100">Your occupation</div>


		<div class="progress-bar progress-bar-striped bg-info"
			role="progressbar" style="width: 34%" aria-valuenow="25"
			aria-valuemin="0" aria-valuemax="100">Data Requested</div>

	</div>
	<form action="newGold.php" method="post" class="needs-validation"
		novalidate>

		<div class="form-group my-3">
			<label for="InputInstitute"><h5>Institute</h5></label> <input type="text"
				class="form-control" id="InputInstitute" name="InputInstitute"
				placeholder="Academic Institution or Industry"
				value="<?php echo $vRGinstitution; ?>"> <small id="instHelp"
				class="form-text text-muted">Please provide the name of your
				institution or N/A if this is for your private use</small>
		</div>
		<div class="form-group my-3">

			<label for="inputCountry"><h5>Country</h5></label> <select
				class="form-control selectpicker countrypicker" data-flag="true"
				data-default="GB" id="inputCountry" name="inputCountry" required>

			</select>
		</div>
		<input type="hidden" name="RGEmail" value="<?php echo $RGEmail;?>"> <input
			type="hidden" name="RGFirstName" value="<?php echo $RGFirstName;?>">
		<input type="hidden" name="RGLastName"
			value="<?php echo $RGLastName;?>"> <input type="hidden"
			name="RGSector" value="<?php echo $RGSector;?>"> <input type="hidden"
			name="RGunderstandCheck" value="<?php echo $RGunderstandCheck;?>"> <input
			type="hidden" name="RGunderstandCheck2"
			value="<?php echo $RGunderstandCheck2;?>"> <input type="hidden"
			name="RGconsentCheck" value="<?php echo $RGconsentCheck;?>"> <input
			type="hidden" name="" value=""> <input type="hidden" name="" value="">
		<input type="hidden" name="" value=""> <input type="hidden" name=""
			value=""> <input type="hidden" name="" value=""> <input type="hidden"
			name="" value=""> <input type="hidden" name="" value="">
		<button type="submit" class="btn mt-5 mr-3 btn-primary" name="process"
			value="Q1">Previous</button>
		<button type="submit" class="btn mt-5 mr-3 btn-primary" name="process"
			value="Q3">Next</button>
	</form>
</div>
<?php
} else if ($vprocess == "Q3") {

    ?>

<h1 class="mt-5">Request for eRA raw data - page 3 of 3</h1>

<div class="m-5">
	<div class="progress" style="height: 40px;">
		<div class="progress-bar progress-bar-striped bg-success  text-dark"
			role="progressbar" style="width: 33%" aria-valuenow="25"
			aria-valuemin="0" aria-valuemax="100">About you</div>


		<div class="progress-bar progress-bar-striped bg-success  text-dark"
			role="progressbar" style="width: 33%" aria-valuenow="25"
			aria-valuemin="0" aria-valuemax="100">Your occupation</div>


		<div class="progress-bar progress-bar-striped bg-success  text-dark"
			role="progressbar" style="width: 34%" aria-valuenow="25"
			aria-valuemin="0" aria-valuemax="100">Data Requested</div>

	</div>
	<form action="newGold.php" method="post" class="needs-validation"
		novalidate>

		<div class="form-group my-3">
			<label for="RGur_Q1"><h5>Reason for requesting data</h5></label>
			<textarea class="form-control" id="RGur_Q1"
				name="RGur_Q1" rows="3" required><?php echo $vRGur_Q1;?></textarea>
			<small id="infoHelp" class="form-text text-muted">Please describe how
				you will use the data.</small>
		</div>
		<div class="form-group my-3">
			<label for="RGLTE"><h5>Experiments and/or Met station data required</h5>
			</label>
			<div class="row">

				<div class="col-6">
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="RGLTE"
							name="RGLTE" value="rbk1"> <label class="form-check-label"
							for="RGLTE">Broadbalk (<a target="_blank" href="experiment/rbk1">rbk1</a>)
						</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="RGLTE"
							name="RGLTE" value="rpg5"> <label class="form-check-label"
							for="RGLTE">Park Grass (<a target="_blank" href="experiment/rpg5">rpg5</a>)
						</label>
					</div>

					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="RGLTE"
							name="RGLTE" value="rhb4"> <label class="form-check-label"
							for="RGLTE">Hoosfield Spring Barley Experiment (<a target="_blank" href="experiment/rhb4">rhb4</a>)</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="RGLTE"
							name="RGLTE" value="rwf3"> <label class="form-check-label"
							for="RGLTE">Alternate Wheat and Fallow (<a target="_blank" href="experiment/rwf3">rwf3</a>)</label>
					</div>
				</div>
				<div class="col-6">
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="RGLTE"
							name="RGLTE" value="rothmet"> <label class="form-check-label"
							for="RGLTE">Rothamsted Met Station (<a target="_blank" href="experiment/rms">rothmet</a>)</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="RGLTE"
							name="RGLTE" value="bromet"> <label class="form-check-label"
							for="RGLTE">Brooms Barn Met Station (<a target="_blank" href="experiment/bms">bromet</a>)</label>
					</div>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="RGLTE"
							name="RGLTE" value="wobmet"> <label class="form-check-label"
							for="RGLTE">Woburn Met Station (<a target="_blank" href="experiment/wms">wobmet</a>)</label>
					</div>
				</div>
			</div>

		</div>

		<small id="infoHelp" class="form-text text-muted">Check all the
			relevant Experiments</small>
		<div class="form-group my-3">
			<label for="RGur_Q2"><h5>Additional details (plots, years, variables)</h5></label>
			<textarea class="form-control" id="RGur_Q2"
				name="RGur_Q2" rows="3" required><?php echo $vRGur_Q2;?></textarea>
			<small id="infoHelp" class="form-text text-muted">Please describe how
				you will use the data.</small>
		</div>
		<input type="hidden" name="RGEmail" value="<?php echo $RGEmail;?>"> <input
			type="hidden" name="RGFirstName" value="<?php echo $RGFirstName;?>">
		<input type="hidden" name="RGLastName"
			value="<?php echo $RGLastName;?>"> <input type="hidden"
			name="RGSector" value="<?php echo $RGSector;?>"> <input type="hidden"
			name="RGunderstandCheck" value="<?php echo $RGunderstandCheck;?>"> <input
			type="hidden" name="RGunderstandCheck2"
			value="<?php echo $RGunderstandCheck2;?>"> <input type="hidden"
			name="RGconsentCheck" value="<?php echo $RGconsentCheck;?>"> <input
			type="hidden" name="" value=""> <input type="hidden" name="" value="">
		<input type="hidden" name="" value=""> <input type="hidden" name=""
			value=""> <input type="hidden" name="" value=""> <input type="hidden"
			name="" value=""> <input type="hidden" name="" value="">
		<button type="submit" class="btn btn-primary" name="process"
			value="Q2">Previous</button>
		<button type="submit" class="btn btn-primary" name="process"
			value="RGprocess">Finish</button>
	</form>
</div>
<?php
} else if ($vprocess == "RGprocess") {

    ?>
<h1 class="mt-5">Data Request has been sent</h1>
<div class="m-5">

	<p>Thank you for your request.</p>
	<!--  -->
	<p>
		An email has been sent to <span class="badge badge-success"> <?php echo $vRGEmail; ?></span>. Please click on the link in the email to finish the process. Our curators will get in touch soon.
	</p>
</div>
<?php
} else if ($vprocess == "confirm") {
    echo ("that should not be necessary as the email writes a link that goes to index... ");
    echo "I am in: when the user comes back to this page, ";
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


