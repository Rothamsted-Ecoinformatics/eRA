<?php
/**
 * @file topic.php
 * 
 * @brief A topic page. 
 * 
 * This will include a php page for an experiment. it needs to know which folder the page is and what the filename is. 
 *
 * @author Nathalie Castells-Brooke.
 * 
 * @version 1.00
 * 
 * 
 * 
 * 
 * @version 0.1
 * 
 * @version 0.2 added space for the page dependant scripts. at the bottom. 
 */

// /This will be used to pass the FileName code.
if (isset($_POST['FileName'])) {
    $FileName = $_POST['FileName'];
} else {
    $Filename = 'index.php';
}


// /This will be used to pass the experiment code, or type of page.
if (isset($_POST['expt'])) {
    $expt = $_POST['expt'];
}
if (isset($_GET['expt'])) {
    $expt = $_GET['expt'];
}

if (!isset($expt)) {
    $expt = '';
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
 *
 * @var array $pageinfo
 */

$metadata = "images/metadata/" . $expt . '/'; // where the images are if needed

/**
 * We need the caption of the file.
 *
 * @var String $page_title
 */
$exptFolder = 'metadata/' . $expt;
$url = 'metadata/default/phpfiles.json';
if (is_file($url)) {
    $jdata = file_get_contents($url);
    $data = json_decode($jdata, true);
    $pairs = array(
        'FileName' => $FileName,
        'exptID' => $expt
    );
    
    $page = multiSearch($data, $pairs);
    /*
    echo '<pre>';
    var_dump($page);
    echo '</pre>';
    */
    $h1Title = $page[0]['Caption'];
    $page_title .= ': ' . $page[0]['Caption'];
    //$KeyRef = $page[0]['KeyRef'];
} else {
    $h1Title = $pageinfo['ExperimentName'];
    $page_title .= $page_title .= ': ' . $pageinfo['ExperimentName'];
}


$pageinfo = getPageInfo($expt);
$KeyRef = $pageinfo['KeyRef'];
$filedatacite = 'metadata/' . $expt . '/experiment.json';
$File = 'metadata/' . $expt . '/'.$FileName;
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
<div id="idExpt">
			
			<div class="row">
				<div class="col-12 py-3">
					<ul class="nav nav-tabs nav-fill text-body ">

						<li class="nav-item active"><a class="nav-link" id="summary-tab"
							data-toggle="tab" href="#summary">Information</a></li>
						<li class="nav-item"><a class="nav-link" id="datasets-tab"
							data-toggle="tab" href="#datasets">Datasets</a></li>
						<li class="nav-item"><a class="nav-link" id="images-tab"
							data-toggle="tab" href="#images">Images</a></li>
						<li class="nav-item"><a class="nav-link" id="documents-tab"
							data-toggle="tab" href="#documents">Documents</a></li>
						<li class="nav-item"><a class="nav-link" id="refs-tab"
							data-toggle="tab" href="#refs">References</a></li>

					</ul>

					<div class="tab-content mh-100">
						<div class="tab-pane active" id="summary" role="tabpanel"
							aria-labelledby="summary-tab">
							<?php include_once 'metadata/' . $expt . '/' . $FileName;?>
							</div>


						<div class="tab-pane" id="datasets" role="tabpanel"
							aria-labelledby="datasets-tab">
							<?php include '_datasets.php';?>
							</div>
						<div class="tab-pane" id="images" role="tabpanel"
							aria-labelledby="images-tab">
							<?php include '_images.php';?>
							</div>
						<div class="tab-pane" id="documents" role="tabpanel"
							aria-labelledby="documents-tab">
							<?php include '_documents.php';?>
							</div>

						<div class="tab-pane" id="refs" role="tabpanel"
							aria-labelledby="refs-tab">
							<?php include '_keyrefs.php'; ?>
							</div>

					</div>
				</div>
			</div>
		</div>

	
<?php
// -- start footers -----------------------------

include_once 'includes/footer.html'; // this has the green bar and bottom

?>
 </div>
<?php

include_once 'includes/finish.inc'; // this has the common js scripts

?>
<!--  include here the page dependant scripts -->
</body>

</html>

