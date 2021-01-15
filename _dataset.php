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
    $dstype = $dsinfo["dstype"];
    $modal = "#modalClickTrough".$dstype;

    $butDownload = "<button type=\"button\" class=\"btn btn-primary my-3\" data-toggle=\"modal\"
    data-target=\"". $modal."\">Download</button>";
    
    $butLogin = "<button type=\"button\" class=\"btn btn-info my-3\" data-toggle=\"modal\"
        data-target=\"#modalLogin\">". $registeredUser."</button>";
    $butLoginprev = "<a class=\"btn btn-info mx-1\"
				href=\"register.php\"> <i class=\"fa fa-user\"></i> Login to download dataset
			</a>";
    
    if ($dstype == 'OA') {
        $strDownload =  $butDownload;
        
    } else 
    {
        if ($loggedIn == 'yes' && $email != 'delete') {
            
            $strDownload =  $butDownload;                    
            
        } else {
            
            $strDownload=  $butLogin;
            
        }
    }
    
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
    
    $getAuthors = ""; 
    $getAuthorOrganisation = "";
    $getContributors = "";
    $getPublisher = "";
    $isAuthor = 0;
    $refAuthor = "DEFAULT";
    if (is_array($dsinfo['creator'])) {
        foreach ($dsinfo['creator'] as $creator) {
            if ( $creator['type'] == 'organization' ) {
                $getAuthorOrganisation .= $creator['name'].", ";
                
            }
            if ( $creator['type'] == 'Person' ) {
                $getAuthors .= $creator['Name'].", ";
                $isAuthor = 1;
            }
        }
    }
    

    if (is_array($dsinfo['contributor'])) {
        foreach ($dsinfo['contributor'] as $contributor) {

            if ( $contributor['type'] == 'Person' ) {
                $getContributors .= $contributor['name'].", ";
                
            }
        }
    }
    $getAuthorOrganisation = rtrim ($getAuthorOrganisation, ', ');
    $getAuthors = rtrim ($getAuthors, ', ');
    $getContributors = rtrim ($getContributors, ', ');
    
    if (is_array($dsinfo['publisher'])) {
        $getPublisher = $dsinfo['publisher']['name'];
    }
    
    $refAuthor = $getAuthorOrganisation;
    if ($isAuthor >0) {
        $refAuthor = $getAuthors ;
    } else  { }
    
    
    
  /*   if ($datePublication != "N/A")   {$year = '('.substr($datePublication, 0, 4).')';}
    elseif ($dateCreation != "N/A")  {$year = '('.substr($dateCreation,    0, 4).')';}
    else                             {$year = "";} */
    
    $year = "".$dsinfo["publication_year"];
    
    if (is_array($dsinfo['distribution'])) {
        $zipfile = $exptFolder . "/" . $datasetFolder . "/" . $dataset . ".zip";
        $distribution = "<ul>";
        foreach ($dsinfo['distribution'] as $filedownloads) {

            $distribution .= "<li>";
            // $distribution .="<a href=\"" . $exptFolder . "/" . $datasetFolder . "/" . $filedownloads['URL'] . "\">";
            $distribution .= $filedownloads['name'] . " (".$filedownloads['encodingFormat'].")";
            // $distribution .= "</a>";
            $distribution .= "</li>";
        }
        $distribution .= "</ul>";
    }
    
    if (is_array($dsinfo['image'])) {
        
        $illustration = "";
        foreach ($dsinfo['image'] as $imgsrc) {
            
            $illustration .= "<img src=\"";
            // $distribution .="<a href=\"" . $exptFolder . "/" . $datasetFolder . "/" . $filedownloads['URL'] . "\">";
            $illustration .=  $exptFolder . "/" . $datasetFolder . "/" .$imgsrc['URL'] . " \" class=\"img-fluid\" alt=\"".$imgsrc['Caption']."\">";
            // $distribution .= "</a>";
            
        }
      
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
                $relDocuments .= "<li>" . $ris['relationTypeValue'] . " : <a target = \_blank\" href=\"https://doi.org/" . $ris['relatedIdentifier'] . "\">" . $ris['relatedIdentifier'] . "</a> <sup><i class=\"fa fa-external-link\" aria-hidden=\"true\"></i></sup>: " . $ris['name'] . "</li>";
            } elseif ($ris['relatedIdentifierGeneralType'] == "Dataset") {
                $hasDatasets = 1;

                $relDatasets .= "<li>" . $ris['relationTypeValue'] . " :<a href=\"https://doi.org/" . $ris['relatedIdentifier'] . "\">" . $ris['relatedIdentifier'] . "</a>: " . $ris['name'] . "</li>";
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
				 
					<?php echo    $strDownload;?>
					<ul class="list-group list-group-flush ">
						<li class="list-group-item"><b>DOI: </b><?php echo $dsinfo['identifier'];?>
						</li>
						<li class="list-group-item"><b>Experiment: </b> <a
							href="experiment/<?php echo $expt;?>#datasets"><?php echo $pageinfo['Experiment']; ?></a></li>
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
						<li class="list-group-item"><b>Author(s): </b> <?php echo $refAuthor; ?></li>
						<li class="list-group-item"><b>Contributors: </b> <?php echo $getContributors; ?></li>
						<li class="list-group-item"><b>Publisher: </b><?php echo $getPublisher; ?></li>
					</ul>
					<?php echo    $strDownload;?>
				</div>

			</div>
		</div>
		<div class="col-sm-8">
 <h3>Summary</h3>
			<p><?php echo $arrDescription['Abstract']; ?></p>
			<?php
			echo         $illustration;
if (isset($arrDescription['Methods'])) {
    ?>
			    <h3>Methods</h3>
			<p style="white-space: pre-wrap; " ><?php echo $arrDescription['Methods']; ?></p>
			    <?php
}

if (isset($arrDescription['TableOfContents'])) {
    ?>
			    <h3>Table Of Contents</h3>
			<p style="white-space: pre-wrap;"><?php echo $arrDescription['TableOfContents']; ?></p>
			    <?php
}
if (isset($arrDescription['TechnicalInfo'])) {
    ?>
			    <h3>Technical Information</h3>
			<p style="white-space: pre-wrap;"><?php echo $arrDescription['TechnicalInfo']; ?></p>
			    <?php
}
if (isset($arrDescription['Provenance'])) {
    ?>
			    <h3>Provenance</h3>
			<p style="white-space: pre-wrap;"><?php echo $arrDescription['Provenance']; ?></p>
			    <?php
}
if (isset($arrDescription['Quality'])) {
    ?>
			    <h3>Quality</h3>
			<p style="white-space: pre-wrap;"><?php echo $arrDescription['Quality']; ?></p>
			    <?php
}
if (isset($arrDescription['Other'])) {
    ?>
			    <h3>Extra</h3>
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
									The e-RA Database, is part of the <a target="_blank"
									href="https://www.rothamsted.ac.uk/national-capabilities">
										National Capabilities </a>, which also includes the <a
									href="https://www.rothamsted.ac.uk/long-term-experiments">Long-Term
										Experiment</a> , the <a target="_blank"
									href="https://www.rothamsted.ac.uk/sample-archive">Sample
										Archive</a> and the <a
									href="https://www.rothamsted.ac.uk/environmental-change-network">Environmental
										Change Network</a>.
								</li>
								<li class="list-group-item ">The Rothamsted Long-term
									Experiments National Capability is supported by the Lawes
									Agricultural Trust and the Biotechnology and Biological
									Sciences Research Council (Grants <a target="_blank"
									href="https://gtr.ukri.org/projects?ref=BBS%2FE%2FC%2F00005189">BBS/E/C/00005189</a>)
									(2012-2017) and <a target="_blank"
									href="https://gtr.ukri.org/project/40CC213B-6923-433A-89AD-789CC3E8E1F5">BBS/E/C/000J0300</a>
									) (2017-2022)).
								</li>

							</ul>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="Access">
						<h5 class="mb-0">
							<button class="btn btn-link collapsed" data-toggle="collapse"
								data-target="#collapseAccess" aria-expanded="false"
								aria-controls="collapseAccess">Dataset Access and Conditions</button>
						</h5>
					</div>
					<div id="collapseAccess" class="collapse" aria-labelledby="Access"
						data-parent="#accordion">
						<div class="card-body">
							<h5>Rights Holder</h5>
							<p>Rothamsted Research</p>

							<h5>License</h5>
							<p>
								<a rel="license" target="_blank"
									href="http://creativecommons.org/licenses/by/4.0/" target="out"><img
									style="width: 50px;" alt="Creative Commons License"
									src="images/logos/cc4.png" align="middle" /></a> This dataset
								is available under a <a rel="license"
									href="http://creativecommons.org/licenses/by/4.0/">Creative
									Commons Attribution Licence (4.0)</a>.
							</p>
							<h5>Cite this Dataset</h5>
							<p>
								<strong>YOU MUST CITE AS: </strong><?php echo $refAuthor; ?> (<?php echo $year;?>).
								<?php echo $dsinfo['name'];?> <em><?php echo $getPublisher; ?></em>
								<a target="_blank"
									href="https://doi.org/<?php echo $dsinfo['identifier'];?>"><?php echo $dsinfo['identifier'];?></a>
								<p>Please review our <a href="info.php?FileName=howtocredit">How to Credit Datasets</a> guidance for more information.
							</p>
							<h5>Conditions of Use</h5>
						
							<p>Rothamsted relies on the integrity of users to ensure that datasets 
							are used appropriately and Rothamsted Research receives suitable acknowledgment as being
								the originators of these data. Please review the <a href="info.php?FileName=conditions">Conditions of Use</a> before downloading.</p>

						</div>
					</div>
				</div>
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
				<h5 class="modal-title" id="exampleModalLongTitle">OA End User Agreement</h5>
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

				<p>
					If you have not done so, please <a
						href="https://forms.office.com/Pages/ResponsePage.aspx?id=JTaItkGJQkOw43uMyDkvZDZRGOUcKblFt0gV54i_OxNUMTVYSEZKU0NDRENRSElCNVRCMjdSV0dRMSQlQCN0PWcu">fill
						in this form</a> and if possible, inform us of any publication
					that uses this Rothamsted data.
				</p>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a type="button" download class="btn btn-primary"
					href="<?php echo $zipfile; ?>">Agree and Download</a>
			</div>
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
				<h5 class="modal-title" id="exampleModalLongTitle">Other End User Agreement</h5>
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>
					The package you are downloading contains all the information you will need to use the dataset, including information on how to properly quote it in all publication 
					
					</p>



			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a type="button" download class="btn btn-primary" 
					href="<?php echo $zipfile; ?>">Agree and Download</a>
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
				<h5 class="modal-title" id="exampleModalLongTitle">N/A End User Agreement</h5>
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

				<p>
					If you have not done so, please <a
						href="https://forms.office.com/Pages/ResponsePage.aspx?id=JTaItkGJQkOw43uMyDkvZDZRGOUcKblFt0gV54i_OxNUMTVYSEZKU0NDRENRSElCNVRCMjdSV0dRMSQlQCN0PWcu">fill
						in this form</a> and if possible, inform us of any publication
					that uses this Rothamsted data.
				</p>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<a type="button" download class="btn btn-primary"
					href="<?php echo $zipfile; ?>">Agree and Download</a>
			</div>
		</div>
	</div>
</div>