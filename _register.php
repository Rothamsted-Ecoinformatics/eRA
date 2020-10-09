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
			<h1 class="mt-5">Login / Logout</h1>
			<?php  echo $strRegister . $strMessage ;?> 
			
			<?php if ($loggedIn == 'yes' && $email != 'delete') {;} else {?>
			 <a  class="btn btn-primary" href="newUser.php">Register</a>
			<?php } ?>
			
			
			<h1 class="mt-5">Request Access to raw datasets</h1>
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

