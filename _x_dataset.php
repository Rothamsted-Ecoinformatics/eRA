<?php

/**
 * @file _dataset.php
 * @brief module that display information about a single dataset refered to by its DOI. 
 * 
 * 
 * The module takes information for a dataset, placed in database or json file and display it in this page. 
 *
 * Keep replacing the fields with data from the JSON file. 
 *
 * @author Nathalie Castells-Brooke
 * @date 9/27/2018
 * @date 11/28/2019
 */
function getVocab($localword)
{
    GLOBAL $words;
    GLOBAL $scheme;
    $hasKey = FALSE;
    $i = 0;
    $vocab = "";
    while (! $hasKey or $i == count($words)) {
        if ($words[$i]['subject'] == $localword) {
            $hasKey = TRUE;
            $localScheme = $words[$i]['scheme'];
            $URI = $scheme[$localScheme];
            $vocab .= "<a href=\"" . $URI . $words[$i]['URI'] . "\" target = \"out\">" . $localword . "</a>";
        }
        $i += 1;
    }
    return $vocab;
}

function printVocab($localwords)
{
    $strvocab = "";
    foreach ($localwords as $localword) {
        
        $vocab = getVocab($localword);
        $strvocab .= $vocab . " - ";
    }
    $strvocab = substr_replace($strvocab, " ", - 2); // removes the last -
    return $strvocab;
}

if ($hasDataset) {
    $datasetFolder = str_replace("10.23637/", "", $dsinfo["identifier"]);
    if ($dsinfo["datePublished"]) {
        $datePublication = $dsinfo["datePublished"];
    } else {
        $datePublication = "N/A";
    }
    
    if ($dsinfo["dateCreated"]) {
        $dateCreation = $dsinfo["dateCreated"];
    } else {
        $dateCreation = "N/A";
    }
    
    if ($dsinfo["dateModified"]) {
        $dateUpdate = $dsinfo["dateModified"];
    } else {
        $dateUpdate = "N/A";
    }
    if (is_array($dsinfo['distribution'])) {
        $distribution = "<ul>";
        foreach ($dsinfo['distribution'] as $n => $filedownloads) {
            
            $distribution .= "<li><a href=\"".$exptFolder."/".$datasetFolder."/".$filedownloads['URL']."\">".$filedownloads['name']."</a></li>";
                
            
        }
        $distribution .= "</ul>";
    }
    
    if (is_array($dsinfo['description'])) {
        $arrDescription = array();
        foreach ($dsinfo['description'] as $n => $description) {
            switch ($description['descriptionType']) {
                case "Abstract":
                    $arrDescription['Abstract'] = $description['description'];
                    break;
                case "Methods":
                    $arrDescription['Methods'] = $description['description'];
                    break;
                case "TechnicalInfo":
                    $arrDescription['TechnicalInfo'] = $description['description'];
                    break;
                case "TableOfContents":
                    $arrDescription['TableOfContents'] = $description['description'];
                    break;
                case "Provenance":
                    $arrDescription['Provenance'] = $description['description'];
                    break;
                case "Quality":
                    $arrDescription['Quality'] = $description['description'];
                    break;
                case "Other":
                    $arrDescription['Other'] = $description['description'];
                    break;
                default:
                    $arrDescription['Other'] = $description['description'];
            }
        }
    }
}

?>

<div id="idExpt">
	<div id="greenTitle"
		class="d-flex  mb-3 py-3 p3-3 bg-primary text-white mt-0 ">

		<h2 class="mx-3">Dataset:  <?php echo $dsinfo['name'];?></h1>
	
	</div>
	<div class="row mx-3">
		<div class="col-sm-4">
			<div class="card card-summary">
				<div class="card-body">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><b>DOI: </b><?php echo $dsinfo['identifier'];?>
						</li>
						<li class="list-group-item"><b>Experiment: </b> <a
							href="expt.php?expt=<?php echo $expt;?>"><?php echo $pageinfo['Experiment']; ?></a></li>
						<li class="list-group-item"><b>Files: </b> <?php echo $distribution; ?>
						<li class="list-group-item"><b>Version: </b> <?php echo $dsinfo['version']; ?></li>
						<li class="list-group-item"><b>Creation Date: </b> <?php echo $dateCreation; ?></li>
						<li class="list-group-item"><b>Publication Date: </b> <?php echo $datePublication; ?></li>
						<li class="list-group-item"><b>Last updated: </b> <?php echo $dateUpdate; ?></li>

						<li class="list-group-item"><b>Keywords: </b> 
						<?php
    $localwords = $dsinfo['keywords'];
    echo printVocab($localwords);
    
    ?></li>
						<li class="list-group-item"><b>Authors: </b> Margaret Glendining,
							Sarah Perryman</li>
						<li class="list-group-item"><b>Publisher: </b>Rothamsted Research</li>
					</ul>
				</div>

			</div>
		</div>
		<div class="col-sm-8">

			<p><?php echo $arrDescription['Abstract']; ?></p>
			<div id="accordion">
				<div class="card">
					<div class="card-header" id="Methods">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse"
								data-target="#collapseMethods" aria-expanded="false"
								aria-controls="collapseMethods">Methods</button>
						</h5>
					</div>
					<div id="collapseMethods" class="collapse"
						aria-labelledby="Methods" data-parent="#accordion">
						<div class="card-body"><?php echo $arrDescription['Methods']; ?></div>
					</div>
				</div>

				<div class="card">
					<div class="card-header" id="TOC">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse"
								data-target="#collapseTOC" aria-expanded="false"
								aria-controls="collapseTOC">Table of Content</button>
						</h5>
					</div>
					<div id="collapseTOC" class="collapse" aria-labelledby="TOC"
						data-parent="#accordion">
						<div class="card-body"><?php echo $arrDescription['TableOfContents']; ?></div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="Technical">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse"
								data-target="#collapseTechnical" aria-expanded="false"
								aria-controls="collapseTechnical">Technical Information</button>
						</h5>
					</div>
					<div id="collapseTechnical" class="collapse"
						aria-labelledby="Technical" data-parent="#accordion">
						<div class="card-body">
							<?php echo $arrDescription['TechnicalInfo']; ?>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="Provenance">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse"
								data-target="#collapseProvenance" aria-expanded="false"
								aria-controls="collapseProvenance">Provenance</button>
						</h5>
					</div>
					<div id="collapseProvenance" class="collapse"
						aria-labelledby="Provenance" data-parent="#accordion">
						<div class="card-body">
							<?php echo $arrDescription['Provenance']; ?>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="Quality">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse"
								data-target="#collapseQuality" aria-expanded="false"
								aria-controls="collapseQuality">Quality</button>
						</h5>
					</div>
					<div id="collapseQuality" class="collapse"
						aria-labelledby="Quality" data-parent="#accordion">
						<div class="card-body">
							<?php echo $arrDescription['Quality']; ?>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="Other">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse"
								data-target="#collapseOther" aria-expanded="false"
								aria-controls="collapseOther">Other</button>
						</h5>
					</div>
					<div id="collapseOther" class="collapse"
						aria-labelledby="Other" data-parent="#accordion">
						<div class="card-body">
							<?php echo $arrDescription['Other']; ?>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="Supporting">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse"
								data-target="#collapseSupporting" aria-expanded="false"
								aria-controls="collapseSupporting">Supporting Information</button>
						</h5>
					</div>
					<div id="collapseSupporting" class="collapse"
						aria-labelledby="Supporting" data-parent="#accordion">
						<div class="card-body">
							<?php echo "List of Supporting Documents"; ?>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="Access">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse"
								data-target="#collapseAccess" aria-expanded="false"
								aria-controls="collapseAccess">Access Use and Conditions</button>
						</h5>
					</div>
					<div id="collapseAccess" class="collapse" aria-labelledby="Access"
						data-parent="#accordion">
						<div class="card-body">
							<p>
								<a rel="license"
									href="http://creativecommons.org/licenses/by/4.0/" target="out"><img
									style="width: 50px;" alt="Creative Commons License"
									src="images/logos/cc4.png" align="middle" /></a> This work is
								licensed under a <a rel="license"
									href="http://creativecommons.org/licenses/by/4.0/">Creative
									Commons Attribution 4.0 International License</a>.
							</p>
							<p>
								<strong>YOU MUST CITE AS: </strong>Rothamsted Research (<?php echo $datePublication;?>).
								<?php echo $dsinfo['name'];?> <em>Electronic Rothamsted Archive</em>
								<a href="https://doi.org/<?php echo $dsinfo['identifier'];?>"><?php echo $dsinfo['identifier'];?></a>

							</p>
							<p>Rothamsted relies on the integrity of users to ensure that
								Rothamsted Research receives suitable acknowledgment as being
								the originators of these data. This enables us to monitor the
								use of each dataset and to demonstrate their value. Please send
								us a link to any publication that uses this Rothamsted data.</p>

						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-header" id="Related">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse"
								data-target="#collapseFive" aria-expanded="false"
								aria-controls="collapseFive">Related Information</button>
						</h5>
					</div>
					<div id="collapseFive" class="collapse" aria-labelledby="Related"
						data-parent="#accordion">
						<div class="card-body">
							<p>A list of related information, datasets or experiments.</p>

						</div>
					</div>
				</div>

			</div>

		</div>
	</div>