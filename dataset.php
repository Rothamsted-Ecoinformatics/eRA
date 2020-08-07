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
$page_title .= ' dataset: ' . $dataset;
$datasetParts = explode("-", $dataset);
$pageinfo = getPageInfo($expt);
$KeyRef = $pageinfo['KeyRef'];
$exptFolder = 'metadata/' . $expt;

$fileDataset = $exptFolder . '/' . $datasetParts[0] .'/' . $dataset .'.json';

$hasDataset = file_exists($fileDataset);
if ($hasDataset) {
    $jdataset = file_get_contents($fileDataset);
    $jdataset8 = utf8_encode($jdataset);
    $dsinfo = json_decode($jdataset8, true);
}
$page_description = $dsinfo['description'][0]['description'];
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>  
        <?php
        include 'includes/meta.html'; // that is the <meta and link tags> superseeds head.html
 // that is the <head tags>
 
        $script = ''; // $script is added to the header as the
        if (isset($jdataset8)) {
            $script = "<script type=\"application/ld+json\">" . $jdataset8 . "</script>";
            echo $script;
        }
        ?>
    </head>

    <body>    
    	<div class="container bg-white px-0">
    
    <?php include 'includes/header.html';   // all the menus at the top 
    
    //--  start dependent content ---------------------------------------------------------
    
    include '_dataset.php';
    	
    //-- start footers  -----------------------------
    
    include_once 'includes/footer.html';
    include_once 'includes/finish.inc';
    
    ?>
     
    	</div>
    </body>
    
</html>
    
