<?php
/**
 * @file blog.php
 *
 * @brief A blog page.
 *
 * Styling for a blog style page  
 * @author Nathalie Castells-Brooke.
 *
 * @version 1.00
 * 
 * Use the url blog/expt/filename to put a page in this style.
 * the page included can be php or html as long as the expension is clearly defined in the infofile.json. 
 * 
 * This systems enables to include any html page in various places and in various styles. The system can be expanded. 
 * 
 * 
 * The filename must be listed in the metadata/default/infofile.json
 * 
 * To build the metadata/default/infofile.json, use the metadata/default/infofile.xls to add files, and even more fields 
 * and run the mr data converter to make a json properties files. 
 * 
 * So curators just need to add a line to that spreadsheet. 
 * I could also eventually build a tool in db2json to build that too. 
 * 
 * 
 */

// /This will be used to pass the FileName : it will just include the file as is.
$FileName = 'index';
if (isset($_POST['FileName'])) {
    $FileName = $_POST['FileName'];
}

/*
 * this is to pass filename as page.extension where extension is in the phpfile.json
 *
 * At the moment, we use FileName
 */

include_once 'includes/init.inc'; // these are the settings that refer to more than one page

$page = 'index';
if (isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 'index';
}

$expt = 'default';
// /This will be used to pass the experiment code, or type of page.
if (isset($_POST['expt'])) {
    $expt = $_POST['expt'];
}
if (isset($_GET['expt'])) {
    $expt = $_GET['expt'];
}



/**
 * $page info should have the following structure:
 * array(4) {
 * ["ExperimentName"]=> string(9) "Broadbalk"
 * ["ExptCode"]=> string(4) "rbk1"
 * ["KeyRef"]=> string(15) "KeyRefBroadbalk"
 *
 * ["URLCode"]=> string(9) "Broadbalk" }
 *
 * @var array $pageinfo
 */

/**
 * We need the caption of the file.
 *
 * @var String $page_title
 */

$url = 'metadata/default/infofiles.json';
if (is_file($url)) {
    $jdata = file_get_contents($url);
    $data = json_decode($jdata, true);
    $pairs = array(
        'FileName' => $FileName,
        'exptID' => $expt
    );

    $page = multiSearch($data, $pairs);

    $h1Title = $page[0]['Caption'];
    $page_title .= ': ' . $page[0]['Caption'];
    $ext = $page[0]['Type'];
    // $KeyRef = $page[0]['KeyRef'];
} else {
    $h1Title = $pageinfo['ExperimentName'];
    $page_title .= $page_title .= ': ' . $pageinfo['ExperimentName'];
}


?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

<?php

include 'includes/meta.html'; // that is the <meta and link tags> superseeds head.html

$script = ''; // $script is added to the header as the
if (isset($datacite)) {
    $script = "<script type=\"application/ld+json\">" . $datacite . "</script>";
    echo $script;
}
?>

    </head>
<body>
	<div class="container bg-white px-0">
        
             <?php
            include 'includes/header.html'; // all the menus at the top

            // -- start dependant content ---------------------------------------------------------
            ?>


<div id="idExpt" class="p-0 mb-0">
			<div id="greenTitle"
				class="d-flex  mb-3 py-3 p3-3 bg-secondary text-white mt-0 ">
				<h1 class="mx-3">e-RA Blog item</h1>
			</div>
			<p class="text-right"><a href="https://twitter.com/share?ref_src=twsrc%5Etfw"
				class="twitter-share-button" 
				data-via="eRA_curator" 
				data-size="large"
				data-text=" <?php echo $h1Title;?> "
				data-url="http://www.era.rothamsted.ac.uk/blog/<?php echo $expt;?>/<?php echo $page[0]['FileName'];?>"
				data-hashtags="eRAblog" data-related="eRA_Curator,  Rothamsted"
				data-show-count="false">Tweet this post</a></p>
			<script async src="https://platform.twitter.com/widgets.js"
				charset="utf-8"></script> 
<?php
include_once 'metadata/' . $expt . '/' . $FileName.'.'.$ext;
include_once 'includes/footer.html'; // this has the green bar and bottom
?>
 </div>
<?php
include_once 'includes/finish.inc'; // this has the common js scripts
?>
<!--  include here the page dependant scripts -->

</body>

</html>

