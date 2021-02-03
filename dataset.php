<?php 
/**
 * @file dataset.php
 * @brief Dataset page
 *
 * This is a page: so it includes modules: here the _dataset.php module
 *
 * @author Nathalie Castells-Brooke
 * @date 9/27/2018
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

$fileDataset = $exptFolder . '/' . $datasetParts[1] .'/' . $dataset .'.json';

$hasDataset = file_exists($fileDataset);
if ($hasDataset) {
    $jdataset = file_get_contents($fileDataset);
    $jdataset8 = utf8_encode($jdataset);
    $dsinfo = json_decode($jdataset8, true);
}
$page_description = $dsinfo['description'][0]['description'];



if (isset($_SESSION['visitedPages']))
{
    $_SESSION['visitedPages'][] = array(
        "dataset"   =>      $dataset,
        "expt"      =>      $expt
    );
}
else { 
    $_SESSION['visitedPages'] = array();
    $_SESSION['visitedPages'][] = array(
    "dataset"   =>      $dataset,
    "expt"      =>      $expt
);
    
}
$_SESSION['page'] = 'dataset/'.$expt.'/'.$dataset;
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
    $dstype = $dsinfo["dstype"];
    $modal = "#modalClickTrough" . $dstype;
    $DOI = $dsinfo["identifier"];
    $butDownload = "<button type=\"button\" class=\"btn btn-primary my-3\" data-toggle=\"modal\"
    data-target=\"" . $modal . "\">Download</button>";
    
    $butLogin = "<button type=\"button\" class=\"btn btn-info my-3\" data-toggle=\"modal\"
        data-target=\"#modalLogin\">" . $registeredUser . "</button>";
    $butLoginprev = "<a class=\"btn btn-info mx-1\"
				href=\"register.php\"> <i class=\"fa fa-user\"></i> Login to download dataset
			</a>";
    
    if ($dstype == 'OA') {
        $strDownload = $butDownload;
    } else {
        if ($loggedIn == 'yes' && $email != 'delete') {
            
            $strDownload = $butDownload;
        } else {
            
            $strDownload = $butLogin;
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
        foreach ($dsinfo['contributor'] as $contributor) {
            
            if ($contributor['type'] == 'Person') {
                $getContributors .= $contributor['name'] . ", ";
            }
        }
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
        $distribution = "<ul>";
        foreach ($dsinfo['distribution'] as $filedownloads) {
            
            $distribution .= "<li>";
            // $distribution .="<a href=\"" . $exptFolder . "/" . $datasetFolder . "/" . $filedownloads['URL'] . "\">";
            $distribution .= $filedownloads['name'] . " (" . $filedownloads['encodingFormat'] . ")";
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
            $illustration .= $exptFolder . "/" . $datasetFolder . "/" . $imgsrc['URL'] . " \" class=\"img-fluid\" alt=\"" . $imgsrc['Caption'] . "\">";
            // $distribution .= "</a>";
        }
    }
    
    if (is_array($dsinfo['relatedIdentifier'])) {
        $hasDatasets = 0;
        $hasDocuments = 0;
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
        
        $relDocuments_prev = "<div class=\"card\">
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
        
        $relDocuments = "<h3>Related Documents</h3> <ul>";
        
        foreach ($dsinfo['relatedIdentifier'] as $n => $ris) {
            if ($ris['relatedIdentifierGeneralType'] == "text") {
                
                $hasDocuments = 1;
                $relDocuments .= "<li>  <a target = \_blank\" href=\"https://doi.org/" . $ris['relatedIdentifier'] . "\">  " . $ris['name'] . "</a> <sup><i class=\"fa fa-external-link\" aria-hidden=\"true\"></i></sup>: </li>";
            } elseif ($ris['relatedIdentifierGeneralType'] == "Dataset") {
                $hasDatasets = 1;
                
                $relDatasets .= "<li>  <a  href=\"https://doi.org/" . $ris['relatedIdentifier'] . "\">  " . $ris['name'] . "</a></li>";
            } else {}
        }
        $relDatasets .= "</ul>";
        $relDocuments .= "</ul>";
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
    $strUserArea = "<div class=\"card card-summary \">
				<div class=\"card-body\"><h3>My eRA Downloads</h3><ul>";
    if (isset($_REQUEST['dlform'])) {
        
        $strUserArea .= "received values REQUEST <br />";
        $today = date('Y/m/d');
        $link = LogMangaAd();
        $sqlDownload = "INSERT INTO eRAdownloads (`position`, DOI, `dl-date`) VALUES(' " . $_COOKIE['email'] . "', '" . $DOI . "', '" . $today . "')";
        
        $strUserArea .= $sqlDownload."<br />";
        if ($results = mysqli_query($link, $sqlDownload))
        {
            $strUserArea .= "Inserted 1 row <br /> trying to save file";
        }
        mysqli_close($link);
               //Check the file exists or not
         if(file_exists($zipfile)) {
             
             $strUserArea .= '<script>window.open(\''.$zipfile.'\');</script>';
         }
            
//             //Define header information
//             header('Content-Description: File Transfer');
//             header('Content-Type: application/octet-stream');
//             header("Cache-Control: no-cache, must-revalidate");
//             header("Expires: 0");
//             header('Content-Disposition: attachment; filename="'.basename($zipfile).'"');
//             header('Content-Length: ' . filesize($zipfile));
//             header('Pragma: public');
            
//             //Clear system output buffer
//             flush();
            
//             //Read the size of the file
//             readfile($zipfile);
            
//             //Terminate from the script
//             die();
//         }
    }
    $strUserArea .= "</ul></div></div>";
    
} else {}

?>

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>  
        <?php
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
    
    <?php include 'includes/header.html';   // all the menus at the top 
    
    //--  start dependent content ---------------------------------------------------------
   
    include '_dataset.php';
    

    	
    //-- start footers  -----------------------------
    
    include_once 'includes/footer.html';
    include_once 'includes/finish.inc';
    
    ?>
     
    	</div>
    </body>
    
</html>
    
