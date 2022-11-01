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
 * 
 * 
 */
include_once 'includes/init.php'; // these are the settings that refer to more than one page

if (! isset($expt)) {
    $expt = 'rbk1';
}
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
$exptFolder = 'metadata/default';

$KeyRef = '';


$page_title .= 'List all the datasets'; // This is used in the head file as the title tag


$fileDataset = $exptFolder . '/' . 'datasets.json';

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
                    <ul class="nav nav-tabs nav-fill text-body " id="Expttabs">

                        <li class="nav-item">
                            <a class="nav-link" id="overview-tab" data-toggle="tab"
                                href="#overview">Overview</a></li>
                        <li class="nav-item"><a class="nav-link" id="site-tab" data-toggle="tab" href="#site">Site</a>
                        </li>
                        <?php if ($showDesign == TRUE) {?>
                        <li class="nav-item"><a class="nav-link" id="design-tab" data-toggle="tab"
                                href="#design">Design</a></li>
                        <?php }?>

                        <li class="nav-item"><a class="nav-link" id="datasets-tab" data-toggle="tab"
                                href="#datasets">Datasets</a></li>
                        <?php if ($displayImages >0) {?>
                        <li class="nav-item"><a class="nav-link" id="images-tab" data-toggle="tab"
                                href="#images">Media</a></li>

                        <?php }
						if ($hasDocs) {?>
                        <li class="nav-item"><a class="nav-link" id="documents-tab" data-toggle="tab"
                                href="#documents">Related Documents</a></li>
                        <?php
                            }
                        ?>
                        <li class="nav-item"><a class="nav-link" id="bibliography-tab" data-toggle="tab"
                                href="#bibliography">Bibliography</a></li>


                    </ul>

                    <div class="tab-content mh-100" id="idExptTabs">

                        <div class="tab-pane active show pb-3" id="overview" role="tabpanel"
                            aria-labelledby="overview-tab">
                            <?php
                    include '_summary.php';
                    ?>
                        </div>

                        <div class="tab-pane  pb-3" id="design" role="tabpanel" aria-labelledby="design-tab">
                            <?php include '_design.php';?>
                        </div>

                        <div class="tab-pane  pb-3" id="site" role="tabpanel" aria-labelledby="site-tab">
                            <?php include '_site.php';?>
                        </div>

                        <div class="tab-pane  pb-3" id="datasets" role="tabpanel" aria-labelledby="datasets-tab">
                            <?php
$inDet = array(
                            "rbk1",
                            "rhb2",
                            "rpg5",
                            "rms",
                            "wms",
                            "bms"
                        );
if ($displayDatasets > 0) {
	
                        //include '_datasets.php';
						include '_datasets.php';
						echo  "<div class=\"mx-3\">Additional data is available through e-RAdata. Please <a href=\"newGold.php\" >register for access</a>.  </div>";
} else if ($displayDatasets == 0) {
						
                        
                        if (in_array($expt, $inDet)) {
                            echo  "<div class=\"mx-auto\" style=\"width: 600px;\">Additional data is available through e-RAdata. 
Please <a href=\"newGold.php\" >register for access</a>.  </div>
<div class=\"mx-auto\" style=\"width: 600px;\">
  <img class=\"mx-auto\" src=\"images/600x400/DETtop2021.jpg\" alt\"Extract data\" width=\"600\" height=\"400\">

</div>";
                        } else if ($expt == "rwf3") {
                            echo  "<div class=\"mx-auto\" style=\"width: 600px;\"> Datasets for Alternate Wheat and Fallow 
are only available through  e-RAdata. Please <a href=\"newGold.php\" >register for access</a>. </div>
<div class=\"mx-auto\" style=\"width: 600px;\">
  <img class=\"mx-auto\" src=\"images/600x400/DETtop2021.jpg\" alt\"Extract data\" width=\"600\" height=\"400\">

</div>
";
                        } else {
                    
                        echo  "<div class=\"mx-auto\" style=\"width: 600px;\">There are currently no prepared datasets online for this experiment. However, 
there may still be data available but requiring curation. 
For more information please <a href=\"mailto:era@rothamsted.ac.uk\">contact the e-RA curators</a>. </div>
<div class=\"mx-auto\" style=\"width: 600px;\">
  <img class=\"mx-auto\" src=\"images/600x400/sortingsamples.jpg\" alt\"Working on it\" width=\"600\" height=\"400\">

</div>";
                        }
                    }
                    ?>
                        </div>


                        <div class="tab-pane" id="images" role="tabpanel" aria-labelledby="images-tab">
                            <?php if ($hasMedia) {
                                include $fileMedia;
                            } ?>
                            <?php include '_images.php';?>
                        </div>
                        <?php if ($hasDocs) {?>
                        <div class="tab-pane  pb-3" id="documents" role="tabpanel" aria-labelledby="documents-tab">
                            <div class="mx-3">

                                <?php


    include $fileDocs;

    if (isset($sub)) {
        $docpage = $exptFolder . '/' . $sub . '.html';

        include $docpage;
    }

    if (isset($ref)) {
        
        $papers = GetKeyRefs($ref);
        
        if (substr($papers, 0, 4) != "NONE") {
            
            echo "<h2>Key References</h2> \n\t\t
                    <div class=\"mx-3\">".$papers."\n\t</div>";
	
        } 
        
    }

    ?>
                            </div>
                        </div>
                        <?php }?>
                        <div class="tab-pane  pb-3" id="bibliography" role="tabpanel"
                            aria-labelledby="bibliography-tab">
                            <div class="mx-3">
                                <?php

                    include '_keyrefs.php';

                    ?>
                            </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
        <script>
            baguetteBox.run('.compact-gallery', {
                animation: 'slideIn',
                captions: function (element) {
                    return element.getElementsByTagName('img')[0].alt;
                }
            });
        </script>
        

        <script>
            $(document).ready(
               function () {

                    $('#Expttabs li a').click(function () {

                        //alert($(this).text().toLowerCase());
                        

                    });
               }
            );
        </script>
    </div>
</body>

</html>