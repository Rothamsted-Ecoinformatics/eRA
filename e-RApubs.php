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
include_once 'includes/init.inc'; // these are the settings that refer to more than one page

$page_title .= "- eRApubs";

if (isset ( $_GET [expt] )) {
    $expt = $_GET [expt];
} else {
    $expt = array (
        ""
    );
}


?>
<?php include 'includes/head.html';     // that is the <head tags>?>
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

