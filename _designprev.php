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
    $arrCrop = array();
    Global $variableMapping;
    Global $design;
    global $data;
    $content = ""; // reset the content
    if ($period['administrative']['description']) {
        $content .= "\n<h3 class=\"mx-3\">Description</h3>";

        $content .= "\n\t        <ul class=\"list-group mx-3 mb-3\">";
        if ($period['administrative']['description']) {
            $content .= "\n<li class=\"list-group-item \" style=\"white-space: pre-wrap;\">" . $period['administrative']['description'] . "</li>";
        }
        $content .= " \n      </ul>";
    }
    if (is_array($period['design'])) {
        $hasData = False;
        $data = "\n<h3 class=\"mx-3\">Design</h3>";

        $data .= "\n\t <ul class=\"list-group mx-3 mb-3\">";

        // $part = listItem($value, $label);
        if ($period['design']['dateStart']) {
            $hasData = True;
            $data .= "\n<li class=\"list-group-item \"><b>Period:</b> " . $period['design']['dateStart'];
            if ($period['design']['dateEnd']) {
                $data .= " -  " . $period['design']['dateEnd'] . "</li>";
            } else
                $data .= " -  Now </li>";
        }
        if ($period['design']['factorCombinationNumber'] != 'NA') {
            $hasData = True;
            $data .= "\n<li class=\"list-group-item \"><b>Number of Combinations:</b> " . $period['design']['factorCombinationNumber'] . "</li>";
        }

        if ($period['design']['numberOdBlocks'] > 0) {
            $hasData = True;
            $data .= "\n<li class=\"list-group-item \"><b>" . $variableMapping['numberOdBlocks'] . ":</b> " . $period['design']['numberOdBlocks'] . "</li>";
        }

        if ($period['design']['numberOfPlots']) {
            $hasData = True;
            $data .= "\n<li class=\"list-group-item \"><b>" . $variableMapping['numberOfPlots'] . ":</b> " . $period['design']['numberOfPlots'] . "</li>";
        }
        if ($period['design']['numberOfReplicates']) {
            $hasData = True;
            $data .= "\n<li class=\"list-group-item \"><b>" . $variableMapping['numberOfReplicates'] . ":</b> " . $period['design']['numberOfReplicates'] . "</li>";
        }
        if ($period['design']['numberOfSubplots']) {
            $hasData = True;
            $data .= "\n<li class=\"list-group-item \"><b>" . $variableMapping['numberOfSubplots'] . ":</b> " . $period['design']['numberOdBlocks'] . "</li>";
        }
        if ($period['design']['numberOfHarvests']) {
            $hasData = True;
            $data .= "\n<li class=\"list-group-item \"><b>" . $variableMapping['numberOfHarvests'] . ":</b> " . $period['design']['numberOfHarvests'] . "</li>";
        }

        $data .= "\n</ul>";
        if ($hasData) {
            $content .= $data;
        }
    }
    if (is_array($period['crops']) and count($period['crops']) > 0) {

        $content .= "\n<h3 class=\"mx-3 \">Crops</h3>";

        $content .= "\n<div class=\"table-responsive-sm bg-white mx-3 rounded p-3 mb-3\">";
        $content .= "\n\n<table class = \"table  table-responsive-sxm table-sm  table-bordered table-hover\">";
        $content .= "\n<thead class=\"thead-light\">\n\t<tr>\n\t\t<th scope=\"col\">Crop</th>\n\t\t<th scope=\"col\">Planted</th>\n\t</tr>\n</thead>\n<tbody>";
        foreach ($period['crops'] as $crop) {
            $id = $crop['id'];
            $arrCrop[$id] = $crop['name'];
            $content .= "\n\t<tr><td>" . title_case($crop['name'] ). "</td><td>";
            if ($crop['dateStart']) {

                $content .= $crop['dateStart'];
                if ($crop['dateEnd']) {
                    $content .= " -  " . $crop['dateEnd'];
                }
            } else {
                $content .= "   </td> ";
            }
            $content .= "</tr>";
        }
        $content .= "\n</tbody></table></div>";
    }

    if (is_array($period['cropRotations'])) {
        $info = "\n<div class=\"row equal m-3\">";
        $content .= "\n<h3 class=\"mx-3\">Crop Rotations</h3>";
        $content .= "\n<div class=\" bg-white mx-3 rounded  p-3 mb-3\">";
        foreach ($period['cropRotations'] as $rotation) {

            $info .= "\n    \t<div class=\"col-sm-4 py-2\">";
            $info .= "\n    \t     \t <ul class=\"list-group border rounded\">";
            $info .= "\n    \t      \t      \t<li class=\"list-group-item bg-light border-bottom\">" . $rotation['name'] . " <i>(" . $rotation['dateStart'] . " - " . $rotation['dateEnd'] . ")</i> " . "</li>";
            foreach ($rotation['rotationPhases'] as $crop) {

                $info .= "\n    \t      \t      \t <li class=\"list-group-item\">" . title_case($arrCrop[$crop['crop']]) . "</li>";
            }
            $info .= "\n    \t      \t </ul>";
            $info .= "\n    \t</div>";
        }

        $info .= "\n</div>";
        $info .= "\n</div>";
        $content .= $info;
    }
    if (is_array($period['factor'])) {
        $arrFactors = array();
        $arrLevels = array();
        $info = "";
        $info .= "\n<h3 class=\"mx-3\">Factors</h3>";
        $info .= "\n<div class=\" bg-white mx-3 rounded  p-3 mb-3\">";
        
        $info .= "<p class=\"mx-3\">Factors are the interventions or treatments which vary across the experiment.</p>";
        foreach ($period['factor'] as $factor) {
            $arrFactors[$factor['id']] = $factor['name'];
            $info .= "\n<h4 class=\"mx-3\">" . title_case($factor['name']) . "</h4>";
            if ($factor['description']) {
                $info .= "<p class=\"ml-5\"><b>Description:</b> " . $factor['description'] . "</p>";
            }
            if ($factor['plotApplication']) {
                $info .= "<p class=\"ml-5\"><b>Application:</b> " . title_case($factor['plotApplication']) . "</p>";
            }
            
            
            if (is_array($factor['level'])) {
                $info .= "\n<h5 class=\"mx-5\">Levels</h5>";
                $info .= "\n<div class=\"row equal m-3\">";
                
                foreach ($factor['level'] as $level) {
                    $arrLevels[$level['id']] = $level['name'];
                    $info .= "\n    \t<div class=\"col-sm-4 py-2\">";
                    $info .= "\n    \t     \t <ul class=\"list-group border rounded\">";
                    $info .= "\n    \t      \t      \t<li class=\"list-group-item bg-light border-bottom\"><b>";
                    $info .= title_case($level['name']) . " </b></li>";
                    $info .= "\n    \t      \t      \t <li class=\"list-group-item\"><b>Amount: </b>".$level['amount']. " ".$level['unitCode']."</li>";       
                    $info .= "\n    \t      \t      \t <li class=\"list-group-item\"><b>Years: </b>".$level['dateStart'];
                    if ($level['dateEnd']) {
                        $info .= " - ".$level['dateEnd'];
                    }
                    $info .= "</li>";
                    if ($level['frequency']) {
                    $info .= "\n    \t      \t      \t <li class=\"list-group-item\"><b>Frequency: </b>". $level['frequency']."</li>";
                    }
                    if ($level['appliedToCrop']) {
                    $info .= "\n    \t      \t      \t <li class=\"list-group-item\"><b>Applied to Crop: </b>". $arrCrop[$level['appliedToCrop']]."</li>";
                    
                    }
                    if ($level['method']) {
                    $info .= "\n    \t      \t      \t <li class=\"list-group-item\"><b>Method: </b>". $level['method']."</li>";
                    }
                    if ($level['chemicalForm']) {
                    $info .= "\n    \t      \t      \t <li class=\"list-group-item\"><b>Chemical Form: </b>". $level['chemicalForm']."</li>";
                    }
                    if ($level['notes']) {
                    $info .= "\n    \t      \t      \t <li class=\"list-group-item\"><i> ". $level['notes']."</i></li>";
                    }
                    
                    $info .= "\n    \t      \t </ul>";
                    $info .= "\n    \t</div>";
                }
                $info .= "\n    \t</div>";
            }
        }
        $info .= "\n    \t</div>";

        $content .= $info;
    }

    
    if (is_array($period['factorCombinations'])){
        $info = "";
        $info .= "\n<h3 class=\"mx-3\">Factor Combinations</h3>";
        $info .= "\n<div class=\" bg-white mx-3 rounded  p-3 mb-3\">";
        $info .= "<p>Factor Combinations are the combination of factors applied to different plots on the experiment.</p>";
        
       
        
        $info .= "\n<div class=\"table-responsive-sm \"><table class = \"table  table-responsive-sm table-sm table-bordered table-hover\"><thead  class=\"thead-light\"><tr>";
        $info .= "\n<th scope=\"col\">Factor Combination</th>";
        $info .= "\n<th scope=\"col\">Time Coverage</th>";
        $info .= "\n<th scope=\"col\">Notes</th>";
        $info .= "\n</tr></thead>\n<tbody>";
        
        foreach ($period['factorCombinations']  as $fr) {
            $info .= "\n<tr>";
            $info .= "\n<td><b>" . $fr['name']  . "</b></td>";
            $info .= "\n<td>" . $fr['dateStart'];
            if ($fr['dateEnd']) {
                $info .= " - ".$fr['dateEnd'];
            }
            
            $info .= "</td>";
            $info .= "\n<td><i>".$fr['description']."</i></td>";
            $info .= "</tr>";
        }
        $info .= "\n    \t</table></div>";
        $info .= "\n    \t</div>";
        $content .= $info;
    }
    if (is_array($period['measurements']) and count($period['measurements']) > 0) {

        $content .= "\n<h3 class=\"mx-3\">Measurements</h3>";
        $content .= "\n<div class=\" bg-white mx-3 rounded  p-3 mb-3\">";
        $content .= "\n<div class=\"table-responsive-sm bg-white\">";
        $content .= "\n \t<table class = \"table  table-responsive-sm table-sm table-bordered table-hover table-condensed\">";
        $content .= "\n  \t     \t   <thead  class=\"thead-light\">";
        $content .= "\n  \t     \t   \t   <tr>";
        $content .= "\n  \t     \t   \t   \t   <th scope=\"col\">Variable</th>";
        $content .= "\n  \t     \t   \t   \t   <th scope=\"col\">Unit</th>";
        $content .= "\n  \t     \t   \t   \t   <th scope=\"col\">Collection <br />Frequency</th>";
      
        $content .= "\n  \t     \t   \t   \t   <th scope=\"col\">Material</th>";
        $content .= "\n  \t     \t   \t   \t   <th scope=\"col\"  class=\" w-25\">Description</th>";
        $content .= "\n  \t     \t   \t   \t   <th scope=\"col\">Crop</th>";
        $content .= "\n  \t     \t   \t   </tr>";
        $content .= "\n  \t     \t   </thead>";
        $content .= "\n  \t   \t   <tbody>";
        foreach ($period['measurements'] as $measurement) {
            $vcrop = '';
            if ($measurement['crop']) {
                $vcrop = $arrCrop[$measurement['crop']];
            }
            $content .= "\n<tr>";
            $content .= "\n<td class=\"pr-4 \"><small>" . title_case($measurement['variable']) . "</small></td>";
            $content .= "\n<td class=\"pr-4 \"><small>" . $measurement['unitCode'] . "</small></td>";
            $content .= "\n<td class=\"pr-4 \"><small>" . $measurement['collectionFrequency'] . "</small></td>";
            $content .= "\n<td class=\"pr-4 \"><small>" . $measurement['material'] . "</small></td>";
            #$content .= "\n<td>" . $measurement['scale'] . "</td>";
            $content .= "\n<td class=\"pr-4 w-25\"><small>" . $measurement['description'] . "</small></td>";
            $content .= "\n<td class=\"pr-4 \"><small>" . $vcrop . "</small></td>";

            $content .= "\n</tr>";
        }

        $content .= "\n</tbody>";
        $content .= "\n</table></div></div>";
    }
    return $content;
}
$strTab = "<div class=\"row\">";
$strTab .= "\n<div class=\"col-12\">";
$strTab .= "\n\t<h3 class=\"mx-3\">Experimental Design</h3>";
$strTab .= "\n</div>";
$strTab .= "\n" . "<div class=\"col-12 mx-auto\"> ";
$strTab .= "\n\t<div class=\"mt-3 mx-3\" id=\"accordionDesign\"> \n";
$i = 0;
foreach ($design as $period) {

    $Title = $period['administrative']['name'];
    $content = getContent($period);
    if ($i != 0) {
        $active = "";
        $collapse = " show ";
        $expanded = "true";
    } else {
        $active = " in";
        $collapse = "  ";
        $expanded = "false";
    }

    $tabID = str_replace(' ', '', $Title);
    $tabID = str_replace(':', '', $tabID);
    $tabID = str_replace('-', '', $tabID);
    if ($period['design']['dateStart']) {
        $Title .= " - " . $period['design']['dateStart'];
    }
    if ($period['design']['dateEnd']) {
        $Title .= " - " . $period['design']['dateEnd'];
    } 
    $strTab .= "\n\t<div class=\"card  bg-light\">";
    $strTab .= "\n\t\t<div class=\"card-header \" id=\"heading" . $tabID . "\">";

    $strTab .= "\n\t\t<h2 class=\"mb-0\">";
    $strTab .= "\n\t\t\t<button class=\"btn btn-link\"  data-toggle=\"collapse\" data-target=\"#collapse" . $tabID . "\" aria-expanded=\"" . $expanded . "\" aria-controls=\"" . $tabID . "\">";
    $strTab .= "\n\t\t\t\t	" . $Title;
    $strTab .= "\n\t\t\t						</button>";
    $strTab .= "\n\t\t\t						</h2>";
    $strTab .= "\n\t</div>";
    $strTab .= "\n\t<div id=\"collapse" . $tabID . "\" class=\"collapse " . $collapse . " fade bg-light\" aria-labelledby=\"heading" . $tabID . "\" data-parent=\"#accordionDesign\">";
    $strTab .= "\n\t<div class=\"card-body\">" . $content . "</div>";
    $strTab .= "\n\t</div>";
    $strTab .= "\n\t</div>";
}
$strTab .= "\n\t\t\t</div>";
$strTab .= "\n\t\t</div>";
$strTab .= "\n\t</div>";

echo $strTab;
?>