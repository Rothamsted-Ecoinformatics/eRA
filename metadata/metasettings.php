<?php
$pagetitles = array(    //if the title of a page is different from the name of the file, you can enter the title here against eh
//name of the file
index	=> 	$areatitle,
styles	=>	"Examples of Styles",    //when adding a page to the scheme, add it here too
members =>  	"List of Members",
addcategories => "Add Links to Categories",
cleanup 	  => "Cleanup the database",
parkgrass_history    => "Parkgrass history",
parkgrass_today => "Parkgrass today",
cookies       => "list of cookies",
keeplast=>  "Keep this Last"         //just to remember that the last line of the array doesn't have a comma
);



if ($pagetitles[$page]=="")
{
	$pagetitles[$page] = $page;    // makes sure the title is not empty
}


$subs = array(
instrumentdescription => "Measurement of variables at Rothamsted and Woburn ",
importantmeteorologicaldataupdates => "Important meteorological data corrections",
pg_open_access => "Park Grass Open Access Files",
bbksoils => "Broadbalk Soils",
pgcomposition1 => "Park Grass Botanical Composition",
keeplast=>  "Keep this Last" 
)


?>
