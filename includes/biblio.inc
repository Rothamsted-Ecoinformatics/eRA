<?php
/**
 * @desc    Gets the references associated with a specific keyword
 * @author      Nathalie Castells-Brooke <nathalie.castells@rothamsted.ac.uk>
 * @version     0.1.0
 * @param       string $KeyRef  keyword to query
 * @return string with all the formatted references
 */

function GetKeyRefs($KeyRef)
{
    $query = "SELECT *, IF(Year IS NULL or Year='', 1, 0)AS yearnull FROM `eraPapers` WHERE 1
    AND `Keywords` Like '%$KeyRef%'
    order by `yearnull` desc, `Year`  Desc";
    
    // echo $query; //Change that with Listing Unreviewed poster in a separate category.
    $link = LogAsGuest();
    
    $resultk2 = mysqli_query($link, $query);
    $num_rowsk2 = mysqli_num_rows($resultk2);
    
    if (! $resultk2) {
        print("query failed");
    } else {
        if ($num_rowsk2 > 0) {
            $i = 0;
            while ($rowk2 = mysqli_fetch_array($resultk2)) {
                
                if ($rowk2[Year] != $OldYear) {
                    
                    if ($rowk2[yearnull] == "1") {
                        echo ("\n</p> <p><b><i>In Preparation</i></b></p>\n<ul>");
                        $OldYear = $rowk2[Year];
                    } else {
                        if ($OldYear != "") {
                            echo ("\n </ul>\n");
                        }
                        echo ("\n</p> <p><b><i>$rowk2[Year]</i></b></p>\n<ul>");
                        $OldYear = $rowk2[Year];
                    }
                }
                $ReferenceLine = "";
                $ReferenceLine = $ReferenceLine . "\n<li> $rowk2[Authors] ";
                if ($rowk2[Year]) {
                    $ReferenceLine = $ReferenceLine . "($rowk2[Year])";
                }
                if ($rowk2[Title]) {
                    $ReferenceLine = $ReferenceLine . " \"$rowk2[Title]\"";
                }
                if ($rowk2[Journal]) {
                    $ReferenceLine = $ReferenceLine . ", <i>$rowk2[Journal]</i>";
                }
                if ($rowk2[Volume]) {
                    $ReferenceLine = $ReferenceLine . ", <b>$rowk2[Volume]</b>";
                }
                if ($rowk2[Pages]) {
                    $ReferenceLine = $ReferenceLine . ", $rowk2[Pages]";
                }
                if ($rowk2[GRID]) {
                    $ReferenceLine = $ReferenceLine . "<br /> <b><a target=\"_blank\" href=\"http://www.era.rothamsted.ac.uk/eradoc/article/".$rowk2[GRID]."\">Get from eRAdoc: ".$rowk2[GRID]."</a></b>";
                }
                
                if ($rowk2[DOI]) {
                    $ReferenceLine = $ReferenceLine . "<br /> <b><a target=\"_blank\" href=\"http://dx.doi.org/".$rowk2[DOI]."\">DOI: ".$rowk2[DOI]."</a></b>";
                } elseif ($rowk2[URL]) {
                    if (substr_count($rowk2[URL], "<GO") > 0) {
                        ;
                    } else {
                        $ReferenceLine = $ReferenceLine . "<br /> <b><A  target=\"_blank\" href=\"http://dx.doi.org/".$rowk2[DOI]."\">Get Paper</a></b>";
                    }
                } else {}
                
                $ReferenceLine = $ReferenceLine . "</li>";
                echo $ReferenceLine;
                $i ++;
            }
            if ($i == 0) {
                $ReferenceLine= "No publication was found with these criteria. Please try and widen your search.";
            }
        }
    }
    return $ReferenceLine;
}

/**
 * /*
 * This array contains the exeptions to the capitalisation functin.
 * add to that the words that have a strange capitalisation
 */
/*
 * Function to make title case of any string. Deals with exeptions
 * @string: the string to format
 * @nicestring : the returned string
 */
function outputTAB($query)
{ // prepare a file called export.txt in index directory to export Library as TAB
$link = LogAsGuest();

$resultk2 = mysqli_query($link , $query);
if (! $resultk2) {
    print("query failed");
} else {
    $ourFileName = "export.txt";
    $fh = fopen($ourFileName, 'w') or die("can't open file");
    $ReferenceLine = "Reference Type\tAuthor\tYear\tTitle\tSecondary Title\tVolume\tPages";
    fwrite($fh, $ReferenceLine);
    // echo ("<pre>");
    $i = 0;
    // echo ("Reference Type\tAuthor\tYear\tTitle\tSecondary Title\tVolume\tPages");
    while ($rowk2 = mysqli_fetch_array($resultk2)) {
        
        $ReferenceLine = "\n$rowk2[RefType]";
        $stringAuthors = str_replace(". and", ";", $rowk2[Authors]);
        $stringAuthors2 = str_replace(". ,", ";", $stringAuthors);
        $ReferenceLine = $ReferenceLine . "\t$stringAuthors2";
        $ReferenceLine = $ReferenceLine . "\t $rowk2[Year]";
        $ReferenceLine = $ReferenceLine . "\t $rowk2[Title]";
        $ReferenceLine = $ReferenceLine . "\t $rowk2[Journal]";
        $ReferenceLine = $ReferenceLine . "\t $rowk2[Volume]";
        $ReferenceLine = $ReferenceLine . "\t $rowk2[Pages]";
        $ReferenceLine = $ReferenceLine . "\t $rowk2[PaperDOI]";
        // $ReferenceLine = $ReferenceLine . "\t $rowk2[Comment]";
        // echo $ReferenceLine;
        fwrite($fh, $ReferenceLine);
    }
}

fclose($fh);
}

function outputEN($query)
{
    $link = LogAsGuest();
    
    $resultk2 = mysqli_query($link , $query);
    if (! $resultk2) {
        print("query failed");
    } else {
        $ourFileName = "export.txt";
        $fh = fopen($ourFileName, 'w') or die("can't open file");
        
        // echo ("<pre>");
        $i = 0;
        
        while ($rowk2 = mysqli_fetch_array($resultk2)) {
            
            $ReferenceLine = "\n\n%0 $rowk2[RefType]";
            $stringAuthors = str_replace(". and", "\n%A", $rowk2[Authors]);
            $stringAuthors2 = str_replace(". ,", "\n%A", $stringAuthors);
            $ReferenceLine = $ReferenceLine . "\n%A $stringAuthors2";
            if ($rowk2[Year]) {
                $ReferenceLine = $ReferenceLine . "\n%D $rowk2[Year]";
            }
            if ($rowk2[Title]) {
                $ReferenceLine = $ReferenceLine . "\n%T $rowk2[Title]";
            }
            if ($rowk2[Journal]) {
                $ReferenceLine = $ReferenceLine . "\n%J $rowk2[Journal]";
            }
            if ($rowk2[Volume]) {
                $ReferenceLine = $ReferenceLine . "\n%V $rowk2[Volume]";
            }
            if ($rowk2[Pages]) {
                $ReferenceLine = $ReferenceLine . "\n%P $rowk2[Pages]";
            }
            if ($rowk2[Comment]) {
                if ($Summary) {
                    $ReferenceLine = $ReferenceLine . "\n%X $rowk2[Comment]";
                }
            }
            // echo $ReferenceLine;
            fwrite($fh, $ReferenceLine);
        }
    }
    
    fclose($fh);
}

function outputMED($query)
{
    LogAsGuest();
    
    $resultk2 = mysqli_query($query);
    if (! $resultk2) {
        print("query failed");
    } else {
        $ourFileName = "export.txt";
        $fh = fopen($ourFileName, 'w') or die("can't open file");
        
        // echo ("<pre>");
        $i = 0;
        
        while ($rowk2 = mysqli_fetch_array($resultk2)) {
            
            $ReferenceLine = "\n\nPMID- $rowk2[PaperID]\nPT  - $rowk2[RefType]";
            $stringAuthors = str_replace(". and", "\nAU", $rowk2[Authors]);
            $stringAuthors2 = str_replace(". ,", "\nAU", $stringAuthors);
            $stringAuthors3 = str_replace(".", "", $stringAuthors2);
            $stringAuthors4 = str_replace(" ", "", $stringAuthors3);
            $stringAuthors5 = str_replace(",", " ", $stringAuthors4);
            $stringAuthors6 = str_replace("AU", "AU  - ", $stringAuthors5);
            $ReferenceLine = $ReferenceLine . "\nAU  - $stringAuthors6";
            if ($rowk2[Year]) {
                $ReferenceLine = $ReferenceLine . "\nDP  - $rowk2[Year]";
            }
            if ($rowk2[Title]) {
                $ReferenceLine = $ReferenceLine . "\nTI  - $rowk2[Title]";
            }
            if ($rowk2[Journal]) {
                $ReferenceLine = $ReferenceLine . "\nJT  - $rowk2[Journal]";
            }
            if ($rowk2[Journal]) {
                $ReferenceLine = $ReferenceLine . "\nTA  - $rowk2[Journal]";
            }
            if ($rowk2[Volume]) {
                $ReferenceLine = $ReferenceLine . "\nVI  - $rowk2[Volume]";
            }
            if ($rowk2[Issue]) {
                $ReferenceLine = $ReferenceLine . "\nIP  - $rowk2[Issue]";
            }
            if ($rowk2[Pages]) {
                $ReferenceLine = $ReferenceLine . "\nPG  - $rowk2[Pages]";
            }
            
            if ($rowk2[Comment]) {
                $ReferenceLine = $ReferenceLine . "\nAB  - $rowk2[Comment]";
            }
            // echo $ReferenceLine;
            fwrite($fh, $ReferenceLine);
        }
    }
    
    fclose($fh);
}

function outputALL($query)
{
    LogAsGuest();
    
    $ReferenceLine = "FN ISI Export Format";
    $results = mysqli_query($query);
    if (! $results) {
        print("query failed");
    } else {
        $ourFileName = "export.txt";
        $fh = fopen($ourFileName, 'w') or die("can't open file");
        fwrite($fh, $ReferenceLine);
        while ($rows = mysqli_fetch_array($results)) {
            
            $RefType = $rows[RefType];
            $PT = $RefType{0};
            $ReferenceLine = "\nPT $PT";
            $stringAuthors = str_replace(". and", "\n  ", $rows[Authors]);
            $stringAuthors2 = str_replace(". ,", "\n  ", $stringAuthors);
            $stringAuthors3 = str_replace(". ", "", $stringAuthors2);
            $stringAuthors4 = str_replace(".", "", $stringAuthors3);
            $ReferenceLine = $ReferenceLine . "\nAU $stringAuthors4";
            
            if ($rows[Year]) {
                $ReferenceLine = $ReferenceLine . "\nPY $rows[Year]";
            }
            if ($rows[Title]) {
                $ReferenceLine = $ReferenceLine . "\nTI $rows[Title]";
            }
            if ($rows[Journal]) {
                $ReferenceLine = $ReferenceLine . "\nSO $rows[Journal]";
            }
            
            if ($rows[Volume]) {
                $ReferenceLine = $ReferenceLine . "\nVL $rows[Volume]";
            }
            if ($rows[Issue]) {
                $ReferenceLine = $ReferenceLine . "\nIS $rows[Issue]";
            }
            if ($rows[Pages]) {
                $ReferenceLine = $ReferenceLine . "\nPG $rows[Pages]";
            }
            if ($rows[PaperDOI]) {
                $ReferenceLine = $ReferenceLine . "\nDI $rows[PaperDOI]";
            }
            fwrite($fh, $ReferenceLine);
            if ($rows[Comment]) {
                fwrite($fh, "\nAB $rows[Comment]");
            }
            fwrite($fh, "\nER\n");
        }
        fwrite($fh, "\nEF");
    }
    
    fclose($fh);
}
