<?php
/**
 * @file dataset.php
 * @brief Dataset page
 *
 * This is a page: so it includes modules: here the _dataset.php module
 *
 * @author Nathalie Castells-Brooke
 * @date 9/27/2018
 * 
 * TODO: add contributors
 */
include_once 'includes/init.inc'; // these are the settings that refer to more than one page

$pageinfo = getPageInfo($expt);
$KeyRef = $pageinfo['KeyRef'];
$exptFolder = 'metadata/' . $expt;
$page_title .= ' dataset: ' . $dataset;
$datasetParts = explode("-", $dataset);
$pageinfo = getPageInfo($expt);
$KeyRef = $pageinfo['KeyRef'];
$exptFolder = 'metadata/' . $expt;

$fileDataset = $exptFolder . '/' . $datasetParts[1] . '/' . $dataset . '.json';

$hasDataset = file_exists($fileDataset);
if ($hasDataset) {
    $jdataset = file_get_contents($fileDataset);
    $jdataset8 = utf8_encode($jdataset);
    $dsinfo = json_decode($jdataset8, true);
}
$page_description = $dsinfo['description'][0]['description'];

if (isset($_SESSION['visitedPages'])) {
    $_SESSION['visitedPages'][] = array(
        "dataset" => $dataset,
        "expt" => $expt
    );
} else {
    $_SESSION['visitedPages'] = array();
    $_SESSION['visitedPages'][] = array(
        "dataset" => $dataset,
        "expt" => $expt
    );
}
$_SESSION['page'] = 'dataset/' . $expt . '/' . $dataset;
$_SESSION['dataset'] = $dataset;
$_SESSION['expt'] = $expt;

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

    $DOI = $dsinfo["identifier"];
    // this decide what modal we give depending on the type of dataset: the OA at the moment, does not record the download.

    $dstype = $dsinfo["dstype"];
    $dstypeStr = "<a href=\"info.php?FileName=howtoaccessdata#OA\" \" target=\"out\">Open</a>";
    if ($dsinfo["dstype"] != 'OA') {
        $dstypeStr = "<a href=\"info.php?FileName=howtoaccessdata#Other\" \" target=\"out\">Registration</a>";
    }

    $modal = "#modalClickTrough" . $dstype;
    $butDownload = "<button type=\"button\" class=\"btn btn-primary my-1 mx-3\" data-toggle=\"modal\"
    data-target=\"" . $modal . "\">Download</button>";

    $butLogin = "<button type=\"button\" class=\"btn btn-info my-1 mx-3 \" data-toggle=\"modal\"
        data-target=\"#modalLogin\">" . $registeredUser . "</button>";

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
    $hasCT = 0;
    $getPublisher = "";
    $isAuthor = 0;
    $refAuthor = "DEFAULT";
    if (is_array($dsinfo['creator'])) {
        foreach ($dsinfo['creator'] as $creator) {
            if ($creator['type'] == 'organization') {
                $getAuthorOrganisation .= $creator['name'] . ", ";
            }
            if ($creator['type'] == 'Person') {
                $getAuthors .= $creator['Name'] . ", ";
                $isAuthor = 1;
            }
        }
    }

    if (is_array($dsinfo['contributor'])) {
        $tblContributors = "     \n   <h3>Contributors</h3><ul>";
        foreach ($dsinfo['contributor'] as $contributor) {
            $hasCT = 1;
            if ($contributor['type'] == 'Person') {
                $getContributors .= $contributor['name'] . ", ";
                $strRole = preg_replace('/([a-z])([A-Z])/', '${1} ${2}', $contributor['jobTitle']);
                $strRole = strtolower($strRole);
                $strRole = ucfirst($strRole);
                $tblContributors .= "\n\t<li><b>" . $contributor['name'] . ": </b> " . $strRole."</li>";
            }
        }
        $tblContributors .= "</ul>";
    }

    $getAuthorOrganisation = rtrim($getAuthorOrganisation, ', ');
    $getAuthors = rtrim($getAuthors, ', ');
    $getContributors = rtrim($getContributors, ', ');

    if (is_array($dsinfo['publisher'])) {
        $getPublisher = $dsinfo['publisher']['name'];
    }

    $refAuthor = $getAuthorOrganisation;
    if ($isAuthor > 0) {
        $refAuthor = $getAuthors;
    } else {}

    /*
     * if ($datePublication != "N/A") {$year = '('.substr($datePublication, 0, 4).')';}
     * elseif ($dateCreation != "N/A") {$year = '('.substr($dateCreation, 0, 4).')';}
     * else {$year = "";}
     */

    $year = "" . $dsinfo["publication_year"];

    if (is_array($dsinfo['distribution'])) {
        $zipfile = $exptFolder . "/" . $datasetFolder . "/" . $dataset . ".zip";

        if (file_exists($zipfile)) {
            $distribution = "<ul>";
            foreach ($dsinfo['distribution'] as $filedownloads) {

                $distribution .= "<li>";
                // $distribution .="<a href=\"" . $exptFolder . "/" . $datasetFolder . "/" . $filedownloads['URL'] . "\">";
                $distribution .= $filedownloads['name'] . " (" . $filedownloads['encodingFormat'] . ")";
                // $distribution .= "</a>";
                $distribution .= "</li>";
            }
            $distribution .= "</ul>";
        } else {
            $strDownload = "";
            $distribution = "In preparation";
        }
    }

    if (is_array($dsinfo['image'])) {

        $illustration = "";
        foreach ($dsinfo['image'] as $imgsrc) {

            $illustration .= "<img src=\"";
            // $distribution .="<a href=\"" . $exptFolder . "/" . $datasetFolder . "/" . $filedownloads['URL'] . "\">";
            $illustration .= $exptFolder . "/" . $datasetFolder . "/" . $imgsrc['URL'] . " \" class=\"img-fluid\" alt=\"" . $imgsrc['Caption'] . "\">";
            // $distribution .= "</a>";
        }
    }

    if (is_array($dsinfo['relatedIdentifier'])) {
        $hasDatasets = 0;
        $hasDocuments = 0;
        $hasPVersion = 0;
        $hasNVersion = 0;
        $relDatasets_prev = "				<div class=\"card\">
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

        $relDatasets = "				<h3>Related Datasets</h3> <ul>";
        $prevVersions = "				<h3>Previous Versions</h3> <ul>";
        $newVersions = "				<h3>Newer Versions</h3> <ul>";
        $newVersionShort ="<ul>";
        $relDocuments_prev = "\n<div class=\"card\">
					\n<div class=\"card-header\" id=\"Supporting\">
						\n\t<h5 class=\"mb-0\">
						\n\t	<button class=\"btn btn-link collapsed\" data-toggle=\"collapse\"
								data-target=\"#collapseSupporting\" aria-expanded=\"false\"
								aria-controls=\"collapseSupporting\">Related Documents</button>
						\n\t</h5>
					\n\t</div>
				\n\t<div id=\"collapseSupporting\" class=\"collapse\"
						aria-labelledby=\"Supporting\" data-parent=\"#accordion\">
						\n\t<div class=\"card-body\">";

        $relDocuments = "\n<h3>Related Documents</h3> <ul>";

        foreach ($dsinfo['relatedIdentifier'] as $n => $ris) {
            switch ($ris['relatedIdentifierType']) {
                case "DOI":
                    $urlPrefix = "https://doi.org/";
                    break;
                case "URL":
                    $urlPrefix = "";
                    break;
                    break;
                case "PURL":
                    $urlPrefix = "";
                    break;
                case "ISBN":
                    $ris['relatedIdentifier'] = str_replace("-", "", $ris['relatedIdentifier']);
                    $urlPrefix = "https://isbnsearch.org/isbn/";
                    break;
            }
            if ($ris['relatedIdentifierGeneralType'] == "Text") {

                $hasDocuments = 1;

                $relDocuments .= "<li>  <a target = \"_blank\" href=\"" . $urlPrefix . $ris['relatedIdentifier'] . "\">  " . $ris['name'] . "</a> <sup><i class=\"fa fa-external-link\" aria-hidden=\"true\"></i></sup>: </li>";
            } elseif ($ris['relatedIdentifierGeneralType'] == "Dataset") {

                if ($ris['rt_id'] == 13) {
                    $hasPVersion = 1;
                    $prevVersions       .= "\n<li> " . $ris['relationTypeValue'] . ": <a  href=\"" . $urlPrefix . $ris['relatedIdentifier'] . "\">  " . $ris['name'] . "</a></li>";
                } elseif ($ris['rt_id'] == 14) {
                    $hasNVersion = 1;
                    $newVersions        .= "\n<li>  <a  href=\"" . $urlPrefix . $ris['relatedIdentifier'] . "\">  " . $ris['name'] . "</a></li>";
                    $newVersionShort    .= "\n<li><a  href=\"" . $urlPrefix . $ris['relatedIdentifier'] . "\">  " . $ris['name'] . "</a></li>";
                } else {
                    $hasDatasets = 1;

                    $relDatasets        .= "\n<li>  <a  href=\"" . $urlPrefix . $ris['relatedIdentifier'] . "\">  " . $ris['name'] . "</a></li>";
                }
            } else {}
        }
        $relDatasets        .= "\n</ul>";
        $relDocuments       .= "\n</ul>";
        $otherVersions      .= "\n</ul>";
        $prevVersions       .= "\n</ul>";
        $newVersions        .= "\n</ul>";
        $newVersionShort    .= "\n</ul>";
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
    /*
     * we check that the is downloading a file.
     * From the environment: we have everything we need about the file being downloaded and also the username of the user
     * On donload:
     * 1: make a SQL that writed in the usermanagment table that the user is downloading that dataset at that time
     */
    $strUserArea = "";
    $today = date('Y/m/d');
    $link = LogMangaAd();
    if ($registeredUser != "Login/Register") {
        $positionValue = $_COOKIE['email'];
        $sqlLast = "SELECT `dl-id`, `position`, DOI, `dl-date`, `result` FROM eRAmanga.eRAdownloads where DOI LIKE '%" . $DOI . "%' and  `position` LIKE '%" . $_COOKIE['email'] . "%' order by `dl-date` DESC LIMIT 1";

        if ($results = mysqli_query($link, $sqlLast)) {
            while ($row = mysqli_fetch_assoc($results)) {
                $strUserArea .= "<li class=\"list-group-item text-warning \"><b>Last Downloaded : </b>" . $row['dl-date'] . "</li>";
            }
        }
        if (count($results) == 0) {
            $strUserArea .= "<li>Never Downloaded</li>";
        }
    } else {
        $strUserArea = "";
        $positionValue = getIp();
    }

    if (isset($_REQUEST['dlform'])) {

        // Check the file exists or not
        $strMeta = "";
        if (file_exists($zipfile)) {

            $sqlDownload = "INSERT INTO eRAdownloads (`position`, DOI, `dl-date`) VALUES(' " . $positionValue . "', '" . $DOI . "', '" . $today . "')";

            if ($results = mysqli_query($link, $sqlDownload)) {

                $strUserArea .= "<li class=\"list-group-item text-info \">Downloaded today</li>";
            }

            $strMeta .= " <meta
             http-equiv=\"refresh\"
                 content=\"1; URL=/eRA/era2018-new/" . $zipfile . "\">";
        } else {
            $sqlError = "INSERT INTO eRAdownloads (`position`, DOI, `dl-date`,`result`) VALUES(' " . $positionValue . "', '" . $DOI . "', '" . $today . "', 'NO FILE')";
            if ($results = mysqli_query($link, $sqlError)) {

                $strUserArea .= "<li>File Not Found - Team notified </li>";
            }
        }
    }
    $strUserArea .= "";
    mysqli_close($link);

    if (file_exists($zipfile)) {
        if ($dstype == 'OA') {
            // $strUserArea = "";
            $strDownload = $butDownload;
        } else {
            if ($loggedIn == 'yes' && $email != 'delete') {

                $strDownload = $butDownload;
            } else {

                $strDownload = $butLogin;
            }
        }
    } else {
        $strDownload = "";
    }
} else {}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>  
        <?php
        echo $strMeta;
        include 'includes/meta.html'; // that is the <meta and link tags> superseeds head.html
                                      // that is the <head tags>

        $script = ''; // $script is added to the header as the
        if (isset($jdataset8)) {
            $script = "<script type=\"application/ld+json\">" . $jdataset8 . "</script>";
            echo $script;
        }
        ?>
    </head>

<body>
	<div class="container bg-white px-0">
    
    <?php

    include 'includes/header.html'; // all the menus at the top

    // -- start dependent content ---------------------------------------------------------

    include '_dataset.php';

    // -- start footers -----------------------------

    include_once 'includes/footer.html';
    include_once 'includes/finish.inc';

    ?>
     
    	</div>

</body>

</html>

