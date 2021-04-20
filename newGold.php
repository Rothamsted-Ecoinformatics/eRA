<?php
/**
 * @file newUser.php
 * 
 * @brief Form to register a new user to access prepared datasets and processing
 *
 * @author Nathalie Castells-Brooke.
 * 
 * 
 *  
 */
include_once 'includes/init.inc'; // these are the settings that refer to more than one page

$fromEmail = 'nathalie.castells@rothamsted.ac.uk';

/**
 *
 * @var string $vprocess : tells the application where the process is:
 *      values: question: provides the form
 *      process: start processing it: so sends an email, records stuff in db and even writes a cookie.
 *     
 *      the variables arrive from the POST here already passed with the proper name
 *      The $vRGvariables are the proposed values: either the ones coming from the database, or the ones coming from the next form (when we come back)
 */
function formInit()
{
    $GLOBALS['vRGpositiondisabled'] = "required";
    $GLOBALS['vRGGDPRChecked'] = ""; // if not: do not go further
    $GLOBALS['vRGSecCheckAC'] = "";
    $GLOBALS['vRGSecCheckCO'] = "";
    $GLOBALS['vRGSecCheckSC'] = "";
    $GLOBALS['vRGSecCheckPB'] = "";
    $GLOBALS['vRGposition'] = "";
    $GLOBALS['vRGfname'] = "";
    $GLOBALS['vRGlname'] = "";
    $GLOBALS['vRGsector'] = "";
    $GLOBALS['vRGisStudent'] = 0;
    $GLOBALS['vRGisRoth'] = 0;
    $GLOBALS['vRGinstitution'] = "";
    $GLOBALS['vRGfunding'] = "";
    $GLOBALS['vRGISPG'] = "";
    $GLOBALS['vRGcountry'] = "GB";
    $GLOBALS['vRGsupName'] = "";
    $GLOBALS['vRGsupEmail'] = "";
    $GLOBALS['vRGagreeCOU'] = 0;
    $GLOBALS['vRGallowEmails'] = 0;
    $GLOBALS['vRGStdCheckedYes'] = " ";
    $GLOBALS['vRGStdCheckedNo'] = " ";
    $GLOBALS['vRGisRothCheckedYes'] = " ";
    $GLOBALS['vRGisRothCheckedNo'] = " ";
    $GLOBALS['vRGShowisRoth'] = 1;
}

// Reset the form : put all the REQUEST values that need to be unset
function formReset()
{
    unset($GLOBALS['RGGDPRChecked']); // if not: do not go further
    unset($GLOBALS['RGSecCheckAC']);
    unset($GLOBALS['RGSecCheckCO']);
    unset($GLOBALS['RGSecCheckSC']);
    unset($GLOBALS['RGSecCheckPB']);
    unset($GLOBALS['RGposition']);
    unset($GLOBALS['RGfname']);
    unset($GLOBALS['RGlname']);
    unset($GLOBALS['RGsector']);
    unset($GLOBALS['RGisStudent']);
    unset($GLOBALS['RGisRoth']);
    unset($GLOBALS['RGinstitution']);
    unset($GLOBALS['RGfunding']);
    unset($GLOBALS['RGcountry']);
    unset($GLOBALS['RGsupName']);
    unset($GLOBALS['RGsupEmail']);
    unset($GLOBALS['RGagreeCOU']);
    unset($GLOBALS['RGallowEmails']);
    unset($GLOBALS['RGStdCheckedYes']);
    unset($GLOBALS['RGStdCheckedNo']);
    unset($GLOBALS['RGisRothCheckedYes']);
    unset($GLOBALS['RGisRothCheckedNo']);
}

// setting some default values. for the ones that are handled by check boxes or radios

/*
 * This function gets the data available in the newmarker table
 */
function getData()
{
    if ($GLOBALS['loggedIn'] == 'yes') {
        // fetch data from database and fill in these variables where there is a value;
        $GLOBALS['vRGposition'] = $_COOKIE['email'];
        $GLOBALS['vRGpositiondisabled'] = "disabled";
        $sqlManga = "Select * from newmarkers where position like '" . $GLOBALS['vRGposition'] . "'";
        $link = LogMangaGuest();
        $results = mysqli_query($link, $sqlManga);

        if (! $results) {
            print("query failed - " . $sqlManga);
        } else {
            $i = 0;
            $nbResults = mysqli_num_rows($results);
            if ($nbResults >= 1) {

                while ($row = mysqli_fetch_array($results)) {

                    $GLOBALS['vRGfname'] = $row['fname'];

                    $GLOBALS['vRGlname'] = $row['lname'];

                    $GLOBALS['vRGisRoth'] = 0;
                    if (strstr($GLOBALS['vRGposition'], 'rothamsted')) {
                        $GLOBALS['vRGinstitution'] = "Rothamsted Research (RRES)";
                        $GLOBALS['vRGisRoth'] = 1;
                        $GLOBALS['vRGisRothCheckedYes'] = "checked";
                        $GLOBALS['vRGsector'] = "AC";
                        $GLOBALS['vRGShowisRoth'] = 0;
                    } else {
                        if ($row['institution'] > 'a') {
                            $GLOBALS['vRGinstitution'] = $row['institution'];
                            $GLOBALS['vRGisRoth'] = 0;
                        }
                    }

                    if ($row['sector'] > 'A') {
                        $GLOBALS['vRGsector'] = $row['sector'];
                    } else {
                        $GLOBALS['vRGsector'] = "AC";
                    }

                    if ($row['country'] > 'a') {
                        $GLOBALS['vRGcountry'] = $row['country'];
                    }

                    $vRGisStudent = 0;

                    if ($row['isStudent'] == 1) {
                        $GLOBALS['vRGisStudent'] = 1;
                        $GLOBALS['vRGStdCheckedYes'] = " checked";
                        $GLOBALS['vRGStdCheckedNo'] = "";
                    } else {
                        $GLOBALS['vRGStdCheckedYes'] = "";
                        $GLOBALS['vRGStdCheckedNo'] = " checked";
                    }

                    $GLOBALS['vRGagreeCOU'] = $row['agreeCOU'];

                    $GLOBALS['vRGallowEmails'] = $row['allowEmails'];

                    if ($row['funding'] > 'a') {
                        $GLOBALS['vRGfunding'] = $row['funding'];
                    } else {
                        $GLOBALS['vRGfunding'] = '';
                    }

                    if ($row['ISPG'] > 'a') {
                        $GLOBALS['vRGISPG'] = $row['ISPG'];
                    } else {
                        $GLOBALS['vRGISPG'] = '';
                    }

                    $GLOBALS['vRGinformation'] = $row['information'];
                    $GLOBALS['vRGsupEmail'] = $row['supEmail'];
                    $GLOBALS['vRGsupName'] = $row['supName'];
                    $GLOBALS['vRGrothColls'] = $row['rothColls'];
                }
            }
        }
    } else {
        $messageNotLoggedIn = "<p>we recommand you log in before you fill in a eRAdata request</p>";
    }
}

// we initialise
formInit();

$vprocess = "Q1";
if (isset($_POST['process'])) {
    $vprocess = $_POST['process'];
}
if (isset($_GET['process'])) {
    $vprocess = $_GET['process'];
}
if (isset($_REQUEST['process'])) {
    $vprocess = $_REQUEST['process'];
}
// We get the data

if ($vprocess == "Reset") {
    formReset();
    $vprocess = "Q1";
}

getData();

// we check the $REQUEST values ($RG...)
if (isset($RGposition)) {
    $vRGposition = $RGposition;
}
if (strstr($vRGposition, 'rothamsted')) {
    $vRGinstitution = "Rothamsted Research (RRES)";
    $vRGisRoth = 1;
    $vRGisRothCheckedYes = "checked";
    $vRGsector = "AC";
} else {
    $vRGisRoth = 0;
}

if (isset($RGfname)) {
    $vRGfname = $RGfname;
}
if (isset($RGlname)) {
    $vRGlname = $RGlname;
}
if (isset($RGisStudent)) {
    $vRGisStudent = $RGisStudent;
    if ($vRGisStudent > 0) {
        $vRGStdCheckedYes = " checked";
        $vRGStdCheckedNo = "";
    } else {
        $vRGStdCheckedYes = "";
        $vRGStdCheckedNo = " checked";
    }
}

if (isset($RGisRoth)) {
    $vRGisRoth = $RGisRoth;
    $vRGisRothCheckedYes = "checked";
    if ($vRGisRoth > 0) {
        $vRGisRothCheckedYes = "checked";
        $vRGisRothCheckedNo = "";
    } else {
        $vRGisRothCheckedYes = "";
        $vRGisRothCheckedNo = " checked";
    }
}
if (isset($RGsector)) {
    $vRGsector = $RGsector;
}
if (isset($RGallowEmails)) {
    $vRGallowEmails = $RGallowEmails;
}
if (isset($RGagreeCOU)) {
    $vRGagreeCOU = $RGagreeCOU;
}

if (isset($RGinstitution)) {
    $vRGinstitution = $RGinstitution;
}
if (isset($RGfunding)) {
    $vRGfunding = $RGfunding;
}
if (isset($RGISPG)) {
    $vRGISPG = $RGISPG;
}
if (isset($RGrothColls)) {
    $vRGrothColls = $RGrothColls;
}
if (isset($RGsupName)) {
    $vRGsupName = $RGsupName;
}
if (isset($RGsupEmail)) {
    $vRGsupEmail = $RGsupEmail;
}
if (isset($RG)) {
    $vRG = $RG;
}

switch ($RGsector) {
    case 'AC':
        $vRGSecCheckAC = "checked";
        $vRGSecCheckCO = "";
        $vRGSecCheckSC = "";
        $vRGSecCheckPB = "";

        break;
    case 'CO':
        $vRGSecCheckAC = "";
        $vRGSecCheckCO = "checked";
        $vRGSecCheckSC = "";
        $vRGSecCheckPB = "";

        break;
    case 'SC':
        $vRGSecCheckAC = "";
        $vRGSecCheckCO = "";
        $vRGSecCheckSC = "checked";
        $vRGSecCheckPB = "";

        break;
    case 'PB':
        $vRGSecCheckAC = "";
        $vRGSecCheckCO = "";
        $vRGSecCheckSC = "";
        $vRGSecCheckPB = "checked";

        break;

    default:
        $vRGSecCheckAC = "";
        $vRGSecCheckCO = "";
        $vRGSecCheckSC = "";
        $vRGSecCheckPB = "";
        break;
}

if ($RGisStudent == 1) {
    $vRGStdCheckedYes = "checked";
}

$vRGagreeCOUChecked = "";
if ($RGagreeCOU == 1) {
    $vRGagreeCOUChecked = " checked";
} else {
    $vRGagreeCOUChecked = "";
}

$vRGallowEmailsChecked = "";
if ($RGallowEmails == 1) {
    $vRGallowEmailsChecked = " checked";
} else {
    $vRGallowEmailsChecked = "";
}

// this decide where to go:)
if ($RGfrom == "Q1") {
    // from Q1: only NEXT
    if ($vprocess == "Next") {
        if ($RGsector == "PB") {

            // skip question 2 for Public
            $vprocess = "Q3";
        } else {
            $vprocess = "Q2";
        }
    }
}
if ($RGfrom == "Q2") {

    if ($vprocess == "Next") {
        $vprocess = "Q3";
    } else {
        $vprocess = "Q1";
    }
}
if ($RGfrom == "Q3") {
    if ($vprocess == "Prev") {
        if ($RGsector == "PB") {
            // skip question 2 for Public
            $vprocess = "Q1";
        } else { // skip question 2 for Public
            $vprocess = "Q2";
        }
    }
}

if ($vprocess == "RGprocess") {

    // this is the final stage: database input, send emails and the like - I can use the function in User.php
    // we find the person in the database
    // The function reg2db checks that the user is in the database and either add the user or updates the info with some
    // of the answers. Then we just update with the rest of the information
    if ($loggedIn == 'yes') {
        // if the user is already logged in, there is not need to check all that and the update to the db is enough
        ;
    } else {

        $answers = getInput();

        $answers['vericode'] = generateRandomString(10);
        $answers['vericode2'] = generateRandomString(72);
        $answers['timecode'] = makeCode();
        $dbanswer = reg2db($answers);
    }

    // at this point, we can update the info that is coming from that.

    // Get the user nm_id: that will be useful for the rest.

    $sqlInput = "UPDATE newmarkers
fname='$RGfname',
lname='$RGlname',
sector='$RGsector',
institution='$RGinstitution',
country='$RGcountry',
isStudent=$RGisStudent,
supEmail='$RGsupEmail',
supName='$RGsupName',
rothColls='$RGrothColls',
information='$RGinformation',
funding='$RGfunding',
ISPG='$RGISPG',
agreeCOU='$RGagreeCOU',
allowEmails=$RGallowEmails
WHERE `position` = '$RGposition';
";
    // date: The proper format of a DATE is: YYYY-MM-DD.
    // date(format, timestamp)
    // Y - A four digit representation of a year
    // m - A numeric representation of a month (from 01 to 12)
    // d - The day of the month (from 01 to 31)

    $ur_date = date("Y-m-d");
    $ur_ltes = "list all the LTEs and DS that were selected";

    $sqlUser = "select * from newmarkers wWHERE `position` = '$RGposition'";
    $user_id = "54"; // find the user ID, until then it is 54
    $sqlInsertUR = "INSERT INTO Users_Requests 
(user_id, ur_date, ur_Q1, ur_Q2, ur_ltes) 
VALUES($user_id, '$ur_date', '$RGur_Q1', '$RGur_Q2', '$ur_ltes');
";
}
/**
 * Anything to do with Cookies or sessions must happen before this line..
 */

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>  
        <?php
        include 'includes/meta.html'; // that is the <meta and link tags> superseeds head.html

        ?>  <script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
/*
Make bootstrap-select work with bootstrap 4 see:
https://github.com/silviomoreto/bootstrap-select/issues/1135
*/
.dropdown-toggle.btn-default {
	color: #292b2c;
	background-color: #fff;
	border-color: #ccc;
}

.bootstrap-select.show>.dropdown-menu>.dropdown-menu {
	display: block;
}

.bootstrap-select>.dropdown-menu>.dropdown-menu li.hidden {
	display: none;
}

.bootstrap-select>.dropdown-menu>.dropdown-menu li a {
	display: block;
	width: 100%;
	padding: 3px 1.5rem;
	clear: both;
	font-weight: 400;
	color: #292b2c;
	text-align: inherit;
	white-space: nowrap;
	background: 0 0;
	border: 0;
	text-decoration: none;
}

.bootstrap-select>.dropdown-menu>.dropdown-menu li a:hover {
	background-color: #f4f4f4;
}

.bootstrap-select>.dropdown-toggle {
	width: 100%;
}

.dropdown-menu>li.active>a {
	color: #fff !important;
	background-color: #337ab7 !important;
}

.bootstrap-select .check-mark {
	line-height: 14px;
}

.bootstrap-select .check-mark::after {
	font-family: "FontAwesome";
	content: "\f00c";
}

.bootstrap-select button {
	overflow: hidden;
	text-overflow: ellipsis;
}

/* Make filled out selects be the same size as empty selects */
.bootstrap-select.btn-group .dropdown-toggle .filter-option {
	display: inline !important;
}
</style>

<script>
        
        $(document).ready(function(){
        	$(".datasetsList").hide();
             $("#RGEXPTrbk1").click(function(){
               if ($("#RGEXPTrbk1").is( ":checked" )) {
                    $("#dsrbk1").show();
                    } else {
                     $("#dsrbk1").hide();
                     }
        	} );
        $("#RGEXPTrpg5").click(function(){
               if ($("#RGEXPTrpg5").is( ":checked" )) {
                    $("#dsrpg5").show();
                    } else {
                     $("#dsrpg5").hide();
                     }
        	} );


        $("#RGEXPTrhb2").click(function(){
               if ($("#RGEXPTrhb2").is( ":checked" )) {
                    $("#dsrhb2").show();
                    } else {
                     $("#dsrhb2").hide();
                     }
        	} );

        $("#RGEXPTrfw3").click(function(){
               if ($("#RGEXPTrfw3").is( ":checked" )) {
                    $("#dsrfw3").show();
                    } else {
                     $("#dsrfw3").hide();
                     }
        	} );



        }


            	);
        
        
        
    </script>
</head>

<body>
	<div class="container bg-white px-0">

<?php

include 'includes/header.html'; // all the menus at the top

// -- start dependant content ---------------------------------------------------------
?>
<div id="register" class="p-0 mb-0">
			<div id="greenTitle"
				class="d-flex  mb-3 py-3 p3-3 bg-info text-white mt-0 ">
				<h1 class="mx-3">Request access to eRAdata</h1>
			</div>
<?php

include_once '_registerGold.php';

?>
</div>
					
<?php
// -- start footers -----------------------------

include_once 'includes/footer.html'; // this has the green bar and bottome stu

include_once 'includes/finish.inc'; // this has the common js scripts

?>
<!--  include here the page dependant scripts -->

</body>

</html>

