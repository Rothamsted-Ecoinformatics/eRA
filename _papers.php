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
			<h4>Search Settings</h4>
			<hr />
			<form name = "paperForm" action="e-RApubs.php" method="Get">

				<div class="form-group">
					<label for="SearchAuthor">Author:</label> <input type="text"
						class="form-control" id="SearchAuthor" name="SearchAuthor"
						value="" onclick="document.paperForm.submit()">
				</div>

				<div class="form-group">
					<label for="SearchTitle">Title:</label> <input type="text"
						class="form-control" id="SearchTitle" name="SearchTitle" value="" onclick="document.paperForm.submit()">
				</div>

				<hr />
				<div class="form-group">
					<label for="expt[]" multiple="multiple">Experiment:</label> <select
						class="form-control" multiple id="expt[]" name="expt[]" >
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
					<label for="startyear">Start Year:</label> <input name="startyear"
						size="4" value="" class="form-control"> <br /> <label
						for="stopyear">End Year:</label> <input name="stopyear" size="4"
						value="" class="form-control">
				</div>
				<hr />
				<div class="form-group">
					<label for="SearchTitle">Search Abstracts:</label> <input
						type="checkbox" name="SearchSum" class="form-control" /> <label
						for="Summary">Display Abstracts: </label> <input type="checkbox"
						name="Summary" class="form-control" />
				</div>
				<hr />
				<div class="form-group d-none">
					<label for="output">Prepare Output: </label> <br /> <input
						type="radio" name="output" value="TAB" />: TAB separated values<br />
					<input type="radio" name="output" value="ENL" />: or other
					reference software<br /> <input type="radio" name="output"
						value="NO" checked="checked" />: No output <br />
				</div>
				<hr />
				<input type="submit" name="submit" value="Search" /><input
					type="submit" name="reset" value="Reset" /> <span></span>

			</form>
		</div>
	</div>

	<div class="col-sm-9 pr-3">
		<h1>e-RApubs</h1>
		<h2>Search the Bibliography</h2>
				<?php
    if (!isset( $submit)) {
        ?>
					<div class="jumbotron mr-3">Our bibliography contains more than 1650
			references of articles, reports or documents mentioning the
			Rothamsted long-term experiments and meteorological records. Please
			contact us if you think some references are missing.
			</div>
					<?php
    } 
    if (isset($submit) && $submit == "Search") {
        // ------------year-----------------
        
        if ($stopyear == "") {
            $stopyear = $startyear;
        }
        
        if (($startyear <= $stopyear) and ($startyear > 1800)) {
            $stringYear = ("AND ( `Year` BETWEEN $startyear AND $stopyear ) ");
            // echo ("Timespan:<b> $startyear - $stopyear </b><br />");
        } else {
            $stringYear = "";
        }
        
        if (isset($_GET['expt'])) {
            // -----keywords-------------------
            $stringKeywords = "AND (";
            $expt = $_GET['expt'];
            //pretty($expt);
            foreach ($expt as $value) {
                // echo "keyword <b> $value </b>is SELECTED <br />";
                $stringKeywords = $stringKeywords . "`Keywords` LIKE '%$value%'  OR ";
            }
            
            $L = strlen($stringKeywords) - 3;
            $stringKeywords = substr($stringKeywords, 0, $L); // removes the last OR
            $stringKeywords = $stringKeywords . ")";
        } else {
            $stringKeywords = "";
        }
        $stringTitle = "";
        if ($SearchTitle) {
            $stringTitle = "AND (`Title` LIKE '%$SearchTitle%' OR `Keywords` LIKE '%$SearchTitle%' ";
            //echo ("With  <b>$SearchTitle  </b>in the title <br />");
            if ($SearchSum) {
                $stringTitle = $stringTitle . "OR `Comment` LIKE '%$SearchTitle%' ";
            }
            $stringTitle = $stringTitle . ") ";
        }
        
        $StringNameSearch = "AND (";
        if ($SearchAuthor) {
            $StringNameSearch .= "`Authors` LIKE '%$SearchAuthor%' AND ";
             //echo ("With <b>$SearchAuthor </b> in the Author's list <br />");
        }
        $StringNameSearch .= "`RefType` IS NOT NULL)";
        // echo $StringNameSearch;
        $query = "SELECT `eraPapers`.`PaperID`, 
`eraPapers`.`RefType`,
 `eraPapers`.`Authors`, 
IF(`eraPapers`.Year IS NULL or `eraPapers`.Year='', 1, 0)AS yearnull ,
 `eraPapers`.`Year` ,
 `eraPapers`.`Title`, 
`eraPapers`.`Journal`,
`eraPapers`.`Volume`, 
`eraPapers`.`Issue`, 
`eraPapers`.`Pages`, 
`eraPapers`.`Keywords`, 
`eraPapers`.`Comment`,
`eraPapers`.`Date`, 
`eraPapers`.`DOI` as `PaperDOI`, 
`eraPapers`.`URL`, 
`eraPapers`.`GRID` as `eRAGRID`,
`RaDOIs`.`DOI` as `eradocDOI` FROM `eraPapers` left join `RaDOIs` on `RaDOIs`.`GRID` = `eraPapers`.`GRID` WHERE 1
					$stringYear
					$stringKeywords
					$stringTitle
					$StringNameSearch
			     order by `yearnull` desc, `Year`  Desc";
        
        $random = rand(234, 123456789);
        
        if ($output == "TAB") {
            outputTAB($query);
            
            ?>
<br /> <b> <a href="export.txt?noCache=<?=$random?>" >Download
				your TAB separated Output</a>
		</b>
						<?php
        } elseif ($output == "ENL") {
            outputALL($query);
            ?>

<b><a href="export.txt?noCache=<?=$random?>" >Save to
				Endnote or other reference software</a> | <a href="home/helpenl.php"
			target="out">Help (html) </a> | <a href="home/helpenl.pdf"
			target="out">Help (pdf) </a> </b>
					<?php
        } else {
            ;
        }
        ?>

					<?php
        // echo $query;
        $link = LogAsGuest();
        //echo ($query);
        $OldYear = "";
        $resultk2 = mysqli_query($link,$query);
        if (! $resultk2) {
            print("query failed");
        } else {
            $i = 0;
            $nbResults = mysqli_num_rows($resultk2);
            if ($nbResults > 0) {
                echo ("<br /><b>Result: $nbResults references</b><br />");
            }
            while ($rowk2 = mysqli_fetch_array($resultk2)) {
                
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
                $ReferenceLine = $ReferenceLine . "\n<li class=\"nicelist\"> ".$rowk2['Authors'] ;
                if ($rowk2['Year']) {
                    $ReferenceLine = $ReferenceLine . "(".$rowk2['Year'].")";
                }
                if ($rowk2['Title']) {
                    $ReferenceLine = $ReferenceLine . " \"".$rowk2['Title']."\"";
                }
                if ($rowk2['Journal']) {
                    $ReferenceLine = $ReferenceLine . ", <i>".$rowk2['Journal']."</i>";
                }
                if ($rowk2['Volume']) {
                    $ReferenceLine = $ReferenceLine . ", <b>".$rowk2['Volume']."</b>";
                }
                if ($rowk2['Issue']) {
                    $ReferenceLine = $ReferenceLine . ", (".$rowk2['Issue'].")";
                }
                if ($rowk2['Pages']) {
                    $ReferenceLine = $ReferenceLine . ", ".$rowk2['Pages'];
                }
                $link = 0;
                if (strlen(trim($rowk2['eradocDOI'])) > 1) {
                    $ReferenceLine = $ReferenceLine . "<br /> <b>DOI: <a target = \"_blank\" href=\"".$rowk2['eradocDOI']."\" >".$rowk2['eradocDOI']."</a></b>";
                    $link = 1;
                } else if (strlen(trim($rowk2['eRAGRID'])) > 1) {
                    $ReferenceLine = $ReferenceLine . "<br /> <b>eRAdocID: <a target = \"_blank\" href=\"https://www.era.rothamsted.ac.uk/eradoc/article/".$rowk2['eRAGRID']."\" >https://www.era.rothamsted.ac.uk/eradoc/article/".$rowk2['eRAGRID']."</a></b>";
                    $link = 1;
                } else if (strlen(trim($rowk2['PaperDOI'])) > 1) {
                    $ReferenceLine = $ReferenceLine . "<br /> <b>DOI: <a target = \"_blank\" href=\"https://doi.org/".$rowk2['PaperDOI']."\" >https://doi.org/".$rowk2['PaperDOI']."</a></b>";
                    $link = 1;
                } else if (strlen(trim($rowk2['URL'])) > 1 && ! strstr(trim($rowk2['URL']), '<')) {
                    
                    $link = 1;
                    
                    $ReferenceLine = $ReferenceLine . "<br /> <b>URL: <A HREF=\"$rowk2[URL]\" >$rowk2[URL]</a></b>";
                }
                if ($link == 0) {
                    $title = urlencode($rowk2['Title']);
                    $ReferenceLine = $ReferenceLine . "<br /> <b><A HREF=\"https://scholar.google.co.uk/scholar?hl=en&q=" . $title . "\" >Search Google Scholar</a></b>";
                }
                
                if ($rowk2['Comment']) {
                    if (isset($Summary) && $Summary == "on") {
                        $ReferenceLine = $ReferenceLine . "<br /><small> ".$rowk2['Comment']."</small>";
                    }
                }
                
                $ReferenceLine = $ReferenceLine . " (".$rowk2['RefType'].") </li>";
                echo $ReferenceLine;
                $i ++;
            }
            if ($i == 0) {
                echo ("<br />No publication was found with these criteria. Please try and widen your search.<br />");
            }
        }
    }
    ?>

</ul>

	</div>
</div>