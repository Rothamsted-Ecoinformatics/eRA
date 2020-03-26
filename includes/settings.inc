<?php
/** 
 * @file setting.inc: 
 * 
 * General settings for the site 
 * 
 * @todo  hide the connection variable. 
 * 
 * @todo  contact person for images should be managed by the database.
 * 
 */

/**
 * < base URL for the site
 */

/**
 * @Brief Deciding which DET is called
 *
 * In some case we might want to divert people to either the intranet version of DET or the WWW
 * version.
 * Use DETin for intranet users and DETout for outside users if we want to make a disctinction
 *
 * @var string $DETin
 * @var string $DETout
 * @var string $det this is the one used in the site
 */
$DETin = "http://burdock.rothamsted.ac.uk/pgera/extract/pages/data_extraction_prototype6.html";
$DETout = "http://www3.rothamsted.ac.uk/cdera/extract/pages/data_extraction_prototype6.html";
$det = $DETin;



/**
 * default Format for today's date on the site
 *
 * @var Ambiguous $date
 */
$date = date("D F j, Y");

$scheme = array(
    "WIKIDATA" => "https://www.wikidata.org/wiki/",
    "AGROVOC" => "http://aims.fao.org/aos/agrovoc/",
    "GACS" => "http://skosmos.dev.finto.fi/gacs/en/page/"
);

$PictureFolfer = $base . "images/";

$page_title = "e-RA - the electronic Rothamsted Archive: ";

/**
 * $pageSettings is made using the Experiments Table in timelines.accdb and converted to array.
 *
 * In this array, we can fetch Page Titles, and location of information and Key refs.
 *
 * @todo when a new experiment or dataset is provided, please update this array.
 *      
 * @var array $pageSettings
 */

$fileWords = 'metadata/default/vocabulary.json';

$hasWords = file_exists($fileWords);
if ($hasWords) {
    $jwords = file_get_contents($fileWords);
    $jwords = utf8_encode($jwords);
    $words = json_decode($jwords, true);
}

$pageSettings = array(
    array(
        "exp-ID" => 23,
        "Experiment" => "Broom's Barn Large Scale Rotation Experiment",
        "ExptCode" => "bbcs788",
        "KeyRef" => " - ",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 24,
        "Experiment" => "Large Scale Rotation Experiment",
        "ExptCode" => "bbrcs788",
        "KeyRef" => " - ",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 7,
        "Experiment" => "Broom's Barn",
        "ExptCode" => "broomsbarn",
        "KeyRef" => " - ",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 8,
        "Experiment" => "General Information",
        "ExptCode" => "default",
        "KeyRef" => " - ",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 9,
        "Experiment" => "eRA Data extraction Tool",
        "ExptCode" => "DET",
        "KeyRef" => "KeyRefDET",
        "URLCode" => "DET",
        "prevFolder" => "DET"
    ),
    array(
        "exp-ID" => 40,
        "Experiment" => "Acid strip experiment",
        "ExptCode" => "KeyRefAcidStrip",
        "KeyRef" => "KeyRefAcidStrip",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 10,
        "Experiment" => "Weather Data",
        "ExptCode" => "met",
        "KeyRef" => "KeyRefMetdata",
        "URLCode" => "Met",
        "prevFolder" => "met"
    ),
    array(
        "exp-ID" => 11,
        "Experiment" => "North Wyke farm Platform",
        "ExptCode" => "northwyke",
        "KeyRef" => " - ",
        "URLCode" => "",
        "prevFolder" => "NorthWyke"
    ),
    array(
        "exp-ID" => 12,
        "Experiment" => "Other experiments",
        "ExptCode" => "others",
        "KeyRef" => " - ",
        "URLCode" => "Other",
        "prevFolder" => "others"
    ),
    array(
        "exp-ID" => 33,
        "Experiment" => "Agdell",
        "ExptCode" => "rag6",
        "KeyRef" => "KeyRefAG",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 1,
        "Experiment" => "Broadbalk",
        "ExptCode" => "rbk1",
        "KeyRef" => "KeyRefBroadbalk",
        "URLCode" => "Broadbalk",
        "prevFolder" => "broad"
    ),
    array(
        "exp-ID" => 32,
        "Experiment" => "Barnfield",
        "ExptCode" => "rbn7",
        "KeyRef" => "KeyRefBF",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 30,
        "Experiment" => "Rothamsted Long Term Liming",
        "ExptCode" => "rcs10",
        "KeyRef" => "KeyRefliming",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 41,
        "Experiment" => "ECN plots, Rothamsted and North Wyke",
        "ExptCode" => "rcs109",
        "KeyRef" => "KeyRefECN",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 39,
        "Experiment" => "Continuous maize experiments",
        "ExptCode" => "rcs477, wcs478",
        "KeyRef" => " ",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 35,
        "Experiment" => "Highfield Conversion experiment",
        "ExptCode" => "rcs767",
        "KeyRef" => "KeyRefHR",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 6,
        "Experiment" => "Rothamsted Large Scale Rotation Experiment",
        "ExptCode" => "rcs788",
        "KeyRef" => "KeyRefRLSRE",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 4,
        "Experiment" => "Exhaustion Land",
        "ExptCode" => "rex4",
        "KeyRef" => "KeyRefEX",
        "URLCode" => "Exhaustion",
        "prevFolder" => "exhaustion"
    ),
    array(
        "exp-ID" => 15,
        "Experiment" => "Garden Clover",
        "ExptCode" => "rgc8",
        "KeyRef" => "KeyRefGC",
        "URLCode" => "Garden",
        "prevFolder" => "clover"
    ),
    array(
        "exp-ID" => 22,
        "Experiment" => "Geescroft Wilderness",
        "ExptCode" => "rge9",
        "KeyRef" => "KeyRefWilderness",
        "URLCode" => "wilderness",
        "prevFolder" => "wilderness"
    ),
    array(
        "exp-ID" => 2,
        "Experiment" => "Hoosfield",
        "ExptCode" => "rhb2",
        "KeyRef" => "KeyRefHoosfield",
        "URLCode" => "Hoosfield",
        "prevFolder" => "hoos"
    ),
    array(
        "exp-ID" => 13,
        "Experiment" => "Rothamsted Research Station",
        "ExptCode" => "rothamsted",
        "KeyRef" => " - ",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 3,
        "Experiment" => "Parkgrass",
        "ExptCode" => "rpg5",
        "KeyRef" => "KeyRefParkGrass",
        "URLCode" => "Park",
        "prevFolder" => "pg"
    ),
    array(
        "exp-ID" => 21,
        "Experiment" => "Rothamsted Ley Arable",
        "ExptCode" => "rrn",
        "KeyRef" => " - ",
        "URLCode" => "RRN",
        "prevFolder" => "rrn"
    ),
    array(
        "exp-ID" => 19,
        "Experiment" => "Rothamsted Ley Arable: Highfield",
        "ExptCode" => "rrn1",
        "KeyRef" => " - ",
        "URLCode" => "RRN1",
        "prevFolder" => "rrn1"
    ),
    array(
        "exp-ID" => 20,
        "Experiment" => "Rothamsted Ley Arable: Fosters",
        "ExptCode" => "rrn2",
        "KeyRef" => " - ",
        "URLCode" => "RRN2",
        "prevFolder" => "rrn2"
    ),
    array(
        "exp-ID" => 34,
        "Experiment" => "Highfield Bare Fallow",
        "ExptCode" => "rrs1",
        "KeyRef" => "KeyRefHBF",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 31,
        "Experiment" => "Long Term Liming",
        "ExptCode" => "rwcs10",
        "KeyRef" => "KeyRefliming",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 38,
        "Experiment" => "Amounts of straw experiments",
        "ExptCode" => "rwcs326",
        "KeyRef" => "KeyRefStraw",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 5,
        "Experiment" => "Wheat and Fallow",
        "ExptCode" => "rwf3",
        "KeyRef" => "KeyRefWheatFallow",
        "URLCode" => "Alternate",
        "prevFolder" => "wheatfallow"
    ),
    array(
        "exp-ID" => 14,
        "Experiment" => "Saxmundham",
        "ExptCode" => "saxmundham",
        "KeyRef" => " - ",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 26,
        "Experiment" => "Saxmundham Rotation 1",
        "ExptCode" => "srn1",
        "KeyRef" => "KeyRefSaxRN",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 28,
        "Experiment" => "Saxmundham Rotation 2",
        "ExptCode" => "srn2",
        "KeyRef" => "KeyRefSaxRN",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 29,
        "Experiment" => "Woburn Long Term Liming",
        "ExptCode" => "wcs10",
        "KeyRef" => "KeyRefliming",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 42,
        "Experiment" => "Intensive cereals, Woburn",
        "ExptCode" => "wcs13",
        "KeyRef" => "KeyRefIntCereals",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 37,
        "Experiment" => "Woburn long-term sludge experiments",
        "ExptCode" => "wcs427, wcs428, wcs439",
        "KeyRef" => "KeyRefWobLTS",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 25,
        "Experiment" => "Wilderness Experiments",
        "ExptCode" => "wilderness",
        "KeyRef" => "KeyRefWilderness",
        "URLCode" => "",
        "prevFolder" => "wilderness"
    ),
    array(
        "exp-ID" => 16,
        "Experiment" => "Woburn Farm",
        "ExptCode" => "woburn",
        "KeyRef" => " - ",
        "URLCode" => "WoburnFarm",
        "prevFolder" => "Woburn"
    ),
    array(
        "exp-ID" => 18,
        "Experiment" => "Woburn Organic Manuring",
        "ExptCode" => "wrn12",
        "KeyRef" => "KeyRefWOM",
        "URLCode" => "",
        "prevFolder" => ""
    ),
    array(
        "exp-ID" => 17,
        "Experiment" => "Woburn Ley Arable",
        "ExptCode" => "wrn3",
        "KeyRef" => " - ",
        "URLCode" => "WoburnLA",
        "prevFolder" => "woburnLA"
    ),
    array(
        "exp-ID" => 36,
        "Experiment" => "Woburn Market Garden experiment",
        "ExptCode" => "wrn4",
        "KeyRef" => "KeyRefWobMG",
        "URLCode" => "",
        "prevFolder" => ""
    )
);

$phpPages = array(
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/DET/index.php",
        "Caption" => "index",
        "Type" => "php",
        "exptID" => "DET"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/met/Intro.php",
        "Caption" => "Intro",
        "Type" => "php",
        "exptID" => "met"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/met/Introoriginal.php",
        "Caption" => "Introoriginal",
        "Type" => "php",
        "exptID" => "met"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/met/derived-variables.php",
        "Caption" => "derived variables",
        "Type" => "php",
        "exptID" => "met"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/met/important-meteorological-data-updates.php",
        "Caption" => "important meteorological data updates",
        "Type" => "php",
        "exptID" => "met"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/met/index.php",
        "Caption" => "index",
        "Type" => "php",
        "exptID" => "met"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/met/instrument-description.php",
        "Caption" => "instrument description",
        "Type" => "php",
        "exptID" => "met"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/met/met-open-access-new.php",
        "Caption" => "met open access new",
        "Type" => "php",
        "exptID" => "met"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/met/met-open-access-old.php",
        "Caption" => "met open access old",
        "Type" => "php",
        "exptID" => "met"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/met/met-open-access-res-matemp.php",
        "Caption" => "met open access res matemp",
        "Type" => "php",
        "exptID" => "met"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/met/metsoils.php",
        "Caption" => "metsoils",
        "Type" => "php",
        "exptID" => "met"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/met/monthly.php",
        "Caption" => "monthly",
        "Type" => "php",
        "exptID" => "met"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/met/restest.php",
        "Caption" => "restest",
        "Type" => "php",
        "exptID" => "met"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/met/schools.php",
        "Caption" => "schools",
        "Type" => "php",
        "exptID" => "met"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/met/schoolsmetdesc.php",
        "Caption" => "schoolsmetdesc",
        "Type" => "php",
        "exptID" => "met"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/met/sources.php",
        "Caption" => "sources",
        "Type" => "php",
        "exptID" => "met"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/northwyke/draftindexNW.php",
        "Caption" => "draftindexNW",
        "Type" => "php",
        "exptID" => "northwyke"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/northwyke/index.php",
        "Caption" => "index",
        "Type" => "php",
        "exptID" => "northwyke"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/northwyke/indexold.php",
        "Caption" => "indexold",
        "Type" => "php",
        "exptID" => "northwyke"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/others/index.php",
        "Caption" => "index",
        "Type" => "php",
        "exptID" => "others"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/bbk-open-access-interactive.php",
        "Caption" => "bbk open access interactive",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/bbk-open-access-old.php",
        "Caption" => "bbk open access old",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/bbk-open-access-olsenp.php",
        "Caption" => "bbk open access olsenp",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/bbk-open-access.php",
        "Caption" => "bbk open access",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/bbknutr.php",
        "Caption" => "bbknutr",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/bbksoils.php",
        "Caption" => "bbksoils",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/bbksoils44.php",
        "Caption" => "bbksoils44",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/bbksoils66.php",
        "Caption" => "bbksoils66",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/bbksoils87.php",
        "Caption" => "bbksoils87",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/bbkweeds.php",
        "Caption" => "bbkweeds",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/bbkweeds0ol2.php",
        "Caption" => "bbkweeds0ol2",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/bbkweedsold.php",
        "Caption" => "bbkweedsold",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/bbkyields-other-crops.php",
        "Caption" => "bbkyields other crops",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/bbkyields.php",
        "Caption" => "bbkyields",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/index.php",
        "Caption" => "index",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/indexoriginal.php",
        "Caption" => "indexoriginal",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rbk1/pg-composition.php",
        "Caption" => "pg composition",
        "Type" => "php",
        "exptID" => "rbk1"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rex4/exhsoils.php",
        "Caption" => "exhsoils",
        "Type" => "php",
        "exptID" => "rex4"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rex4/exhsoilsold.php",
        "Caption" => "exhsoilsold",
        "Type" => "php",
        "exptID" => "rex4"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rex4/index.php",
        "Caption" => "index",
        "Type" => "php",
        "exptID" => "rex4"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rgc8/index.php",
        "Caption" => "index",
        "Type" => "php",
        "exptID" => "rgc8"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rhb2/-del-hoos-open-access.php",
        "Caption" => " del hoos open access",
        "Type" => "php",
        "exptID" => "rhb2"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rhb2/hfnutr.php",
        "Caption" => "hfnutr",
        "Type" => "php",
        "exptID" => "rhb2"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rhb2/hfsoils.php",
        "Caption" => "hfsoils",
        "Type" => "php",
        "exptID" => "rhb2"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rhb2/hoos-open-access-old2.php",
        "Caption" => "hoos open access old2",
        "Type" => "php",
        "exptID" => "rhb2"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rhb2/hoos-open-access-soc.php",
        "Caption" => "hoos open access soc",
        "Type" => "php",
        "exptID" => "rhb2"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rhb2/hoos-open-access-yields.php",
        "Caption" => "hoos open access yields",
        "Type" => "php",
        "exptID" => "rhb2"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rhb2/hoos-open-access.php",
        "Caption" => "hoos open access",
        "Type" => "php",
        "exptID" => "rhb2"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rhb2/index.php",
        "Caption" => "index",
        "Type" => "php",
        "exptID" => "rhb2"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rhb2/index2018.php",
        "Caption" => "index2018",
        "Type" => "php",
        "exptID" => "rhb2"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rhb2/indexoriginal.php",
        "Caption" => "indexoriginal",
        "Type" => "php",
        "exptID" => "rhb2"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rpg5/-del-pg-openaccess.php",
        "Caption" => " del pg openaccess",
        "Type" => "php",
        "exptID" => "rpg5"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rpg5/index-copy.php",
        "Caption" => "index copy",
        "Type" => "php",
        "exptID" => "rpg5"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rpg5/index-original.php",
        "Caption" => "index original",
        "Type" => "php",
        "exptID" => "rpg5"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rpg5/index.php",
        "Caption" => "index",
        "Type" => "php",
        "exptID" => "rpg5"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rpg5/parkgrass-history.php",
        "Caption" => "parkgrass history",
        "Type" => "php",
        "exptID" => "rpg5"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rpg5/parkgrass-today.php",
        "Caption" => "parkgrass today",
        "Type" => "php",
        "exptID" => "rpg5"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rpg5/pg-open-access-soilph.php",
        "Caption" => "pg open access soilph",
        "Type" => "php",
        "exptID" => "rpg5"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rpg5/pg-open-access-species.php",
        "Caption" => "pg open access species",
        "Type" => "php",
        "exptID" => "rpg5"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rpg5/pg-open-access.php",
        "Caption" => "pg open access",
        "Type" => "php",
        "exptID" => "rpg5"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rpg5/pg-openaccess.php",
        "Caption" => "pg openaccess",
        "Type" => "php",
        "exptID" => "rpg5"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rpg5/pgcomposition.php",
        "Caption" => "pgcomposition",
        "Type" => "php",
        "exptID" => "rpg5"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rpg5/pgcomposition1.php",
        "Caption" => "pgcomposition1",
        "Type" => "php",
        "exptID" => "rpg5"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rpg5/pgsoils.php",
        "Caption" => "pgsoils",
        "Type" => "php",
        "exptID" => "rpg5"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rpg5/test.php",
        "Caption" => "test",
        "Type" => "php",
        "exptID" => "rpg5"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/rwf3/index.php",
        "Caption" => "index",
        "Type" => "php",
        "exptID" => "rwf3"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/wilderness/index.php",
        "Caption" => "index",
        "Type" => "php",
        "exptID" => "wilderness"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/wilderness/wilderness-open-access-broadbalk-oc.php",
        "Caption" => "wilderness open access broadbalk oc",
        "Type" => "php",
        "exptID" => "wilderness"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/wilderness/wilderness-open-access-geescroft-oc.php",
        "Caption" => "wilderness open access geescroft oc",
        "Type" => "php",
        "exptID" => "wilderness"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/wilderness/wilderness-open-access-geescroftxx.php",
        "Caption" => "wilderness open access geescroftxx",
        "Type" => "php",
        "exptID" => "wilderness"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/wilderness/wilderness-open-access.php",
        "Caption" => "wilderness open access",
        "Type" => "php",
        "exptID" => "wilderness"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/woburn/index.php",
        "Caption" => "index",
        "Type" => "php",
        "exptID" => "woburn"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/wrn3/data.php",
        "Caption" => "data",
        "Type" => "php",
        "exptID" => "wrn3"
    ),
    array(
        "Credit" => "eRA curators",
        "URL" => "http://local-info.rothamsted.ac.uk/eRA/era2018-new/metadata/wrn3/index.php",
        "Caption" => "index",
        "Type" => "php",
        "exptID" => "wrn3"
    )
);

$variableMapping = array (
    '_comment' => 'This file maps the headers of the json files with possible headers on a web page. sorted using https://codeshack.io/json-sorter/',
    'actionableFeedbackPolicy' => 'actionable Feedback Policy',
    'addressCountry' => 'Country',
    'addressLocality' => 'Locality',
    'addressRegion' => 'Region',
    'appliedToCrop' => 'Applied to crop',
    'area' => 'Experiment area',
    'areaUnit' => 'Experiment area unit',
    'chemicalForm' => 'Chemical Form',
    'collectionFrequency' => 'Collection Frequency',
    'conditionsOfAccess' => 'Data Access Statement',
    'correctionsPolicy' => 'corrections Policy',
    'dateEPEnd' => 'Establisment Period End',
    'dateEnd' => 'Date End',
    'dateStart' => 'Date Start',
    'description' => 'Description',
    'disambiguatingDescription' => 'Objectives',
    'DOI' => 'DOI',
    'effect' => 'Effect',
    'elevationUnit' => 'Elevation Unit',
    'factorCombinations' => 'Factor Combinations',
    'factorCombinationNumber'=> 'Number of Factor Combinations',
    'familyName' => 'Last Name',
    'funder' => 'Funding',
    'geoLocationPlace' => 'Place',
    'geoLocationPoint' => 'Location Point',
    'givenName' => 'First Name',
    'identifier' => 'DOI',
    'isAccessibleForFree' => 'is Accessible for Free',
    'isBaseline' => 'is Baseline?',
    'isEstimated' => 'is Estimated?',
    'isTreatment' => 'Is treatment',
    'jobTitle' => 'Role',
    'level' => 'Level',
    'license' => 'License', 
    'localIdentifier' => 'Experiment Code',
    'maxSampleDepth' => 'Maximum Sample Depth',
    'maxValue' => 'Maximum value',
    'measurementTechnique' => 'Measurement Technique',
    'minSampleDepth' => 'Minimum Sample Depth',
    'minValue' => 'Minimum value',
    'name' => 'Title',
    'numberHarvest' => 'Number of Harvests per Year',
    'numberOfPlots' => 'Number of Blocks',
    'numberOfReplicates' => 'Number of Replicates',
    'numberOfSubplots' => 'Number of Sub-plots',
    'phase' => 'Phase',
    'phasing' => 'Phasing',
    'plotApplication' => 'Plot Application',
    'plotArea' => 'Plot Area',
    'plotAreaUnit' => 'Plot Area Unit',
    'plotLength' => 'Plot Length',
    'plotLengthUnit' => 'Plot Length Unit',
    'plotOrientation' => 'Plot Orientation',
    'plotSpacing' => 'Plot Spacing',
    'plotSpacingUnit' => 'Plot Spacing Unit',
    'plotWidth' => 'Plot Width',
    'plotWidthUnit' => 'Plot Width Unit',
    'pointLatitude' => 'Latitude',
    'pointLongitude' => 'Longitude',
    'polygon' => 'Polygon',
    'postalCode' => 'Post Code',
    'publishingPrinciples' => 'Publishing Principles',
    'refYear' => 'Reference Year',
    'relatedExperiment' => 'Related Experiment(s)',
    'rotationPhases' => 'Rotation Phases',
    'sameAs' => 'Name Identifier',
    'slopeAspect' => 'Slope Aspect',
    'streetAddress' => 'Address',
    'studyDesign' => 'Study Design or Design Type',
    'type' => 'Type',
    'temporalCoverage' => 'Temporal Coverage',
    'unitCode' => 'Unit',
    'unitText' => 'Unit (full text)',
    'unnamedSourcesPolicy' => 'Policy on Use of Unnamed Sources',
    'url' => 'URL',
    'value' => 'Value',
    'valueReference' => 'Reference Value',
    'variableMeasured' => 'Variable',
    'visitingArrangements' => 'Visiting Arrangments',
    'visitsAllowed' => 'Visit Allowed?',
);
