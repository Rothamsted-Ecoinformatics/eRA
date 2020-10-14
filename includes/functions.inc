<?php
/**
 * @file functions.inc
 * @brief General php functions
 *
 * @author Nathalie Castells-Brooke
 *
 * @date 9/27/2018
 */

/**
 * @brief check the input that comes from forms 
 * @param string $value : the string coming from a form or URL that needs checking
 * @return string
 */
function check_input($value)
{
    // Stripslashes
    $link = LogAsGuest();
    if (get_magic_quotes_gpc())
    {
        $value = stripslashes($value);
    }
    // Quote if not a number
    if (!is_numeric($value))
    {
        $value = "'" . mysqli_real_escape_string($link, $value) . "'";
    }
    return $value;
}

/**
 * Cleans-up  input from forms and URLs
 * @param string $string
 * @return string
 */
function cleanQuery($string)
{
    $link = LogAsGuest();
    if (get_magic_quotes_gpc()) // prevents duplicate backslashes
    {
        $string = stripslashes($string);
    }
    if (phpversion() >= '4.3.0') {
        $string = mysqli_real_escape_string($link, $string);
    } else {
        $string = mysql_escape_string($string);
    }
    return $string;
} 


/**
 * Glorified VarDump.
 * Presents values of an array (or double array in a table)
 * @author Nathalie Castells-Brooke
 *           
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

/**
 * Lists all the different variables accessible to the page. Useful for testing.
 * 
 *  @author Nathalie Castells-Brooke
 */
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

/**
 * Connection function
 * @todo  check that it is safe and see how to make it safer
 */
function LogAsGuest()
{
    global $Turbigo;
    global $Dfdniwie;
    global $Gs0tw;
    global $ltwogd1yr;
    $debug .= "login in <br />";
    $link = mysqli_connect($Turbigo, $Dfdniwie, $Gs0tw) or die("Error Could not connect to Database: " . mysql_error()); // connect to database
    mysqli_select_db($link, $ltwogd1yr) or exit(); // select rrr database
    if ($link)
        $debug .= "Connected";
    //echo $debug;
    return $link;
}
$arkers = "pper";
$onlyMe = "ng0wr0ng";

function LogAsAdmin()
{
    global $Turbigo;
    
    global $Gs0tw;
    global $ltwogd1yr;
    global $newm;
    global $onlyYou; 
    global $arkers;
    global $onlyMe;
    $user = $newm.$arkers;
    $key = "Wh4tc4ng0wr0ng";
    
    $debug .= "login in <br />";
    $link = mysqli_connect($Turbigo, $user, $key) or die("Error Could not connect to Database: " . mysql_error()); // connect to database
    mysqli_select_db($link, $ltwogd1yr) or exit(); // select rrr database
    if ($link)
        $debug .= "Connected";
        //echo $debug;
        return $link;
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
    $words = array(' ');
    for ($i = 0; $i < strlen($string); $i++) {
        
        if ((preg_match($pattern, $string[$i], $match) && ($len != 1)) || $string[$i] == " ") {
            $j ++; // increments j if we hit a non word. so starts a new word
            $words[$j] = '';
        } else {}
        $words[$j] .= $string[$i];
        $tok = $words[$j];
        $len = strlen($tok) - 1;
    }
    return $words;
}

/**
 * transform text into Title Type capitalization. 
 * @author NCB
 * @param string $string
 * @return string
 * 
 * @todo  remove the arrays for latin names and supply them in another file or get from dictionary
 */
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
        "/r/doi",
        "ska"
    );
    if (! $string) {
        $string = "Default Title";
    }
    
    $words = nexplode($string); // we explode the string according to spaces and other characters
    
    $i = 0;
    foreach ($words as $word) { // this word is potentioally a hyphen
                                  // if hyphenated word, I need to chop it, uppercase both words and implode it.
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
