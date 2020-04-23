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
	
	

<div class="card-columns">
<?php

if (! $hasDatasets) {
    $info = "<p>There are no datasets for this experiments yet. </p>";
} else {
    $info = "";
    $prefix = "10.23637/";

    foreach ($datasets as $dataset) {
        $fileDataset = $exptFolder . '/' . $dataset['shortName'] . '/' . $dataset['shortName'] . '.json';

        $id = str_replace($prefix, '', $dataset['identifier']);
        
        
        $info .= "\n	<div class=\"card  card-block bg-light mb-3 d-inline-block\" >";
        $info .= "\n	\t	<div class=\"card-header\">" . $dataset['title'] . "</div>";
        $info .= "\n	\t	<div class=\"card-body\">";
        // $info .="\n \t <h4 class=\"card-title\">Light card title</h4>";
        $info .= "\n	\t	\t		<small class=\"card-muted\">" . $dataset['description'] . "</small>";
        
        $info .= "\n	\t		</div>";
        $info .= "\n	\t	<div class=\"card-footer\"> <a href=\"dataset.php?expt=" . $expt . "&amp;dataset=" . $dataset['shortName'] . "\">" . $dataset['identifier'] . " - " . $dataset['shortName'] . "</a></div>";
  
        $info .= "\n	\t	</div>";
    }

    echo $info;
}

?>
</div>
</div>