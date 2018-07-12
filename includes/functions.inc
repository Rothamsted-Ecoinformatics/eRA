<?php
function check_input($value)
{
    // Stripslashes
    if (get_magic_quotes_gpc())
    {
        $value = stripslashes($value);
    }
    // Quote if not a number
    if (!is_numeric($value))
    {
        $value = "'" . mysql_real_escape_string($value) . "'";
    }
    return $value;
}


function GetKeyRefs($KeyRef)
{
    $query = "SELECT *, IF(Year IS NULL or Year='', 1, 0)AS yearnull FROM `eraPapers` WHERE 1
	AND `Keywords` Like '%$KeyRef%'
	order by `yearnull` desc, `Year`  Desc";
    
    // echo $query; //Change that with Listing Unreviewed poster in a separate category.
    LogAsGuest();
    
    $resultk2 = mysql_query($query);
    $num_rowsk2 = mysql_num_rows($resultk2);
    
    if (! $resultk2) {
        print("query failed");
    } else {
        if ($num_rowsk2 > 0) {
            
            ?>
<a name="papers"></a>
<h2>Key References</h2>
<?php
            
            $i = 0;
            while ($rowk2 = mysql_fetch_array($resultk2)) {
                
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
                $ReferenceLine = $ReferenceLine . "\n<li class=\"nicelist\"> $rowk2[Authors] ";
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
                    $ReferenceLine = $ReferenceLine . "<br /> <b><A HREF=\"\" target=\"popup\" onClick=\"NewWindow('http://www.era.rothamsted.ac.uk/eradoc/article/$rowk2[GRID]', 'popup', 850, 700, 'center'); return false; window.name('Main');\">Get Paper from eRAdoc</a></b>";
                }
                
                if ($rowk2[DOI]) {
                    $ReferenceLine = $ReferenceLine . "<br /> <b><A HREF=\"\" target=\"popup\" onClick=\"NewWindow('http://dx.doi.org/$rowk2[DOI]', 'popup', 850, 700, 'center'); return false; window.name('Main');\">Get Paper</a></b>";
                } elseif ($rowk2[URL]) {
                    if (substr_count($rowk2[URL], "<GO") > 0) {
                        ;
                    } else {
                        $ReferenceLine = $ReferenceLine . "<br /> <b><A HREF=\"\" target=\"popup\" onClick=\"NewWindow('http://dx.doi.org/$rowk2[DOI]', 'popup', 850, 700, 'center'); return false; window.name('Main');\">Get Paper</a></b>";
                    }
                } else {}
                
                $ReferenceLine = $ReferenceLine . "</li>";
                echo $ReferenceLine;
                $i ++;
            }
            if ($i == 0) {
                echo ("No publication was found with these criteria. Please try and widen your search.");
            }
        }
    }
}

/**
 * pretty: one up from vardump; presents values of an array (or double array in a table)
 *
 * @param unknown_type $var            
 */
function pretty($var)
{
    echo ("<br /> this is for a test ");
    
    if (is_array($var)) {
        echo ("<br /> this is for a test: it is an array ");
        echo ("<table>"); // start a table
        if (is_array($var[1])) {
            echo ("<br /> this is for a test: it is a double-array ");
            // make the header row:
            echo ("<tr>");
            foreach ($var[1] as $key2 => $value) {
                echo ("<td><b>" . $key2 . "</b></td>");
            }
            echo ("</tr>");
            for ($i = 0; $i < count($var); $i ++) {
                if ($var[$i]) {
                    echo ("<tr>");
                    // fill in the other rows: values
                    foreach ($var[$i] as $key2 => $value) {
                        
                        echo ("<td>var[" . $i . "][" . $key2 . "] = " . $value . "</td>");
                    }
                    echo ("</tr>");
                }
            }
        } else {
            for ($i = 0; $i < count($var); $i ++) {
                if ($var[$i]) {
                    echo ("<tr><td><b>var[" . $i . "]= " . $var[$i] . "</b></td></tr>");
                }
            }
        }
        echo "</table>";
    } else if (is_string($var)) {
        
        echo ("<br /> this is for a test: it is a string");
        echo ($$var . " = " . $var);
    }
    echo ("<br />");
    return;
}

function testvar()
{
    echo "<h1>GLOBALS</h1><ul>";
    foreach ($GLOBALS as $key => $value) {
        echo "<li><b>" . $key . "</b> = " . $value . "</li>";
    }
    echo "</ul><h1>_REQUEST</h1><ul>";
    foreach ($_REQUEST as $key => $value) {
        echo "<li><b>" . $key . "</b> = " . $value . "</li>";
    }
    
    echo "</ul><h1>_ENV</h1><ul>";
    echo "";
    foreach ($_ENV as $key => $value) {
        echo "<li><b>" . $key . "</b>  = " . $value . "</li>";
    }
    echo "</ul><h1>_SERVER</h1><ul>";
    foreach ($_SERVER as $key => $value) {
        echo "<li><b>" . $key . "</b>  = " . $value . "</li>";
    }
    echo "</ul><h1>_POST</h1><ul>";
    foreach ($_POST as $key => $value) {
        echo "<li><b>" . $key . "</b>  = " . $value . "</li>";
    }
    echo "</ul><h1>_GET</h1><ul>";
    foreach ($_GET as $key => $value) {
        echo "<li><b>" . $key . "</b>  = " . $value . "</li>";
    }
    echo "</ul><h1>_COOKIE</h1><ul>";
    foreach ($_COOKIE as $key => $value) {
        echo "<li><b>" . $key . "</b>  = " . $value . "</li>";
    }
    
    echo "</ul><h1>_SESSION</h1><ul>";
    foreach ($_SESSION as $key => $value) {
        echo "<li><b>" . $key . "</b>  = " . $value . "</li>";
    }
    
    echo "</ul><h1>_FILES</h1><ul>";
    foreach ($_FILES as $key => $value) {
        echo "<li><b>" . $key . "</b>  = " . $value . "</li>";
    }
    
    echo "</ul>";
}


function LogAsGuest()
{
    global $Turbigo;
    global $Dfdniwie;
    global $Gs0tw;
    global $ltwogd1yr;
    $debug .= "login in <br />";
    $link = mysql_connect($Turbigo, $Dfdniwie, $Gs0tw) or die("Error Could not connect to Database: " . mysql_error()); // connect to database
    mysql_select_db($ltwogd1yr) or exit(); // select rrr database
    if ($link)
        $debug .= "Connected";
    // echo $debug;
    return $link;
}

function cleanQuery($string)
{
    if (get_magic_quotes_gpc()) // prevents duplicate backslashes
{
        $string = stripslashes($string);
    }
    if (phpversion() >= '4.3.0') {
        $string = mysqli_real_escape_string($string);
    } else {
        $string = mysql_escape_string($string);
    }
    return $string;
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
    LogAsGuest();
    
    $resultk2 = mysql_query($query);
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
        while ($rowk2 = mysql_fetch_array($resultk2)) {
            
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
    LogAsGuest();
    
    $resultk2 = mysql_query($query);
    if (! $resultk2) {
        print("query failed");
    } else {
        $ourFileName = "export.txt";
        $fh = fopen($ourFileName, 'w') or die("can't open file");
        
        // echo ("<pre>");
        $i = 0;
        
        while ($rowk2 = mysql_fetch_array($resultk2)) {
            
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
    
    $resultk2 = mysql_query($query);
    if (! $resultk2) {
        print("query failed");
    } else {
        $ourFileName = "export.txt";
        $fh = fopen($ourFileName, 'w') or die("can't open file");
        
        // echo ("<pre>");
        $i = 0;
        
        while ($rowk2 = mysql_fetch_array($resultk2)) {
            
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
    $results = mysql_query($query);
    if (! $results) {
        print("query failed");
    } else {
        $ourFileName = "export.txt";
        $fh = fopen($ourFileName, 'w') or die("can't open file");
        fwrite($fh, $ReferenceLine);
        while ($rows = mysql_fetch_array($results)) {
            
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

function nexplode($string)
{
    // takes a\ string and returns and array that has all the parts or the string in the right order.
    // words are in separate boxes of the array with no non word characters.
    $string = str_ireplace(".", ". ", $string);
    $string = str_ireplace("  ", " ", $string);
    $string = str_ireplace("  ", " ", $string);
    $j = 0; // this is the initializer for the array or words
    $pattern = '/\W/';
    for ($i = 0; $i < strlen($string); $i ++) {
        
        if ((preg_match($pattern, $string[$i], $match) && ($len != 1)) || $string[$i] == " ") {
            $j ++; // increments j if we hit a non word. so starts a new word
        } else {}
        $words[$j] .= $string[$i];
        $tok = $words[$j];
        $len = strlen($tok) - 1;
    }
    return $words;
}

function title_case($string)
{
    $arrayLatinNames = array(
        'Acer',
        'acetosa',
        'Achillea',
        'acridid',
        'acris',
        'Adarrus',
        'aemulans',
        'Aethusa',
        'agrestis',
        'Agrimonia',
        'Agropyron',
        'Agrostemma',
        'Agrostis',
        'Aira',
        'Ajuga',
        'alba',
        'albifrons',
        'album',
        'Alchemilla',
        'Allium',
        'Allygus',
        'Alopecurus',
        'Anagallis',
        'Anagallis',
        'angulosa',
        'angustifolium',
        'annua',
        'anserina',
        'Anthemis',
        'Anthocoris',
        'Anthoxanthum',
        'Anthriscus',
        'aparine',
        'apetalous',
        'Aphanes',
        'Aphrodes',
        'apterus',
        'arbustorum',
        'Arenaria',
        'argemone',
        'Arocephalus',
        'Arrhenatherum',
        'Arthaldeus',
        'arvense',
        'arvensis',
        'asper',
        'Atractotomus',
        'Atriplex',
        'atropunctata',
        'aurata',
        'auricomus',
        'autumnalis',
        'Avena',
        'avenaceum',
        'Avenula',
        'aviculare',
        'avium',
        'baccata',
        'Bartsia',
        'bean',
        'Bellis',
        'Berytinus',
        'betonica',
        'Betula',
        'bicinctus',
        'Brassica',
        'Bromus',
        'Bryonia',
        'bufonius',
        'bulbosus',
        'bursa-pastoris',
        'buxbaumii',
        'caespitosa',
        'Calocoris',
        'campestre',
        'campestris',
        'canina',
        'capillaris',
        'caprea',
        'Capsella',
        'Cardamine',
        'Cardaria',
        'Carduus',
        'Carex',
        'caryophyllea',
        'Castanea',
        'catharticum',
        'Caucalis',
        'Celandine',
        'Centaurea',
        'cephalotes',
        'Cerastium',
        'cerasus',
        'cerasus',
        'cervinus',
        'Chaenorhinum',
        'Chaerophyllum',
        'chamaedrys',
        'Chamaenerion',
        'Chamerion',
        'Chenopodium',
        'Chlamydatus',
        'Chlamydatus',
        'Chlamydatus',
        'chrysanthemi',
        'Chrysanthemum',
        'Cicadula',
        'Cirsium',
        'Clematis',
        'communis',
        'confinis',
        'confusus',
        'Conopodium',
        'Conosanus',
        'Convolvulus',
        'corniculatus',
        'coronifera',
        'cracca',
        'Crataegus',
        'Crataegus',
        'Crepis',
        'crispus',
        'cristatus',
        'cynapium',
        'cynapium',
        'Cynosurus',
        'Cyrtorhinus/Tytthus',
        'Dactylis',
        'Dactylorchis',
        'Daisy',
        'decipiens',
        'decolor',
        'delphacid',
        'deltocephalinae',
        'Deltocephalus',
        'Deltocephalus',
        'dens',
        'dentata',
        'denudatum',
        'Deschampsia',
        'Dikraneura',
        'dioica',
        'distinguendus',
        'Doratura',
        'Doratura',
        'draba',
        'draba',
        'Drymus',
        'Drymus',
        'Drymus',
        'dubia',
        'dubium',
        'dubium',
        'dulcamara',
        'duriuscula',
        'Edwardsiana',
        'Edwardsiana',
        'elatine',
        'elatine',
        'elatior',
        'elatius',
        'elegantulus',
        'elegantulus',
        'Elymana',
        'Elymus',
        'Elytrigia',
        'Empoasca',
        'Epilobium',
        'Equisetum',
        'Equisetum',
        'erecta',
        'Errastunus',
        'Errastunus',
        'erucifolius',
        'eupatoria',
        'Euphorbia',
        'Eupteryx',
        'Eurhadina',
        'Euscelis',
        'excelsior',
        'exigua',
        'exigua',
        'exiguus',
        'faba',
        'Fagus',
        'Fallopia',
        'farfara',
        'farfara',
        'fatua',
        'ferus',
        'Festuca',
        'Festulolium',
        'Ficaria',
        'ficaria',
        'Filipendula',
        'flacca',
        'flavescens',
        'flavescens',
        'flavostriatus',
        'fontanum',
        'Fragaria',
        'fragariastrum',
        'Fraxinus',
        'Fraxinus',
        'Fraxinus',
        'French',
        'Fritillaria',
        'fruticosus',
        'fuchsii',
        'Fumaria',
        'Fumaria',
        'fuscofasciatus',
        'Galeopsis',
        'Galeopsis',
        'Galium',
        'Galium',
        'Galium',
        'Galium',
        'Geranium',
        'Geranium',
        'Geranium',
        'Geum',
        'gigantea',
        'githago',
        'Glaucous',
        'glomerata',
        'graminea',
        'gramineae',
        'guttulifera',
        'Halticus',
        'hederifolia',
        'Helictotrichon',
        'Heracleum',
        'Heterotoma',
        'Heterotoma',
        'hians',
        'Hieraceum',
        'hieracioides',
        'Hieracium',
        'hirsutum',
        'hispidus',
        'Holcus',
        'Holcus',
        'holostea',
        'holosteoides',
        'hordeaceus',
        'Hyacinthoides',
        'hybrida',
        'Hyledelphax',
        'Hypericum',
        'Hypnum',
        'Hypnum',
        'Hypnum',
        'Hypochoeris',
        'incisus',
        'inodora',
        'inodorum',
        'Ischnocoris',
        'italicum',
        'jacobaea',
        'Jassargus',
        'Jassargus',
        'Javesella',
        'Juncus',
        'Kelisia',
        'Kickxia',
        'Knautia',
        'Kosswigianella',
        'laevis',
        'Lamium',
        'lanatus',
        'lanceolata',
        'Laodelphax',
        'Lapsana',
        'Lapsana',
        'Lathyrus',
        'Lathyrus',
        'latifolia',
        'Legousia',
        'lemanii',
        'Leontodon',
        'Lepidium',
        'Lesser',
        'lethierryi',
        'Leucanthemum',
        'Linaria',
        'lineatus',
        'Linum',
        'Listera',
        'Lithospermum',
        'Lithospermum',
        'locusta',
        'loliacea',
        'loliaceum',
        'Lolium',
        'Lopus',
        'Lotus',
        'ludoviciana',
        'lupulina',
        'Luzula',
        'Lychnis',
        'lygaeid',
        'Macropsis',
        'Macrosteles',
        'maerkeli',
        'maerkeli',
        'magnicornis',
        'major',
        'majus',
        'Malva',
        'marginatus',
        'Matricaria',
        'media',
        'Medicago',
        'Megopthalmus',
        'meleagris',
        'Melilotus',
        'Mentha',
        'merioptera',
        'merioptera',
        'Michaelmas',
        'millefolium',
        'minor',
        'Minuartia',
        'minus',
        'minutus',
        'mirid',
        'mixtus',
        'molle',
        'mollis',
        'mollis',
        'mollugo',
        'monogyna',
        'montana',
        'montanum',
        'Muirodelphax',
        'Myosotis',
        'myosuroides',
        'Nabis',
        'napus',
        'nemorosa',
        'Neophilaenus',
        'nigra',
        'nigrum',
        'non-scripta',
        'norvegicus',
        'notata',
        'Notostira',
        'nutans',
        'obsoletus',
        'obsoletus',
        'obtusifolius',
        'ocellaris',
        'odontites',
        'odoratum',
        'officinale',
        'officinalis',
        'officinarum',
        'oleracea',
        'oleraceus',
        'olitoria',
        'Ononis',
        'Ononis',
        'Ononis',
        'Ophioglossum',
        'Ornithogalum',
        'Orthocephalus',
        'Orthops',
        'Orthops',
        'ovata',
        'ovina',
        'Papaver',
        'pascuellus',
        'patula',
        'pecten',
        'pecten-veneris',
        'pedestris',
        'Pediopsis',
        'Pedunculate',
        'pedunculatus',
        'pellucida',
        'peplus',
        'perenne',
        'perennis',
        'perforatum',
        'persica',
        'Persicaria',
        'persicaria',
        'persimilis',
        'Phaseolus',
        'Philaenus',
        'Phleum',
        'Picris',
        'Pilosella',
        'Pimpinella',
        'Pithanus',
        'Pithanus',
        'Plagiognathus',
        'Plagiognathus',
        'Plantago',
        'Plantago',
        'Poa',
        'polita',
        'Polygonum',
        'polytrichus',
        'Posterium',
        'Potentilla',
        'Poterium',
        'praecox',
        'praecox',
        'pratense',
        'pratense',
        'pratensis',
        'Primula',
        'proceps',
        'procera',
        'procumbens',
        'Prunella',
        'Prunus',
        'Psammotettix',
        'pseudocellaris',
        'pseudoplatanus',
        'pubescens',
        'pubescens',
        'pubescens',
        'pulchella',
        'pulicaris',
        'pullus',
        'punctum',
        'purpureum',
        'Quercus',
        'radicata',
        'ramosa',
        'ramosus',
        'Ranunculus',
        'raphanistrum',
        'Raphanus',
        'Recilia',
        'repens',
        'reptans',
        'rheas',
        'rhoeas',
        'Rhytistylus',
        'Ribautiana',
        'Ribautodelphax',
        'Ricinus',
        'riviana',
        'riviniana',
        'robur',
        'Rosa',
        'Rosa',
        'rotundifolia',
        'rubra',
        'Rubus',
        'Rubus',
        'Rubus',
        'ruficornis',
        'Rumex',
        'rutabulum',
        'Rye-grass',
        'sabuleti',
        'Sagina',
        'Salix',
        'Salix',
        'saltator',
        'saltitans',
        'Sambucus',
        'Sanguisorba',
        'sativa',
        'sativa',
        'sativa',
        'saxifraga',
        'Scabiosa',
        'Scabiosa',
        'Scabiosa',
        'Scandix',
        'scanicus',
        'Scilla',
        'scutellaris',
        'scutellata',
        'sect.',
        'Senecio',
        'sepium',
        'serpyllifolia',
        'serpyllifolia',
        'serpyllum',
        'serratulae',
        'sexnotatus',
        'Silene',
        'Sinapis',
        'Solanum',
        'Sonchus',
        'sordidus',
        'sp.',
        'Spergula',
        'sphondylium',
        'Spiraea',
        'Spirea',
        'spp.',
        'spumarius',
        'squalidus',
        'squarrosum',
        'Stachys',
        'Stalia',
        'Stellaria',
        'Stenocranus',
        'sterilis',
        'stolonifera',
        'Stygnocoris',
        'stylata',
        'sulphurella',
        'sylvaticus',
        'sylvaticus',
        'sylvestre',
        'sylvestris',
        'synapsis',
        'taraxacifolia',
        'Taraxacum',
        'Taxus',
        'tenerrima',
        'tenuifolia',
        'tenuis',
        'tetrahit',
        'tetrasperma',
        'Thlaspi',
        'Thymus',
        'tiliae',
        'tormentilla',
        'Tournefortii',
        'Tragopogon',
        'Trefoil',
        'tricorne',
        'Trifolium',
        'Trigonotylus',
        'Tripleurospermum',
        'Trisetum',
        'triviale',
        'trivialis',
        'Tussilago',
        'uliginosus',
        'ulmaria',
        'ulmaria',
        'ulmaria',
        'Ulmus',
        'umbellatum',
        'urbanum',
        'Urtica',
        'urticae',
        'Valerianella',
        'variata',
        'veris',
        'verna',
        'Veronica',
        'verum',
        'vesca',
        'vesicaria',
        'Vicia',
        'vineale',
        'Viola',
        'virens',
        'viridigriseus',
        'vitalba',
        'vulgare',
        'vulgaris',
        'vulgatum',
        'Zerna',
        'Zyginidia',
        'Rhizobium',
        'Longidorous',
        'leptocephalus',
        'Ditylenchus',
        'dipsaci',
        'Vicia',
        'faba'
    );
    
    $capExeptions = array(
        "a",
        "an",
        "and",
        "at",
        "but",
        "by",
        "for",
        "from",
        "in",
        "is",
        "nor",
        "of",
        "on",
        "or",
        "over",
        "per",
        "ph",
        "phd",
        "some",
        "due",
        "to",
        "the",
        "into"
    );
    $listforCAP = array(
        "i",
        "ii",
        "iii",
        "iv",
        "v",
        "vi",
        "vii",
        "viii",
        "ix",
        "x",
        "xi",
        "xii",
        "xiii",
        "xiv",
        "xv",
        "xvi",
        "xvii",
        "xviii",
        "xix",
        "xx",
        "xxi",
        "xxii",
        "xxiii",
        "xxiv",
        "xxv",
        "mmmm",
        "npk",
        "/r/bk",
        "/r/hf",
        "/r/pg",
        "ska"
    );
    if (! $string) {
        $string = "Default title";
    }
    
    $words = nexplode($string); // we explode the string according to spaces
    
    $i = 0;
    foreach ($words as $word) { // this word is potentioally a hyphen
                                  // if hyphenated word, I need to chop it, upercase both words and implode it.
        $word = strtolower($word);
        if (! in_array(trim($word), $capExeptions)) // this deals with the small words that don't get capitalized
{
            $newWords[$i] = ucwords($word);
        } else {
            $newWords[$i] = $word;
        }
        if (trim($word) == "phd") // PhD
{
            $word = " PhD";
            $newWords[$i] = $word;
        }
        if (trim($word) == "o-quinones") // PhD
{
            $word = " <i>o</i>-quinones";
            $newWords[$i] = $word;
        }
        if (trim($word) == "tastrup") // PhD
{
            $word = " T&aring;strup";
            $newWords[$i] = $word;
        }
        if (trim($word) == "mcewen") // PhD
{
            $word = " McEwen";
            $newWords[$i] = $word;
        }
        
        if (in_array(trim($word), $arrayLatinNames) || in_array(ucwords(trim($word)), $arrayLatinNames)) // some words are latin and need to be in Italics
{
            $newWords[$i] = "<i>" . $word . "</i>";
        }
        if (in_array(ucwords(trim($word)), $arrayLatinNames)) // some words are latin and need to be in Italics
{
            $newWords[$i] = "<i>" . ucwords($word) . "</i>";
        }
        if ($i == 0 || strpos($words[$i - 1], ".") || $words[$i - 1] == ".") // takes care of the first letter of a sentence.
{
            $newWords[$i] = ucwords($word);
        }
        
        if (preg_match('/\b(ph)\b/', $word)) {
            $word = str_replace("ph", "pH", $word);
            $newWords[$i] = $word;
        }
        if (in_array(trim($word), $listforCAP)) // some words are always in CAPitals
{
            $newWords[$i] = strtoupper($word);
        }
        if (strpos(trim($word), "/") || $word[0] == "/") {
            $newWords[$i] = strtoupper($word);
        }
        $i ++;
    }
    $niceword = implode($newWords);
    return $niceword;
}

?>
