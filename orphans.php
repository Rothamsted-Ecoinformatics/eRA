<?php
/** 
 * @file orphans.php
 * @brief a list of orphan datasets File. 
 * 
 * If a dataset is in RRO: it is not in any LTE so the list is viewed here and no experiment information
 * 
 * @author Nathalie Castells-Brooke
 * 
 * This page describe the experiment. It is a frame in which one can add modules
 * In this development stage, some variables are encoded here but will eventually come from database or URL.
 * @date 9/27/2018
 */
include_once 'includes/init.php'; // these are the settings that refer to more than one page


$expt = 'rro';

$exptFirst = $expt[0];
switch ($exptFirst) {
    case "r":
        $stationName = 'Rothamsted';
        break;
    case "s":
        $stationName = 'Saxmundham';
        break;
    case "b":
        $stationName = "Broom's Barn";
        break;
    case "w":
        $stationName = "Woburn";
        break;
}
// default experiment arbitrarily broadbalk. We could be more clever? random experiment?
$exptFolder = 'metadata/' . $expt;
$pageinfo = getPageInfo($expt);
$KeyRef = '';
if (is_array($pageinfo)) {
    $KeyRef = $pageinfo['KeyRef'];
}

$page_title .= $pageinfo['Experiment']; // This is used in the head file as the title tag

$filedatacite = $exptFolder . '/' . 'experiment.json';
$hasDatacite = file_exists($filedatacite);
if ($hasDatacite) {
    $datacite = file_get_contents($filedatacite);
    $datacite = utf8_encode($datacite);
    $experiment = json_decode($datacite, true);
}
$page_description = $experiment['administrative']['description'];
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
    $showDesign = FALSE;
    if ($design[0]['administrative']['identifier'] != null) {
        $showDesign = TRUE;
    }
}

$fileDataset = $exptFolder . '/' . 'datasets.json';

$hasDatasets = file_exists($fileDataset);
if ($hasDatasets) {
    $jdatasets = file_get_contents($fileDataset);
    $jdatasets = utf8_encode($jdatasets);
    $datasets = json_decode($jdatasets, true);
}
$fileDocs = $exptFolder . '/' . 'doclist.html';
$hasDocs = file_exists($fileDocs);

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
				<h1 class="mx-3">Other Datasets</h1>
			</div>
			<div class="row">
				<div class="col-12 pt-3">
					<p>Datasets derived from other field experiments at Rothamsted (not
						Classical or long-term experiments)</p>
							
      	<?php 
		if ($hasDatasets) { include 'wdel-datasets.php'; }?>
                							
				</div>
			</div>
		</div>

           					
                <?php
                // -- start footers ----------------------------
                include_once 'includes/footer.html';
                ?>        
        	
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
	</div>
</body>
</html>

