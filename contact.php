<?php 
include_once 'includes/init.inc'; // these are the settings that refer to more than one page

$page_title .= "About e-RA";
$_SESSION['page'] = 'about.php';

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

//include '_carousel.php';
//include '_about.php';
//include '_tools.php';
include '_people.php';

	
//-- start footers  -----------------------------

include_once 'includes/footer.html';
include_once 'includes/finish.inc';


?>

 
</div>
</body>

</html>

