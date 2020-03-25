<?php
/** 
 * @file UnitTest.php
 * @brief A test file.  
 * 
 * @author Nathalie Castells-Brooke
 * 
 * This is a placeholder to try functions or modules without the html header of the page. It includes the settings, functions, but no other HTML
 * 
 * @date 9/27/2018
 */
include_once 'includes/init.inc'; // these are the settings that refer to more than one page

$page_title .= "Unit Test";
$expt = "met";

$KeyRef = "KeyRefBroadbalk";
$dataset = 'Alternate'; // code for experiment
$KeyRef = "KeyRefBroadbalk"; // this value could be in the $data file

include 'includes/head.html'; // that is the <head tags>
?>
<body>
	<div class="container bg-white px-0">

<?php
//------------------ This is where you include modules or functions to test
                              
include '_phpPages.php';

// -- start footers -----------------------------

include_once 'includes/finish.inc';

?>
 
	</div>

</body>

</html>

