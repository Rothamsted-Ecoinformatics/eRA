<?php
/**
 * @file _design.php
 * @brief module that display the design of an experiment.
 * *Lists design for an experiment. This module is very simple and therefore could be dropped in favor of just using the function it calls. 
 * This module is for use in the expt page. It needs information contained in the data-description file.
 * @author Nathalie Castells-Brooke
 * @date 9/27/2018
 */
$strTab = "<div class=\"row\"> \n\t <div class=\"col-12 py-0\">\n\t\t <div  class=\"panel-group m-5\" id=\"accordion\"> \n";
$i = 0;


foreach ($design as $period) {
    
    $Title = $period['administrative']['name'];
    $content = ""; // reset the content
    
    
    $content .= "<div class=\"mx-5\">";
    $content.= "<ul class=\"list-group m-3\">";
    if ($period['administrative']['description']) {
        $content.= "\n<li class=\"list-group-item \"   style=\"white-space: pre-wrap;\"><b>Description:</b> " .$period['administrative']['description']. "</li>";
    }
    $content .= "</ul>";
    $content .= "</div>";
    if ($i != 0) {
        $active = "";
        $collapse = "";
    } else {
        $active = " in";
    }
    $tabID = str_replace(' ', '', $Title);
    $tabID = str_replace(':', '', $tabID);
    $tabID = str_replace('-', '', $tabID);
    
    $strTab .= "\n\t<div class=\"card \">";
    $strTab .= "\n\t\t<div class=\"card-heading\">";
    $strTab .= "\n\t\t\t<h2 class=\"card-title\">";
    $strTab .= "\n\t\t\t<a data-toggle=\"collapse\" data-parent=\"#accordion\"";
    if ($period['design']['dateStart']) {
        $Title.= " - " . $period['design']['dateStart'];
    }
    if ($period['design']['dateEnd']) {
        $Title.= " - " . $period['design']['dateEnd'];
    }
    $strTab .= " href=\"#" . $tabID . "\"> " . $Title . "</a>";
    $strTab .= "\n\t</h2>";
    $strTab .= "\n\t</div>";
    $strTab .= "\n\t<div id=\"" . $tabID . "\" class=\"panel-collapse collapse ".$active."\">";
    $strTab .= "\n\t<div class=\"card-body\">" . $content. "</div>";
    $strTab .= "\n\t</div>";
    $strTab .= "\n\t</div>";
}
$strTab .= "\n\t\t\t</div>";
$strTab .= "\n\t\t</div>";
$strTab .= "\n\t</div>";

echo $strTab;
?>