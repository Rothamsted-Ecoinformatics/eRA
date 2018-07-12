<?php 
include 'includes/settings.inc'; // these are the settings that refer to more than one page
include 'includes/functions.inc'; // these have the php functions that are common to more than one page

$page_title .= "Template";


?>
<?php include 'includes/head.inc';     // that is the <head tags>?>
<body>
    <div class="container bg-white px-0">

<?php include 'includes/header.inc';   // all the menus at the top ?>

	<!--  start dependant content --------------------------------------------------------->
<?php 
include '_carousel.php';
include '_home.php';
include '_people.php';
?>
	
	<!--  end page dependant content  -->
	<!-- Start footer  -->
<?php include('includes/footer.inc');?>
 
	</div>
</body>

</html>

