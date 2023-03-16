<?php

/**
 * @file _design.php
 * @brief module that display the design of an experiment.
 * *Lists design for an experiment. This module is very simple and therefore could be dropped in favor of just using the function it calls. 
 * This module is for use in the expt page. It needs information contained in the data-description file.
 * @author Nathalie Castells-Brooke
 * @date 9/27/2018
 */
Global $arrInfofiles;
GLOBAL $displayValue;

/*These selection criteria is different on the live site as we add 
'isReviewed'=> '1',
*/
$pairs = array(
    'exptID' => $expt,
    'isInfo'=> '1',  
    //'isReviewed'=> '1',
    'Type' => 'html'
);

$arrFilteredfiles = multiSearch($arrInfofiles, $pairs);

//obtain a list of columns
$caption  = array_column($arrFilteredfiles, 'Caption');
$order= array_column($arrFilteredfiles, 'order');

// Sort the data with orientation descending, caption ascending
// Add $images as the last parameter, to sort by the common key
array_multisort($order, SORT_DESC, $caption, SORT_ASC, $arrFilteredfiles);






$strTab = "<div class=\"row\">";
$strTab .= "\n\t  <div class=\"col-12\">";
//$strTab .= "\n\t \t   <h2 class=\"mx-3\">Additional Information</h2>";
$strTab .= "\n\t  </div>";
$strTab .= "\n \t <div class=\"col-12 mx-auto\"> ";
$strTab .= "\n \t\t    <div class=\"mt-3 mx-3\" id=\"accordionDesign\"> \n";
$i = 0;
$tabID = 0;
/*"2": {
        "id": "2",
        "Credit": "eRA curators",
        "FileName": "measurements",
        "Type": "html",
        "Caption": "bms measurements",
        "exptID": "bms",
        "link": "http://local-info.rothamsted.ac.uk/eRA/era2018-new/info/bms/measurements",
        "isReviewed": "1",
        "Comments": ""
    },
*/  
foreach ($arrFilteredfiles as $file) {
    $tabID = $tabID +1;
    $needsReview = '';
    if ($file['isReviewed'] == '0') {
        $needsReview = $checkThisOne;
    }
    $Title = $file['Caption'];
    $Description = $file['Description'];
    $isReviewed = $file['isReviewed'];
    $contentFile = 'metadata/'.$file['exptID'].'/'.$file['FileName'].'.'.$file['Type'];
    if ($i != 0) {
        $active = "";
        $collapse = " show ";
        $expanded = "true";
    } else {
        $active = " in";
        $collapse = "  ";
        $expanded = "false";
    }

    //$tabID = str_replace(' ', '', $Title);
    //$tabID = str_replace(':', '', $tabID);
    //$tabID = str_replace('-', '', $tabID);
    $ref = "";
    $ref .= $file['KeyRefs'];
    $papers = "NONE";
    if ($ref != "") {      
        $papers = GetKeyRefs($ref);                
    }

    //Here we want to check that the file is fully reviewed and the content is here before we write the list

    $strTab .= "\n\t<div class=\"card  bg-light\">";
    $strTab .= "\n\t\t<div class=\"card-header \" id=\"heading" . $tabID . "\">";

    $strTab .= "\n\t\t<h2 class=\"mb-0\">";
    $strTab .= "\n\t\t\t<button class=\"btn btn-link\"  data-toggle=\"collapse\" data-target=\"#collapse" . $tabID . "\" aria-expanded=\"" . $expanded . "\" aria-controls=\"" . $tabID . "\">";
    $strTab .= "\n\t\t\t\t	" . $Title. $needsReview;
    $strTab .= "\n\t\t\t						</button>";
    $strTab .= "\n\t\t\t						</h2>";
    $strTab .= "\n\t\t\t<p><i>".$Description."</i></p>						";
    $strTab .= "\n\t</div>";
    $strTab .= "\n\t<div id=\"collapse" . $tabID . "\" class=\"collapse " . $collapse . " fade bg-light\" aria-labelledby=\"heading" . $tabID . "\" data-parent=\"#accordionDesign\">";
    $strTab .= "\n\t<div class=\"card-body\">" ;


    $hascontentFile = file_exists($contentFile);
    if ($hascontentFile) {
        
        $content = file_get_contents($contentFile);
        //$content = " - GOTIT ";
    } else {$content = " - NOT ";}
    if ($displayValue == 0) {
    $strTab .= "<div class=\"d-flex justify-content-between bg-warning text-white p-3 \"> <h2>To edit this page go to <u>". $contentFile. "</u></h2></div>";
    }
    $strTab .= "<a href=\"info/".$file['exptID']."/".$file['FileName']."\" target=\"_BLANK\"><b>Open in other tab</b></a>";
    
    //$strTab .= $contentFile;
    $strTab .=  $content ;

    if (substr($papers, 0, 4) != "NONE") {
            
        $strTab .=  "<h3>Key References</h3> \n\t\t
                <div class=\"mx-3\">".$papers."\n\t</div>";

    } 
    $strTab .= "<button class=\"btn btn-link fa-solid fa-xmark\"  data-toggle=\"collapse\" data-target=\"#collapse" . $tabID . "\" aria-expanded=\"" . $expanded . "\" aria-controls=\"" . $tabID . "\">";
    $strTab .= "\n\t\t\t\t	<b>Close Page</b>";
    $strTab .= "\n\t\t\t						</button>";
    $strTab .= "</div>";
    $strTab .= "\n\t</div>";
    $strTab .= "\n\t</div>";
}
$strTab .= "\n\t\t</div>";
$strTab .= "\n\t</div>";
$strTab .= "\n</div>";

echo $strTab;

/* TODO: include the reference of the file. The keyref needs to be in the infofile. I can get that from the doclist
if (isset($ref)) {
        
        $papers = GetKeyRefs($ref);
        
        if (substr($papers, 0, 4) != "NONE") {
            
            echo "<h2>Key References</h2> \n\t\t
                    <div class=\"mx-3\">".$papers."\n\t</div>";
	
        } 
        
    }
*/
?>