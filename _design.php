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
{   $arrCrop = array();
    Global $variableMapping;
    Global $design;
    global $data;
    $content = ""; // reset the content
    if ($period['administrative']['description']) {
        $content .= "\n<h3 class=\"mx-3\">Description</h3>";
        
        $content .= "\n\t        <ul class=\"list-group mx-3\">";
        if ($period['administrative']['description']) {
            $content .= "\n<li class=\"list-group-item \" style=\"white-space: pre-wrap;\">" . $period['administrative']['description'] . "</li>";
        }
        $content .= " \n      </ul>";
        
    }
    if (is_array($period['design'])) {
        $hasData = False;
        $data = "\n<h3 class=\"mx-3\">Design</h3>";
        
        $data.= "\n\t <ul class=\"list-group mx-3\">";
        
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
        if ($period['design']['numberOfHarvests']) {
            $hasData = True;
            $data.= "\n<li class=\"list-group-item \"><b>" . $variableMapping['numberOfHarvests'] . ":</b> " . $period['design']['numberOfHarvests'] . "</li>";
        }
      
        
       
        
        $data.= "\n</ul>";
        if ($hasData) {
            $content .= $data;
        }
    }
    if (is_array($period['crops']) and count($period['crops']) > 0) {
     
        $content .= "\n<h3 class=\"mx-3\">Crops</h3>";
        
        $content .= "\n<div class=\"table-responsive-sm bg-white m-5 p-3\">";
        $content .= "\n\n<table class = \"table  table-responsive-sm table-sm  table-hover\">";
        $content .="\n<thead class=\"thead-light\"><tr><th scope=\"col\">Crop</th><th scope=\"col\">Planted</th></tr></thead><tbody>";
        foreach ($period['crops'] as $crop) {
            $id = $crop['id'];
            $arrCrop[$id]= $crop['name'];
            $content .= "\n<tr><th scope=\"row\">" . $crop['name']."</td><td>";
            if ($crop['dateStart']) {
                
                $content .=  $crop['dateStart'];
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
        $info = "<div class=\"row equal m-3\">";
        $content .= "\n<h3 class=\"mx-3\">Crop Rotations</h3>";  
        foreach ($period['cropRotations'] as $rotation) { 
         
            $info .= "<div class=\"col-sm-4 py-2\">";
            $info .= "      <ul class=\"list-group border rounded\">";
            $info .= "          <li class=\"list-group-item bg-light border-bottom\">" . $rotation['name'] ." <i>(" . $rotation['dateStart'] ." - " . $rotation['dateEnd'] .")</i> " .  "</li>";
            foreach($rotation['rotationPhases'] as $crop) {
                
                $info .= "          <li class=\"list-group-item\">".$arrCrop[$crop['crop']]."</li>";
                
            }
            $info .= "      </ul>";
            $info .= "</div>";
          

          

        }
        
        $info .= "\n</div>";
        $content .= $info;
    }
    
    if (is_array($period['measurements']) and count($period['measurements']) > 0) {
        
        $content .= "\n<h3 class=\"mx-3\">Measurements</h3>";
        $content .= "\n<div class=\"table-responsive-sm \"><table class = \"table  table-responsive-sm table-sm  table-hover\"><thead  class=\"thead-light\"><tr>";
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
$strTab  = "<div class=\"row\">";
$strTab .= "\n<div class=\"col-12\">";
$strTab .= "\n\t<h3 class=\"mx-3\"> Experimental Design</h3>";
$strTab .= "\n</div>";
$strTab .= "\n"."<div class=\"col-10 mx-auto\"> "  ;
$strTab .= "\n\t<div  class=\"accordion\" id=\"accordionDesign\"> \n";
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
    $strTab .= "\n\t<div class=\"card \">";
    $strTab .= "\n\t\t<div class=\"card-header\" id=\"" . $tabID . ">";
    
    
     $strTab .= "\n\t\t<h2 class=\"mb-0\">";
	$strTab .= "\n\t\t\t<button class=\"btn btn-link btn-block text-left\" type=\"button\" data-toggle=\"collapse\" data-target=\"#".$tabID."\" aria-expanded=\"". $expanded."\" aria-controls=\"".$tabID."\">";
	$strTab .= "\n\t\t\t\t	<i class=\"fa fa-angle-double-right mr-3\"></i>".$Title;
	$strTab .= "\n\t\t\t						</button>";
	$strTab .= "\n\t\t\t						</h2>";
      $strTab .= "\n\t</div>";
      
    /*
    $strTab .= "\n\t\t\t<h2 class=\"card-title\">";
    $strTab .= "\n\t\t\t<a data-toggle=\"collapse\" data-parent=\"#accordionDesign\"";
    $strTab .= " href=\"#" . $tabID . "\"> " . $Title . "</a>";
    $strTab .= "\n\t</h2>";
    $strTab .= "\n\t</div>";
    */
    
    /*
     * 
     * 				<div id="collapseOne" class="collapse show fade" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.<a href="https://www.fiverr.com/sunlimetech/fix-your-bootstrap-html-and-css3-issues" class="ml-3" target="_blank"><strong>View More designs <i class="fa fa-angle-double-right"></i></strong></a>
								</div>
							</div>
     */
      $strTab .= "\n\t<div id=\"" . $tabID . "\" class=\"collapse ".$collapse. " fade \"  data-parent=\"#accordionDesign\"\">";
    $strTab .= "\n\t<div class=\"card-body\">" . $content . "</div>";
    $strTab .= "\n\t</div>";
    $strTab .= "\n\t</div>";
}
$strTab .= "\n\t\t\t</div>";
$strTab .= "\n\t\t</div>";
$strTab .= "\n\t</div>";

echo $strTab;
?>