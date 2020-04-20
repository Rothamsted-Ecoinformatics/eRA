<?php

/**
 * @file _site.php
 * @brief module that display site information contained in the data-description array.
 *
 * @author Nathalie Castells-Brooke
 * @email nathalie.castells@rothamsted.ac.uk
 *
 */

/**
 * getFieldInfo : formats the information about the field
 *
 * @param unknown $site            
 * @return string
 */
?>
<h2 class="mx-3">Site: <?php echo $site['administrative']['name'];?></h2>
<div class="mx-5">
    <?php
    
    $line = "<ul class=\"list-group m-5\">";
    if ($site['administrative']['type']) {
        $line .= "\n<li class=\"list-group-item \"><b>Type:</b> " . title_case($site['administrative']['type']) . "</li>";
    }
    if ($site['administrative']['doi']) {
        $line .= "\n<li class=\"list-group-item \"><b>DOI:</b> <a href=\"http://doi.org/" . $site['administrative']['doi'] . "\">" . $site['administrative']['doi'] . "</li>";
    }
    if ($site['administrative']['description']) {
        $line .= "\n<li class=\"list-group-item \" style=\"white-space: pre-wrap;\" ><b>Description:</b> " . $site['administrative']['description'] . "</li>";
    }
    if ($site['administrative']['management']) {
        $line .= "\n<li class=\"list-group-item \" style=\"white-space: pre-wrap;\" ><b>Management:</b> " . $site['administrative']['management'] . "</li>";
    }
    
    if ($site['administrative']['visitsAllowed']) {
        
        $line .= "\n<li class=\"list-group-item \"><b>Visit Permitted?:</b> Yes </li>";
        
        if ($site['administrative']['visitingArrangements']) {
            $line .= "\n<li class=\"list-group-item \" style=\"white-space: pre-wrap;\" ><b>Visiting Arrangments:</b> " . $site['administrative']['visitingArrangements'] . "</li>";
        }
    }
    if ($site['location']['elevation']) {
        $line .= "\n<li class=\"list-group-item \"><b>Elevation:</b> " . $site['location']['elevation'] . " " . $site['location']['elevationUnit'] . "</li>";
    }
    if ($site['location']['slope']) {
        $line .= "\n<li class=\"list-group-item \"><b>Slope:</b> " . $site['location']['slope'] . "</li>";
    }
    if ($site['location']['slopeAspect']) {
        $line .= "\n<li class=\"list-group-item \"><b>Slope:</b> " . $site['location']['slopeAspect'] . "</li>";
    }
    
    if (is_array($site['location']['geoLocationPoint'])) {
        $line .= "\n<li class=\"list-group-item \"><b>Geolocation:</b> " . $site['location']['geoLocationPoint']['pointLongitude'] . " - " . $site['location']['geoLocationPoint']['pointLatitude'] . "</li>";
      }
    
    
    
    $line .= "\n</ul>";

    echo $line;
    ?>
   <h2 class="mx-3">Soil</h2>
   <?php

$line = "<ul class=\"list-group m-5\">";
if ($site['soil']['soilTypeLabel']) {
    $line .= "\n<li class=\"list-group-item \"  style=\"white-space: pre-wrap;\" ><b>Type:</b> " . title_case($site['soil']['soilTypeLabel']);
    
    if ($site['soil']['soilDescription']) {
        $line .= "\n<br />" . $site['soil']['soilDescription'] . "</li>";
    }
    $line .= "\n</li>";
}
$line .= "\n</ul>";
echo $line;
?>
 
</div>
