<?php
/**
 * @file _register.php
 * @brief email form
 *
 * @author Nathalie Castells-Brooke
 * @date 6/4/2019
 */
?>

<div class="container">

	<div class="row">

		<div class="col-xl-8 offset-xl-2 py-5">

			<h1>
				Contact Form 
			</h1>

			<p class="lead">You can use this for to contact the eRA team.</p>

			<form id="contact-form" method="post" action="mailtool.php"
				role="form">

				<div class="messages"></div>

				<div class="controls">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="form_name">Firstname *</label> <input id="form_name"
									type="text" name="name" class="form-control"
									placeholder="Please enter your firstname *" required="required"
									data-error="Firstname is required.">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="form_lastname">Lastname *</label> <input
									id="form_lastname" type="text" name="surname"
									class="form-control" placeholder="Please enter your lastname *"
									required="required" data-error="Lastname is required.">
								<div class="help-block with-errors"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="form_email">Email *</label> <input id="form_email"
									type="email" name="email" class="form-control"
									placeholder="Please enter your email *" required="required"
									data-error="Valid email is required.">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="form_need">Please specify your need *</label> <select
									id="form_need" name="need" class="form-control"
									required="required" data-error="Please specify your need.">
									<option value=""></option>
									<option value="Request username">Application for a username</option>
									<option value="Request information">Request information</option>
									<option value="Request copy of an invoice">Password managment</option>
									<option value="Other">Other</option>
								</select>
								<div class="help-block with-errors"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="form_message">Message *</label>
								<textarea id="form_message" name="message" class="form-control"
									placeholder="Message for me *" rows="4" required="required"
									data-error="Please, leave us a message."></textarea>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<input type="submit" class="btn btn-success btn-send"
								value="Send message">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<p class="text-muted">
								<strong>*</strong> These fields are required. Contact form
								template by <a
									href="https://bootstrapious.com/p/how-to-build-a-working-bootstrap-contact-form"
									target="_blank">Bootstrapious</a>.
							</p>
						</div>
					</div>
				</div>

			</form>
			<form></form>

		</div>

	</div>

</div>

