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
    // this is the final stage: database input, send emails and the like

    ?>
<h2 class="mx-3">
	Thank you!
	</h1>



	<!--  -->
	<p>
		An email has been sent to <span class="badge badge-success"> <?php echo $vRGEmail; ?></span>.
		Please click on the link in the email to finish the process. Our
		curators will get in touch soon.
	</p>

<?php
} else {
    // Q1, Q2, Q3 are the three pannels. The form is reloaded in these stages.

    ?>

	<div class="m-3">
		<form action="newGold.php" method="post" class="needs-validation"
			novalidate>
			
<?php

    if ($vprocess == "Q1") {
        ?>
		<div class="progress border bg-white" style="height: 40px;"></div>
			<h2 class="mt-3">About You</h2>

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
        if ($GLOBALS['vRGShowisRoth'] == 0) {} else {
            ?>
			<div class="form-group my-3">
				<label for="RGisRoth"><h5>Are you a Rothamsted Staff?</h5></label>

				<div class="form-check">
					<label class="form-check-label"> <input type="radio"
						class="form-check-input" name="RGisRoth" value="1"
						<?php echo $vRGisRothCheckedYes; ?>>Yes
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label"> <input type="radio"
						class="form-check-input" name="RGisRoth" value="0"
						<?php echo $vRGisRothCheckedNo; ?>>No
					</label>
				</div>
			</div>
		<?php
        }
        if ($vRGisRoth != 1) {
            ?>
		<div class="form-group my-3">
				<label for="RGsector"><h5>What is your sector of activity</h5></label>

				<div class="form-check">
					<label class="form-check-label"> <input type="radio"
						class="form-check-input" name="RGsector" Value="AC"
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
		<input type="hidden" name="RGisRoth" value="<?php echo $vRGisRoth;?>" />
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
					target="_blank" href="info.php?FileName=conditions"><b>Conditions
							of Use</b></a> of eRAdata including their policy on personal data
					and I agree with them.
				</label>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="RGallowEmails"
					name="RGallowEmails" <?php echo $vRGallowEmailsChecked; ?>> <label
					class="form-check-label" for="RGallowEmails">I agree to receiving
					occasional communication from the eRA team</label>
			</div>
			<input type="hidden" name="RGinstitution"
				value="<?php echo $vRGinstitution; ?>" /> <input type="hidden"
				name="RGcountry" value="<?php echo $vRGcountry; ?>" /> <input
				type="hidden" name="RGfunding" value="<?php echo $vRGfunding; ?>" />
			<input type="hidden" name="RGISPG" value="<?php echo $vRGISPG; ?>" />
			<input type="hidden" name="RGsupName"
				value="<?php echo $vRGsupName; ?>" /> <input type="hidden"
				name="RGsupEmail" value="<?php echo $vRGsupEmail; ?>" /> <input
				type="hidden" name="RGrothColls"
				value="<?php echo $vRGrothColls; ?>" /> <input type="hidden"
				name="RGfrom" value="Q1" />
			<button type="submit" class="btn mt-5 mr-1 btn-warning"
				name="process" value="Reset">Reset</button>
			<button type="submit" class="btn mt-5 mr-1 btn-primary"
				name="process" value="Next">Next</button>
				
			

	


<?php
    } else if ($vprocess == "Q2") {

        ?>
        <h2>Your affiliation</h2>
			<div class="progress" style="height: 40px;">
				<div class="progress-bar progress-bar-striped bg-success  text-dark"
					role="progressbar" style="width: 33%" aria-valuenow="25"
					aria-valuemin="0" aria-valuemax="100">About you</div>

			</div>	
	<?php

        if ($RGisRoth == 1) {
            ?>
            <div class="form-group my-3">
				<label for="RGrothColls"><h5>Funding Source</h5></label>
				<div class="form-check">
					<label class="form-check-label"> <input type="radio"
						class="form-check-input" name="RGsector" id="FDbbsrc"
						value="BBSRC" <?php echo $vRGfundingBBSRC; ?>>BBSRC
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label"> <input type="radio"
						class="form-check-input" name="RGsector" id="FDother1" value="CO"
						<?php echo $vRGfundingNERC; ?>>NERC
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label"> <input type="radio"
						class="form-check-input" name="RGsector" id="FDother2" value="CO"
						<?php echo $vRGfundingOTHER; ?>>OTHER
					</label>
				</div>
				<div id="RGfundingOther" style="display: none" class="mt-3">
					<label for=RGfunding><h6>Name of funding source</h6></label> <input
						type="text" class="form-control" name="RGfunding"
						placeholder="Other" value="<?php echo $vRGfunding?>"><small
						id="instHelp" class="form-text text-muted">Please provide the name
						of your funding source </small>
				</div>
				<div id="RGfundinglist" style="display: none">
					<div class="form-group my-3">
						<label for="RGISPG"><h5>ISPG or Project</h5></label> <select
							class="form-control" id="RGISPG" name="RGISPG">
							<option value="NA" disabled selected>Please select one</option>
							<option value="ASSIST">ASSIST</option>
							<option value="DFW">DFW</option>
							<option value="TPM">TPM</option>
							<option value="S2N">S2N</option>
							<option value="SCP">SCP</option>
							<option value="NC-LTE">NC - LTE</option>
							<option value="NC-OTHER">NC - OTHER</option>
							<option value="OTHER">OTHER</option>
						</select><small id="instHelp" class="form-text text-muted"> Please
							enter the ISPG or National Capability</small>
					</div>
				</div>
			
        <?php
        } else {
            if ($RGsector == "AC") {
                // This is an academic institution, not Rothamsted. We want institution and collaborator at Roth, funding-->

                ?> 
			<div class="form-group my-3">
					<label for="RGinstitution"><h5>Research Institute or University</h5></label>
					<input type="text" class="form-control" id="RGinstitution"
						name="RGinstitution"
						placeholder="Research Institute or University"
						value="<?php echo $vRGinstitution?>" required> <small
						id="instHelp" class="form-text text-muted">Please provide the name
						of your institution </small>
				</div>
		
		<?php

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
                ?>
		<div class="form-group my-3">
					<label for="RGrothColls"><h5>Funding Source</h5></label>
					<div class="form-check">
						<label class="form-check-label"> <input type="radio"
							class="form-check-input" name="RGsector" value="BBSRC"
							id="FDbbsrc" <?php echo $vRGfundingBBSRC; ?>>BBSRC
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label"> <input type="radio"
							class="form-check-input" name="RGsector" value="CO"
							<?php echo $vRGfundingNERC; ?>>NERC
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label"> <input type="radio"
							class="form-check-input" name="RGsector" value="CO"
							<?php echo $vRGfundingOTHER; ?>>OTHER
						</label>
					</div>
					<div id="RGfdOtherName" style="display: none">
						<input type="text" class="form-control" id="RGfunding"
							name="RGfunding" placeholder="Other"
							value="<?php echo $vRGRfunding?>"><small id="instHelp"
							class="form-text text-muted">Please provide the name of your
							funding source </small>
					</div>
				</div>
	    <?php
            }
            if ($RGsector == "CO") {
                ?>
	    <!-- This is an academic institution, not Rothamsted. We want institution and collaborator at Roth, funding-->

				<div class="form-group my-3">
					<label for="RGinstitution"><h5>Company Name</h5></label> <input
						type="text" class="form-control" id="RGinstitution"
						name="RGinstitution" placeholder="Company Name"
						value="<?php echo $vRGinstitution?>"> <small id="instHelp"
						class="form-text text-muted">Please provide the name of your
						company </small>
				</div>
		
		
		<?php
                if ($RGisStudent == 0) {
                    ?>
    		<div class="form-group my-3">
					<label for="RGrothColls"><h5>Collaborators at Rothamsted</h5></label>
					<input type="text" class="form-control" id="RGrothColls"
						name="RGrothColls" placeholder="Research Institute or University"
						value="<?php echo $vRGrothColls?>"> <small id="instHelp"
						class="form-text text-muted">Please separate names with a comma</small>
				</div>
		
	    <?php
                }
            }
            if ($RGsector == "SC") {
                ?> 
	    <!-- This is an academic institution, not Rothamsted. We want institution and collaborator at Roth, funding-->

				<div class="form-group my-3">
					<label for="RGinstitution"><h5>Educational Establishment</h5></label>
					<input type="text" class="form-control" id="RGinstitution"
						name="RGinstitution" placeholder="School "
						value="<?php echo $vRGinstitution?>"> <small id="instHelp"
						class="form-text text-muted">Please provide the name of school and
						indicate if it is primary, secondary or higher </small>
				</div>
		
		<?php
            }
        }

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
					<label for="RGsupEmail"><h5>Your Supervisor email address</h5></label>
					<input type="text" class="form-control" id="RGsupEmail"
						name="RGsupEmail" placeholder="name@institute.ac.uk"
						value="<?php echo $vRGsupEmail?>" required> <small id="instHelp"
						class="form-text text-muted">Please provide the email address of
						your supervisor </small>
				</div>
		
		
	    <?php
        }

        ?>
   <!--  for all  -->


				<input type="hidden" name="RGposition"
					value="<?php echo $vRGposition;?>" /> <input type="hidden"
					name="RGfname" value="<?php echo $vRGfname;?>" /> <input
					type="hidden" name="RGlname" value="<?php echo $vRGlname;?>" /> <input
					type="hidden" name="RGisStudent"
					value="<?php echo $vRGisStudent; ?>" /> <input type="hidden"
					name="RGisRoth" value="<?php echo $vRGisRoth;?>" /> <input
					type="hidden" name="RGsector" value="<?php echo $vRGsector;?>" /> <input
					type="hidden" name="RGagreeCOU" value="<?php echo $vRGagreeCOU;?>" />
				<input type="hidden" name="RGallowEmails"
					value="<?php echo $vRGallowEmails;?>" /> <input type="hidden"
					name="RGfrom" value="Q2" />
				<button type="submit" class="btn mt-5 mr-1 btn-primary"
					name="process" value="Prev">Previous</button>
				<button type="submit" class="btn mt-5 mr-1 btn-warning"
					name="process" value="Reset">Reset</button>
				<button type="submit" class="btn mt-5 mr-1 btn-primary"
					name="process" value="Next">Next</button>
		
	

<?php
    } else if ($vprocess == "Q3") {

        if ($vRGsector == "PB") {
            ?>
            
            <div class="progress" style="height: 40px;">
					<div
						class="progress-bar progress-bar-striped bg-success  text-dark"
						role="progressbar" style="width: 50%" aria-valuenow="25"
						aria-valuemin="0" aria-valuemax="100">About you</div>




				</div>
            <?php
        } else {
            ?>
	
		<div class="progress" style="height: 40px;">
					<div
						class="progress-bar progress-bar-striped bg-success  text-dark"
						role="progressbar" style="width: 33%" aria-valuenow="25"
						aria-valuemin="0" aria-valuemax="100">About you</div>

					<div
						class="progress-bar progress-bar-striped bg-success  text-dark"
						role="progressbar" style="width: 33%" aria-valuenow="25"
						aria-valuemin="0" aria-valuemax="100">Your affilitation</div>



				</div>
		<?php
        }
        ?>
         <h2 class="mt-3">About the data access</h2>
				<p>We do not give access to all the datasets at once. ....</p>
        <?php
        if ($RGsector == "AC" or $RGsector == "CO") {
            ?>
           
			<div class="form-group my-3">
					<label for="RGur_Q1"><h5>Scientific case for using the data</h5></label>
					<textarea class="form-control" id="RGur_Q1" name="RGur_Q1" rows="3"
						required><?php echo $vRGur_Q1;?></textarea>
					<small id="infoHelp" class="form-text text-muted">Please describe
						how you will use the data.</small>
				</div>
			<?php
        } else {
            ?>
			<div class="form-group my-3">
					<label for="RGur_Q1"><h5>How will you use the data?</h5></label>
					<textarea class="form-control" id="RGur_Q1" name="RGur_Q1" rows="3"
						required><?php echo $vRGur_Q1;?></textarea>
					<small id="infoHelp" class="form-text text-muted">Please describe
						how you will use the data.</small>
				</div>
			<?php
        }
        ?> 
			<div class="form-group my-3">
					<label for="RGLTE"><h5>Experiments and/or Met station data required</h5>
					</label>
					<div class="row">
						<div class="col-6">
							<div class="form-check">
								<label class="form-check-label"><input type="checkbox"
									class="form-check-input" id="RGEXPTrbk1" name="RGLTE"
									value="rbk1"> Broadbalk </label>
							</div>
							<div class="form-check">
								<label class="form-check-label"><input type="checkbox"
									class="form-check-input" id="RGEXPTrpg5" name="RGLTE"
									value="rpg5"> Park Grass </label>
							</div>

							<div class="form-check">
								<label class="form-check-label"><input type="checkbox"
									class="form-check-input" id="RGEXPTrhb4" name="RGLTE"
									value="rhb4"> Hoosfield Spring Barley Experiment </label>
							</div>
							<div class="form-check">
								<label class="form-check-label"><input type="checkbox"
									class="form-check-input" id="RGEXPTrfw3" name="RGLTE"
									value="rwf3"> Alternate Wheat and Fallow </label>
							</div>
						</div>
						<div class="col-6">
							<div class="form-check">
								<label class="form-check-label"><input type="checkbox"
									class="form-check-input" id="RGEXPTrms" name="RGLTE"
									value="rothmet"> Rothamsted Met Station </label>
							</div>
							<div class="form-check">
								<label class="form-check-label"><input type="checkbox"
									class="form-check-input" id="RGEXPTbms" name="RGLTE"
									value="bromet"> Brooms Barn Met Station </label>
							</div>
							<div class="form-check">
								<label class="form-check-label"><input type="checkbox"
									class="form-check-input" id="RGEXPTwms" name="RGLTE"
									value="wobmet"> Woburn Met Station </label>
							</div>
						</div>
					</div>
					<small id="infoHelp" class="form-text text-muted">Check all the
						relevant Experiments</small>

					<div class="row">
						<div id="dsrbk1" style="display: none;">
							<div class="col-3">
								<p>Display datasets for rbk1</p>
							</div>
						</div>
						<div id="dsrpg5" style="display: none;">
							<div class="col-3">
								<p>Display datasets for rpg5</p>
							</div>
						</div>
						<div id="dsrhb2" style="display: none;">
							<div class="col-3">
								<p>Display datasets for rhb2</p>
							</div>
						</div>
						<div id="dsrfw3" style="display: none;">
							<div class="col-3">
								<p>Display datasets for rfw2</p>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group my-3">
					<label for="RGur_Q2"><h5>Additional details (plots, years,
							variables)</h5></label>
					<textarea class="form-control" id="RGur_Q2" name="RGur_Q2" rows="3"><?php

        echo $vRGur_Q2;
        ?></textarea>
					<small id="infoHelp" class="form-text text-muted"></small>

				</div>
				<input type="hidden" name="RGEposition"
					value="<?php echo $vRGposition;?>" /> <input type="hidden"
					name="RGfname" value="<?php echo $vRGfname;?>" /> <input
					type="hidden" name="RGisRoth" value="<?php echo $vRGisRoth;?>"> <input
					type="hidden" name="RGsector" value="<?php echo $vRGsector;?>" /> <input
					type="hidden" name="RGlname" value="<?php echo $vRGlname;?>" /> <input
					type="hidden" name="RGstudent" value="<?php echo $vRGstudent; ?>">
				<input type="hidden" name="RGconsentEmail"
					value="<?php echo $vRGconsentEmail;?>" /> <input type="hidden"
					name="RGagreeCOU" value="<?php echo $vRGagreeCOU;?>" /> <input
					type="hidden" name="" value="" /> <input type="hidden" name=""
					value=""> <input type="hidden" name="" value="" /> <input
					type="hidden" name="" value="" /> <input type="hidden" name=""
					value="" /> <input type="hidden" name="" value="" /> <input
					type="hidden" name="RGfrom" value="Q3" />
				<button type="submit" class="btn mt-5 mr-1 btn-primary"
					name="process" value="Prev">Previous</button>
				<button type="submit" class="btn mt-5 mr-1 btn-warning"
					name="process" value="Reset">Reset</button>
				<button type="submit" class="btn mt-5 mr-1 btn-primary"
					name="process" value="RGprocess">Finish</button>		
	
<?php
    }
    ?>



		
		
		
		
		
		
		
		</form>

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
        document.getElementById('RGEXPTrbk1').onclick = function() {
            // access properties using this keyword
            if ( this.checked ) {
                // Returns true if checked
            	alert ("rbk1 checked"); 
                
            } else {
                // Returns false if not checked
            	
                
            }
        };
        
        document.getElementById('RGEXPTrpg5').onclick = function() {
            // access properties using this keyword
            if ( this.checked ) {
                // Returns true if checked
                alert ("rpg5 checked");               
            } else {
                // Returns false if not checked
            	
                
            }
        };
        document.getElementById('RGEXPTrhb2').onclick = function() {
            // access properties using this keyword
            if ( this.checked ) {
                // Returns true if checked
                alert ("rhb2 checked");
                
               
                
            } else {
                // Returns false if not checked
            	
                
            }
        };
        
    </script>