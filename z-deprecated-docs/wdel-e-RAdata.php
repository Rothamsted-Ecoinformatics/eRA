<?php
/**
 * @file eraDET.php
 * 
 * @brief placeholder for eRAdet.
 *
 * @author Nathalie Castells-Brooke.
 * 
 *  this is an iFRAMe that contains DET. Later, eRAdet could be part of this site but at the moment, we can use this as a neat trick. 
 * 
 * @todo: modify the stylesheet in eRAdet so that it is seamingless in the design of the new site. 
 * @version 0.1

 */

// /This will be used to pass the experiment code, or type of page.
$expt = 'DET';

include_once 'includes/init.inc'; // these are the settings that refer to more than one page

$pageinfo = getPageInfo($expt);
$KeyRef = $pageinfo['KeyRef'];
$page_title .= ': '.$pageinfo['Experiment'];

$filedatacite= 'metadata/'.$expt.'/experiment.json';
$datacite = file_get_contents($filedatacite);
$hasDatacite = file_exists($filedatacite);
if ($hasDatacite) {
    $datacite = file_get_contents($filedatacite);
    $datacite = utf8_encode($datacite);
    $experiment = json_decode($datacite, true);
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
<div id="ideRAdet">

			<h1><?php
// /experimentname is found in the datadescription file.
			echo $pageinfo['Experiment'];
?></h1>
			<div class="row">
				<div class="col-12 py-3">
					<ul class="nav nav-tabs nav-fill text-body ">
						<li class="nav-item active"><a class="nav-link active"
							id="eRAdet-tab" data-toggle="tab" href="#eRAdet">eRAdet</a></li>
						<li class="nav-item"><a class="nav-link" id="info-tab"
							data-toggle="tab" href="#info">Register</a></li>
						

					</ul>

					<div class="tab-content mh-100">
						<div class="tab-pane  active" id="eRAdet" role="tabpanel"
							aria-labelledby="eRAdet-tab" >
							<iframe class="detFrame" src="http://www3.rothamsted.ac.uk/cdera/extract2019/pages/data_extraction_prototype6.html" width="100%" height="800px" >
  <p>Your browser does not support iframes. Please visit <a target="out" href="http://www3.rothamsted.ac.uk/cdera/extract2019/pages/data_extraction_prototype6.html" target="det">eRAdet</a></p>
</iframe>
							</div>

						<div class="tab-pane" id="info" role="tabpanel"
							aria-labelledby="info-tab">
						
								</div>

						<div class="tab-pane" id="help" role="tabpanel"
							aria-labelledby="help-tab">
							<p>This will have more help than the in-app help and also the videos and where to get support</p>
							
							</div>

					</div>
				</div>
			</div>
		</div>
				









</div>
					
<?php
// -- start footers -----------------------------

include_once 'includes/footer.html'; // this has the green bar and bottome stu

?>
 
	</div>
<?php

include_once 'includes/finish.inc'; // this has the common js scripts

?>
<!--  include here the page dependant scripts -->
</body>

</html>

