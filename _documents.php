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

<h2 class="mx-3">Documents</h2>

<?php
$url = $exptFolder . '/documents.json';
if (is_file($url)) {
    $jdata = file_get_contents($url);
    $data = json_decode($jdata, true);
    $header = 'Title';
    echo "$url";
    echo "<p>Work in progress: a list of the associated documents that do not have a DOI yet. with appropriate caption. Edit the documents.json file</p>";
    
    echo"<ul>";
 
    foreach ($data as $doc) {
        echo "<li><a href=\"".$doc[URL]."\">".$doc[Caption]."</a> (".$doc[Type].") - ".$doc[Credit]." </li>";
    }
    echo"</ul>";
} 
else {
    echo "No documents";
}

?>
