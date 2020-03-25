<?php
/**
 * @file seek.php
 * @brief Search tool for the metadata.
 *
 * @author Nathalie Castells-Brooke
 * @version 0.1.0
 * 
 * Tool to search the metadata information and give a list of possible experiments or datasets for the criteria wanted. 
 * @todo  plan and develop this tool
 * @date 10/04/2018
 */

// /This will be used to pass the experiment code, or type of page.  
$expt = 'default';


include_once 'includes/init.inc'; // these are the settings that refer to more than one page
/**
 * pageinfo will have the values for the Title or the pages, experiment or farm keyword.
 * The array is in settings.inc at the moment but we would also provide this using a json file or calling db.
 *
 * It has the following keys:
 * { ["ExperimentName"]=> string(9) "Broadbalk" : the Long title of the experiment
 * ["ExptCode"]=> string(4) "rbk1" : the code. This is what is search for
 * ["KeyRef"]=> string(15) "KeyRefBroadbalk" : the keyword associated with the experiment or page to pull out of eRAbib the relevant papers
 * ["URLCode"]=> string(9) "Broadbalk" : Previous code used in the URL of old site: we should look for that too.
 * }
 * @var array $pageinfo
 */


$pageinfo = getPageInfo($expt);
$KeyRef = $pageinfo['KeyRef'];
$page_title .= $pageinfo['ExperimentName'];

$filedatacite= 'metadata/'.$expt.'/info.json';
$datacite = file_get_contents($filedatacite);

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
<div id="idSeek">

<h1>eRAseek</h1>

<p>Tool to search the metadata information and give a list of possible experiments or datasets for the criteria wanted.</p>


</div>
					
<?php
// -- start footers -----------------------------

include_once 'includes/footer.html';
include_once 'includes/finish.inc';

?>
 
	</div>

</body>

</html>

