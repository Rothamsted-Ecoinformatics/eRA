<?php
/**
 * @file updates.php
 * 
 * @brief lists the updates and new datasets.
 *
 * @author Nathalie Castells-Brooke.
 * 
 * @description If there are no experiment in the field expt, then the page lists all the updates. 
 * If there is an experiment in the field, then we list the updates for the experiment. 
 * Updates granularity: experiment. 
 */


if (! $farm) {
    $expt= 'default';
}


include_once 'includes/init.inc'; // these are the settings that refer to more than one page


/**
 * $page info should have the following structure:
 * array(4) {
 * ["ExperimentName"]=> string(9) "Broadbalk"
 * ["ExptCode"]=> string(4) "rbk1"
 * ["KeyRef"]=> string(15) "KeyRefBroadbalk"
 *
 * ["URLCode"]=> string(9) "Broadbalk" }
 * @var array $pageinfo
 */
$pageinfo = getPageInfo($expt);
$KeyRef = $pageinfo['KeyRef'];

$metadata = "images/metadata/" . $expt;

// $experimentName = '' // fill that in and uncomment if there is no experimentName
// /This is used in the head file as the title tag
$page_title .= $pageinfo[ExperimentName];

// /$arrdatacite is found in $exptDescriptionFile - describes the submission to Datacite - necessary for DOI pages


if ($datacite) {
    $script = "<script type=\"application/ld+json\">" . $datacite . "</script>";
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>  
        <?php
        include 'includes/meta.html'; // that is the <meta and link tags> superseeds head.html
        
        $script = ''; // $script is added to the header as the
        if (isset($datacite)) {
            $script = "<script type=\"application/ld+json\">" . $datacite . "</script>";
            echo $script;
        }
        ?>  
    </head>
<body>
	<div class="container bg-white px-0">

<?php

include 'includes/header.html'; // all the menus at the top
                                
// -- start dependant content ---------------------------------------------------------
?>
<div id="renameIDToSomethingRelevant">
<?php 
include '_tweet.php'; 
?>

</div>
					
<?php
// -- start footers -----------------------------

include_once 'includes/footer.html'; // this has the green bar and bottome stu

?>
 
	</div>
<?php

include_once 'includes/finish.inc'; // this has the common js scripts

?>
<!--  include here the page dependant scripts -->
</body>

</html>

