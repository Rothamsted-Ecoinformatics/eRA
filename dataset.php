<?php 
/**
 * @file dataset.php
 * @brief Dataset page
 *
 * This is a page: so it includes modules: here the _dataset.php module
 *
 * @author Nathalie Castells-Brooke
 * @date 9/27/2018
 */

include_once 'includes/init.inc'; // these are the settings that refer to more than one page


$pageinfo = getPageInfo($expt);
$KeyRef = $pageinfo['KeyRef'];
$exptFolder = 'metadata/' . $expt;
$page_title .= ' dataset' . $dataset;

$pageinfo = getPageInfo($expt);
$KeyRef = $pageinfo['KeyRef'];
$exptFolder = 'metadata/' . $expt;

$fileDataset = $exptFolder . '/' . $dataset .'/' . $dataset .'.json';

$hasDataset = file_exists($fileDataset);
if ($hasDataset) {
    $jdataset = file_get_contents($fileDataset);
    $jdataset8 = utf8_encode($jdataset);
    $dsinfo = json_decode($jdataset8, true);
}


include 'includes/head.html';     // that is the <head tags>
?>
<body>    
	<div class="container bg-white px-0">

<?php include 'includes/header.html';   // all the menus at the top 

//--  start dependent content ---------------------------------------------------------

include '_datasetNoAccordions.php';
	
//-- start footers  -----------------------------

include_once 'includes/footer.html';
include_once 'includes/finish.inc';

?>
 
	</div>
</body>

</html>

