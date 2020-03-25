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

<h2 class="mx-3">Experiments - json</h2>

<?php
$url= $exptFolder.'/experiments.json';
$jdata = file_get_contents($url);
$data = json_decode($jdata, true);

$header = 'Title';
$info = array2table($data, $recursive=false, $null='' );

echo $info;





?>
