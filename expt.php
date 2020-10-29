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
include_once 'includes/init.inc'; // these are the settings that refer to more than one page

if (! isset($expt)) {
    $expt = 'rbk1';
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
			<h1 class="mx-3"><?php
            // /experimentname is found in the datadescription file.
        echo title_case($experiment['administrative']['name']);
        ?></h1>
			<div class="row">
				<div class="col-12 pt-3">
					<ul class="nav nav-tabs nav-fill text-body ">
						<li class="nav-item  active"><a class="nav-link active show"
							id="summary-tab" data-toggle="tab" href="#summary">Overview</a></li>
						<li class="nav-item"><a class="nav-link" id="site-tab"
							data-toggle="tab" href="#site">Site</a></li>
							<?php if ($showDesign == TRUE) {?>
						<li class="nav-item"><a class="nav-link" id="design-tab"
							data-toggle="tab" href="#design">Design</a></li>
                		<?php }?>		
                						
                		<?php if ($hasDatasets) {?>
                						<li class="nav-item"><a class="nav-link"
							id="datasets-tab" data-toggle="tab" href="#datasets">Datasets</a></li>
                						<?php } ?>
                						<li class="nav-item"><a class="nav-link"
							id="images-tab" data-toggle="tab" href="#images">Images</a></li>
						<?php if ($hasDocs) {?>	
						<li class="nav-item"><a class="nav-link" id="documents-tab"
							data-toggle="tab" href="#documents">Documents</a></li>
							<?php
    }
    ?>
						<li class="nav-item"><a class="nav-link" id="keyrefs-tab"
							data-toggle="tab" href="#keyrefs">Bibliography</a></li>


					</ul>

					<div class="tab-content mh-100" id="idExptTabs">

						<div class="tab-pane active show pb-3" id="summary"
							role="tabpanel" aria-labelledby="summary-tab">
                							<?php
                    include '_summary.php';
                    ?>						
                							</div>

						<div class="tab-pane  pb-3" id="design" role="tabpanel"
							aria-labelledby="design-tab">
                							<?php include '_design.php';?>
                							</div>

						<div class="tab-pane  pb-3" id="site" role="tabpanel"
							aria-labelledby="site-tab">
                							<?php include '_site.php';?>
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
						<div class="tab-pane  pb-3" id="documents" role="tabpanel"
							aria-labelledby="documents-tab">
							<div class="row equal mx-3">
							
							<?php
    $doclist = $exptFolder . '/doclist.html';

    include $doclist;

    if (isset($sub)) {
        $docpage = $exptFolder . '/' . $sub . '.html';
        echo ('<hr>\n');

        include $docpage;
    }

    if (isset($ref)) {
        $KeyRef = $ref;
    }
    if ($dev == 'norton') {
        echo $KeyRef;
    } else {
        include '_keyrefs.php';
    }

    ?>
							</div>
						</div>
						<div class="tab-pane  pb-3" id="keyrefs" role="tabpanel"
							aria-labelledby="keyrefs-tab">
                							<?php

                    if ($dev == 'norton') {
                        echo $KeyRef;
                    } else {
                        include '_keyrefs.php';
                    }
                    ?>
                							</div>


					</div>
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

