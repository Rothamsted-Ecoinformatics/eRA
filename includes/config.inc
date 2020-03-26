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
//$base = "http://local-info.rothamsted.ac.uk/eRA/era2018-new/";
//$Web_base = "http://local-info.rothamsted.ac.uk/eRA/era2018-new/";

$base = "http://localhost/era2018/";
$Web_base = "http://localhost/era2018/";
/**
 * < base URL for the site
 */

/**
 *
 * @var string $Turbigo: the database server
 */
$Turbigo = "mysql1.rothamsted.ac.uk"; // :3306
$Dfdniwie = "CocaCola";
$Gs0tw = "1L1ke1t";
$ltwogd1yr = "eradoc";

// $Turbigo = "localhost"; // :3306
// $Dfdniwie = "Root";
// $Gs0tw = "";
// $ltwogd1yr = "eradoc";


$Web_Author['Name'] = "Nathalie Castells-Brooke";
$Web_Author['Email'] = "nathalie.castells@rothamsted.ac.uk";

$Era_Curator['Name'] = "Margaret Glendinning and Sarah Perryman";
$Era_Curator['Email'] = "era@rothamsted.ac.uk";

$Era_Developer['Name'] = "Nathalie Castells-Brooke";
$Era_Developer['Email'] = "nathalie.castells@rothamsted.ac.uk";

/**
 * The contact person for the met images is not the same as the contact person for the other images.
 */
if (strpos($image, "/met/") > 0) {
    $pixContactURL = "mailto:tony.scott@rothamsted.ac.uk";
    $pixContactTitle = "Tony Scott";
}

