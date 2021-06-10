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
    $GLOBALS['vRGfundingOther'] = "";
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
    $GLOBALS['vRGISPGck'] = array();
    $GLOBALS['vRGLTEsel'] = array();
    $GLOBALS['vRGDSsel'] = array();
    $GLOBALS['vRGDS'] = array();
    $GLOBALS['vRGLTE'] = array();
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
    unset($GLOBALS['RGfundingOther']);
    unset($GLOBALS['RGcountry']);
    unset($GLOBALS['RGsupName']);
    unset($GLOBALS['RGsupEmail']);
    unset($GLOBALS['RGagreeCOU']);
    unset($GLOBALS['RGallowEmails']);
    unset($GLOBALS['RGStdCheckedYes']);
    unset($GLOBALS['RGStdCheckedNo']);
    unset($GLOBALS['RGisRothCheckedYes']);
    unset($GLOBALS['RGisRothCheckedNo']);
    unset($GLOBALS['RGLTE']);
    unset($GLOBALS['RGDS']);
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

                    $GLOBALS['vRGfunding'] = $row['funding'];

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
        $messageNotLoggedIn = "";
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
    $vRGisRothCheckedYes = " checked";
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
        $strStudent = "Recorded as Student";
    } else {
        $vRGStdCheckedYes = "";
        $vRGStdCheckedNo = " checked";
        $strStudent = "Not recorded as Student";
    }
}

if (isset($RGisRoth)) {
    $vRGisRoth = $RGisRoth;
    $vRGisRothCheckedYes = " checked";
    if ($vRGisRoth > 0) {
        $vRGisRothCheckedYes = " checked";
        $vRGisRothCheckedNo = "";
    } else {
        $vRGisRothCheckedYes = "";
        $vRGisRothCheckedNo = " checked";
    }
}
if (isset($RGsector)) {
    $vRGsector = $RGsector;
}
$vRGallowEmailsChecked = " ";
if (isset($RGallowEmails)) {

    if ($RGallowEmails == 'on') {
        $RGallowEmails = 1;
        $vRGallowEmails = 1;
        $strAllowEmails = "Yes";
        $vRGallowEmailsChecked = " checked";
    }
    if ($RGallowEmails == 1) {
        $strAllowEmails = "Yes";
        $vRGallowEmails = 1;
        $vRGallowEmailsChecked = " checked";
    } else {
        $strAllowEmails = "No";
        $vRGallowEmailsChecked = " ";
        $vRGallowEmails = 0;
    }
}

if ($vRGallowEmail == 1) {
    $vRGallowEmailsChecked = " checked";
}

if (isset($RGagreeCOU)) {
    $vRGagreeCOU = $RGagreeCOU;
}
$vRGagreeCOUChecked = "";
if ($RGagreeCOU == 1) {
    $vRGagreeCOUChecked = " checked";
} else {
    $vRGagreeCOUChecked = " ";
}

if (isset($RGinstitution)) {
    $vRGinstitution = $RGinstitution;
}

if (isset($RGfunding)) {
    $vRGfunding = $RGfunding;
}
if (isset($RGfundingOther)) {
    $vRGfundingOther = $RGfundingOther;
}

if (isset($RGISPG)) {
    $vRGISPG = $RGISPG;
    $vRGISPGck[$vRGISPG] = " selected";
}

if (is_array($_REQUEST['RGLTE'])) {
    $vRGDLTE = $_REQUEST['RGLTE'];
    $vstrRGLTE = implode(" , ", $vRGDLTE);
    foreach ($vRGLTE as $valueRGLTE) {
        $vRGLTEsel[$valueRGLTE] = " selected";
    }
}

if (isset($_POST['strRGLTE'])) {
    $vstrRGDLTE = "POST , " . $_POST['strRGLTE'];
    $arrRGLTE = explode(" , ", $vstrRGDLTE);

    foreach ($arrRGLTE as $valueRGLTE) {
        $vRGLTEsel[$valueRGLTE] = " selected";
    }
}

if (isset($_REQUEST['strRGLTE'])) {
    $vstrRGDLTE = "REQUEST , " . $_REQUEST['strRGLTE'];
    $arrRGLTE = explode(" , ", $vstrRGDLTE);
    $strJQ = "";
    foreach ($arrRGLTE as $valueRGLTE) {
        $vRGLTEsel[$valueRGLTE] = " selected";
        $strJQ .= "\n\$('#RGDS" . $valueRGLTE . "').prop('checked', true);";
    }
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

if (isset($RGur_Q2)) {
    $vRGur_Q2 = $RGur_Q2;
}
if (isset($RGur_Q1)) {
    $vRGur_Q1 = $RGur_Q1;
}

switch (($vRGfunding)) {
    case 'BBSRC':
        $vRGfundingBBSRC = " checked";
        $vRGfundingNERC = " ";
        $vRGfundingOTHER = " ";
        break;

    case 'NERC':
        $vRGfundingBBSRC = " ";
        $vRGfundingNERC = " checked";
        $vRGfundingOTHER = " ";
        break;
    case 'OTHER':
        $vRGfundingBBSRC = " ";
        $vRGfundingNERC = " ";
        $vRGfundingOTHER = " checked";
        break;
    default:
        $vRGfundingBBSRC = " ";
        $vRGfundingNERC = " ";
        $vRGfundingOTHER = " ";
        break;
}

switch ($RGsector) {
    case 'AC':
        $vRGSecCheckAC = "checked";
        $vRGSecCheckCO = "";
        $vRGSecCheckSC = "";
        $vRGSecCheckPB = "";
        $strSector = "Academic (Research Institute or University)";

        break;
    case 'CO':
        $vRGSecCheckAC = "";
        $vRGSecCheckCO = "checked";
        $vRGSecCheckSC = "";
        $vRGSecCheckPB = "";
        $strSector = "Industrial, Commercial or Farmer";

        break;
    case 'SC':
        $vRGSecCheckAC = "";
        $vRGSecCheckCO = "";
        $vRGSecCheckSC = "checked";
        $vRGSecCheckPB = "";
        $strSector = "School";

        break;
    case 'PB':
        $vRGSecCheckAC = "";
        $vRGSecCheckCO = "";
        $vRGSecCheckSC = "";
        $vRGSecCheckPB = "checked";
        $strSector = "Member of the general public";

        break;

    default:
        $vRGSecCheckAC = "";
        $vRGSecCheckCO = "";
        $vRGSecCheckSC = "";
        $vRGSecCheckPB = "";
        $strSector = "Academic (Research Institute or University)";
        break;
}

if ($RGisStudent == 1) {
    $vRGStdCheckedYes = " checked";
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
    /*
     * This is the final stage of the form:
     * - add information to the database
     * - table newmarkers: only if user is logged in
     * - table user_requests: will have all the information on the form and does not require user to be
     * logged in. The user will receive and email to confirm that they have sent a request and that it will be actioned shortly
     *
     * At this stage of the development, we are only interested in getting the request sent to the e-RA team
     * and into the database.
     * I am recording the User IP: this will be the link between a non logged in user and their email address to log what they do
     */

    if ($RGfunding == "OTHER") {
        $RGfunding = $RGfundingOther;
    }

    if ($RGallowEmails == 'on') {
        $insertRGallowEmails = 1;
        $strAllowEmails = "yes";
    }
    if ($RGallowEmails == 1) {
        $insertRGallowEmails = 1;
        $strAllowEmails = "yes";
    }

    $sqlInput = "UPDATE newmarkers
SET
fname='$RGfname',
lname='$RGlname',
sector='$RGsector',
institution='$RGinstitution',
country='$RGcountry',
isStudent=$RGisStudent,
supEmail='$RGsupEmail',
supName='$RGsupName',
rothColls='$RGrothColls',
funding='$RGfunding',
ISPG='$RGISPG',
agreeCOU='$RGagreeCOU',
allowEmails=$insertRGallowEmails
WHERE 
`position` = '$RGposition';
";
    // date: The proper format of a DATE is: YYYY-MM-DD.
    // date(format, timestamp)
    // Y - A four digit representation of a year
    // m - A numeric representation of a month (from 01 to 12)
    // d - The day of the month (from 01 to 31)

    $ur_date = date("Y-m-d");
    $user_IP = getIp();
    $guestLink = LogMangaGuest();
    if (is_array($_POST['RGLTE'])) {
        $str_ltes = implode(" , ", $_POST['RGLTE']);
    } else {
        $str_ltes = "None Provided";
    }

    $ur_ltes = $str_ltes;

    $sqlUser = "select * from newmarkers WHERE `position` = '$RGposition'";
    $resultsUser = mysqli_query($guestLink, $sqlUser);

    $hasEmail = 0;
    $isVerified = "This email address has not been verified";
    $nbResults = mysqli_num_rows($resultsUser);

    if ($nbResults >= 1) {
        $hasEmail = 1;
        while ($row = mysqli_fetch_array($resultsUser)) {
            if ($row['doorbell'] == "Ringing") {
                $isVerified = "This email address has not been verified";
            } else {
                $isVerified = "This email address has been verified";
            }
        }
    }

    // find the user ID

    $sqlInsertUR = "INSERT INTO eRAmanga.Users_Requests
          (user_email,fname, lname,  ur_date, ur_Q1, ur_Q2, ur_ltes, sector, 
institution, country, `role`, isStudent, 
supEmail, supName, rothColls, funding, ISPG, agreeCOU, allowEmails, user_IP)
    VALUES('$RGposition', '$RGfname','$RGlname', '$ur_date', '$RGur_Q1', '$RGur_Q2', '$ur_ltes', '$RGsector', 
'$RGinstitution', '$RGcountry', '$RGrole', $RGisStudent, 
'$RGsupEmail', '$RGsupName', '$RGrothColls', '$RGfunding', '$RGISPG', '$RGagreeCOU', $insertRGallowEmails, '$user_IP');
";
    // $link = LogMangaAd();
    $linkAd = LogMangaAd();
    $sqlsmessages = "";
    if ($loggedIn == 'yes') {
        // if the user is already logged in, there is not need to check all that and the update to the db is enough
        // that is nice and simple as we know who is sending the information (technically)
        // we use that info to update the User's info.

        $queryInput = mysqli_query($linkAd, $sqlInput); // updates the User info
        $sqlsmessages .= "<br /> 1" . $sqlInput;
        $queryInsertUR = mysqli_query($linkAd, $sqlInsertUR); // inserts the request
        $sqlsmessages .= "<br /> 2" . $sqlInsertUR;

        // formulate an email with the request fields and information
        // send same email to res.era;
    } else {
        /*
         * no user logged in: either the user has no username yet or they have a username and they are not logged in
         * If the user has username, in the database, we just record a User Request and reord their IP address
         *
         */

        $queryInsertUR = mysqli_query($linkAd, $sqlInsertUR); // inserts the request
        $sqlsmessages .= "<br /> 3" . $sqlInsertUR;
    }
    $ur_insertID = mysqli_insert_id($linkAd);
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
        	<?php echo  $strJQ;?>
        	if ($("#RGEXPTrbk1").is( ":checked" )) {
        		$("#dsrbk1").show();              
            } 
        	if ($("#RGEXPTrpg5").is( ":checked" )) {
                $("#dsrpg5").show();
                
                }
        	if ($("#RGEXPTrhb2").is( ":checked" )) {
                $("#dsrhb2").show();
                
                }
            if ($("#RGEXPTrfw3").is( ":checked" )) {
                     $("#dsrfw3").show();   
                     }
                
             $("#RGLBLrbk1").click(function(){
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
				<h1 class="mx-3">Request access to e-RAdata</h1>
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

