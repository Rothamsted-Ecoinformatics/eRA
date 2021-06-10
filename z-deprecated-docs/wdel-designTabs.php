<?php
/**
 * @file _design.php
 * @brief module that display the design of an experiment.
 * *Lists design for an experiment. This module is very simple and therefore could be dropped in favor of just using the function it calls. 
 * This module is for use in the expt page. It needs information contained in the data-description file.
 * @author Nathalie Castells-Brooke
 * @date 9/27/2018
 */
$strTab = "<div class=\"row\"> \n <div class=\"col-12 py-0\"> \n<ul class=\"nav nav-tabs nav-fill text-body \"> \n";
$i = 0;
foreach ($design as $period) {
    $Title = $period['administrative']['name'];
    if ($i != 0) {
        $active = "";
    } else {
        $active = " active";
    }
    $tabID = str_replace(' ', '', $Title);
    $tabID = str_replace(':', '', $tabID);
    $tabID = str_replace('-', '', $tabID);
    
    $strTab .= "<li class=\"nav-item" . $active . "\"><a class=\"nav-link" . $active . "\" id=\"" . $tabID . "-tab\" data-toggle=\"tab\" href=\"#" . $tabID . "\">" . $Title . "</a></li>\n";
    $i +=1 ;
}

$strTab .= "</ul> \n"; // finish the header with the tabs
$strTab .= "<div class=\"tab-content mh-100\"> \n"; // start the tab contents
$i = 0;
foreach ($design as $period) {
    if ($i != 0) {
        $active = "";
    } else {
        $active = " active";
    }
    $Title = $period['administrative']['name'];
    $tabID = str_replace(' ', '', $Title);
    $tabID = str_replace(':', '', $tabID);
    $tabID = str_replace('-', '', $tabID);
    if ($period['design']['dateStart']) {
        $Title .=" - " . $period['design']['dateStart'];
    }
    if ($period['design']['dateEnd']) {
        $Title .=" - " . $period['design']['dateEnd'];
    }
    $strTab .= "<div class=\"tab-pane" . $active . "\" id=\"" . $tabID . "\" role=\"tabpanel\" aria-labelledby=\"" . $tabID . "-tab\"> \n";
    $strTab .= "<h2 class=\"mx-3\">" . $Title . "</h2> \n"; // break;
    
    //$strTab .= listAttributes2($period);
    
    $strTab .= "</div>\n ";
    $i +=1 ;
}
$strTab .= "</div>"; // finish the tab contents
$strTab .= "</div></div>";

echo $strTab;
?>