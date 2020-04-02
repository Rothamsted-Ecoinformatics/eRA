<?php 
/**
 * @file _datasets.php
 * @brief lists datasets for an experiment
 *Lists datasets for an experiment. This module is very simple and therefor could be dropped in favor of just using the function it calls. 
 *This module is for use in the expt page. It needs information contained in the data-description file.
 * @author Nathalie Castells-Brooke
 * @date 9/27/2018
 */

?>

<h2 class="mx-3">Datasets available</h2>

<?php



if (!$hasDatasets) {
    $info = "<p>There are no datasets for this experiments yet. </p>";
}
else 
{
$info = "";
$prefix = "10.23637/";

foreach ($datasets as $dataset) {
    $fileDataset = $exptFolder . '/' . $dataset['shortName'].'/' . $dataset['shortName'].'.json';
    
    $id = str_replace($prefix, '', $dataset['identifier']);
    $info .= "<h3 class=\"mx-3 mt-5\">".$dataset['title']."</h3>";
    $info .=  "<ul  class=\"list-group mx-5\">";
    $info .= "<li class=\"list-group-item \">Dataset Page on old e-RA site: <a href=\"".$dataset['URL']."\">".$dataset['identifier']."</a></li>";
    $info .= "<li class=\"list-group-item \">Dataset Page on new e-RA site: <a href=\"dataset.php?expt=".$expt."&amp;dataset=".$dataset['shortName']."\">".$dataset['identifier']." - ".$dataset['shortName']."</a></li>";
   
    $info .= "<li class=\"list-group-item \">".$dataset['description']."</li>";
       $info .= "</ul>";
}


echo $info;


}


?>

