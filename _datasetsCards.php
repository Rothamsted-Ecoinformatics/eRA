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


<div class="row equal m-3">
	
	


<?php

if (! $hasDatasets) {
    $info = "<p>There are no datasets for this experiments yet. </p>";
} else {
    $info = "";
    $prefix = "10.23637/";

    foreach ($datasets as $dataset) {
        $fileDataset = $exptFolder . '/' . $dataset['shortName'] . '/' . $dataset['shortName'] . '.json';
        $subDescription = '';
     
     
        
     if (strlen($dataset['description']) > 300) {
         $subDescription = substr($dataset['description'], 0, 300 ) . "...";
     } else {$subDescription = $dataset['description'];}
        $id = str_replace($prefix, '', $dataset['identifier']);
        
        $info .="<div class=\"col-sm-4 py-2\">";
        $info .= "\n	<div class=\"card  h-100 bg-light mb-3 \" >";
        $info .= "\n	\t	<div class=\"card-header\">" . $dataset['title'] . "</div>";
        $info .= "\n	\t	<div class=\"card-body\">";
        // $info .="\n \t <h4 class=\"card-title\">Light card title</h4>";
        $info .= "\n	\t	\t		<small class=\"card-muted\">" . $subDescription." </small>";
        
        $info .= "\n	\t		</div>";
        $info .= "\n	\t	<div class=\"card-footer\"> <a class=\"btn btn-primary stretched-link\" href=\"dataset.php?expt=" . $expt . "&amp;dataset=" . $dataset['shortName'] . "\"> More ...</a></div>";
  
        $info .= "\n	\t	</div>";
        $info .= "\n	\t	</div>";
    }

    echo $info;
}

?>

</div>