<?php

// restricted access controls
#$request  = str_replace("/envato/pretty/php/", "", $_SERVER['REQUEST_URI']);
$request = $_SERVER['REQUEST_URI'];
#split the path by '/'
$params     = explode("/", $request);

$Web_base = "http://local-info.rothamsted.ac.uk/eRA/era2018-new/";

$DETin = "http://burdock.rothamsted.ac.uk/pgera/extract/pages/data_extraction_prototype6.html";
$DETout = "http://www3.rothamsted.ac.uk/cdera/extract/pages/data_extraction_prototype6.html";

$det = $DETin;

$Turbigo = "mysql1.rothamsted.ac.uk"; #:3306
$Napoleon = "DrPepper";
$Bonaparte = "Wh4tc4ng0wr0ng";
$Dfdniwie  = "CocaCola";
$Gs0tw = "1L1ke1t";
$ltwogd1yr = "eradoc";

//This puts the query string into a cookie: could be usefull to keep place or settings

$date = date("D F j, Y");

//Set Web site variables here Variable base is in the relevant connect file

//People involved in project.... Now may be that can be help in the actual database

$Web_Author[Name] = "Nathalie Castells-Brooke";
$Web_Author[Email] = "mailto:nathalie.castells@rothamsted.ac.uk";

$Era_Curator[Name] = "Margaret Glendinning and Sarah Perryman";
$Era_Curator[Email] = "mailto:era@rothamsted.ac.uk";

$Era_Developer[Name] = "Nathalie Castells-Brooke";
$Era_Developer[Email] = "mailto:nathalie.castells@rothamsted.ac.uk";


$PictureFolfer= $base."images/";

if ( strpos ($image, "/met/") >0 ) {
    $pixContactURL = "mailto:tony.scott@rothamsted.ac.uk";
    $pixContactTitle = "Tony Scott";
}

$page_title = "e-RA: the electronic Rothamsted Archive";
