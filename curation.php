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
        printf("<li>%s: <a target=\_blank\" href=\"https://whatismyipaddress.com/ip/%s\">%s</a> (%s)</li>\n", $row["dl-date"], $row["position"],$row["position"], $row["DOI"]);
    }
    printf("</ul>");
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
							<h2>Requests for Data</h2>
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

