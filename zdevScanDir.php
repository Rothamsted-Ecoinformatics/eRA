<?php

/**
 * @file zdevScanDir.php
 * @brief development functions to help process folders and create csv files out of contents of directories. 
 * 
 * @author Nathalie Castells-Brooke
 * @email nathalie.castells@rothamsted.ac.uk
 * 
 * This is a script to rename files : replaces spaces, underscare, commas and & in a filename with - then strips multiple -. 
 * This echoes a command line that I run in DOS command. 
 * 
 * It then build a CSV file to import in table or exel database to import the images with already quite a bit of info in them
 * This is a development tool, has a few functions that could be of interest. 
 */

/**
 * Recursively reads a folder structure and returns an array
 *
 * @author mmda.nl@gmail.com fond on php.net
 * @version 0.1.0
 * @param string $dir
 *            the folder to look at
 * @return $result array
 */
function dirToArray($dir)
{
    $result = array();
    
    $cdir = scandir($dir);
    foreach ($cdir as $key => $value) {
        if (! in_array($value, array(
            ".",
            ".."
        ))) {
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
            } else {
                $result[] = $value;
            }
        }
    }
    
    return $result;
}

/**
 * reads array of files and folders
 *
 * @author nathalie.castells@rothamsted.ac.uk
 * @version 0.1.0
 * @param array $array
 *            the array containing the folder structure
 * @return $command: a line that can be outputed. DO NOT RUN THAT: just output and check, copy paste the commands.
 */
function renameImages($array, $recursive = false, $null = '&nbsp;')
{
    // Sanity check
    if (empty($array) || ! is_array($array)) {
        return false;
    }
    
    if (! isset($array[0]) || ! is_array($array[0])) {
        $array = array(
            $array
        );
    }
    
    //
    foreach ($array as $folders) {
        
        foreach ($folders as $foldername => $folder) {
            $foldername = "metadata/" . $foldername;
            $commands .= "cd " . $foldername . "<br />";
            foreach ($folder as $key => $filename) {
                $newfilename = str_replace(' ', '-', $filename);
                $newfilename = str_replace('&', '-', $newfilename);
                $newfilename = str_replace('_', '-', $newfilename);
                $newfilename = str_replace(',', '-', $newfilename);
                $newfilename = str_replace('--', '-', $newfilename);
                $newfilename = str_replace('--', '-', $newfilename);
                if ($filename != $newfilename) {
                    $commands .= "rename \"" . $filename . "\" \"" . $newfilename . "\" <br />";
                }
            }
            $commands .= "cd ..<br />";
            $commands .= "cd ..<br /><br />";
        }
    }
    
    return $commands;
}

/**
 * reads array of files and folders
 *
 * @author nathalie.castells@rothamsted.ac.uk
 * @version 0.1.0
 * @param array $array
 *            the array containing the folder structure
 * @return $command: a line that can be outputed. DOES NOT RUN THAT: just output and check, copy paste the commands.
 */
function makeCSV($array, $recursive = false, $null = '&nbsp;')
{
    // Sanity check
    if (empty($array) || ! is_array($array)) {
        return false;
    }
    
    if (! isset($array[0]) || ! is_array($array[0])) {
        $array = array(
            $array
        );
    }
    
    //
    foreach ($array as $folders) {
        $commands = "Credit,FileName,Caption,Type,exptID,isReviewed<br />";
        $copyCommand = "";
        $i = 1;
        foreach ($folders as $foldername => $folder) {
            $base = $foldername;
            if (!is_array($folder)) {
                echo '<pre>';
            var_dump($folder);
            echo'</pre>';
            } else {
                foreach ($folder as $key => $filename) {
                    if (is_string($filename)) {
                        $title = str_replace('-', ' ', $filename);
                        list ($stitle, $ext) = explode('.', $title);
                        
                        if (strstr($title, "ty")) {
                            $type = "Thumbnail";
                        } else {
                            $type = "Other";
                        }
                        
                        if (strstr($filename, '.doc') || strstr($filename, '.pdf')) { // we are looking at the php and html files documents
                            $commands .= "eRA curators," . $base . "/" . $filename . "," . $stitle . "," . $ext . "," . $foldername . ",0<br />";
                            //$copyCommand .= "copy Backups\\era2018-2019-10-22\\metadata\\".$base."\\". $filename."  P:\\era2018-new\\metadata\\".$base."\\". $filename. " /Y <br />";
                            $i = $i + 1;
                        }
                        } else {
                        $title = "array";
                    }
                }
                $copyCommand .= "copy Backups\\era2018-2019-10-22\\metadata\\".$base."\\documents.json   P:\\era2018-new\\metadata\\".$base."\\  /Y <br />";
                
            }
        }
    }
    $stuff = $copyCommand . $commands;
    return $stuff;
}

$dir = 'metadata/';
$files = dirToArray($dir);
echo "<pre>";
print_r($files);

echo "<hr />";
echo "function renameImages <br />";
$line = renameImages($files, $recursive = true, $null = '&nbsp;');
echo $line;

echo "function Make CSV <br />";
$csv = makeCSV($files);
echo $csv;
echo "</pre>";
?>
