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

<h2>Related Pages</h2>

<?php
echo $expt;
$url= 'metadata/default/phpfiles.json';
if (is_file($url)){
    
$jdata = file_get_contents($url);
$data = json_decode($jdata, true);
$pairs = array('exptID' => $expt);
$pages = multiSearch($data, $pairs);


//$header = 'Title';
$info = array2table($pages, $recursive=true, $null='' );

echo $info;

}

else 
{
    echo "No documents";
}
