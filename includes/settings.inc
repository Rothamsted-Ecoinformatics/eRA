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
 * @var string $date
 */
$date = date("D F j, Y");

$scheme = array(
    "WIKIDATA" => "https://www.wikidata.org/wiki/",
    "AGROVOC" => "http://aims.fao.org/aos/agrovoc/",
    "GACS" => "http://skosmos.dev.finto.fi/gacs/en/page/"
);

$PictureFolfer = $base . "images/";

$page_title = "e-RA";
$page_description = "e-RA provides a permanent managed database for secure storage of data from Rothamsted's Long-term Experiments, the oldest, continuous agronomic experiments in the world. Together with the accompanying meteorological records, associated documentation and sample archive, it is a unique historical record of experiments that have been measured continuously for over 170 years.";
$page_keywords = "experiments, long term experiments, agriculture, datasets, research, fields, yields, weather";		

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

/*
 * Pagesettings associates the expt code, or station with the keyrefs, the page titles and so on. 
 * It started with using the experiment table, but now I think we have gone beyond that and I need to check
 * what is using this array and where it actually should be used and what variables are never used. For example, 
 * I don't think we can use exp-ID because I cannot maintain uniqueness if it is manually maintained, 
 */

$pageSettings = array(
    array(
        "exp-ID" => 23,
        "Experiment" => "Update Page Settings",
        "ExptCode" => "000",
        "KeyRef" => " - ",
        "URLCode" => "",
        "prevFolder" => ""
    ),
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
        "exp-ID" => 24,
        "Experiment" => "Brooms Barn Met Station",
        "ExptCode" => "bms",
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
        "exp-ID" => 13,
        "Experiment" => "Rothamsted Weather Station",
        "ExptCode" => "rms",
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
        "exp-ID" => 14,
        "Experiment" => "Saxmundham Weather Station",
        "ExptCode" => "sms",
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
        "exp-ID" => 16,
        "Experiment" => "Woburn Weather Station",
        "ExptCode" => "wms",
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



$variableMapping = array (
    '_comment' => 'This file maps the headers of the json files with possible headers on a web page. sorted using https://codeshack.io/json-sorter/',
    'actionableFeedbackPolicy' => 'Actionable Feedback Policy',
    'addressCountry' => 'Country',
    'addressLocality' => 'Locality',
    'addressRegion' => 'Region',
    'appliedToCrop' => 'Applied to crop',
    'area' => 'Experiment area',
    'areaUnit' => 'Experiment area unit',
    'chemicalForm' => 'Chemical Form',
    'collectionFrequency' => 'Collection Frequency',
    'conditionsOfAccess' => 'Data Access Statement',
    'correctionsPolicy' => 'Corrections Policy',
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
    'isTreatment' => 'Is Treatment',
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
    'numberOdBlocks' => 'Number of Blocks',
    'numberOfPlots' => 'Number of Blocks',
    'numberOfReplicates' => 'Number of Replicates',
    'numberOfSubplots' => 'Number of Sub-plots',
    'numberOfHarvests' => 'Number of Harvests per Year',
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
    'postalCode' => 'Post-Code',
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
