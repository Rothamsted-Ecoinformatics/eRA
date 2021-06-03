<?php
/**
 * @file _registerGold.php
 * 
 *
 * @author Nathalie Castells-Brooke
 * @date 1/04/2021
 * 
 * html part of the form to request data
 */

/**
 *
 * @var string $fromEmail : email sending address. Could be the eRA email or a noreply?
 */
if ($vprocess == "RGprocess") {
    

    ?>

<h2 class="mx-3">Thank you!</h2>

<p> 

<?php
    $strRecorded = "<p>This is the information that has been recorded.</p>";


    $strRecorded .= "<ul>";
    $strRecorded .= "\n\t<li><b>Name : </b> $RGfname $RGlname </li>";
    $strRecorded .= "\n\t<li><b>Email : </b> $RGposition </li>";
    $strRecorded .= "\n\t<li><b>Sector : </b> $strSector</li>";
    $strRecorded .= "\n\t<li><b>Institution : </b> $RGinstitution </li>";
    $strRecorded .= "\n\t<li><b>Country : </b> $RGcountry </li>";

    $strRecorded .= "\n\t<li><b>Student : </b> $strStudent</li>";
    if ($RGsupEmail) {
        $strRecorded .= "\n\t<li><b>Supervisor Email : </b> $RGsupEmail</li>";
    }
    if ($RGsupName) {
        $strRecorded .= "\n\t<li><b>Supervisor Name : </b> $RGsupName</li>";
    }
    if ($RGrothColls) {
        $strRecorded .= "\n\t<li><b>Collaborators at Rothamsted : </b> $RGrothColls</li>";
    }
    if ($RGfunding) {
        $strRecorded .= "\n\t<li><b>Funding source : </b> $RGfunding</li>";
    }
    if ($RGISPG) {
        $strRecorded .= "\n\t<li><b>ISPG : </b> $RGISPG</li>";
    }

    $strRecorded .= "\n\t<li><b>Are you happy to receive occasional emails?  </b>  $strAllowEmails</li>";
    $strRecorded .= "\n\t<li><b>Data request reason : </b> $RGur_Q1</li>";

    $strRecorded .= "\n\t<li><b>Datasets requested (shortnames) : </b> $ur_ltes</li>";
    $strRecorded .= "\n\t<li><b>More Specifications : </b> $RGur_Q2</li>";

    $strRecorded .= "</ul>";


    echo $strRecorded;

    $message = "
<html>
<head>
<title>Confirmation email</title>
</head>
<body>
";
    $message .= "<p>Dear ".$RGfname ."</p>";
    $message .= $strRecorded;
    $message .= "A member of our team will contact you shortly. Please reply to this email for correspondance. ";
    $message .= "</body></html>";
    
    

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= "FROM: res.era@rothamsted.ac.uk" . "\r\n". "CC: ".$moderationEmail;
    
    $to = $RGposition;
    $subject = "Data Request for $RGfname $RGlname - $ur_insertID";
    $response = "<p>
An email has  been sent to <span class=\"badge badge-success\">" . $RGposition . "</span> to confirm your request. ";
    //echo ($to .  $subject. $message. $headers);
    if (mail($to, $subject, $message, $headers)) {

        echo $response;
    } else {
        echo "Unable to send mail";
    }
} else {
    // Q1, Q2, Q3 are the three pannels. The form is reloaded in these stages.

    ?>

	 
<div class="m-3">
			
<?php

if ($vprocess == "Q1") {
        if ($vRGallowEmails == 1) {$vRGallowEmailsChecked = " checked";}
        
        if (is_array($_REQUEST['RGLTE'])) {
            $vRGDLTE = $_REQUEST['RGLTE'];
            $vstrRGLTE = implode(" , ", $vRGDLTE);
            
            
        }
        if (isset($_REQUEST['strRGLTE'])) {
            $vstrRGLTE = $_REQUEST['strRGLTE'];
            $arrRGLTE = explode(" , ",$vstrRGLTE);
            
        }
       
        
        ?>
       
		<form action="newGold.php" method="post" class="needs-validation"
		novalidate>
		<div class="progress" style="height: 40px;">
			<div class="progress-bar progress-bar-striped bg-success  text-dark"
				role="progressbar" style="width: 33%" aria-valuenow="25"
				aria-valuemin="0" aria-valuemax="100">About you</div>

		</div>
		<h2 class="mt-3">About You</h2>
				<?php

        if ($loggedIn != 'yes') {
            $messageNotLoggedIn = "<p>We recommand you log in before you fill in a eRAdata request</p>";
        } else {
            $messageNotLoggedIn = "";
        }

        echo $messageNotLoggedIn;
        ?>
			<input type="hidden" name="process" value="Q2">
		<div class="form-group my-3">
			<label for="RGposition"><h5>Email address*</h5></label> <input
				type="email" class="form-control" id="RGposition" name="RGposition"
				aria-describedby="emailHelp" placeholder="Enter email"
				value="<?php echo $vRGposition; ?>"
				<?php echo $vRGpositiondisabled?>> <small id="emailHelp"
				class="form-text text-muted">We'll never share your email with
				anyone else.</small>
			<div class="invalid-feedback">Please enter a valid email address.</div>
		</div>
		<div class="form-group my-3">
			<label for="RGfname"><h5>First Name*</h5></label> <input type="text"
				class="form-control" id="RGfname" name="RGfname"
				placeholder="First Name" value="<?php echo $vRGfname; ?>" required>
		</div>
		<div class="form-group my-3">
			<label for="RGlname"><h5>Last Name*</h5></label> <input type="text"
				class="form-control" id="RGlname" name="RGlname"
				value="<?php echo $vRGlname; ?>" placeholder="Last Name" required>
		</div>
		<div class="form-group my-3">

			<label for="RGcountry"><h5>Country*</h5></label> <select
				class="form-control selectpicker countrypicker" data-flag="true"
				data-default="GB" id="RGcountry" name="RGcountry" required>

			</select>
		</div>
		<div class="form-group my-3">
			<label for="RGisStudent"><h5>Are you a student?</h5></label>

			<div class="form-check">
				<label class="form-check-label"> <input type="radio"
					class="form-check-input" name="RGisStudent" value="1"
					<?php echo $vRGStdCheckedYes; ?>>Yes
				</label>
			</div>
			<div class="form-check">
				<label class="form-check-label"> <input type="radio"
					class="form-check-input" name="RGisStudent" value="0"
					<?php echo $vRGStdCheckedNo; ?>>No
				</label>
			</div>
		</div>
			<?php
        if ($vRGisRoth != 1) {
            ?>
		<div class="form-group my-3">
			<label for="RGsector"><h5>What is your sector of activity</h5></label>

			<div class="form-check">
				<label class="form-check-label"> <input type="radio"
					class="form-check-input" name="RGsector" value="AC"
					<?php echo $vRGSecCheckAC; ?>>Research (including PhD)
				</label>
			</div>
			<div class="form-check">
				<label class="form-check-label"> <input type="radio"
					class="form-check-input" name="RGsector" value="CO"
					<?php echo $vRGSecCheckCO; ?>>Industry (including farming)
				</label>
			</div>
			<div class="form-check">
				<label class="form-check-label"> <input type="radio"
					class="form-check-input" name="RGsector" value="SC"
					<?php echo $vRGSecCheckSC; ?>>Educational
				</label>
			</div>
			<div class="form-check">
				<label class="form-check-label"> <input type="radio"
					class="form-check-input" name="RGsector" value="PB"
					<?php echo $vRGSecCheckPB; ?>>General Public
				</label>
			</div>
		</div>
<?php
        } else {
            ?> 
		<input type="hidden" name="RGisRoth" value="1" />
		<?php
        }
        ?>
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="RGconsentCheck"
				name="RGconsentCheck" <?php echo $vRGGDPRChecked; ?> required> <label
				class="form-check-label" for="RGconsentCheck">* I agree to the use
				of cookies to enable the persistence of login. </label>

		</div>
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="RGagreeCOU"
				name="RGagreeCOU" <?php echo $vRGagreeCOUChecked; ?> required> <label
				class="form-check-label" for="RGagreeCOU">* I have read the <a
				target="_blank" href="info/conditions"><b>Conditions of
						Use</b></a> of eRAdata including their policy on personal data and
				I agree with them.
			</label>
		</div>
		<div class="form-check">
			<input type="checkbox" class="form-check-input" id="RGallowEmails"
				name="RGallowEmails" value = "1" <?php echo $vRGallowEmailsChecked; ?>> <label
				class="form-check-label" for="RGallowEmails">I agree to receiving
				occasional communication from the eRA team <?php echo $vRGallowEmails . $vRGallowEmailsChecked ;?></label>
		</div>



		<!-- entered in Q2 passed for memory -->
		<input type="hidden" name="RGinstitution"
			value="<?php echo $vRGinstitution; ?>" /> <input type="hidden"
			name="RGfunding" value="<?php echo $vRGfunding; ?>" /> <input
			type="hidden" name="RGfundingOther"
			value="<?php echo $vRGfundingOther; ?>" /> <input type="hidden"
			name="RGISPG" value="<?php echo $vRGISPG; ?>" /> <input type="hidden"
			name="RGsupName" value="<?php echo $vRGsupName; ?>" /> <input
			type="hidden" name="RGsupEmail" value="<?php echo $vRGsupEmail; ?>" />
		<input type="hidden" name="RGrothColls"
			value="<?php echo $vRGrothColls; ?>" />



		<!--  entered in Q3 - passed for memory -->
		
		<input type="hidden" name="RGur_Q1" value="<?php echo $vRGur_Q1; ?>" />
		<input type="hidden" name="strRGLTE" value="<?php echo $vstrRGLTE; ?>" />
		<input type="hidden" name="RGLTE" value="<?php echo $vRGLTE; ?>" /> <input
			type="hidden" name="RGDS" value="<?php echo $vRGDS; ?>" /> <input
			type="hidden" name="RGur_Q2" value="<?php echo $vRGur_Q2; ?>" /> <input
			type="hidden" name="RGfrom" value="Q1" />
		<button type="submit" class="btn mt-5 mr-1 btn-warning" name="process"
			value="Reset">Reset</button>
		<button type="submit" class="btn mt-5 mr-1 btn-primary" name="process"
			value="Next">Next</button>

	</form>

	


<?php
    } else if ($vprocess == "Q2") {
        if (is_array($_REQUEST['RGLTE'])) {
            $vRGDLTE = $_REQUEST['RGLTE'];
            $vstrRGLTE = implode(" , ", $vRGDLTE);
            $vstrRGLTE = "FROMARRAYRGLTE , ".$vstrRGLTE;
            
        }
        if (isset($_REQUEST['strRGLTE'])) {
            $vstrRGLTE = "REQUEST , ".$_REQUEST['strRGLTE'];
            $arrRGLTE = explode(" , ",$vstrRGLTE);
     
        }
      
        // the progress bar : none for PB as PB does not see this page.
        ?>
        
		<form action="newGold.php" method="post" class="needs-validation"
		novalidate>
		<div class="progress" style="height: 40px;">
			<div class="progress-bar progress-bar-striped bg-success  text-dark"
				role="progressbar" style="width: 33%" aria-valuenow="25"
				aria-valuemin="0" aria-valuemax="100">About you</div>

			<div class="progress-bar progress-bar-striped bg-success  text-dark"
				role="progressbar" style="width: 33%" aria-valuenow="25"
				aria-valuemin="0" aria-valuemax="100">Your affilitation</div>
		</div>

		<h2>About your affiliation</h2>
	<?php
        // institution : only if not Rothamsted and depends on type of institution
        if ($vRGisRoth != 1) {
            if ($RGsector == "AC") {
                // This is an academic institution, not Rothamsted. We want institution and collaborator at Roth, funding-->

                ?>
			<div class="form-group my-3">
			<label for="RGinstitution"><h5>Research Institute or University*</h5></label>
			<input type="text" class="form-control" id="RGinstitution"
				name="RGinstitution" placeholder="Research Institute or University"
				value="<?php echo $vRGinstitution?>" required> <small id="instHelp"
				class="form-text text-muted">*: This field is mandatory </small>
		</div>
		
		<?php
            } else if ($RGsector == "CO") {
                ?>
	    <!-- This is an industry , not Rothamsted. We want company name -->

		<div class="form-group my-3">
			<label for="RGinstitution"><h5>Company Name*</h5></label> <input
				type="text" class="form-control" id="RGinstitution"
				name="RGinstitution" placeholder="Company Name"
				value="<?php echo $vRGinstitution?>" required> <small id="instHelp"
				class="form-text text-muted">*: This field is mandatory </small>
		</div>
		
		
		<?php
            } else if ($RGsector == "SC") {
                ?>
	    <!-- This is an academic institution, not Rothamsted. We want institution -->

		<div class="form-group my-3">
			<label for="RGinstitution"><h5>Educational Establishment*</h5></label>
			<input type="text" class="form-control" id="RGinstitution"
				name="RGinstitution" placeholder="School "
				value="<?php echo $vRGinstitution?>" required> <small id="instHelp"
				class="form-text text-muted">Please provide the name of school and
				indicate if it is primary, secondary or higher<br /> *: This field
				is mandatory
			</small>
		</div>
		
		<?php
            }

            // Collaborators: if AC, not roth, not student
            if (($RGsector == "AC") or ($RGsector == "CO")) {
                if ($RGisStudent == 0) {
                    ?>
		<div class="form-group my-3">
			<label for="RGrothColls"><h5>Collaborators at Rothamsted</h5></label>
			<input type="text" class="form-control" id="RGrothColls"
				name="RGrothColls"
				placeholder="Names of collaborators at Rothamsted"
				value="<?php echo $vRGrothColls?>"> <small id="instHelp"
				class="form-text text-muted">Please separate names with a comma</small>
		</div>
		<?php
                }
            }
        } // end isROTH=0
          // Supervisor: if student

        if ($RGisStudent == 1) {
            ?>
	
		<div class="form-group my-3">
			<label for="RGsupName"><h5>Your Supervisor Name</h5></label> <input
				type="text" class="form-control" id="RGsupName" name="RGsupName"
				placeholder="Supervisor Name" value="<?php echo $vRGsupName?>"> <small
				id="instHelp" class="form-text text-muted">Please provide the name
				of your supervisor </small>
		</div>

		<div class="form-group my-3">
			<label for="RGsupEmail"><h5>Your Supervisor email address*</h5></label>
			<input type="text" class="form-control" id="RGsupEmail"
				name="RGsupEmail" placeholder="name@institute.ac.uk"
				value="<?php echo $vRGsupEmail?>" required> <small id="instHelp"
				class="form-text text-muted"> *: This field is mandatory</small>
		</div>
		
		
	    <?php
        } // end student

        // funding source : for AC

        if ($RGsector == "AC" or $vRGisRoth == 1) {
            ?>
		<div class="form-group my-3">
			<label for="RGfunding"><h5>Funding Source</h5></label>
			<div class="form-check">
				<label for="RGfunding" class="form-check-label"> <input type="radio"
					class="form-check-input" name="RGfunding" id="FDbbsrc"
					value="BBSRC" <?php echo $vRGfundingBBSRC; ?>>BBSRC
				</label>
			</div>
			<div class="form-check">
				<label for="RGfunding" class="form-check-label"> <input type="radio"
					class="form-check-input" name="RGfunding" id="FDother1"
					value="NERC" <?php echo $vRGfundingNERC; ?>>NERC
				</label>
			</div>
			<div class="form-check">
				<label for="RGfunding" class="form-check-label"> <input type="radio"
					class="form-check-input" name="RGfunding" id="FDother2"
					value="OTHER" <?php echo $vRGfundingOTHER; ?>>OTHER
				</label>
			</div>
			<div id="RGfundingOther" style="display: none" class="mt-3">
				<label for="RGfundingOther"><h6>Name of funding source</h6></label>
				<input type="text" class="form-control" name="RGfundingOther"
					placeholder="Other" value="<?php echo $vRGfundingOther?>"><small
					id="instHelp" class="form-text text-muted">Please provide the name
					of your funding source </small>
			</div>
			<div id="RGfundinglist" style="display: none">
				<div class="form-group my-3">
					<label for="RGISPG"><h5>ISPG or Project</h5></label> <select
						class="form-control" id="RGISPG" name="RGISPG">
						<option value="NA" <?php echo $vRGISPGck['NA'];?>>Please select
							one</option>
						<option value="ASSIST" <?php echo $vRGISPGck['ASSIST'];?>>ASSIST</option>
						<option value="DFW" <?php echo $vRGISPGck['DFW'];?>>DFW</option>
						<option value="TPM" <?php echo $vRGISPGck['TPM'];?>>TPM</option>
						<option value="S2N" <?php echo $vRGISPGck['S2N'];?>>S2N</option>
						<option value="SCP" <?php echo $vRGISPGck['SCP'];?>>SCP</option>
						<option value="NC-LTE" <?php echo $vRGISPGck['NC-LTE'];?>>NC -
							LTE</option>
						<option value="NC-OTHER" <?php echo $vRGISPGck['NC-OTHER'];?>>NC
							- OTHER</option>
						<option value="OTHER" <?php echo $vRGISPGck['OTHER'];?>>OTHER</option>
					</select><small id="instHelp" class="form-text text-muted"> Please
						enter the ISPG or National Capability</small>
				</div>
			</div>
	    <?php
        } // end AC

        ?>
   <!--  for all  -->

			<!--  entered in Q1 - passed  -->
			<input type="hidden" name="RGposition"
				value="<?php echo $vRGposition;?>" /> <input type="hidden"
				name="RGcountry" value="<?php echo $vRGcountry; ?>" /> <input
				type="hidden" name="RGfname" value="<?php echo $vRGfname;?>" /> <input
				type="hidden" name="RGlname" value="<?php echo $vRGlname;?>" /> <input
				type="hidden" name="RGisStudent"
				value="<?php echo $vRGisStudent; ?>" /> <input type="hidden"
				name="RGisRoth" value="<?php echo $vRGisRoth;?>" /> <input
				type="hidden" name="RGsector" value="<?php echo $vRGsector;?>" /> <input
				type="hidden" name="RGagreeCOU" value="<?php echo $vRGagreeCOU;?>" />
			<input type="hidden" name="RGallowEmails"
				value="<?php echo $vRGallowEmails;?>" />





			<!--  entered in Q3 - passed for memory -->
			<input type="hidden" name="RGur_Q1" value="<?php echo $vRGur_Q1; ?>" />
			<input type="hidden" name="strRGLTE" value="<?php echo $vstrRGLTE; ?>" />
			 <input
				type="hidden" name="RGur_Q2" value="<?php echo $vRGur_Q2; ?>" /> <input
				type="hidden" name="RGfrom" value="Q2" />
			<button type="submit" class="btn mt-5 mr-1 btn-primary"
				name="process" value="Prev">Previous</button>
			<button type="submit" class="btn mt-5 mr-1 btn-warning"
				name="process" value="Reset">Reset</button>
			<button type="submit" class="btn mt-5 mr-1 btn-primary"
				name="process" value="Next">Next</button>
	
	</form>
	

<?php
    } // end q2

    else if ($vprocess == "Q3") {
        if (is_array($_REQUEST['RGLTE'])) {
            $vRGDLTE = $_REQUEST['RGLTE'];
            $vstrRGLTE = implode(" , ", $vRGDLTE);
            $vstrRGLTE = "FROMARRAYRGLTE , ".$vstrRGLTE;
            
        }
        if (isset($_REQUEST['strRGLTE'])) {
            $vstrRGLTE = "REQUEST , ".$_REQUEST['strRGLTE'];
            $arrRGLTE = explode(" , ",$vstrRGLTE);
            
            
            foreach ($arrRGLTE as $valueRGLTE) {
                $vRGLTEsel[$valueRGLTE] = " checked";
                //echo "<br />$valueRGLTE $vRGLTEsel[$valueRGLTE] ";
            }
        }
   
        if ($vRGsector == "PB") {
            ?>
            
            <div class="progress" style="height: 40px;">
		<div class="progress-bar progress-bar-striped bg-success  text-dark"
			role="progressbar" style="width: 50%" aria-valuenow="25"
			aria-valuemin="0" aria-valuemax="100">About you</div>


		<div class="progress-bar progress-bar-striped bg-success  text-dark"
			role="progressbar" style="width: 50%" aria-valuenow="25"
			aria-valuemin="0" aria-valuemax="100">Data Request</div>

	</div>
            <?php
        } else {
            ?>
	
		<div class="progress" style="height: 40px;">
		<div class="progress-bar progress-bar-striped bg-success  text-dark"
			role="progressbar" style="width: 33%" aria-valuenow="25"
			aria-valuemin="0" aria-valuemax="100">About you</div>

		<div class="progress-bar progress-bar-striped bg-success  text-dark"
			role="progressbar" style="width: 33%" aria-valuenow="25"
			aria-valuemin="0" aria-valuemax="100">Your affilitation</div>

		<div class="progress-bar progress-bar-striped bg-success  text-dark"
			role="progressbar" style="width: 34%" aria-valuenow="25"
			aria-valuemin="0" aria-valuemax="100">Data Request</div>

	</div>
		<?php
        }
        ?>
         <h2 class="mt-3">About the data access</h2>
	<form action="newGold.php" method="post" class="needs-validation"
		novalidate>	
        <?php
        if ($RGsector == "AC" or $RGsector == "CO") {
            ?>
           
			<div class="form-group my-3">
			<label for="RGur_Q1"><h5>Scientific case for using the data</h5></label>
			<textarea class="form-control" id="RGur_Q1" name="RGur_Q1" rows="3"
				required><?php echo $vRGur_Q1;?></textarea>
			<small id="infoHelp" class="form-text text-muted">Please describe how
				you will use the data.</small>
		</div>
			<?php
        } else {
            ?>
			<div class="form-group my-3">
			<label for="RGur_Q1"><h5>How will you use the data?</h5></label>
			<textarea class="form-control" id="RGur_Q1" name="RGur_Q1" rows="3"
				required><?php echo $vRGur_Q1;?></textarea>
			<small id="infoHelp" class="form-text text-muted">Please describe how
				you will use the data.</small>
		</div>
			<?php
        }
        ?> 
<div class="form-group my-3">
			<label for="RGLTE[]"><h5>Experiments and/or Met station data required</h5>
			</label>

			<div class="form-check">
				<label class="form-check-label" id="RGLBLrbk1" ><input type="checkbox"
					class="form-check-input" id="RGEXPTrbk1" name="RGLTE[]"
					value="Broadbalk" <?php echo  $vRGLTEsel['Broadbalk'];?>> Broadbalk
				</label>
			</div>
			<div class="datasetsList " id="dsrbk1">

				<div class="form-check ml-5">
					<label class="form-check-label"  for="RGLTE[]"><input
						type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKYIELD" id = "RGDSBKYIELD" <?php echo $vRGDSsel['BKYIELD'];?>> BKYIELD
						(Broadbalk wheat yields 1844-1925)</label>
				</div>

				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKYIELD_F"  id = "RGDSBKYIELD_F" <?php echo $vRGDSsel['BKYIELD_F'];?>> <label
						class="form-check-label" for="RGLTE[]">BKYIELD_F (Broadbalk wheat
						yields 1926-1953)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKYIELD_F85"  id = "RGDSBKYIELD_F85" <?php echo $vRGDSsel['BKYIELD_F85'];?>> <label
						class="form-check-label" for="RGLTE[]">BKYIELD_F85 (Broadbalk
						wheat yields 1954-1967)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKYIELD_R85"  id = "RGDSBKYIELD_R85" <?php echo $vRGDSsel['BKYIELD_R85'];?>> <label
						class="form-check-label" for="RGLTE[]">BKYIELD_R85 (Broadbalk
						wheat yields 1968-2017)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKBEANS"  id = "RGDSBKBEANS" <?php echo $vRGDSsel['BKBEANS'];?>> <label
						class="form-check-label" for="RGLTE[]">BKBEANS (Broadbalk beans
						yields 1968-1978)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKFMAIZE" id = "RGDSBKFMAIZE"  <?php echo $vRGDSsel['BKFMAIZE'];?>> <label
						class="form-check-label" for="RGLTE[]">BKFMAIZE (Broadbalk maize
						yields 1997-2017)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKOATS" id = "RGDSBKOATS"  <?php echo $vRGDSsel['BKOATS'];?>> <label
						class="form-check-label" for="RGLTE[]">BKOATS (Broadbalk oats
						yields 1996-2017)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKPOTATO" id = "RGDSBKPOTATO"  <?php echo $vRGDSsel['BKPOTATO'];?>> <label
						class="form-check-label" for="RGLTE[]">BKPOTATO (Broadbalk potato
						yields 1968-1996)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKWHNUTRI" id = "RGDSBKWHNUTRI"  <?php echo $vRGDSsel['BKWHNUTRI'];?>> <label
						class="form-check-label" for="RGLTE[]">BKWHNUTRI (Broadbalk wheat
						crop nutrient data 1968-2013)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKOATNUTRI" id = "RGDSBKOATNUTRI"  <?php echo $vRGDSsel['BKOATNUTRI'];?>> <label
						class="form-check-label" for="RGLTE[]">BKOATNUTRI (Broadbalk oat
						crop nutrient data 1996-2013)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKBEANNUTRI" id = "RGDSBKBEANNUTRI"  <?php echo $vRGDSsel['BKBEANNUTRI'];?>> <label
						class="form-check-label" for="RGLTE[]">BKBEANNUTRI (Broadbalk
						beans crop nutrient data 1968-1978)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKMAIZNUTRI" id = "RGDSBKMAIZNUTRI"  <?php echo $vRGDSsel['BKMAIZNUTRI'];?>> <label
						class="form-check-label" for="RGLTE[]">BKMAIZNUTRI (Broadbalk
						maize crop nutrient data 1997-2013)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKPOTSNUTRI" id = "RGDSBKPOTSNUTRI"  <?php echo $vRGDSsel['BKPOTSNUTRI'];?>> <label
						class="form-check-label" for="RGLTE[]">BKPOTSNUTRI (Broadbalk
						potato crop nutrient data 1968-96)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKWEEDS_FAL" id = "RGDSBKWEEDS_FAL"  <?php echo $vRGDSsel['BKWEEDS_FAL'];?>> <label
						class="form-check-label" for="RGLTE[]">BKWEEDS_FAL (Broadbalk weed
						surveys 1933-1967)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKWEEDS_ROT" id = "RGDSBKWEEDS_ROT"  <?php echo $vRGDSsel['BKWEEDS_ROT'];?>> <label
						class="form-check-label" for="RGLTE[]">BKWEEDS_ROT (Broadbalk weed
						surveys 1968-1979)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKWEEDS_SUM" id = "RGDSBKWEEDS_SUM"  <?php echo $vRGDSsel['BKWEEDS_SUM'];?>> <label
						class="form-check-label" for="RGLTE[]"> BKWEEDS_SUM (Broadbalk
						weed surveys summary 1991-2014)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKWEEDS_PLOT" id = "RGDSBKWEEDS_PLOT"  <?php echo $vRGDSsel['BKWEEDS_PLOT'];?>> <label
						class="form-check-label" for="RGLTE[]">BKWEEDS_PLOT (Broadbalk
						weed surveys by plot 1991-2014)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKDISEASE" id = "RGDSBKDISEASE"  <?php echo $vRGDSsel['BKDISEASE'];?>> <label
						class="form-check-label" for="RGLTE[]">BKDISEASE (Broadbalk
						disease data 1968-2009)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="BKGR_QUALITY" id = "RGDSBKGR_QUALITY"  <?php echo $vRGDSsel['BKGR_QUALITY'];?>> <label
						class="form-check-label" for="RGLTE[]">BKGR_QUALITY (Broadbalk
						Grain Quality for 1974-2016)</label>
				</div>
			</div>
			<div class="form-check">
				<label class="form-check-label"  id="RGLBLrpg5" ><input type="checkbox"
					class="form-check-input" id="RGEXPTrpg5" name="RGLTE[]"
					value="ParkGrass" <?php echo $vRGLTEsel['ParkGrass'];?>> Park Grass
				</label>
			</div>
			<div class="datasetsList" id="dsrpg5">

				<div class="form-check  ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="PARKYIELD" id = "RGDSPARKYIELD"  <?php echo $vRGDSsel['PARKYIELD'];?>> <label
						class="form-check-label" for="RGLTE[]">PARKYIELD (Park Grass
						yields 1856-1959)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="PGHAYEQUIV" id = "RGDSPGHAYEQUIV" <?php echo $vRGDSsel['PGHAYEQUIV'];?>> <label
						class="form-check-label" for="RGLTE[]">PGHAYEQUIV (Park Grass
						yields 1960-2017)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="PARKCOMP"  id = "RGDSPARKCOMP" <?php echo $vRGDSsel['PARKCOMP'];?>> <label
						class="form-check-label" for="RGLTE[]">PARKCOMP (Park Grass
						botanical surveys-complete separations of hay samples, selected
						years 1862-1976)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="PARKPARTCOMP" id = "RGDSPARKPARTCOMP"  <?php echo $vRGDSsel['PARKPARTCOMP'];?>> <label
						class="form-check-label" for="RGLTE[]">PARKPARTCOMP (Park Grass
						botanical surveys-partial separations of hay samples, selected
						years 1862-1976)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="PARKCOMPIC" id = "RGDSPARKCOMPIC"  <?php echo $vRGDSsel['PARKCOMPIC'];?>> <label
						class="form-check-label" for="RGLTE[]">PARKCOMPIC (Park Grass
						botanical surveys carried out by Imperial College 1991-2000)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="PARKINSECTS" id = "RGDSPARKINSECTS"  <?php echo $vRGDSsel['PARKINSECTS'];?>> <label
						class="form-check-label" for="RGLTE[]">PARKINSECTS (Park Grass
						insect surveys 1977-1978)</label>
				</div>

			</div>

			<div class="form-check">
				<label class="form-check-label"><input type="checkbox"
					class="form-check-input" id="RGEXPTrhb2" name="RGLTE[]"
					value="Hoosfield" <?php echo $vRGLTEsel['Hoosfield'];?>> Hoosfield
					Spring Barley Experiment </label>
			</div>
			<div class="datasetsList" id="dsrhb2">

				<div class="form-check ml-5">
					<label class="form-check-label" for="RGLTE[]"><input
						type="checkbox" class="form-check-input" name="RGLTE[]"
						value="HOOSYIELD"  id = "RGDSHOOSYIELD" <?php echo $vRGDSsel['HOOSYIELD'];?>> HOOSYIELD
						(Hoosfield barley yields 1852-1952 (fallow 1953))</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="HOOSYIELD1"  id = "RGDSHOOSYIELD1" <?php echo $vRGDSsel['HOOSYIELD1'];?>> <label
						class="form-check-label" for="RGLTE[]">HOOSYIELD1 (Hoosfield
						barley yields 1954-1957)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="HOOSYIELD2" id = "RGDSHOOSYIELD2"  <?php echo $vRGDSsel['HOOSYIELD2'];?>> <label
						class="form-check-label" for="RGLTE[]">HOOSYIELD2 (Hoosfield
						barley yields 1958-1966 (fallow 1967))</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="HOOSYIELD3"  id = "RGDSHOOSYIELD3" <?php echo $vRGDSsel['HOOSYIELD3'];?>> <label
						class="form-check-label" for="RGLTE[]">HOOSYIELD3 (Hoosfield
						barley yields 1968-1993)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="HOOSYIELD4"  id = "RGDSHOOSYIELD4" <?php echo $vRGDSsel['HOOSYIELD4'];?>> <label
						class="form-check-label" for="RGLTE[]">HOOSYIELD4 (Hoosfield
						barley yields 1994-2002)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="HOOSYIELD5" id = "RGDSHOOSYIELD5"  <?php echo $vRGDSsel['HOOSYIELD5'];?>> <label
						class="form-check-label" for="RGLTE[]">HOOSYIELD5 (Hoosfield
						barley yields 2003-2016)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="HFBNUTRI"  id = "RGDSHFBNUTRI" <?php echo $vRGDSsel['HFBNUTRI'];?>> <label
						class="form-check-label" for="RGLTE[]">HFBNUTRI (Hoosfield barley
						crop nutrient data, 1964 and 1966)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="HFNUTRIMAIN" id = "RGDSHFNUTRIMAIN" <?php echo $vRGDSsel['HFNUTRIMAIN'];?>> <label
						class="form-check-label" for="RGLTE[]">HFNUTRIMAIN (Hoosfield
						barley crop nutrient data MAIN PLOTS, 1970 - 2010)</label>
				</div>

			</div>
			<div class="form-check">
				<label class="form-check-label"><input type="checkbox"
					class="form-check-input" id="RGEXPTrfw3" name="RGLTE[]"
					value="AlternateWF" <?php echo $vRGLTEsel['AlternateWF'];?>>
					Alternate Wheat and Fallow </label>
			</div>
			<div class="datasetsList" id="dsrfw3">

				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="WHEATFAL"  id = "RGDSWHEATFAL" <?php echo $vRGDSsel['WHEATFAL'];?>> <label
						class="form-check-label" for="RGLTE[]">WHEATFAL (Yields from the
						alternate wheat/fallow experiment 1856-1956)</label>
				</div>
				<div class="form-check ml-5">
					<input type="checkbox" class="form-check-input" name="RGLTE[]"
						value="FALWHEAT"  id = "RGDSFALWHEAT" <?php echo $vRGDSsel['FALWHEAT'];?>> <label
						class="form-check-label" for="RGLTE[]">FALWHEAT (Yields from the
						alternate wheat/fallow experiment 1957-2015)</label>
				</div>

			</div>

			<div class="form-check">
				<label class="form-check-label"><input type="checkbox"
					class="form-check-input" id="RGEXPTrms" name="RGLTE[]"
					value="rothmet" <?php echo $vRGLTEsel['rothmet'];?>>ROTHMET
					(Rothamsted Met Station) </label>
			</div>
			<div class="form-check">
				<label class="form-check-label"><input type="checkbox"
					class="form-check-input" id="RGEXPTbms" name="RGLTE[]"
					value="bromet" <?php echo $vRGLTEsel['bromet'];?>>BROMET (Brooms
					Barn Met Station) </label>
			</div>
			<div class="form-check">
				<label class="form-check-label"><input type="checkbox"
					class="form-check-input" id="RGEXPTwms" name="RGLTE[]"
					value="wobmet" <?php echo $vRGLTEsel['wobmet'];?>>WOBMET (Woburn
					Met Station) </label>
			</div>
			<small id="infoHelp" class="form-text text-muted">Check all the
				relevant Experiments and datasets</small>

			<div class="form-group my-3">
				<label for="RGur_Q2"><h5>Additional details (plots, years,
						variables)</h5></label>
				<textarea class="form-control" id="RGur_Q2" name="RGur_Q2" rows="3"><?php

        echo $vRGur_Q2;
        ?></textarea>
				<small id="infoHelp" class="form-text text-muted"></small>

			</div>

			<!--  entered in Q1 - passed  -->
			<input type="hidden" name="RGposition"
				value="<?php echo $vRGposition;?>" /> <input type="hidden"
				name="RGcountry" value="<?php echo $vRGcountry; ?>" /> <input
				type="hidden" name="RGfname" value="<?php echo $vRGfname;?>" /> <input
				type="hidden" name="RGlname" value="<?php echo $vRGlname;?>" /> <input
				type="hidden" name="RGisStudent"
				value="<?php echo $vRGisStudent; ?>" /> <input type="hidden"
				name="RGisRoth" value="<?php echo $vRGisRoth;?>" /> <input
				type="hidden" name="RGsector" value="<?php echo $vRGsector;?>" /> <input
				type="hidden" name="RGagreeCOU" value="<?php echo $vRGagreeCOU;?>" />
			<input type="hidden" name="RGallowEmails"
				value="<?php echo $vRGallowEmails;?>" />


			<!--  entered in Q2 - passed  -->
			<input type="hidden" name="RGinstitution"
				value="<?php echo $vRGinstitution; ?>" /> <input type="hidden"
				name="RGfunding" value="<?php echo $vRGfunding; ?>" /> <input
				type="hidden" name="RGfundingOther"
				value="<?php echo $vRGfundingOther; ?>" /><input type="hidden"
				name="RGISPG" value="<?php echo $vRGISPG; ?>" /> <input
				type="hidden" name="RGsupName" value="<?php echo $vRGsupName; ?>" />
			<input type="hidden" name="RGsupEmail"
				value="<?php echo $vRGsupEmail; ?>" /> <input type="hidden"
				name="RGrothColls" value="<?php echo $vRGrothColls; ?>" /> <input
				type="hidden" name="RGfrom" value="Q3" />
			<button type="submit" class="btn mt-5 mr-1 btn-primary"
				name="process" value="Prev">Previous</button>
			<button type="submit" class="btn mt-5 mr-1 btn-warning"
				name="process" value="Reset">Reset</button>
			<button type="submit" class="btn mt-5 mr-1 btn-primary"
				name="process" value="RGprocess">Finish</button>
	
	</form>	
	
<?php
    }
    ?>


	</div>
<?php
}
?>


<script>
        // Self-executing function Form validation
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

     // Bind function to onclick event for checkbox
        document.getElementById('FDbbsrc').onclick = function() {
            // access properties using this keyword
            if ( this.checked ) {
                // Returns true if checked
                
                document.getElementById("RGfundinglist").style.display = "block";
                document.getElementById("RGfundingOther").style.display = "none";
            } else {
                // Returns false if not checked
            	document.getElementById("RGfundinglist").style.display = "none";
            	
            }
        };
        
        document.getElementById('FDother1').onclick = function() {
            // access properties using this keyword
            if ( this.checked ) {
                // Returns true if checked
                document.getElementById("RGfundinglist").style.display = "none";
                document.getElementById("RGfundingOther").style.display = "none";
                
            } else {
                // Returns false if not checked
            	
            }
        };
        
 
        document.getElementById('FDother2').onclick = function() {
            // access properties using this keyword
            if ( this.checked ) {
                // Returns true if checked
                document.getElementById("RGfundinglist").style.display = "none";
                document.getElementById("RGfundingOther").style.display = "block";
                
            } else {
                // Returns false if not checked
            	
                document.getElementById("RGfundingOther").style.display = "none";
            }
        };

        </script>