<?php

/**
 * @file _dataset.php
 * @brief module that display information about a single dataset refered to by its DOI. 
 * 
 * at this point, Headers have been sent and the page already has had some writing on... 
 * 
 * The module takes information for a dataset, placed in database or json file and display it in this page. 
 *
 * Keep replacing the fields with data from the JSON file. 
 *
 * @author Nathalie Castells-Brooke
 * @date 9/27/2018
 * @date 11/28/2019
 */
$Parsedown = new Parsedown();
?>

<div id="idExpt">
	<div id="greenTitle"
		class="d-flex  mb-3 py-3 p3-3 bg-primary text-white mt-0 ">
		<h1 class="mx-3"><?php echo $datasetTitle?> </h1>


	</div>
	<div class="row mx-0 mb-3">
		<div class="col-sm-4">


			<div class="card card-summary ">
				<div class="card-body">

					<ul class="list-group list-group-flush ">
					<?php

    if ($dsinfo['isExternal'] == 0) {
        if (file_exists($zipfile)) {
            echo $strDownload;
        }
    } else {
        ?>
					
 <li class="list-group-item"><b>Data is at: </b><a target="_BLANK" 
							href="<?php echo $dsinfo['url'];?>"><?php echo $dsinfo['identifier'];?></a>
								
				<?php
    }

    if ($registeredUser != "Login/Register") {
        echo $strUserArea;
    }
    if ($dsinfo['isExternal'] == 0) {
        ?>						
						
						
						
						
						<li class="list-group-item"><b>Data access: </b><?php echo $dstypeStr;?></li>

						<li class="list-group-item"><b>DOI: </b><a
							href="https://doi.org/<?php echo $dsinfo['identifier'];?>"><?php echo $dsinfo['identifier'];?></a>
						</li>
						
						<?php  if ($hasNVersion == 1) { ?>
						<li class="list-group-item text-warning "><b>Newer Version: </b>
						    <?php
            echo $newVersionShort;
            ?>
						    
						    </li>
						    <?php 	}					}?> 
						    
						<?php if ($expt == "rro") { ?><li class="list-group-item"><b>Experiment:
						</b> <a href="orphans.php">Other</a></li>
						
						<?php } else {?>
						<li class="list-group-item"><b>Experiment: </b> <a
							href="experiment/<?php echo $expt;?>"><?php echo $pageinfo['Experiment']; ?></a></li>
						
						<?php
    }
    if ($dsinfo['isExternal'] == 0) {
        ?>
    <li class="list-group-item"><b>Files included in the download: </b> <?php echo $distribution; ?> </li> <?php ?>
															
						<li class="list-group-item"><b>Version: </b> <?php echo $dsinfo['version']; ?></li>
						
						
						<?php }
						echo $dateCreation . $datePublication .$dateUpdate; ?>
						
						<li class="list-group-item"><b>Keywords: </b> 
						<?php
    $localwords = $dsinfo['keywords'];

    echo printVocab($localwords);

    ?></li>
						<li class="list-group-item"><b>Author(s): </b> <?php echo $refAuthor; ?></li>

						<li class="list-group-item"><b>Publisher: </b><?php echo $getPublisher; ?></li>
					
					<?php echo    $strDownload;?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-sm-8">



			<p class="text-right">
				<a href="https://twitter.com/share?ref_src=twsrc%5Etfw"
					class="twitter-share-button" data-via="eRA_curator"
					data-size="large"
					data-text=" <?php echo $dsinfo['name']; ?> <?php echo $dsinfo['identifier'];?> "
					data-url="<?php echo $dsinfo['url'];?>" data-hashtags="eRAdatasets"
					data-related="eRA_Curator,Rothamsted" data-related="Rothamsted"
					data-show-count="false">Tweet this dataset</a>
			</p>
			<script async src="https://platform.twitter.com/widgets.js"
				charset="utf-8"></script> 
				
				
		<?php echo         $illustration; // if it is available ?>
			<h3 class="my-3">Summary</h3>
			<?php

echo $Parsedown->text($arrDescription['Abstract']);

if (isset($arrDescription['Methods'])) {
    ?> 
		   <h3>Methods</h3>
			<?php

    echo $Parsedown->text($arrDescription['Methods']);
}

if (isset($arrDescription['TechnicalInfo'])) {

    ?> 
		    <h3>Technical Information</h3>
		    <?php

    echo $Parsedown->text($arrDescription['TechnicalInfo']);
}
if ($hasDocuments == 1) {
    echo $relDocuments;
}

if ($hasDatasets == 1) {
    echo $relDatasets;
}

if ($dsinfo['isExternal'] == 0) {

    if ($hasPVersion == 1) {
        echo $prevVersions;
    }
    if ($hasNVersion == 1) {
        echo $newVersions;
    }
}
if ($hasCT == 1) {
    echo $tblContributors;
}

if ($dsinfo['isExternal'] == 0) {
    ?>	
			
			
			<h3>Dataset Access and Conditions</h3>
			<h4>Rights Holder</h4>
			<p>Rothamsted Research</p>

			<h4>License</h4>
			<p>
				<a rel="license" target="_blank"
					href="http://creativecommons.org/licenses/by/4.0/" target="out"><img
					style="width: 50px;" alt="Creative Commons License"
					src="images/logos/cc4.png" align="middle" /></a> This dataset is
				available under a <a rel="license"
					href="http://creativecommons.org/licenses/by/4.0/">Creative Commons
					Attribution Licence (4.0)</a>.
			</p>
			<h4>Cite this Dataset</h4>
			<p>
				<strong>YOU MUST CITE AS: </strong><?php echo $refAuthor; ?> (<?php echo $year;?>).
								<?php echo $datasetTitle;?> <em><?php echo $getPublisher; ?></em>
				<a target="_blank"
					href="https://doi.org/<?php echo $dsinfo['identifier'];?>">https://doi.org/<?php echo $dsinfo['identifier'];?></a>
			
			
			<p>
				Please review our <a href="info/howtocredit">How to Credit Datasets</a>
				guidance for more information.
			</p>
			<h5>Conditions of Use</h5>

			<p>
				Rothamsted relies on the integrity of users to ensure that datasets
				are used appropriately and Rothamsted Research receives suitable
				acknowledgment as being the originators of these data. Please review
				the <a href="info/conditions">Conditions of Use</a> before
				downloading.
			</p>
			<?php }?>
			<div id="accordion">
			<?php

if (isset($arrDescription['TableOfContents'])) {
    ?>
				<div class="card">
					<div class="card-header" id="TableOfContents">
						<h3 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse"
								data-target="#collapseOne" aria-expanded="false"
								aria-controls="collapseOne">Table Of Contents</button>
						</h3>
					</div>
					<div id="collapseOne" class="collapse"
						aria-labelledby="TableOfContents" data-parent="#accordion">
						<div class="card-body">
							<h3>Table Of Contents</h3>
							<p><?php echo $Parsedown->text($arrDescription['TableOfContents']); ?></p>
						</div>
					</div>
				</div>			    <?php
}

if (isset($arrDescription['Provenance'])) {
    ?>
			     <div class="card">
					<div class="card-header" id="Provenance">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse"
								data-target="#collapseThree" aria-expanded="false"
								aria-controls="collapseThree">Provenance</button>
						</h5>
					</div>
					<div id="collapseThree" class="collapse"
						aria-labelledby="Provenance" data-parent="#accordion">
						<div class="card-body">

							<p><?php echo $Parsedown->text( $arrDescription['Provenance']); ?></p>
						</div>
					</div>
				</div>
			    <?php
}
if (isset($arrDescription['Quality'])) {
    ?>
			    <div class="card">
					<div class="card-header" id="Quality">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse"
								data-target="#collapseFour" aria-expanded="false"
								aria-controls="collapseFour">Quality</button>
						</h5>
					</div>
					<div id="collapseFour" class="collapse" aria-labelledby="Quality"
						data-parent="#accordion">
						<div class="card-body">


							<p><?php echo $Parsedown->text($arrDescription['Quality']); ?></p>
						</div>
					</div>
				</div>
			    <?php
}
if (isset($arrDescription['Other'])) {
    ?>
			    <div class="card">
					<div class="card-header" id="Other">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse"
								data-target="#collapseSix" aria-expanded="false"
								aria-controls="collapseSix">Additional Information</button>
						</h5>
					</div>
					<div id="collapseSix" class="collapse" aria-labelledby="Other"
						data-parent="#accordion">
						<div class="card-body">
							<p><?php echo $Parsedown->text($arrDescription['Other']); ?></p>
						</div>
					</div>
				</div>
			    <?php
}
if ($dsinfo['isExternal'] == 0) {
    ?>
				<div class="card">
					<div class="card-header" id="Funding">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse"
								data-target="#collapseFunding" aria-expanded="false"
								aria-controls="collapseFunding">Funding</button>
						</h5>
					</div>

					<div id="collapseFunding" class="collapse"
						aria-labelledby="Funding" data-parent="#accordion">
						<div class="card-body">

							<ul class="list-group mx-3">
								<li class="list-group-item ">The dataset <b><?php echo $dsinfo['name'];?></b>
									is a published dataset from the e-RA Database. The e-RA
									database, including the published datasets generated from it,
									is part of the <a target="_blank"
									href="https://www.rothamsted.ac.uk/national-capabilities">
										National Capabilities</a>, which also includes the <a
									href="https://www.rothamsted.ac.uk/long-term-experiments">Long-Term
										Experiments</a>, the <a target="_blank"
									href="https://www.rothamsted.ac.uk/sample-archive">Sample
										Archive</a> and the <a
									href="https://www.rothamsted.ac.uk/environmental-change-network">Environmental
										Change Network</a>.
								</li>
								<li class="list-group-item ">The Rothamsted Long-term
									Experiments National Capability is supported by the Lawes
									Agricultural Trust and the Biotechnology and Biological
									Sciences Research Council (Grants <a target="_blank"
									href="https://gtr.ukri.org/projects?ref=BBS%2FE%2FC%2F00005189">BBS/E/C/00005189</a>
									(2012-2017) and <a target="_blank"
									href="https://gtr.ukri.org/project/40CC213B-6923-433A-89AD-789CC3E8E1F5">BBS/E/C/000J0300</a>
									(2017-2022).
								</li>

							</ul>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>




<!-- Modal OA-->
<div class="modal fade" id="modalClickTroughOA" tabindex="-1"
	role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">End User
					Agreement (Open Access)</h5>
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>
					<a rel="license" target="_blank"
						href="http://creativecommons.org/licenses/by/4.0/" target="out"><img
						style="width: 50px;" alt="Creative Commons License"
						src="images/logos/cc4.png" align="middle" /></a> This work is
					licensed under a <a rel="license"
						href="http://creativecommons.org/licenses/by/4.0/">Creative
						Commons Attribution 4.0 International License</a>.
				</p>
				<p>
					<strong>YOU MUST CITE AS: </strong><?php echo $refAuthor; ?> (<?php echo $year;?>).
								<?php echo $dsinfo['name'];?> <em><?php echo $getPublisher; ?></em>
					<a target="_blank"
						href="https://doi.org/<?php echo $dsinfo['identifier'];?>"><?php echo $dsinfo['identifier'];?></a>

				</p>
				<p>Rothamsted relies on the integrity of users to ensure that
					Rothamsted Research receives suitable acknowledgment as being the
					originators of these data. This enables us to monitor the use of
					each dataset and to demonstrate their value.</p>



			</div>
			<div class="modal-footer">
				<form method="POST">
					<button type="button" class="btn btn-secondary"
						data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" name="dlform"  
						value="isDownload">Agree and Download</button>
			
			</div>
			<!-- div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a type="button" download class="btn btn-primary"
					href="<?php // echo $zipfile; ?>">Agree and Download</a>
			</div> -->
		</div>
	</div>
</div>


<!-- Modal Other-->
<div class="modal fade" id="modalClickTroughOther" tabindex="-1"
	role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">End User
					Agreement</h5>
				<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>
					<a rel="license" target="_blank"
						href="http://creativecommons.org/licenses/by/4.0/" target="out"><img
						style="width: 50px;" alt="Creative Commons License"
						src="images/logos/cc4.png" align="middle" /></a> This work is
					licensed under a <a rel="license"
						href="http://creativecommons.org/licenses/by/4.0/">Creative
						Commons Attribution 4.0 International License</a>.
				</p>
				<p>
					<strong>YOU MUST CITE AS: </strong><?php echo $refAuthor; ?> (<?php echo $year;?>).
								<?php echo $dsinfo['name'];?> <em><?php echo $getPublisher; ?></em>
					<a target="_blank"
						href="https://doi.org/<?php echo $dsinfo['identifier'];?>"><?php echo $dsinfo['identifier'];?></a>

				</p>
				<p>Rothamsted relies on the integrity of users to ensure that
					Rothamsted Research receives suitable acknowledgment as being the
					originators of these data. This enables us to monitor the use of
					each dataset and to demonstrate their value.</p>


			</div>
			<div class="modal-footer">
				<form method="POST">
					<button type="button" class="btn btn-secondary"
						data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" name="dlform" 
						value="isDownload">Agree and Download</button>
					
			
			</div>
		</div>
	</div>
</div>


<!-- Modal N/A-->
<div class="modal fade" id="modalClickTroughN/A" tabindex="-1"
	role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">N/A End User
					Agreement</h5>
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>
					<a rel="license" target="_blank"
						href="http://creativecommons.org/licenses/by/4.0/" target="out"><img
						style="width: 50px;" alt="Creative Commons License"
						src="images/logos/cc4.png" align="middle" /></a> This work is
					licensed under a <a rel="license"
						href="http://creativecommons.org/licenses/by/4.0/">Creative
						Commons Attribution 4.0 International License</a>.
				</p>
				<p>
					<strong>YOU MUST CITE AS: </strong><?php echo $refAuthor; ?> (<?php echo $year;?>).
								<?php echo $dsinfo['name'];?> <em><?php echo $getPublisher; ?></em>
					<a target="_blank"
						href="https://doi.org/<?php echo $dsinfo['identifier'];?>"><?php echo $dsinfo['identifier'];?></a>

				</p>
				<p>Rothamsted relies on the integrity of users to ensure that
					Rothamsted Research receives suitable acknowledgment as being the
					originators of these data. This enables us to monitor the use of
					each dataset and to demonstrate their value.</p>


			</div>
			<div class="modal-footer">
				<form method="POST">
					<button type="button" class="btn btn-secondary"
						data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" name="dlform" 
						value="isDownload">Agree and Download</button>
			
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="spinner" tabindex="-1" role="dialog" mousemove= "$('#spinner').modal('hide');">
	
    <div class="modal-dialog modal-dialog-centered justify-content-center" role="document">
	
        <span class="fa fa-spinner fa-spin fa-3x"></span>
		
    </div>
</div>

<script type="text/javascript">
	
function modal(){
       $('#spinner').modal('show');
       setTimeout(function () {
       	
       	$('#spinner').modal('hide');
       }, 6000);
    }
</script>


<?php 

//testvar();?>