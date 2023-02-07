<?php 
/**
 * @file _papers.php
 * @brief module that search papers in the bibliography database.
 *
 * @author Nathalie Castells-Brooke
 * @date 9/27/2018
 */
?>
<div class="row">
    <div class="col-sm-3">
        <div id="idPaperSideBar" class="card p-1 ml-3">
            <form name="paperForm" action="e-RApubs2.php" method="Get">
                <input type="submit" name="submit" value="Search" /><input type="submit" name="reset" value="Reset" />
                <span></span>
                <hr />
                <div class="form-group">
                    <label for="SearchAuthor">in Author, Title and Abstract:</label> <input type="text"
                        class="form-control" id="SearchAuthor" name="SearchAuthor" value=""
                        onclick="document.paperForm.submit()">
                    <small>Enter words separated by spaces </small>
                </div>


                <hr />
                <div class="form-group">
                    <label for="expt[]" multiple="multiple">Experiment:</label> <select class="form-control" multiple
                        id="expt[]" name="expt[]">
                        <option value="Broadbalk">Broadbalk</option>
                        <option value="Park Grass">Park Grass</option>
                        <option value="Hoosfield">Hoosfield</option>
                        <option value="Alternate Wheat and Fallow">Alternate Wheat and
                            Fallow</option>
                        <option value="Exhaustion Land">Exhaustion Land</option>
                        <option value="Met data">Met data</option>
                        <option value="Agdell">Agdell</option>
                        <option value="Barnfield">Barnfield</option>
                        <option value="Brooms Barn">Brooms Barn</option>
                        <option value="Garden Clover">Garden Clover</option>
                        <option value="Broadbalk Wilderness">Broadbalk Wilderness</option>
                        <option value="Geescroft Wilderness">Geescroft Wilderness</option>
                        <option value="Fosters ley arable">Fosters ley arable</option>
                        <option value="Long-term liming">Long-term liming</option>
                        <option value="Highfield ley arable">Highfield ley arable</option>
                        <option value="Highfield bare fallow">Highfield bare fallow</option>
                        <option value="Saxmundham Rotations">Saxmundham Rotations</option>
                        <option value="Woburn">Woburn</option>
                        <option value="Woburn Continuous Cereals">Woburn Continuous Cereals</option>
                        <option value="Woburn Ley-Arable">Woburn Ley-Arable</option>
                        <option value="Woburn Organic Manuring">Woburn Organic Manuring</option>



                    </select>
                </div>
                <hr />
                <div class="form-group">
                    <label for="startyear">Start Year:</label> <input name="startyear" size="4" value=""
                        class="form-control"> <br /> <label for="stopyear">End Year:</label> <input name="stopyear"
                        size="4" value="" class="form-control">
                </div>
                <hr />
                <div class="form-group">
                    <label for="Summary">Display Abstracts: </label> <input type="checkbox" name="Summary"
                        class="form-control" />
                    <hr />
                </div>

                <div class="form-group d-none">
                    <label for="output">Prepare Output: </label> <br /> <input type="radio" name="output"
                        value="TAB" />: TAB separated values<br />
                    <input type="radio" name="output" value="ENL" />: or other
                    reference software<br /> <input type="radio" name="output" value="NO" checked="checked" />: No
                    output <br />
                    <hr />
                </div>

                <input type="submit" name="submit" value="Search" /><input type="submit" name="reset" value="Reset" />


            </form>
        </div>
    </div>

    <div class="col-sm-9 pr-3">
        <h1>e-RApubs</h1>
        <h2>Search the Bibliography</h2>
        <?php

    function like($haystack, $needle) {
        
        $result = array_filter($haystack, function ($item) use ($needle) {
            $combined = "- ".$item; // this ensures that the search item, if found is never on position 0!
            if (stripos($combined, $needle) > 0 ) {
                return 1;
            }
            return 0;
        });
        return $result;
    }
    function strip_tags_content($text) {

        return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);

        }
        if (!isset( $submit) || $_GET['reset'] == 'Reset') {
        $submit = "Search";
        ?>
        <div class="jumbotron mr-3">Our bibliography contains more than 1900
            references of articles, reports or documents mentioning the
            Rothamsted long-term experiments and meteorological records. Please
            contact us if you think some references are missing.
        </div>
        <?php
    } 
    if (isset($submit) && $submit == "Search") {
       
        # for earch row of the array, that is an array: we look for any of these values and if it is in there, then we keep the row or we move on. 
        # for string searches, we perform a Like function, and for the year, we are looking that the year is between the 2 years values
        # Lets; build an array of needles that we will look in each row (haystack) of the array. 
        # If at least one needle is found, we keep the row. If not, we  move on
        $needles = array();
    
       
        if (isset($_GET['startyear'])) {
            $startyear   = cleanQuery($_GET['startyear']);
            $int_startyear   = intval($startyear);
            
            }
        if (isset($_GET['stopyear'])) {
            $stopyear   = cleanQuery($_GET['stopyear']);
            
            if ($stopyear == "") {
                $stopyear = "3000";
            }
            $int_stopyear   = intval($stopyear);
            }
        if (($startyear <= $stopyear) and ($startyear > 1800)) {
                $filterYear = true;
            } else {
                $filterYear = false;
            }
        if (isset($_GET['expt'])) {
            // -----keywords-------------------
            $expt = $_GET['expt'];
            foreach ($expt as $value) {
                $needles[] = $value;
            }
        } 
        if (isset($_GET['SearchTitle'])) {
            $seek = explode(" ", cleanQuery($_GET['SearchTitle']));
            foreach ($seek as $iseek) {
                $needles[]   = $iseek;
            }   
        }
    
        if (isset($_GET['SearchAuthor'])) {
            $seek = explode(" ", cleanQuery($_GET['SearchAuthor']));
            foreach ($seek as $iseek) {
                $needles[]   = $iseek;
            }
        }
               
        $random = rand(234, 123456789);
        
        $OldYear = "";
        $resultk2 = array();
        if (count($needles) > 0) {
            # we need to search 
            foreach ($dbpapers as $haystack) {
                    # I am picking up a row: 
                $foundIt = 0;
                foreach ($needles as $needle) {
                    $result = like($haystack, $needle);
                    $foundIt += count($result);
                }
                if ($filterYear) {
                    if ( intval($haystack['Year']) >= $int_startyear and intval($haystack['Year'])<= $int_stopyear) {
                    
                    } else {$foundIt = 0;}
                }
                if ($foundIt > 0) {
                    $resultk2[] = $haystack;
                }
            }
        } else {
            $resultk2 = $dbpapers;
        }

        if (!$resultk2) {
            $resultk2 = $dbpapers;
            
        } 

        $i = 0;
        $nbResults = count($resultk2);
        $columns = array_column($resultk2, 'Year');
        array_multisort($columns, SORT_DESC, $resultk2);
        if ($nbResults > 0) {
            $searchItems = "";
            foreach ($needles as $needle) {
                $searchItems .= 'OR <b>'.$needle.'</b> ';
            }
            $searchItems = ltrim($searchItems,"OR");
            echo ("<br />Searching for  $searchItems<br />");
            echo ("<br /><b>Result: $nbResults references</b><br />");
            // print ("<br />".$query);
        }
        foreach ($resultk2 as $rowk2) {
            
            /*
                * if ( $rowk2[RefType] != $OldType) {
                * echo ("\n</ul>\n");
                * echo ("\n<h4>Reference Type: $rowk2[RefType]</h4>\n");
                * $OldType = $rowk2[RefType];
                * $OldYear = "";
                * }
                */
            if ($rowk2['Year'] != $OldYear) {
                
                if ($rowk2['yearnull'] == "1") {
                    echo ("\n<p><b><i>In Preparation</i></b></p>\n<ul>");
                    $OldYear = $rowk2['Year'];
                } else {
                    if ($OldYear != "") {
                        echo ("\n </ul>\n");
                    }
                    echo ("\n<p><b><i>".$rowk2['Year']."</i></b></p>\n<ul>");
                    $OldYear = $rowk2['Year'];
                }
            }
            $ReferenceLine = "";
            $ReferenceLine .=  "\n<li class=\"nicelist\"> ".$rowk2['Authors'] ;
            if ($rowk2['Year']) {
                $ReferenceLine .= "(".$rowk2['Year'].")";
            }
            if ($rowk2['Title']) {
                $ReferenceLine .= " \"".$rowk2['Title']."\"";
            }
            if ($rowk2['Journal']) {
                $ReferenceLine .= ", <i>".$rowk2['Journal']."</i>";
            }
            if ($rowk2['Volume']) {
                $ReferenceLine .= ", <b>".$rowk2['Volume']."</b>";
            }
            if ($rowk2['Issue']) {
                $ReferenceLine .= ", (".$rowk2['Issue'].")";
            }
            if ($rowk2['Pages']) {
                $ReferenceLine .= ", ".$rowk2['Pages'];
            }
            $link = 0;
            if (strlen(trim($rowk2['eradocDOI'])) > 1) {
                $ReferenceLine .= "<br /> <b>DOI: <a target = \"_blank\" href=\"".$rowk2['eradocDOI']."\" >".$rowk2['eradocDOI']."</a></b>";
                $link = 1;
            } else if (strlen(trim($rowk2['eRAGRID'])) > 1) {
                $ReferenceLine .= "<br /> <b>eRAdocID: <a target = \"_blank\" href=\"https://www.era.rothamsted.ac.uk/eradoc/article/".$rowk2['eRAGRID']."\" >https://www.era.rothamsted.ac.uk/eradoc/article/".$rowk2['eRAGRID']."</a></b>";
                $link = 1;
            } else if (strlen(trim($rowk2['PaperDOI'])) > 1) {
                $ReferenceLine .= "<br /> <b>DOI: <a target = \"_blank\" href=\"https://doi.org/".$rowk2['PaperDOI']."\" >https://doi.org/".$rowk2['PaperDOI']."</a></b>";
                $link = 1;
            } else if (strlen(trim($rowk2['URL'])) > 1 && ! strstr(trim($rowk2['URL']), '<')) {
                
                $link = 1;
                
                $ReferenceLine .= "<br /> <b>URL: <A HREF=\"$rowk2[URL]\" >$rowk2[URL]</a></b>";
            }
            if ($link == 0) {
                $title = urlencode($rowk2['Title']);
                $ReferenceLine .= "<br /> <b><A HREF=\"https://scholar.google.co.uk/scholar?hl=en&q=" . $title . "\" >Search Google Scholar</a></b>";
            }
            
            if ($rowk2['Comment']) {
                if (isset($Summary) && $Summary == "on") {
                    
                    $ReferenceLine .= "<br />".strip_tags_content($rowk2['Comment']);
                }
            }
            
            $ReferenceLine .= " (".$rowk2['RefType'].") </li>";
            echo $ReferenceLine;
            $i ++;
        }
        if ($i == 0) {
            echo ("<br />No publication was found with these criteria. Please try and widen your search.<br />");
        }
        
    }
    ?>

        </ul>

    </div>
</div>