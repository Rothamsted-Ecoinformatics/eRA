<?php
/**
 * @file _register.php
 * @brief email form
 *
 * @author Nathalie Castells-Brooke
 * @date 6/4/2019
 */
?>


<div id="idExpt" class="p-0 mb-0">
	<div class="row">
		<div class="col-12 pt-3">
			<ul class="nav nav-tabs nav-fill text-body ">
				<li class="nav-item"><a class="nav-link active show"
					id="prepared-tab" data-toggle="tab" href="#prepared">Prepared
						Datasets</a></li>
				<li class="nav-item"><a class="nav-link" id="raw-tab"
					data-toggle="tab" href="#raw">Raw Datasets</a></li>

			</ul>

			<div class="tab-content mh-100" id="idRegTabs">

				<div class="tab-pane active show pb-3" id="prepared" role="tabpanel"
					aria-labelledby="prepared-tab">

					
			<h1>Prepared Datasets</h1>		
			<div class="card  m-5 p-5"><div class="card-body">
			<h2>Login / Logout</h2>
			<?php  echo $strRegister . $strMessage ?> 			
                							</div>
                						</div>	
                							
                	
				<div class="small mt-5">
						<p>This simple login and registration form gives you access to
							prepared datasets. These datasets represent what data is
							condidered most useful to most or preleminary research. By
							registering you can chose to be kept up to date with the
							curation.</p>
						<p>The login uses cookies. We use them to persit a login state. We
							do not pass on information to any third party.</p>
						<p>The sites records the datasets and experiments you view in a
							transient state fo facilitate your navigation. This enables us to
							provide for you a "history" page. This information is deleted
							when you log out.</p>
						<p>Passwords: logon does not require a password but is
							authenticated by an email confirmation. You do not have to
							remember a password and we do not store your password.</p>
						<p>When you login or register, you receive a confirmation email
							that will complete the process. The site stays logged in until
							you log out or until "a certain amount of time " has lapsed.</p>

						<p>By registering, it makes it easier for us to monitor the
							usefulness of our datasets and to report to our stakeholders.
							Thank you.</p>
					</div>
				</div>


				<div class="tab-pane" id="raw" role="tabpanel"
					aria-labelledby="raw-tab">

					<h1>Raw datasets</h1>
					<p>Please select the appropriate form for your request:</p>
					<ul class="list-group mx-5">
						<li class="list-group-item">Requesting <a target="_blank"
							href="https://forms.office.com/Pages/ResponsePage.aspx?id=JTaItkGJQkOw43uMyDkvZDZRGOUcKblFt0gV54i_OxNUNFg3VEJTQldCWDhQQlFDU0xXUEVNMzhROCQlQCN0PWcu"
							target="forms">Weather Data</a>
						</li>
						<li class="list-group-item">Requesting <a target="_blank"
							href="https://forms.office.com/Pages/ResponsePage.aspx?id=JTaItkGJQkOw43uMyDkvZDZRGOUcKblFt0gV54i_OxNUN1pJR1Q4QVVBT1JZWkZGWldSS0FTUDQxSSQlQCN0PWcu"
							target="forms">Experiment Data</a></li>
						<li class="list-group-item">Requesting <a target="_blank"
							href="https://forms.office.com/Pages/ResponsePage.aspx?id=JTaItkGJQkOw43uMyDkvZDZRGOUcKblFt0gV54i_OxNUOTlNMTBNTTVEQzdWTjBOQURIR01ZSU9GVCQlQCN0PWcu"
							target="forms">Experiment Data</a> - Rothamsted Research Staff
						</li>
					</ul>
				</div>

			</div>

		</div>
	</div>
</div>



