<?php
/**
 * @file _images3.php
 * @brief module that displays the images for the experiment.
 * 
 * inspired by http://webseotips.com/blog/ 
 * https://www.youtube.com/watch?v=kkuo9-bCX6c
 * https://drive.google.com/drive/folders/1mArd3CWzuiyXTtIx-v9zTGHbV6mLomcl
 * 
 * uses baguetteBox.js: https://feimosi.github.io/baguetteBox.js/ which is included at the bottom of the pages where this module is included
 * 
 * When using this module: remember to include the baguetteBox at the bottom of the page and also the baguetteBox.css in the header. 
 * See site.php for example. 
 * 
 * modified to use the images.json
 * @author Nathalie Castells-Brooke
 * @date 10/15/2018
 * 
 * This lists images . To list other media , like videos or ppt, place a "medialist.html" page in the experiment directory with your list as a DL / DD list. See rbk1 for example. 
 */

if (!isset($expt)) {$expt = $farm;}

?>

<h2 class="mx-3">Images</h2>

<?php
//$imageurl =  $exptFolder . '/' . 'images.json';
$imageurl =  'metadata/default/allimages.json';
if (is_file($imageurl)) {
    $idata = file_get_contents($imageurl);
    $data = json_decode($idata, true);
    $pairs = array(
        'exptID' => $expt
    );
    
    $images = multiSearch($data, $pairs);
    
    //obtain a list of columns
    $caption  = array_column($images, 'Caption');
    $orientation= array_column($images, 'orientation');
    
    // Sort the data with orientation descending, caption ascending
    // Add $images as the last parameter, to sort by the common key
    array_multisort($orientation, SORT_DESC, $caption, SORT_ASC, $images);
 
    $info = listImages($images);
    
    echo $info;
    
} else {
    
}



?>

