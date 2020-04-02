<?php

/**
 * @file _design.php
 * @brief module that display the design of an experiment.
 * *Lists design for an experiment. This module is very simple and therefore could be dropped in favor of just using the function it calls. 
 * This module is for use in the expt page. It needs information contained in the data-description file.
 * @author Nathalie Castells-Brooke
 * @date 9/27/2018
 */

Global $design;
global $data;
function listItem($value, $label)
{
    global $variableMapping;
    
    if ($value == 'NA') {
        $pcontent .= '';
    } elseif (is_null($value)) {
        $pcontent .= '';
    } elseif ($value == 0) {
        $pcontent .= '';
    } elseif ($value == '') {
        $pcontent .= '';
    } elseif ($value == null) {
        $pcontent .= '';
    } else {
        $pcontent = "\n<li class=\"list-group-item \"><b>" . $variableMapping[$label] . ":</b> " . $value;
        $pcontent .= "\n</li>";
    }
    return $pcontent;
}

function getContent($period)
{
    Global $variableMapping;
    Global $design;
    global $data;
    $content = ""; // reset the content
    if ($period['administrative']['description']) {
        $content .= "\n <div class=\"m-5\">";
        
        $content .= "\n\t        <ul class=\"list-group\">";
        if ($period['administrative']['description']) {
            $content .= "\n<li class=\"list-group-item \"><b>Description:</b> " . $period['administrative']['description'] . "</li>";
        }
        $content .= " \n      </ul>";
        $content .= " \n </div>";
    }
    if (is_array($period['design'])) {
        $hasData = False;
        $data = "\n<h2 class=\"mx-3\">Design</h2>";
        
        $data.= "\n<ul class=\"list-group m-5\">";
        
        // $part = listItem($value, $label);
        if ($period['design']['dateStart']) {
            $hasData = True;
            $data.= "\n<li class=\"list-group-item \"><b>Period:</b> " . $period['design']['dateStart'];
            if ($period['design']['dateEnd']) {
                $data.= " -  " . $period['design']['dateEnd'] . "</li>";
            } else
                $data.= " -  Now </li>" ;
        }
        if ($period['design']['factorCombinationNumber'] != 'NA') {
            $hasData = True;
            $data.= "\n<li class=\"list-group-item \"><b>Number of Combinations:</b> " . $period['design']['factorCombinationNumber'] . "</li>";
        }
        
        if ($period['design']['numberOdBlocks']>0) {
            $hasData = True;
            $data.= "\n<li class=\"list-group-item \"><b>" . $variableMapping['numberOdBlocks'] . ":</b> " . $period['design']['numberOdBlocks'] . "</li>";
        }
        
        if ($period['design']['numberOfPlots']) {
            $hasData = True;
            $data.= "\n<li class=\"list-group-item \"><b>" . $variableMapping['numberOfPlots'] . ":</b> " . $period['design']['numberOfPlots'] . "</li>";
        }
        if ($period['design']['numberOfReplicates']) {
            $hasData = True;
            $data.= "\n<li class=\"list-group-item \"><b>" . $variableMapping['numberOfReplicates'] . ":</b> " . $period['design']['numberOfReplicates'] . "</li>";
        }
        if ($period['design']['numberOfSubplots']) {
            $hasData = True;
            $data.= "\n<li class=\"list-group-item \"><b>" . $variableMapping['numberOfSubplots'] . ":</b> " . $period['design']['numberOdBlocks'] . "</li>";
        }
        
       
        
        $data.= "\n</ul>";
        if ($hasData) {
            $content .= $data;
        }
    }
    if (is_array($period['crops']) and count($period['crops']) > 0) {
        $content .= "\n<h2 class=\"mx-3\">Crops</h2>";
        
        $content .= "\n<ul class=\"list-group m-5 \">";
        
        foreach ($period['crops'] as $crop) {
            
            $content .= "\n<li class=\"list-group-item \"><b>" . $crop['name'];
            if ($crop['dateStart']) {
                
                $content .= ":</b> " . $crop['dateStart'];
                if ($crop['dateEnd']) {
                    $content .= " -  " . $crop['dateEnd'];
                }
            } else {
                $content .= "</b> ";
            }
            $content .= "</li>";
        }
        $content .= "\n</ul>";
    }
    
    if (is_array($period['measurements']) and count($period['measurements']) > 0) {
        $content .= "\n<h2 class=\"mx-3\">Measurements</h2>";
        $content .= "\n<div class=\"table-responsive-sm \"><table class = \"table  table-responsive-sm table-sm  table-hover\"><thead><tr>";
        $content .= "\n<th scope=\"col\">Variable</th>";
        $content .= "\n<th scope=\"col\">Unit</th>";
        $content .= "\n<th scope=\"col\">Collection <br />Frequency</th>";
        $content .= "\n<th scope=\"col\">Scale</th>";
        $content .= "\n<th scope=\"col\">Material</th>";
        $content .= "\n<th scope=\"col\">Description</th>";
        $content .= "\n<th scope=\"col\">Crop</th>";
        $content .= "\n</tr>";
        $content .= "\n</thead>";
        $content .= "\n<tbody>";
        foreach ($period['measurements'] as $measurement) {
            $content .= "\n<tr>";
            $content .= "\n<td>" . title_case($measurement['variable']) . "</td>";
            $content .= "\n<td>" . $measurement['unitCode'] . "</td>";
            $content .= "\n<td>" . $measurement['collectionFrequency'] . "</td>";
            $content .= "\n<td>" . $measurement['material'] . "</td>";
            $content .= "\n<td>" . $measurement['scale'] . "</td>";
            $content .= "\n<td>" . $measurement['description'] . "</td>";
            $content .= "\n<td>" . $measurement['crop'] . "</td>";
            
            $content .= "\n</tr>";
        }
        
        $content .= "\n</tbody>";
        $content .= "\n</table></div>";
    }
    return $content;
}

$strTab = "<div class=\"row\"> \n\t <div class=\"col-12 py-0\">\n\t\t <div  class=\"panel-group mx-3\" id=\"accordion\"> \n";
$i = 0;
foreach ($design as $period) {
    
    $Title = $period['administrative']['name'];
    $content = getContent($period);
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
        $Title .= " - " . $period['design']['dateStart'];
    }
    if ($period['design']['dateEnd']) {
        $Title .= " - " . $period['design']['dateEnd'];
    }
    $strTab .= " href=\"#" . $tabID . "\"> " . $Title . "</a>";
    $strTab .= "\n\t</h2>";
    $strTab .= "\n\t</div>";
    $strTab .= "\n\t<div id=\"" . $tabID . "\" class=\"panel-collapse collapse " . $active . "\">";
    $strTab .= "\n\t<div class=\"card-body\">" . $content . "</div>";
    $strTab .= "\n\t</div>";
    $strTab .= "\n\t</div>";
}
$strTab .= "\n\t\t\t</div>";
$strTab .= "\n\t\t</div>";
$strTab .= "\n\t</div>";

echo $strTab;
?>