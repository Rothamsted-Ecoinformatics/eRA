<?php 
/*Filename start.inc
 * This file to contain all the function calls to do at the start of a new loaded page. 
 * 
 * encapsulates settings, functions and running of functions
 * 
 * 
 */


/*
 * First we need to clean up all what comes from the environemt _GET and _POST,
 * flush out injection and prepare the variables.
 *
 */
session_start(); // start the session. Some pages will put data in the session


ini_set('default_charset', 'ISO-8859-1');
date_default_timezone_set('Europe/London');

foreach ( $_GET as $sk => $sv ) {
    // stop injection
    // convert with htmlentities($userInput);
    
    if (is_string ( $sv )) {
        $ftpPos = strpos ( strtolower ( $sv ), 'ftp:' );
        if ($ftpPos === false) {
            $$sk = htmlentities ( $sv );
        } else {
            // echo("<p>ftp found in parameter</p>");
            $_GET [$sk] = "";
        }
    } elseif (is_array ( $sv )) {
        
        foreach ( $sv as $key => $value ) {
            $$sk [$key] = htmlentities ( $value );
        }
    } else {
        
        $_GET [$sk] = "";
    }
    // end stop injection
}

foreach ( $_POST as $sk => $sv ) {
    // stop injection
    // convert with htmlentities($userInput);
    
    if (is_string ( $sv )) {
        $ftpPos = strpos ( strtolower ( $sv ), 'ftp:' );
        if ($ftpPos === false) {
            
            $$sk = htmlentities ( $sv );
            // echo($sk . " : " . $$sk);
        }
    } elseif (is_array ( $sv )) {
        
        foreach ( $sv as $key => $value ) {
            $$sk [$key] = htmlentities ( $value );
        }
    } // end stop injection
    else {
        // echo("<p>ftp found in parameter</p>");
        $_GET [$sk] = "";
    }
}

$image = '';
$hasDatacite = 0;


include_once 'includes/config.inc'; //constants - project local constants
include_once 'includes/settings.inc'; //constants - project default constants
include_once 'includes/functions.php' ; //functions - project php function 
include_once 'includes/exptData.php'; //functions - experiment data process functions
include_once 'includes/biblio.php'; //functions - functions for the bibliography
include_once 'includes/user.php'; //functions for processing User 
include_once 'includes/session.php'; //sort out what is going in the session variables. 
include_once 'includes/Parsedown.php'; //Tool to transform MarkDown into HTML
/**
 * 
 
echo ("------- debug stuff --------<br />");
print ($output);

echo ("------- end of debug stuff --------<br />");
**/