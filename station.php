<?php
/** 
 * @file station.php
 * @brief met station  File. 
 * 
 * @author Nathalie Castells-Brooke
 * 
 * This page describe the weather stations. It is a frame in which one can add modules
 * In this development stage, some variables are encoded here but will eventually come from database or URL.
 * 
 * in .htaccess: the following rules: 
 * RewriteRule ^station/([^/]+)/([^/]+)/([^/]+)$ station.php?expt=$1&ref=$3&sub=$2#document [L]
 RewriteRule ^station/([^/]+)/([^/]+)$ station.php?expt=$1&sub=$2#document [L]
 RewriteRule ^station/([^/]+)$ station.php?expt=$1 [L]

 * this shows that ref and sub come from the URL: not a very user friendly idea... 
 * 
 */
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

$fileDataset = $exptFolder . '/' . 'datasets.json';

$hasDatasets = file_exists($fileDataset);
if ($hasDatasets) {
    $jdatasets = file_get_contents($fileDataset);
    $jdatasets = utf8_encode($jdatasets);
    $datasets = json_decode($jdatasets, true);
}

$fileMonthly = $exptFolder . '/' . 'monthly.html';
$hasMonthly = file_exists($fileMonthly);

$doclist = $exptFolder . '/doclist.html';
$hasdocs = file_exists($doclist);

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
        <div id="idExpt">
			<h1 class="mx-3"><?php
// /experimentname is found in the datadescription file.
echo title_case($experiment['administrative']['name']);
?></h1>
			<div class="row">
				<div class="col-12 pt-3">
					<ul class="nav nav-tabs nav-fill text-body ">
						<li class="nav-item"><a class="nav-link active show"
							id="summary-tab" data-toggle="tab" href="#summary">Overview</a></li>



						<li class="nav-item"><a class="nav-link" id="measurements-tab"
							data-toggle="tab" href="#measurements">Measurements</a></li>
						
						<?php if ($hasDatasets) {?>
						<li class="nav-item"><a class="nav-link" id="datasets-tab"
							data-toggle="tab" href="#datasets">Datasets</a></li>
						<?php } ?>
						
						<li class="nav-item"><a class="nav-link" id="images-tab"
							data-toggle="tab" href="#images">Images</a></li>
							<?php if ($hasMonthly) {?>
						<li class="nav-item"><a class="nav-link" id="monthly-tab"
							data-toggle="tab" href="#monthly">Summaries</a></li>
<?php }?>
	<?php if ($hasdocs) {?>
						<li class="nav-item"><a class="nav-link" id="documents-tab"
							data-toggle="tab" href="#documents">More...</a></li>
<?php }?>
						<li class="nav-item"><a class="nav-link" id="keyrefs-tab"
							data-toggle="tab" href="#keyrefs">Bibliography</a></li>
					</ul>



					<div class="tab-content mh-100" id="idExptTabs">
						<div class="tab-pane active show" id="summary" role="tabpanel"
							aria-labelledby="summary-tab">
    							<?php
        $summarypage = $exptFolder . '/overview.html';
        include ($summarypage);
        ?>					
    					</div>
						<div class="tab-pane" id="measurements" role="tabpanel"
							aria-labelledby="measurements-tab">
							<div class="row px-3">
    							<?php
        $measurements = $exptFolder . '/measurements.html';
        include ($measurements);
        ?>
    							</div>
						</div>
						
						<?php if ($hasDatasets) {?>
                		<div class="tab-pane  pb-3" id="datasets"
							role="tabpanel" aria-labelledby="datasets-tab">
                			<?php include '_datasets.php';?>
                		</div>
                		<?php }?>
                		
						<div class="tab-pane" id="images" role="tabpanel"
							aria-labelledby="images-tab">
							 <?php include '_images.php';?>
						</div>
						<?php
    $fileMonthly = $exptFolder . '/' . 'monthly.html';
    $hasMonthly = file_exists($fileMonthly);
    if ($hasMonthly) {
        ?>
        <div class="tab-pane" id="monthly" role="tabpanel"
							aria-labelledby="monthly-tab">
							<div class="row px-3">
							<?php
        include ($fileMonthly);
        ?>
        </div>
						</div><?php
    }
    ?>
						
								
							
                         	
						<div class="tab-pane  pb-3" id="documents" role="tabpanel"
							aria-labelledby="documents-tab">
							
								
							<?php

    include $doclist;

    if (isset($sub)) {
        $docpage = $exptFolder . '/' . $sub . '.html';
        echo ('<br />');

        include $docpage;
    }

    if (isset($ref)) {
        $KeyRef = $ref;
        include '_keyrefs.php';
    }

    ?>
							
						</div>
						<div class="tab-pane" id="keyrefs" role="tabpanel"
							aria-labelledby="keyrefs-tab">
						<div class="row mx-3">
    							<?php

        include '_keyrefs.php';

        ?>
    					</div></div>


					</div>
				</div>
			</div>

		</div>
        					
        <?php
        // -- start footers -----------------------------

        include_once 'includes/footer.html';

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

