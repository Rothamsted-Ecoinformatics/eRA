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
function niceChop($text, $length)
{
    $prestr = explode('.', $text);
    $sents = array();
    $sents[0] = '';
    $desc = '';
    $next = '';
    $j = 0;
    for ($i = 0; $i < count($prestr); $i ++) {

        $isInitial = 0;
        $sentLen = strlen($prestr[$i]);
        /* testing for single letters last word */
        if ($sentLen > 2) {
            if ($prestr[$i][$sentLen - 2] == ' ') {
                $isInitial = 1;
            }
        } else {
            $isInitial = 1;
        }

        if ($isInitial == 1) {
            $sents[$j] .= '. ' . $prestr[$i];
        } else {
            $sents[$j] .= '. ' . $prestr[$i];
            $next = $desc . $sents[$j];
            $j ++;
            $sents[$j] = '';
        }

        if (strlen($desc) > $length) {

            break;
        } else {
            $desc = $next;
        }
        $desc = ltrim($desc, '.');
        $desc = str_replace('..', '.', $desc);
        $desc .= '.';
    }
    return $desc;
}


if (!$hasDatasets) {
    $info = "<p>There are no datasets for this experiments yet. </p>";
}
else 
{
$list = "";
$prefix = "10.23637/";
$list .= "<div class=\"row mx-3\">";
foreach ($datasets as $dataset) {if ($dataset['isReady'] == 2) {
	
    if ($dataset['UID']) {
                    $fileDataset = $exptFolder . '/' . $dataset['shortName'] . '/' . $dataset['UID'] . '.json';
                } else {
                    $fileDataset = $exptFolder . '/' . $dataset['shortName'] . '/' . $dataset['shortname'] . '.json';
                }
    $subDescription = '';
                
    $subDescription = niceChop($dataset['description'], 200);  
    $id = str_replace($prefix, '', $dataset['identifier']);
	$shortname = $dataset['shortName'];
    $countVersions = array_count_values(array_column($datasets, 'shortName'));
	if ($countVersions < 10) {
                    $strCount = "0" . strval($countVersions);
                } else {
                    $strCount = strval($countVersion);
                }
                $info = "<div class=\"col-sm-4 py-2\">";
  
                
                
                $info .= "\n	<div class=\"card  h-100 bg-light mb-3 \" >";
                
                $info .= "\n	\t	<div class=\"card-header\">" . $dataset['title'] . "</div>";
                $info .= "\n	\t	<div class=\"card-body\">";
                // $info .="\n \t <h4 class=\"card-title\">Light card title</h4>";
                $info .= "\n	\t	\t		<small class=\"card-muted\">" . $dataset['dataset_type'] . $subDescription . " <br /> " . $dataset['shortName'] . " </small>";
                $info .= "\n	\t		</div>";
                $info .= "\n	\t	<div class=\"card-footer\"> <a class=\"btn btn-primary stretched-link\" href=\"dataset/" . $expt . "/" . $dataset['UID'] . "\"> More ...</a></div>";
                
                $info .= "\n	\t	</div>";
                $info .= "\n	\t	</div>";
				$list .= $info;
				if ($strCount == $dataset['version']) {
                    
                    $notEmptyGr = 1; // shift group to
                }
	 }
	 
     
	
}

 $list .= "</div>";
echo $list;


}


?>
