<?php
/**
 * @file devBlank.php
 * @brief Template for a page.
 *
 * @author Nathalie Castells-Brooke
 * @version 1.00
 * 
 * Template page for the site. Start here, fill in what you need, add modules (prefixed _)
 * @date 10/04/2018
 */

// /This will be used to pass the experiment code, or type of page.  
$expt = 'default';
$exptFolder = 'metadata/'.$expt;



// $experimentName = '' // fill that in and uncomment if there is no experimentName
// /This is used in the head file as the title tag
$page_title .= ': All the documents';

// /$arrdatacite is found in $exptDescriptionFile - describes the submission to Datacite - necessary for DOI pages
$datacite = json_encode($arrdatacite);

if ($datacite) {
    $script = "<script type=\"application/ld+json\">" . $datacite . "</script>";
}

include_once 'includes/init.inc'; // these are the settings that refer to more than one page

include 'includes/head.html'; // that is the <head tags>
?>

<body>
	<div class="container bg-white px-0">

<?php

include 'includes/header.html'; // all the menus at the top
                                
// -- start dependant content ---------------------------------------------------------
?>
<div id="id">


<?php 
$url= $exptFolder.'/documents.json';
if (is_file($url)){
    $jdata = file_get_contents($url);
    $data = json_decode($jdata, true);
    
    
    $header = 'Title';
    $info = array2table($data, $recursive=false, $null='' );
    
    echo $info;
    
}

else
{
    echo "No documents";
}


?>




</div>
					
<?php
// -- start footers -----------------------------

include_once 'includes/footer.html';
include_once 'includes/finish.inc';

?>
 
	</div>

</body>

</html>

