<?php 
/**
 * @file papers.php
 * @brief eRAbib search tool
 *
 * @author Nathalie Castells-Brooke
 *
 * This form search the bibliography database. 
 * @date 9/27/2018
 */
include_once 'includes/init.php'; // these are the settings that refer to more than one page

$page_title .= " - eRApubs";

$filePapers = 'metadata/default/papers.json';

$hasPapers = file_exists($filePapers);
if ($hasPapers) {
    $jpapers = file_get_contents($filePapers);  
    $dbpapers = json_decode($jpapers, true);
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

<?php include 'includes/header.html';   // all the menus at the top 

//--  start dependant content ---------------------------------------------------------

include '_papers.php';

	
//-- start footers  -----------------------------

include_once 'includes/footer.html';
include_once 'includes/finish.inc';


?>

 
</div>
</body>

</html>

