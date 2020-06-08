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

    $vocab = "";
    for ($i = 0; $i < count($words); $i ++) {
        if ($words[$i]['subject'] == $localword) {
            $hasKey = TRUE;
            $localScheme = $words[$i]['scheme'];
            $URI = $scheme[$localScheme];
            $vocab .= "<a href=\"" . $URI . $words[$i]['URI'] . "\" target = \"out\">" . $localword . "</a>";
        }
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

$relDatasets = 'List of Related Datasets';
$relDocuments = 'List of Related Documents';
if ($hasDataset) {
    $datasetFolder = $dsinfo["shortName"];
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
        foreach ($dsinfo['distribution'] as $filedownloads) {

            $distribution .= "<li>";
           # $distribution .="<a href=\"" . $exptFolder . "/" . $datasetFolder . "/" . $filedownloads['URL'] . "\">";
            $distribution .=  $filedownloads['name'] ;
           # $distribution .=  "</a>";
            $distribution .=  "</li>";
        }
        $distribution .= "</ul>";
    }

    if (is_array($dsinfo['relatedIdentifier'])) {
        $hasDatasets = 0;
        $hasDocuments = 0;
        $relDatasets = "				<div class=\"card\">
					<div class=\"card-header\" id=\"Related\">
						<h5 class=\"mb-0\">
							<button class=\"btn btn-link collapsed\" data-toggle=\"collapse\"
								data-target=\"#collapseFive\" aria-expanded=\"false\"
								aria-controls=\"collapseFive\">Related Datasets</button>
						</h5>
					</div>
					<div id=\"collapseFive\" class=\"collapse\" aria-labelledby=\"Related\"
						data-parent=\"#accordion\">
						<div class=\"card-body\">";

        $relDocuments = "<div class=\"card\">
					<div class=\"card-header\" id=\"Supporting\">
						<h5 class=\"mb-0\">
							<button class=\"btn btn-link collapsed\" data-toggle=\"collapse\"
								data-target=\"#collapseSupporting\" aria-expanded=\"false\"
								aria-controls=\"collapseSupporting\">Related Documents</button>
						</h5>
					</div>
					<div id=\"collapseSupporting\" class=\"collapse\"
						aria-labelledby=\"Supporting\" data-parent=\"#accordion\">
						<div class=\"card-body\">";

        foreach ($dsinfo['relatedIdentifier'] as $n => $ris) {
            if ($ris['relatedIdentifierGeneralType'] == "text") {

                $hasDocuments = 1;
                $relDocuments .= "<li>" . $ris['relationTypeValue'] . " : <a target = \_blank\" href=\"http://doi.org/" . $ris['relatedIdentifier'] . "\">" . $ris['relatedIdentifier'] . "</a> <sup><i class=\"fa fa-external-link\" aria-hidden=\"true\"></i></sup>: " . $ris['name'] . "</li>";
            } elseif ($ris['relatedIdentifierGeneralType'] == "Dataset") {
                $hasDatasets = 1;

                $relDatasets .= "<li>" . $ris['relationTypeValue'] . " :<a href=\"http://doi.org/" . $ris['relatedIdentifier'] . "\">" . $ris['relatedIdentifier'] . "</a>: " . $ris['name'] . "</li>";
            } else {}
        }
        $relDatasets .= "

						</div>
					</div>
				</div>";
        $relDocuments .= "</div>
					</div>
				</div>";
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
} else {}

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
				<button type="button" class="btn btn-primary" data-toggle="modal"
								data-target="#modalClickTrough">Download</button>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><b>DOI: </b><?php echo $dsinfo['identifier'];?>
						</li>
						<li class="list-group-item"><b>Experiment: </b> <a
							href="expt.php?expt=<?php echo $expt;?>#datasets"><?php echo $pageinfo['Experiment']; ?></a></li>
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
					<button type="button" class="btn btn-primary" data-toggle="modal"
								data-target="#modalClickTrough">Download</button>
				</div>

			</div>
		</div>
		<div class="col-sm-8">

			<p><?php echo $arrDescription['Abstract']; ?></p>
			<?php

if (isset($arrDescription['Methods'])) {
    ?>
			    <h2>Methods</h2>
			<p style="white-space: pre-wrap;"><?php echo $arrDescription['Methods']; ?></p>
			    <?php
}
if (isset($arrDescription['TableOfContents'])) {
    ?>
			    <h2>Table Of Contents</h2>
			<p style="white-space: pre-wrap;"><?php echo $arrDescription['TableOfContents']; ?></p>
			    <?php
}
if (isset($arrDescription['TechnicalInfo'])) {
    ?>
			    <h2>Technical Information</h2>
			<p style="white-space: pre-wrap;"><?php echo $arrDescription['TechnicalInfo']; ?></p>
			    <?php
}
if (isset($arrDescription['Provenance'])) {
    ?>
			    <h2>Provenance</h2>
			<p style="white-space: pre-wrap;"><?php echo $arrDescription['Provenance']; ?></p>
			    <?php
}
if (isset($arrDescription['Quality'])) {
    ?>
			    <h2>Quality</h2>
			<p style="white-space: pre-wrap;"><?php echo $arrDescription['Quality']; ?></p>
			    <?php
}
if (isset($arrDescription['Other'])) {
    ?>
			    <h2>Miscelleaneous Description</h2>
			<p style="white-space: pre-wrap;"><?php echo $arrDescription['Other']; ?></p>
			    <?php
}

?>
			<div id="accordion">

				
				<?php

    if ($hasDocuments == 1) {
        echo $relDocuments;
    }

    if ($hasDatasets == 1) {
        echo $relDatasets;
    }
    ?>

							
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
								<a rel="license" target="_blank"
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
								<a target="_blank"
									href="https://doi.org/<?php echo $dsinfo['identifier'];?>"><?php echo $dsinfo['identifier'];?></a>

							</p>
							<p>Rothamsted relies on the integrity of users to ensure that
								Rothamsted Research receives suitable acknowledgment as being
								the originators of these data. This enables us to monitor the
								use of each dataset and to demonstrate their value. Please send
								us a link to any publication that uses this Rothamsted data.</p>

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>





<!-- Modal -->
<div class="modal fade" id="modalClickTrough" tabindex="-1"
	role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
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
								<strong>YOU MUST CITE AS: </strong>Rothamsted Research (<?php echo $datePublication;?>).
								<?php echo $dsinfo['name'];?> <em>Electronic Rothamsted Archive</em>
								<a target="_blank"
									href="https://doi.org/<?php echo $dsinfo['identifier'];?>"><?php echo $dsinfo['identifier'];?></a>

							</p>
							<p>Rothamsted relies on the integrity of users to ensure that
								Rothamsted Research receives suitable acknowledgment as being
								the originators of these data. This enables us to monitor the
								use of each dataset and to demonstrate their value. </p>
								
							<p>If you have not done so, please <a href="https://forms.office.com/Pages/ResponsePage.aspx?id=JTaItkGJQkOw43uMyDkvZDZRGOUcKblFt0gV54i_OxNUN1pJR1Q4QVVBT1JZWkZGWldSS0FTUDQxSSQlQCN0PWcu" >fill in this  form</a> and if possible, inform us of  any publication that uses this Rothamsted data.</p>

				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a type="button" download class="btn btn-primary" href="testZip.zip">Agree and Download</a>
			</div>
		</div>
	</div>
</div>