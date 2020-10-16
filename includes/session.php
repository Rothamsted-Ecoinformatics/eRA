<?php 
/*Filename session.php
 * 
 * 
 * 
 */


/*
 * First we need to clean up all what comes from the environemt _GET and _POST,
 * flush out injection and prepare the variables.
 *
 */

$exclusion_list = array("index.php", "register.php", "about.php", "history.php");


if (isset($_SESSION['history']))
{
    
    
}
else {
    $_SESSION['history'] = array();
    
}
$isEx = 0;
foreach ($exclusion_list as $excludedFile) {
    
    if (strstr($_SERVER['REQUEST_URI'], $excludedFile)) {
        $isEx  = 1;
        
    }
}
if ($isEx == 0) {
$_SESSION['history'][] = $_SERVER['REQUEST_URI'];
}

