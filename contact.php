<?php 
/**
 * @file contacts.php
 * @brief contact and credit page
 * 
 * This is a page: so it includes modules
 *
 * @author Nathalie Castells-Brooke
 * @date 9/27/2018
 */
include 'includes/init.inc'; // these are the settings that refer to more than one page


$page_title .= " - contacts";


?>
<?php include 'includes/head.html';     // that is the <head tags>?>
<body>
    <div class="container bg-white px-0">

<?php include 'includes/header.html';   // all the menus at the top ?>

	<!--  start dependant content --------------------------------------------------------->
<?php 

include '_people.php';
?>
	
	<!--  end page dependant content  -->
	<!-- Start footer  -->
<?php include('includes/footer.html');?>
 
	</div>
</body>

</html>
