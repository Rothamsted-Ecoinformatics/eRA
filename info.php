<?php
/**
 * @file info.php
 *
 * @brief A topic page.
 *
 * This will include a  page for any information, without tab stuff at the top.
 * the included files are either html, php or txt... there will be a field that says that in the infofiles.json 
 * @author Nathalie Castells-Brooke.
 *
 * @version 1.00
 *
 *
 * @version 0.2 added space for the page dependant scripts. at the bottom.
 * 
 * 
 */

// /This will be used to pass the FileName : it will just include the file as is.
$FileName = 'index';
if (isset($_POST['FileName'])) {
    $FileName = $_POST['FileName'];
}

/*
 * this is to pass filename as page.extension where extension is in the phpfile.json
 *
 * At the moment, we use FileName
 */

include_once 'includes/init.php'; // these are the settings that refer to more than one page

$page = 'index';
if (isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 'index';
}

$expt = 'default';
// /This will be used to pass the experiment code, or type of page.
if (isset($_POST['expt'])) {
    $expt = $_POST['expt'];
}
if (isset($_GET['expt'])) {
    $expt = $_GET['expt'];
}



/**
 * $page info should have the following structure:
 * array(4) {
 * ["ExperimentName"]=> string(9) "Broadbalk"
 * ["ExptCode"]=> string(4) "rbk1"
 * ["KeyRef"]=> string(15) "KeyRefBroadbalk"
 *
 * ["URLCode"]=> string(9) "Broadbalk" }
 *
 * @var array $pageinfo
 */

/**
 * We need the caption of the file.
 *
 * @var String $page_title
 */

$url = 'metadata/default/infofiles.json';
if (is_file($url)) {
    $jdata = file_get_contents($url);
    $data = json_decode($jdata, true);
    $pairs = array(
        'FileName' => $FileName,
        'exptID' => $expt
    );

    $page = multiSearch($data, $pairs);

    $h1Title = $page[0]['Caption'];
    $page_title .= ': ' . $page[0]['Caption'];
    $ext = $page[0]['Type'];
    // $KeyRef = $page[0]['KeyRef'];
} else {
    $h1Title = $pageinfo['ExperimentName'];
    $page_title .= $page_title .= ': ' . $pageinfo['ExperimentName'];
}

$fileDataset = 'metadata/default/datasets.json';

$hasDatasets = file_exists($fileDataset);
$displayDatasets = 0;
if ($hasDatasets) {
    $jdatasets = file_get_contents($fileDataset);
    $jdatasets = utf8_encode($jdatasets);
    $datasets = json_decode($jdatasets, true);
    foreach ($datasets as $dataset) {
        if ($dataset['isReady'] > $displayValue) {
            $displayDatasets = 1;
        }
    }
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


<div id="idExpt" class="p-0 mb-0">
			<div id="greenTitle"
				class="d-flex  mb-3 py-3 p3-3 bg-info text-white mt-0 ">
				<h1 class="mx-3"> <?php echo $h1Title;?></h1>
			</div>
<?php
$includeFile = 'metadata/' . $expt . '/' . $FileName.'.'.$ext;

include_once ($includeFile);
include_once 'includes/footer.html'; // this has the green bar and bottom
?>
 </div>
<?php
include_once 'includes/finish.inc'; // this has the common js scripts
?>
<!--  include here the page dependant scripts -->

</body>

</html>

