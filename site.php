<?php
/** 
 * @file site.php
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

include_once 'includes/init.php'; // these are the settings that refer to more than one page

if (!isset($farm)) {$farm = 'rothamsted';}
$exptFolder = 'metadata/' . $farm;

/*
 * Space to find all the json files we have for this tape of page.
 */
$summary = '';
$filedatacite = $exptFolder . '/' . 'summary.json';
$hasDatacite = file_exists($filedatacite);
$page_description = '';
if ($hasDatacite) {
    $datacite = file_get_contents($filedatacite);
    $datacite = utf8_encode($datacite);
    $summary = json_decode($datacite, true);
    $page_description = $summary['administrative']['description'];
}
$fileMedia = $exptFolder . '/' . 'medialist.html';
$hasMedia = file_exists($fileMedia);

$pageinfo = getPageInfo($farm);

$KeyRef = ''.$pageinfo['KeyRef']; // this is the variable that is used to pull out the bibliography from the database
$page_title .=  ''.$pageinfo['Experiment'];

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

						<li class="nav-item  active show"><a class="nav-link active" id="summary-tab" data-toggle="tab"
								href="#summary">Overview</a></li>
						<li class="nav-item"><a class="nav-link" id="history-tab" data-toggle="tab"
								href="#history">History</a></li>
						<li class="nav-item"><a class="nav-link" id="site-tab" data-toggle="tab" href="#site">Site</a>
						</li>
						<li class="nav-item"><a class="nav-link" id="experiments-tab" data-toggle="tab"
								href="#experiments">Experiments</a></li>
						<li class="nav-item"><a class="nav-link" id="images-tab" data-toggle="tab"
								href="#images">Media</a></li>
						<li class="nav-item"><a class="nav-link" id="keyrefs-tab" data-toggle="tab"
								href="#keyrefs">References</a></li>

					</ul>

					<div class="tab-content mh-100" id="idExptTabs">
						<div class="tab-pane active" id="summary" role="tabpanel" aria-labelledby="summary-tab">
							<div class="row px-5">
								<?php include ($exptFolder.'/overview.html');?>
							</div>
						</div>

						<div class="tab-pane" id="site" role="tabpanel" aria-labelledby="site-tab">
							<div class="row px-5">
								<?php include ($exptFolder.'/site.html');?>
							</div>
						</div>

						<div class="tab-pane" id="history" role="tabpanel" aria-labelledby="history-tab">
							<div class="row px-5">
								<?php include ($exptFolder.'/history.html');?>
							</div>
						</div>

						<div class="tab-pane" id="experiments" role="tabpanel" aria-labelledby="experiments-tab">
							<div class="row px-5">
								<?php include ($exptFolder.'/experiments.html');?>
							</div>
						</div>
						<div class="tab-pane" id="images" role="tabpanel" aria-labelledby="images-tab">
							<div class="row px-5">
								<?php if ($hasMedia) {
                                include $fileMedia;
                            } ?>
								<?php include '_images.php';?>
							</div>
						</div>

						<div class="tab-pane  pb-3" id="keyrefs" role="tabpanel" aria-labelledby="keyrefs-tab">
							<?php
							include '_keyrefs.php'; 
							?>
						</div>


					</div>
				</div>
			</div>
		</div>

		<?php
            // -- start footers -----------------------------
            
            include_once 'includes/footer.html';
            
       
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

			$(document).ready(() => {
				let url = location.href.replace(/\/$/, "");

				if (location.hash) {
					const hash = url.split("#");
					$('#Expttabs a[href="#' + hash[1] + '"]').tab("show");
					$('li.active').removeClass('active');
					$('a[href="#' + hash[1] + '"]').closest('li').addClass('active');

					url = location.href.replace(/\/#/, "#");
					history.replaceState(null, null, url);
					setTimeout(() => {
						$(window).scrollTop(0);
					}, 400);
				}

				$('a[data-toggle="tab"]').on("click", function () {
					let newUrl;
					const hash = $(this).attr("href");
					if (hash == "#home") {
						newUrl = url.split("#")[0];
					} else {
						newUrl = url.split("#")[0] + hash;
					}
					newUrl += "/";
					history.replaceState(null, null, newUrl);
				});
			});
		</script>
</body>

</html>