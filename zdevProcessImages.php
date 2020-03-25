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
 * reads array of files and folders and renames
 * It removes spaces, underscores and most common wierd characters.
 *
 * New: it also renames according to width and height to sort out lanscape images at the top.
 *
 * @author nathalie.castells@rothamsted.ac.uk
 * @version 0.1.0
 * @param array $array
 *            the array containing the folder structure
 *            
 * @return $command: a line that can be outputed. just output and check, copy paste the commands.
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
            
            if (is_array($folder)) {
                $commands .= "cd " . $foldername . "<br />";
                foreach ($folder as $key => $filename) {
                    $path = 'images/' . $foldername . '/' . $filename;
                    // list ($width, $height, $type, $attr) = getimagesize($path);
                    
                    // echo $path . ': w =' . $width . '- h=' . $height . '<br />';
                    
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
            } else {
                $newfilename = str_replace(' ', '-', $folder);
                $newfilename = str_replace('&', '-', $newfilename);
                $newfilename = str_replace('_', '-', $newfilename);
                $newfilename = str_replace(',', '-', $newfilename);
                $newfilename = str_replace('--', '-', $newfilename);
                $newfilename = str_replace('--', '-', $newfilename);
                
                if ($folder != $newfilename) {
                    $commands .= "rename \"" . $folder . "\" \"" . $newfilename . "\" <br />";
                }
                $commands .= "cd ..<br /><br />";
            }
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
        $commands = "Credit,URL,Caption,Type,Extension,exptID,isReviewed,width,height,orientation<br />";
        $i = 1;
        foreach ($folders as $foldername => $folder) {
            $base = "http://local-info.rothamsted.ac.uk/eRA/era2018-new/images/banners/";
            if (! is_array($folder)) {
                if (is_string($folder)) {
                    $title = trim($folder, 'ts');
                    $title = str_replace('-', ' ', $title);
                    $title = trim($title);
                    list ($stitle, $ext) = explode('.', $title);
                    
                    if (strstr($title, "ty")) {
                        $type = "Thumbnail";
                    } else {
                        $type = "Other";
                    }
                    $path = 'images/banners/' . $folder ;
                    list ($width, $height, $type, $attr) = getimagesize($path);
                    if (($width > $height)) {
                        $orientation = 'Landscape';
                    } else {
                        $orientation = 'Portrait';
                    }
                    
                    if (strstr($folder, '.jpg') || strstr($folder, '.gif') || strstr($folder, '.png')) { // we are looking at the php and html files documents
                        $commands .=  "eRA curators," . $base . "" . $folder.  "," . $stitle . ",Banner," . $ext . "," . $foldername . ",0," . $width . "," . $height . "," . $orientation . "<br />";
                        $i = $i + 1;
                    }
                } else {
                    $title = "array";
                }
                echo '</pre>';
            } else {
                foreach ($folder as $key => $filename) {
                    if (is_string($filename)) {
                        $title = trim($filename, 'ts');
                        $title = str_replace('-', ' ', $title);
                        $title = trim($title);
                        list ($stitle, $ext) = explode('.', $title);
                        
                        if (strstr($title, "ty")) {
                            $type = "Thumbnail";
                        } else {
                            $type = "Other";
                        }
                        $path = 'images/metadata/' . $foldername . '/' . $filename;
                        list ($width, $height, $type, $attr) = getimagesize($path);
                        if (($width > $height)) {
                            $orientation = 'Landscape';
                        } else {
                            $orientation = 'Portrait';
                        }
                        
                        if (strstr($filename, '.jpg') || strstr($filename, '.gif') || strstr($filename, '.png')) { // we are looking at the php and html files documents
                            $commands .= $i . ",eRA curators," . $base . "" . $foldername . '/' . $filename . "," . $stitle . ",Other," . $ext . "," . $foldername . ",0," . $width . "," . $height . "," . $orientation . "<br />";
                            $i = $i + 1;
                        }
                    } else {
                        $title = "array";
                    }
                }
            }
        }
    }
    
    return $commands;
}

$dir = 'images/banners';
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
