<?php
/** 
 * @file curation.php
 * @brief  Curation area: this has some queries to the user datbase to list users, donwloads, requests. and other things
 * 
 * @author Nathalie Castells-Brooke
 * 
 * 
 */
include_once 'includes/init.inc'; // these are the settings that refer to more than one page
$page_title .= ': curation interface';

// This is used in the head file as the title tag
function mangaCon()
{
    global $Turbigo;
    global $nhtyuj; # "eRAmanga";
    global $lkk; # = "tetramere";
    global $sdfghj; # = "Qu4rt3rS3s4m3S3s4m3";

    $dhjds = $sdfghj . "S3s4m3";
    $mysqli = new mysqli($Turbigo, $lkk, $dhjds, $nhtyuj);
    return $mysqli;
}

function getUsers($con)
{
    $sqlUsers = "SELECT * from newmarkers where doorbell NOT LIKE 'ringing'";
    $result = $con->query($sqlUsers);
    printf("<ul>");
    // Associative array
    while ($row = $result->fetch_assoc()) {
        printf("<li>%s (%s) - %s</li>\n", $row["lname"], $row["fname"], $row["position"]);
    }
    printf("</ul>");
}

function getDownloads($con)
{
    /*
     * dl-id
     * position
     * DOI
     * dl-date
     * result
     */
    $sqlUsers = "SELECT * from eRAdownloads where result LIKE 'LIVE'";
    $result = $con->query($sqlUsers);
    printf("<ul>");
    // Associative array
    while ($row = $result->fetch_assoc()) {
        printf("<li>%s: <a href=\"mailto:%s\">%s</a> - <a target=\"_blank\" href=\"https://whatismyipaddress.com/ip/%s\">%s</a> (%s)</li>\n", $row["dl-date"], $row["position"], $row["position"], $row["IP"], $row["IP"], $row["DOI"]);
    }
    printf("</ul>");
}


function getRequests($con)
{
    /*
     `ur_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `ur_date` date NOT NULL,
  `ur_Q1` text COMMENT 'General information abou the problem',
  `ur_Q2` text COMMENT 'More Information about the data',
  `ur_ltes` text COMMENT 'csv, ltecodes',
  `sector` varchar(4) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `isStudent` tinyint(4) DEFAULT NULL,
  `supEmail` varchar(100) DEFAULT NULL,
  `supName` varchar(100) DEFAULT NULL,
  `rothColls` text,
  `funding` varchar(100) DEFAULT NULL,
  `ISPG` varchar(100) DEFAULT NULL,
  `agreeCOU` varchar(100) DEFAULT NULL,
  `allowEmails` tinyint(4) DEFAULT NULL,
  `user_IP` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `refer` varchar(5) DEFAULT NUL
     */
    $sql = "SELECT * from Users_Requests order by user_email ";
   
    $result = $con->query($sql);
    $info = "<ul>";
    // Associative array
    while ($row = $result->fetch_assoc()) {
        $line = "<hr /><ul>";
        $line .= "<li><b>ur_id   </b>: ".$row['ur_id']    ."</li>";
        
    
        $line .= "<li><b>user_email   </b>: <a href=\"mailto:".$row['user_email']."\">".$row['user_email']    ."</a></li>";
        $line .= "<li><b>Name   </b>: ".$row['fname']    ." " .$row['lname'] ."</li>";
        $line .= "<li><b>ur_date   </b>: ".$row['ur_date']    ."</li>";
        $line .= "<li><b>General information about the problem   </b>: ".$row['ur_Q1']    ."</li>";
        $line .= "<li><b>More Information about the data requested   </b>: ".$row['ur_Q2']    ."</li>";
        $line .= "<li><b>LTEs and Datasets requested   </b>: ".$row['ur_ltes']    ."</li>";
        $line .= "<li><b>Sector   </b>: ".$row['sector']    ." </li>";
        $line .= "<li><b>Institution   </b>: ".$row['institution']    ."</li>";
        $line .= "<li><b>Country  Code  </b>: ".$row['country']    ."</li>";
        $line .= "<li><b>Role   </b>: ".$row['role']    ."</li>";
        $line .= "<li><b>isStudent   </b>: ".$row['isStudent']    ."</li>";
        $line .= "<li><b>supEmail   </b>: <a href=\"mailto:".$row['supEmail']."\">".$row['supEmail']    ."</a></li>";
        $line .= "<li><b>supName   </b>: ".$row['supName']    ."</li>";
        $line .= "<li><b> Colleagues at Rothamsted  </b>: ".$row['rothColls']    ."</li>";
        $line .= "<li><b>funding   </b>: ".$row['funding']    ."</li>";
        $line .= "<li><b>ISPG   </b>: ".$row['ISPG']    ."</li>";
        $line .= "<li><b>agreeCOU   </b>: ".$row['agreeCOU']    ."</li>";
        $line .= "<li><b>user_IP</b>:  <a target=\_blank\" href=\"https://whatismyipaddress.com/ip/".$row['user_IP']    ."\">".$row['user_IP']."</a></li>";
   
        $line .= "<li><b>How did you hear about e-RA  </b>: ".$row['refer']    ."</li>";
        $line .= "</ul>";
        $info .= $line;
    }
    
    $info .= "</ul>";
    echo  $info;
}

$con = mangaCon();

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>  
        <?php
        include 'includes/meta.html'; // that is the <meta and link tags> superseeds head.html

        $script = ''; // $script is added to the header as the

        ?>  
    </head>

<body>
	<div class="container bg-white px-0">
        <?php
        include 'includes/header.html'; // all the menus at the top
                                        // -- start dependant content ---------------------------------------------------------
        ?>
        <div id="idExpt">
			<h1 class="mx-3">Curation Interface</h1>
			<?php include "metadata/curation/menu.html"; ?>
			<div class="row">
				<div class="col-12 pt-3">
					<ul class="nav nav-tabs nav-fill text-body ">
						<li class="nav-item"><a class="nav-link active show"
							id="Users-tab" data-toggle="tab" href="#Users">Users</a></li>
						<li class="nav-item"><a class="nav-link" id="Requests-tab"
							data-toggle="tab" href="#Requests">Requests</a></li>
						<li class="nav-item"><a class="nav-link" id="Downloads-tab"
							data-toggle="tab" href="#Downloads">Downloads</a></li>
					</ul>
					<div class="tab-content mh-100" id="idExptTabs">
						<div class="tab-pane active show" id="Users" role="tabpanel"
							aria-labelledby="Users-tab">
							<h2>Users registered for Aggregated Datasets</h2>
							<p>We only list those who have confirmed their email adresses
							<?php

getUsers($con);
    ?>
						</div>
						<div class="tab-pane" id="Requests" role="tabpanel"
							aria-labelledby="Requests-tab">
							<h2>Requests for Data - processed</h2>
							<?php
							getRequests($con);

    ?>
						</div>
						<div class="tab-pane" id="Downloads" role="tabpanel"
							aria-labelledby="Downloads-tab">
							<h2>Dataset Downloads</h2>
							<?php

getDownloads($con);
    ?>
							</div>
					</div>
				</div>
			</div>

		</div>
        					
        <?php
        // -- start footers -----------------------------

        include_once 'includes/footer.html';

        include_once 'includes/finish.inc'; // this has the common js scripts

        ?>
        
	</div>
</body>
</html>

