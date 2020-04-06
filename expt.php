<?php
/** 
 * @file expt.php
 * @brief Experiment File. 
 * 
 * @author Nathalie Castells-Brooke
 * 
 * This page describe the experiment. It is a frame in which one can add modules
 * In this development stage, some variables are encoded here but will eventually come from database or URL.
 * @date 9/27/2018
 */
if (isset($_POST['expt'])) {
    $expt = $_POST['expt'];
}
if (isset($_GET['expt'])) {
    $expt = $_GET['expt'];
}

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
 *
 *
 * @var array $pageinfo
 */

$pageinfo = getPageInfo($expt);
$KeyRef = $pageinfo['KeyRef'];
$exptFolder = 'metadata/' . $expt;

$page_title .= ': ' . $pageinfo['Experiment']; // This is used in the head file as the title tag

$filedatacite = $exptFolder . '/'.'experiment.json';
$hasDatacite = file_exists($filedatacite);
if ($hasDatacite) {
    $datacite = file_get_contents($filedatacite);
    $datacite = utf8_encode($datacite);
    $experiment = json_decode($datacite, true);
}

$fileTimeline = $exptFolder . '/' . 'timeline.json';
$hasTimeline = file_exists($fileTimeline);
if ($hasTimeline) {
    $timeline = file_get_contents($fileTimeline);
}

$filePerson = $exptFolder . '/person.json';
$hasPerson = file_exists($filePerson);
if ($hasPerson) {
    $jdata = file_get_contents($filePerson);
    $jdata = utf8_encode($jdata);
    $person = json_decode($jdata, true);
}

$fileSite = $exptFolder . '/site.json';
$hasSite = file_exists($fileSite);
if ($hasSite) {
    $jdata = file_get_contents($fileSite);
    $jdata = utf8_encode($jdata);
    $site = json_decode($jdata, true);
}

$fileDesign = $exptFolder . '/design.json';
$hasDesign = file_exists($fileDesign);
if ($hasDesign) {
    $jdata = file_get_contents($fileDesign);
    $jdata = utf8_encode($jdata);
    $design = json_decode($jdata, true);
}

$fileDataset = $exptFolder . '/' . 'datasets.json';

$hasDatasets = file_exists($fileDataset);
if ($hasDatasets) {
    $jdatasets = file_get_contents($fileDataset);
    $jdatasets = utf8_encode($jdatasets);
    $datasets = json_decode($jdatasets, true);
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
			<h1><?php
// /experimentname is found in the datadescription file.
echo title_case($experiment['administrative']['identifier']) . "  " . title_case($experiment['administrative']['type']);
?></h1>
			<div class="row">
				<div class="col-12 py-3">
					<ul class="nav nav-tabs nav-fill text-body ">
						<li class="nav-item"><a class="nav-link active" id="summary-tab"
							data-toggle="tab" href="#summary">Overview</a></li>
						<li class="nav-item"><a class="nav-link" id="site-tab"
							data-toggle="tab" href="#site">Site</a></li>
						<li class="nav-item"><a class="nav-link" id="design-tab"
							data-toggle="tab" href="#design">Design</a></li>
						
						<?php if ($hasDatasets) {?>
						<li class="nav-item"><a class="nav-link" id="datasets-tab"
							data-toggle="tab" href="#datasets">Datasets</a></li>
						<?php } ?>
						<li class="nav-item"><a class="nav-link" id="images-tab"
							data-toggle="tab" href="#images">Images</a></li>
						<li class="nav-item"><a class="nav-link" id="documents-tab"
							data-toggle="tab" href="#documents">Documents</a></li>
						<li class="nav-item"><a class="nav-link" id="keyrefs-tab"
							data-toggle="tab" href="#keyrefs">Bibliography</a></li>


					</ul>

					<div class="tab-content mh-100" id="idExptTabs">

						<div class="tab-pane active" id="summary" role="tabpanel"
							aria-labelledby="summary-tab">
							<?php
    include '_summary.php';
    
    ?>						

							</div>

						<div class="tab-pane" id="design" role="tabpanel"
							aria-labelledby="design-tab">
							<?php include '_design.php';?>
							</div>

						<div class="tab-pane" id="site" role="tabpanel"
							aria-labelledby="site-tab">
							<?php include '_site.php';?>
							</div>
								<?php if ($hasDatasets) {?>
						<div class="tab-pane" id="datasets" role="tabpanel"
							aria-labelledby="datasets-tab">
							<?php include '_datasets.php';?>
							</div>
							<?php }?>
						<div class="tab-pane" id="images" role="tabpanel"
							aria-labelledby="images-tab">
							<?php include '_images.php';?>
							</div>
						<div class="tab-pane" id="documents" role="tabpanel"
							aria-labelledby="documents-tab">
							<?php include '_documents.php';?>
							<?php include '_phpPages.php';?>
							</div>
						<div class="tab-pane" id="keyrefs" role="tabpanel"
							aria-labelledby="keyrefs-tab">
							<?php if ($dev == 'norton') {} else  {include '_keyrefs.php';} ?>
							</div>


					</div>
				</div>
			</div>

		</div>
					
<?php
// -- start footers -----------------------------

include_once 'includes/footer.html';

?>
 
	</div>
<?php

include_once 'includes/finish.inc'; // this has the common js scripts

?>
<script
		src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
	<script>
	      baguetteBox.run('.compact-gallery',{animation:'slideIn',
	    	    captions: function(element) {
	    	        return element.getElementsByTagName('img')[0].alt;
	    	    }});
</script>
	<div id="mapid"></div>
</body>

</html>

