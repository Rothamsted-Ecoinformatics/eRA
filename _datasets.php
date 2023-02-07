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

/*
 * function niceChop -
 * to chop a paragrapgh to the length $length, but to previous or next full stop, whichever is teh closest
 * Note that an abbreviation can be mistaken for a full stop. We will filter out the full stop following single letters.
 *
 *
 */
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

if (! $hasDatasets) {
    $info = "<p>There are no datasets for this experiments yet. </p>";
} else {
    $list = "";
    
    $prefix = "10.23637/";
    /*
     *
     * the function group_by then also sort them
     */
    $gpDS = group_by('dataset_type', $datasets);

    $list .= "\n<div class=\"table-responsive-sm mx-3 rounded p-3 mb-3\">";
        $list .= "\n\n<table class = \"table  table-responsive-sxm table-sm bg-white table-bordered  table-condensed\">";
        $list .= "\n<thead class=\"thead-light\">\n\t<tr>";
        
        $list .= "\n\t\t<th scope=\"col\">Title <small>(hover for a longer description)</small></th>";
        $list .= "\n\t\t<th scope=\"col\">Year of Publication</th>";
        $list .= "\n\t\t<th scope=\"col\">Type</th>";
        $list .= "\n\t\t<th scope=\"col\">DOI or Link</th>";
        $list .= "\n\t\t<th scope=\"col\">Version </th>";
        $list .= "\n\t</tr>\n</thead>\n<tbody>";

    foreach ($gpDS as $groupName => $groupedDatasets) {
        
        $notEmptyGr = 0;
        
        $listGr = "<tr>";
        $listGr .= "\n    \t     \t <td colspan=\"4\" class=\"pr-4 \">\n\t<h3 class=\"mt-3 text-primary\">\n\t".$groupName."</h3></td>";
        $listGr .= "</tr>";

        
        foreach ($groupedDatasets as $dataset) {
            if ($dataset['isReady'] >  $displayValue) {
                $notEmptyGr = 1;
                if ($dataset['UID']) {
                    $fileDataset = $exptFolder . '/' . $dataset['shortName'] . '/' . $dataset['UID'] . '.json';
                } else {
                    $fileDataset = $exptFolder . '/' . $dataset['shortName'] . '/' . $dataset['shortname'] . '.json';
                }
                $subDescription = '';
                
                $subDescription = niceChop($dataset['description'], 200);
                
                $id = str_replace($prefix, '', $dataset['identifier']);
                $shortname = $dataset['shortName'];

                
                $countVersions = array_count_values(array_column($datasets, 'shortName'))[$shortname];
                if ($countVersions < 10) {
                    $strCount = "0" . strval($countVersions);
                } else {
                    $strCount = strval($countVersion);
                }



                $info  = "\n    \t  <tr>";
                
                $info .= "\n    \t     \t <td class=\"px-4 \"><b>".$dataset['title']." </b><i class=\"bi bi-file-text\"  title=\"". $subDescription   ."\">
                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-file-text\" viewBox=\"0 0 16 16\">
                <path d=\"M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z\"/>
                <path d=\"M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z\"/>
              </svg></i>";
              $datasetCheckURL = "";
              if ($dataset['isReady'] == 1  ) {
                $info.=$checkThisOne;
                $datasetCheckURL = "<br /><B class=\"text-warning\">DRAFT VERSION</B><br /> <a  href=\"dataset/".$expt."/". $dataset['version']."-".$dataset['shortName'] . "\">dataset/".$expt."/". $dataset['version']."-".$dataset['shortName'] . "</a>";
            }
                $info.="</td>";
                $info .= "\n    \t     \t <td class=\"pr-4 \">".$dataset['publication_year']."</td>";
                $info .= "\n    \t     \t <td class=\"pr-4 \">".$dataset['dstype']."</td>";
                $info .= "\n    \t     \t <td class=\"pr-4 \"><a  href=\"dataset/".$expt."/". $dataset['version']."-".$dataset['shortName'] . "\">". $dataset['identifier']."</a>".$datasetCheckURL." </td>";
                $info .= "\n    \t     \t <td class=\"pr-4 \">". $dataset['version']."</a></td>";
                $info .= "\n    \t  </tr>";
                
                /*
                $info .= "\n	<div class=\"card  h-100 bg-light mb-3 \" >";
                
                $info .= "\n	\t	<div class=\"card-header\">" . $dataset['title'] . "</div>";
                $info .= "\n	\t	<div class=\"card-body\">";
                if ($dataset['isReady'] == 1  ) {
                    $info.="<B>CHECK THIS ONE</B><br />";
                }
                // $info .="\n \t <h4 class=\"card-title\">Light card title</h4>";
                $info .= "\n	\t	\t		<small class=\"card-muted\">" . $dataset['dataset_type'] . $subDescription . " <br /> " . $dataset['shortName'] . " </small>";
                $info .= "\n	\t		</div>";
                $info .= "\n	\t	<div class=\"card-footer\"> <a class=\"btn btn-primary stretched-link\" href=\"dataset/" . $expt . "/" . $dataset['UID'] . "\"> More ...</a></div>";
                
                $info .= "\n	\t	</div>";
                $info .= "\n	\t	</div>";
                /*
                 * now if the dataset has a next version, then do not show
                 */
                
                 if ($strCount == $dataset['version']) {
                    $listGr .= $info;
                    $notEmptyGr = 1; // shift group to
                 }
                
            }
        }

        
        if ($notEmptyGr == 1) {
            $list .= $listGr;
            
        }

    }
    $list .= "</table></div>";
    echo $list;
}

?>
