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
$today = date('Y/m/d');

if (!isset($_SESSION['today'])) {
    $_SESSION['today'] = $today;
} 

if (isset($_SESSION['user']['killSession'])) {
    if ($_SESSION['user']['killSession'] < $today) {
        unset($_SESSION['user']);
        unset($_SESSION['downloads']);
    }
}


$exclusion_list = array("index.php", "register.php", "newGold.php", "about.php", "history.php", "newUser.php", "dataset.php");


if (!isset($_SESSION['history']))
{
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