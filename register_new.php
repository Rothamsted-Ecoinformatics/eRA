<?php
/**
 * @file zdevBlank.php
 * 
 * @brief Template for a page.
 *
 * @author Nathalie Castells-Brooke.
 * 
 * @version 1.00
 * 
 * Template page for the site. Start here, fill in what you need, add modules (prefixed _)
 * 
 * 
 * @version 0.1
 * 
 * @version 0.2 added space for the page dependant scripts. at the bottom. 
 */

// /This will be used to pass the experiment code, or type of page.
if (isset($_POST['farm'])) {
    $farm = $_POST['farm'];
}
if (isset($_GET['farm'])) {
    $farm = $_GET['farm'];
}

if (! $farm) {
    $farm = 'default';
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
$pageinfo = getPageInfo($farm);
$KeyRef = $pageinfo['KeyRef'];

$metadata = "images/metadata/" . $farm;

// $experimentName = '' // fill that in and uncomment if there is no experimentName
// /This is used in the head file as the title tag
$page_title .= $pageinfo[ExperimentName];

// /$arrdatacite is found in $exptDescriptionFile - describes the submission to Datacite - necessary for DOI pages
$datacite = json_encode($arrdatacite);

if ($datacite) {
    $script = "<script type=\"application/ld+json\">" . $datacite . "</script>";
}
include 'includes/head.html'; // that is the <head tags>
?>

<body>
	<div class="container bg-white px-0">

<?php

include 'includes/header.html'; // all the menus at the top
                                
// -- start dependant content ---------------------------------------------------------
?>
<div id="renameIDToSomethingRelevant"></div>
					
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

