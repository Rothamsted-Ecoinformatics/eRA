<?php
/*
 * File: exptData.inc
 * About: functions related to displaying information about the experiments.
 *
 * Series of functions to prepare and show experimental data contained in array data-description.php or obtained otherwise.
 * this could grow in a class if I knew how to.
 */
/**
 * This file is part of the array_column library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey (http://benramsey.com)
 * @license http://opensource.org/licenses/MIT MIT
 */
if (! function_exists('array_column')) {

    /**
     * Returns the values from a single column of the input array, identified by
     * the $columnKey.
     *
     * Optionally, you may provide an $indexKey to index the values in the returned
     * array by the values from the $indexKey column in the input array.
     *
     * @param array $input
     *            A multi-dimensional array (record set) from which to pull
     *            a column of values.
     * @param mixed $columnKey
     *            The column of values to return. This value may be the
     *            integer key of the column you wish to retrieve, or it
     *            may be the string key name for an associative array.
     * @param mixed $indexKey
     *            (Optional.) The column to use as the index/keys for
     *            the returned array. This value may be the integer key
     *            of the column, or it may be the string key name.
     * @return array
     */
    function array_column($input = null, $columnKey = null, $indexKey = null)
    {
        // Using func_get_args() in order to check for proper number of
        // parameters and trigger errors exactly as the built-in array_column()
        // does in PHP 5.5.
        $argc = func_num_args();
        $params = func_get_args();
        if ($argc < 2) {
            trigger_error("array_column() expects at least 2 parameters, {$argc} given", E_USER_WARNING);
            return null;
        }
        if (! is_array($params[0])) {
            trigger_error('array_column() expects parameter 1 to be array, ' . gettype($params[0]) . ' given', E_USER_WARNING);
            return null;
        }
        if (! is_int($params[1]) && ! is_float($params[1]) && ! is_string($params[1]) && $params[1] !== null && ! (is_object($params[1]) && method_exists($params[1], '__toString'))) {
            trigger_error('array_column(): The column key should be either a string or an integer', E_USER_WARNING);
            return false;
        }
        if (isset($params[2]) && ! is_int($params[2]) && ! is_float($params[2]) && ! is_string($params[2]) && ! (is_object($params[2]) && method_exists($params[2], '__toString'))) {
            trigger_error('array_column(): The index key should be either a string or an integer', E_USER_WARNING);
            return false;
        }
        $paramsInput = $params[0];
        $paramsColumnKey = ($params[1] !== null) ? (string) $params[1] : null;
        $paramsIndexKey = null;
        if (isset($params[2])) {
            if (is_float($params[2]) || is_int($params[2])) {
                $paramsIndexKey = (int) $params[2];
            } else {
                $paramsIndexKey = (string) $params[2];
            }
        }
        $resultArray = array();
        foreach ($paramsInput as $row) {
            $key = $value = null;
            $keySet = $valueSet = false;
            if ($paramsIndexKey !== null && array_key_exists($paramsIndexKey, $row)) {
                $keySet = true;
                $key = (string) $row[$paramsIndexKey];
            }
            if ($paramsColumnKey === null) {
                $valueSet = true;
                $value = $row;
            } elseif (is_array($row) && array_key_exists($paramsColumnKey, $row)) {
                $valueSet = true;
                $value = $row[$paramsColumnKey];
            }
            if ($valueSet) {
                if ($keySet) {
                    $resultArray[$key] = $value;
                } else {
                    $resultArray[] = $value;
                }
            }
        }
        return $resultArray;
    }
}

/**
 * function getPageInfo
 * @brief Gets the page title, and keyrefs
 *
 * The functions parses the array that contains information about the pages (in settings.inc) and return what is specific to that page if found.
 * In the previous site, the ID to look for site are things like Broadbalk or values I have put in URLCode.
 * We need to look for that value. If the value is in URLCode, then we can deduce the proper info even with an old reference.
 * If there is no value in URLCode, no problem, we can look in the ExptCode which will be present.
 *
 * @todo when a new experiment or dataset is provided, please update the $pagesettings array in settings.inc .
 *      
 * @param string $var            
 * @return array $arrPageInfo one set of parameters for the page that has been called
 */
function getPageInfo($var = "rothamsted")
{
    global $pageSettings; // array in settings.inc (could be moved a an array in metadata/default)
    
    $new_column_key = 'ExptCode';
    $new_ID = array_column($pageSettings, $new_column_key);
    $new_key = array_search($var, $new_ID);
    
    $old_column_key = 'URLCode';
    $old_ID = array_column($pageSettings, $old_column_key);
    $old_key = array_search($var, $old_ID);
    
    if ($old_key) {
        $arrPageInfo = $pageSettings[$old_key];
    } else {
        $arrPageInfo = $pageSettings[$new_key];
    }
    
    return $arrPageInfo;
}

/**
 * function multiSearch
 *
 * found on the web: to find items in an array that have key values of a certain type.
 * Can be useful"
 *
 * @param array $array
 *            main input array
 * @param array $pairs
 *            array that has the key to search and the value to search
 * @return array that has the full key of the input array that has the correct condition
 */
function multiSearch(array $array, array $pairs)
{
    $found = array();
    $i = 0; //indexing the new array
    foreach ($array as $aKey => $aVal) {
        
        $coincidences = 0;
        foreach ($pairs as $pKey => $pVal) {
            if (array_key_exists($pKey, $aVal) && $aVal[$pKey] == $pVal) {
                $coincidences ++;
            }
        }
        if ($coincidences == count($pairs)) {
            $found[$i] = $aVal;
            $i++;
        }
    }
    
    return $found;
}

/**
 * Function ListImages
 * translate the metadata array into the gallery of images
 *
 * The gallery uses BaguetteBox which must be included in the pages that use that function.
 * Also usees the CSS in style-cg.css. So make sure that is also included in the page that uses that function.
 * see farm.php for example of usage.
 *
 * @author Nathalie Castells-Brooke
 * @version 0.1
 * @param array $arrdata
 *            The result (numericaly keyed, associative inner) array.
 *            @output returns a string to display the data
 *            
 */
function listImages($arrdata)
{
    $startUL = "<section class=\"gallery-block compact-gallery\">
	<div class=\"container\">
		<div class=\"row\">";
    
    $list = $startUL;
    
    for ($j = 0; $j < count($arrdata); $j ++) {
        $list .= "<div class=\"col-sm-6 col-md-4 col-lg-3 item zoom-on-hover\"> \n";
        $list .= "<a class=\"lightbox\" href=\"" . $arrdata[$j]['URL'] . "\"> \n";
        $list .= "<img alt=\"" . $arrdata[$j]['Caption'] . "\"
                        class=\"img-fluid image thumbnail\" \n
                        src=\"" . $arrdata[$j]['URL'] . "\" \n
                        >";
        $list .= "<span class=\"description\">";
        $list .= "<span class=\"description-heading\">" .title_case($arrdata[$j]['Caption'] ) . "</span> <span
        class=\"description-body\">" . $arrdata[$j]['Credit'] . "</span>
        </span>
        </a>
        </div>";
    }
    $list .= "</div>
	</div>
</section>
";
    return $list;
}

/**
 * Function: listAttributes
 * Translate the metadata php arrays into lists.
 *
 * @author Nathalie Castells-Brooke
 * @version 0.1
 * @param array $arrdata
 *            The result (numericaly keyed, associative inner) array.
 *            @output returns a string to display the data
 */
function listAttributes($arrdata)
{
    $startUL = "<ul  class=\"list-group m-5\">";
    $list = $startUL;
    
    for ($j = 0; $j < count($arrdata); $j ++) {
        if (! is_array($arrdata[$j]['Attribute Value'])) {
            
            $list .= "<li  class=\"list-group-item \"><b>" . $arrdata[$j]['Attribute'] . ":</b> " . $arrdata[$j]['Attribute Value'] . " " . $arrdata[$j]['Attribute Unit'] . "</li>";
        } else {
            $list .= "</ul><h2 class=\"mx-3\">" . $arrdata[$j]['Attribute'] . "</h2>";
            
            $table = array2table($arrdata[$j]['Attribute Value'], $recursive = false, $null = '&nbsp;');
            
            $list .= $table;
            $list .= $startUL;
        }
    }
    $list .= "</ul>";
    return $list;
}

/**
 * function to make a title for a list
 *
 * @param array $data
 *            : the array with all the info
 * @param string $header:
 *            the string that has the attribute that will be the title
 * @return string
 */
function setTitle($data, $header)
{
    for ($j = 0; $j < count($data); $j ++) {
        if ($data[$j]['Attribute'] == $header) {
            
            $strTitle .= "<h2 class=\"mx-3\">" . $data[$j]['Attribute Value'] . "</h2> ";
            
            // break;
        }
    }
    return $strTitle;
}

/**
 * Translate the metadata php arrays into tabs .
 *
 * @author Nathalie Castells-Brooke
 * @version 0.1
 * @param array $arrdata
 *            The result (numericaly keyed, associative inner) array.
 * @param string $header
 *            The identifier that will be the header for the tab and page
 *            @output returns a string to display the data
 */
function makeTabs($data, $header)
{
    
    /*
     * initialise the Tab thing
     */
    $strTab = "<div class=\"row\"> \n <div class=\"col-12 py-0\"> \n<ul class=\"nav nav-tabs nav-fill text-body \"> \n";
    
    /*
     * then We build the headings for the tabs
     *
     */
    
    for ($i = 0; $i < count($data); $i ++) {
        /*
         * First we want the names of the periods: they are the values for attribute where Attribute is Local Identifier or Title
         */
        
        for ($j = 0; $j < count($data[$i]); $j ++) {
            if ($data[$i][$j]['Attribute'] == $header) {
                if ($i != 0) {
                    $active = "";
                } else {
                    $active = " active";
                }
                $strName = str_replace(' ', '', $data[$i][$j]['Attribute Value']);
                $strName = str_replace(':', '', $strName);
                $strName = str_replace('-', '', $strName);
                $strTab .= "<li class=\"nav-item" . $active . "\"><a class=\"nav-link" . $active . "\" id=\"" . $strName . "-tab\" data-toggle=\"tab\" href=\"#" . $strName . "\">" . $data[$i][$j]['Attribute Value'] . "</a></li>\n";
                
                // break;
            }
        }
    }
    $strTab .= "</ul> \n"; // finish the header with the tabs
    $strTab .= "<div class=\"tab-content mh-100\"> \n"; // start the tab contents
    
    for ($i = 0; $i < count($data); $i ++) {
        /*
         * First we want the names of the periods: they are the values for attribute where Attribute is Local Identifier
         */
        for ($j = 0; $j < count($data[$i]); $j ++) {
            if ($data[$i][$j]['Attribute'] == $header) {
                if ($i != 0) {
                    $active = "";
                } else {
                    $active = " active";
                }
                $strName = str_replace(' ', '', $data[$i][$j]['Attribute Value']);
                $strName = str_replace(':', '', $strName);
                $strName = str_replace('-', '', $strName);
                $strTab .= "<div class=\"tab-pane" . $active . "\" id=\"" . $strName . "\" role=\"tabpanel\" aria-labelledby=\"" . $strName . "-tab\"> \n";
                $strTab .= "<h2 class=\"mx-3\">" . $data[$i][$j]['Attribute Value'] . "</h2> \n <ul class=\"list-group mx-5\" > \n"; // break;
                
                $strTab .= listAttributes($data[$i]);
                
                $strTab .= "</div>\n ";
            }
        }
    }
    $strTab .= "</div>"; // finish the tab contents
    $strTab .= "</div></div>";
    
    return $strTab;
}

/**
 * Displays the information taken from the data array into a hierarchical: tab / list / array.
 *
 * @param array $data            
 * @param string $header
 *            : what is the attribute that is the title for the tab
 * @return string
 */
function formatInfo($data, $header)
{
    if (count($data) < 2) {
        $info = setTitle($data[0], $header);
        $info .= listAttributes($data[0]);
    } else {
        
        $info = makeTabs($data, $header);
    }
    return $info;
}

/**
 * Translate a result array into a HTML table
 *
 * @author Aidan Lister <aidan@php.net>
 * @version 1.3.2
 * @link http://aidanlister.com/repos/v/function.array2table.php
 * @param array $array
 *            The result (numericaly keyed, associative inner) array.
 * @param bool $recursive
 *            Recursively generate tables for multi-dimensional arrays
 * @param string $null
 *            String to output for blank cells
 */
function array2table($array, $recursive = false, $null = '&nbsp;')
{
    // Sanity check
    if (empty($array) || ! is_array($array)) {
        return false;
    }
    
    // Start the table
    $table = "<table  class=\"table table-striped table-bordered table-sm w-75 m-5\">\n";
    
    // The header
    $table .= "\t<thead class=\"thead-light\">";
    $table .= "\t<tr>";
    // Take the keys from the first row as the headings
    foreach (array_keys($array[0]) as $heading) {
        $table .= '<th  scope="col">' . $heading . '</th>';
    }
    $table .= "</tr>\n";
    $table .= "</thead>";
    $table .= "<tbody>";
    // The body
    foreach ($array as $row) {
        $table .= "\t<tr scope=\"row\">";
        foreach ($row as $heading => $cell) {
            $item = array(
                $heading => $cell
            );
            
            $pCell = processCell($item);
            $table .= '<td>';
            
            // Cast objects
            if (is_object($pCell)) {
                $pCell = (array) $pCell;
            }
            
            if ($recursive === true && is_array($pCell) && ! empty($pCell)) {
                // Recursive mode
                $table .= "\n" . array2table($pCell, true, true) . "\n";
            } else {
                $table .= (strlen($pCell) > 0) ? $pCell : $null;
            }
            
            $table .= '</td>';
        }
        
        $table .= "</tr>\n";
    }
    $table .= '</tbody>';
    $table .= '</table>';
    return $table;
}

/**
 * This treats the value of an array according to the key.
 * So pass on $key - $values
 *
 * @param array $item
 *            : should be just a simple $heading -> $cell
 * @return string
 */
function processCell($item)
{ global $expt;
    foreach ($item as $heading => $cell) {
        if (is_array($pCell) && ! empty($pCell)) {
            $pCell = $cell;
        } else {
            switch ($heading) {
                case 'DOI':
                    $pCell = '<a target="_blank" href="http://doi.org/' . $cell . '">' . $cell . '</a>';
                    break;
                case 'Grant number':
                    $pCell = '<a target="_blank"  href="https://bbsrc.ukri.org/research/grants-search/AwardDetails/?FundingReference=' . urlencode($cell) . '">' . $cell . '</a>';
                    break;
                case 'Title':
                    $pCell = '<b>' . $cell . '</b>';
                    break;
                case 'URL':
                    $pCell = '<a href="' . $cell . '">' . $cell . '</a>';
                    break;
                case 'Experiment':
                    $pCell = '<a href="expt.php?expt=' . $cell . '">' . $cell . '</a>';
                    break;
                case 'FileName':
                    
                    $pCell= '<a href="topic.php?expt='.$expt.'&FileName=' . $cell . '">'.$cell.'</a>';                 
                    break;
                case 'Caption':
                    $caption = $cell;
                    $pCell = $cell;
                    break;
                default:
                    $pCell = $cell;
                    break;
                    
            }
          
        }
    }
    return $pCell;
}
function mapKey($key)
{
    GLOBAL $variableMapping;
   
    if (isset($variableMapping[$key])) {
        $key = $variableMapping[$key];}
        
        return $key;
}

function listAttributes2($data)
{
    $startUL = "<ul  class=\"list-group mx-3\">";
    $list = $startUL;
    foreach ($data as $key => $value) {
        
        if (! is_array($value)) {
            $key = mapKey($key);
            //$key = title_case($key);
            if ($value) {
            $list .= "<li  class=\"list-group-item \" style=\"white-space: pre-wrap;\"><b>" . $key . ":</b> " . $value . " </li>";
            }
        } else {
            $list .= "</ul><h2 class=\"mx-3\">" . $key . "</h2>";
            
            $table = array2table($value, $recursive = false, $null = '&nbsp;');
            
            $list .= $table;
            $list .= $startUL;
        }
    }
    $list .= "</ul>";
    
    return $list;
}
?>
