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

/**
 * Setting this page's variables before the functions and headers. 
 */
if (!isset($farm)) {
    $farm = 'rothamsted';
}

$exptFolder = 'metadata/' . $farm;

/*
 * Space to find all the json files we have for this tape of page.
 */
$summary = '';
$filedatacite = $exptFolder . '/' . 'summary.json';
$hasDatacite = file_exists($filedatacite);
if ($hasDatacite) {
    $datacite = file_get_contents($filedatacite);
    $datacite = utf8_encode($datacite);
    $summary = json_decode($datacite, true);
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
 * @var array $pageinfo
 */

$pageinfo = getPageInfo($farm);

$KeyRef = $pageinfo['KeyRef']; // this is the variable that is used to pull out the bibliography from the database

$page_title .= ': ' . $pageinfo['Experiment'];

/*
 * filedatacite contains schema information So we may want one
 *
 */
// $filedatacite = 'metadata/' . $farm . '/overview.json';
// $datacite = file_get_contents($filedatacite);

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
                        echo $pageinfo['Experiment'];
                        ?></h1>
            			<div class="row">
            				<div class="col-12 pt-3">
            					<ul class="nav nav-tabs nav-fill text-body ">
            
            						<li class="nav-item  active show"><a class="nav-link active"
            							id="summary-tab" data-toggle="tab" href="#summary">Overview</a></li>
            						<li class="nav-item"><a class="nav-link" id="history-tab"
            							data-toggle="tab" href="#history">History</a></li>
            						<li class="nav-item"><a class="nav-link" id="site-tab"
            							data-toggle="tab" href="#site">Site</a></li>
            						<li class="nav-item"><a class="nav-link" id="experiments-tab"
            							data-toggle="tab" href="#experiments">Experiments</a></li>
            						
            						<li class="nav-item"><a class="nav-link" id="images-tab"
            							data-toggle="tab" href="#images">Images</a></li>
            							<li class="nav-item"><a class="nav-link" id="keyrefs-tab"
            							data-toggle="tab" href="#keyrefs">References</a></li>
            
            					</ul>
            
            					<div class="tab-content mh-100" id="idExptTabs">
            						<div class="tab-pane active" id="summary" role="tabpanel"
            							aria-labelledby="summary-tab">
            								<?php include ($exptFolder.'/summary.php');?>
            							</div>
            
            						<div class="tab-pane" id="site" role="tabpanel"
            							aria-labelledby="site-tab">
            							<div class="row px-5">
            								<?php include ($exptFolder.'/site.php');?>
            							</div>
            						</div>
            
            						<div class="tab-pane" id="history" role="tabpanel"
            							aria-labelledby="history-tab">
            							<div class="row px-5">
            								<?php include ($exptFolder.'/history.php');?>	
            							</div>
            						</div>
            
            						<div class="tab-pane" id="experiments" role="tabpanel"
            							aria-labelledby="experiments-tab">
            							<div class="row px-5">
            								<?php include ($exptFolder.'/experiments.php');?>
            								</div>
            						</div>
            						<div class="tab-pane" id="images" role="tabpanel"
            							aria-labelledby="images-tab">
            								<?php include '_images.php';?>
            							</div>
            						<div class="tab-pane  pb-3" id="keyrefs" role="tabpanel"
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
    </body>

</html>

