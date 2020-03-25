<?php 
/*Filename start.inc
 * This file to contain all the function calls to do at the start of a new loaded page. 
 * 
 * encapsulates settings, functions and running of functions
 * 
 * 
 */

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
            $area = "home";
            $page = "index";
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



include_once 'includes/settings.inc'; //project constants
include_once 'includes/functions.inc' ; //project php function 
include_once 'includes/exptData.inc'; //experiment data process functions
include_once 'includes/biblio.inc'; //functions for the bibliography


/*
 * First we need to clean up all what comes from the environemt _GET and _POST, 
 * flush out injection and prepare the variables. 
 * 
 */
