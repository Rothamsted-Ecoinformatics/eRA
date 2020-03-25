<?php
/**
 * @file devPrintR.php
 * @brief I needed to make some json strings
 *
 * @author Nathalie Castells-Brooke
 * @version 1.00
 * 
 * Template page for the site. Start here, fill in what you need, add modules (prefixed _)
 * @date 10/04/2018
 */

// /This will be used to pass the experiment code, or type of page.  
$expt = 'default';

// /This is the folder where metadata images are held
$metadata = "images/metadata/" . $expt;


// /This is where the arrays with the page information is
$pageSettings= 'metadata/' . $expt. '/data-description.php';

include ($pageSettings);

// $experimentName = '' // fill that in and uncomment if there is no experimentName
// /This is used in the head file as the title tag
$page_title .= $experimentName;

// /$arrdatacite is found in $exptDescriptionFile - describes the submission to Datacite - necessary for DOI pages
$datacite = json_encode($arrdatacite);

if ($datacite) {
    $script = "<script type=\"application/ld+json\">" . $datacite . "</script>";
}

include_once 'includes/init.inc'; // these are the settings that refer to more than one page

include 'includes/head.html'; // that is the <head tags>
?>

<body>
	<div class="container bg-white px-0">

<?php

include 'includes/header.html'; // all the menus at the top
                                
// -- start dependant content ---------------------------------------------------------
?>
<div id="id">

<?php 
/**
 * This outputs the json array for the data. Just used to make json files for testing as I already had the arrays
 * @param unknown $array
 */
function makeJson($array) {
$json = json_encode($array);

if ($json) {
    echo $json;
}
}
echo "<h2>arrdatacite</h2>";
makeJson($arrdatacite);

echo "<h2>dataOverview</h2>";
makeJson($dataOverview);

echo "<h2>exptDesign</h2>";
makeJson($exptDesign);

echo "<h2>site</h2>";
makeJson($site);

echo "<h2>datasets</h2>";
makeJson($datasets);

echo "<h2>experiments</h2>";
makeJson($experiments);

echo "<h2>Documents</h2>";
makeJson($documents);

?>




</div>
					
<?php
// -- start footers -----------------------------

include_once 'includes/footer.html';
include_once 'includes/finish.inc';

?>
 
	</div>

</body>

</html>

