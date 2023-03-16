<?php
/**
 * @file keyword.php
 *
 * @brief a search page to retrieve datasets assciated with keywords. .
 *
 * @author Nathalie Castells-Brooke.
 *
 *
 */

// /This will be used to pass the FileName : it will just include the file as is.
$keyWord = 'index';
if (isset($_REQUEST['search'])) {
    $keyWord = $_REQUEST['search'];
}

/*
 * this is to pass filename as page.extension where extension is in the phpfile.json
 *
 * At the moment, we use FileName
 */

include_once 'includes/init.php'; // these are the settings that refer to more than one page

$url = 'metadata/default/keywords.json';
if (is_file($url)) {
    $jdata = file_get_contents($url);

    $data = json_decode($jdata, true);
    $pairs = array(
        'keyword' => $keyWord
    );
    
    $page = multiSearch($data, $pairs);
    
    $h1Title = $keyWord;
    $page_title .= ': ' . $page[0]['keyword'];
    // $KeyRef = $page[0]['KeyRef'];
}

?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <?php

include 'includes/meta.html'; // that is the <meta and link tags> superseeds head.html

?>

</head>

<body>
    <div class="container bg-white px-0">

        <?php
            include 'includes/header.html'; // all the menus at the top

            // -- start dependant content ---------------------------------------------------------
            ?>


        <div id="idExpt" class="p-0 mb-0">
            <div id="greenTitle" class="d-flex  mb-3 py-3 p3-3 bg-info text-white mt-0 ">
                <h1 class="mx-3">Keyword search</h1>
            </div>
            <div class="row">
                <div class="col-3">
                    <form action="keyword.php" method="post" autocomplete="off">
                        <div align="center" class="input-group">
                            <input type="text" name="search" id="search"
                                placeholder="Start Typing - Arrow for full list" class="form-control" />
                            <input type="hidden" name="sendSearch" value="Search">

                        </div>
                        <ul class="list-group bg-light" id="result"></ul>
                        <br />
                    </form>
                    <ul>

                        <?php
			if ($sendSearch == "Search" ) {
$datasets = $page[0]['datasets'];
if (count($datasets)) {
    echo "<li><b>Keyword: </b>".$keyWord."</li>";
    echo "<li><b>Schema:  </b>".$page[0]['schema']."</li>";
    echo "<li><b>Identifier: </b> <a href=\"".$page[0]['URL']."\">".$page[0]['identifier']."</a></li>";
} else {
    
}
			}
?>
                    </ul>
                </div>

                <div class="col-9">
                    <h2>eRAseek - keyword search: <?php echo $page[0]['keyword'];?></h2>
                    <p>Use the search field or the cloud to retrieve datasets - curated keywords</p>
                        <?php
			if ($sendSearch == "Search" ) {

                        $datasets = $page[0]['datasets'];
                        $countDatasets = 0;
                        $strDataset = '';
                        if (is_array($datasets)) {
                            $strDataset =  "\n<h4>Datasets for keyword <u>".$page[0]['keyword']."</u></h4>";
                            $strDataset .=  "\n<ul>";
                            foreach ($datasets as $dataset) {
                                $countDatasets +=1;
                                $strDataset .=  "\n<li><a href=\"" . $dataset['URL'] . "\" >" . $dataset['DOI'] . "</a>: " . $dataset['title'] . " - <a href=\"experiment/" . $dataset['exptID'] . "\">" . $dataset['exptID'] . "</a></li>";
                            }
                            $strDataset .=  "\n</ul>";
                        } else {
                            $strDataset = '';
                        }
                        if ($countDatasets >0 ) {echo $strDataset;}


                        $documents = $page[0]['documents'];
                        $countDocs = 0;
                        $stringDoc = '';

                        if (is_array($documents)) {
                            $stringDoc = "\n<h4>Documents for keyword <u>".$page[0]['keyword']."</u></h4>";
                            $stringDoc .= "\n<ul>";
                            foreach ($documents as $document) {
                                $countDocs += 1;
                                $stringDoc .= "\n<li><a href=\"" . $document['URL'] . "\" >" . $document['DOI'] . "</a>: " . $document['title'] . " - <a href=\"experiment/" . $document['exptID'] . "\">" . $document['exptID'] . "</a></li>";
                            }
                            $stringDoc .= "\n</ul>";
                        } else {
                            $stringDoc = '';
                        }
                        if ($countDocs > 0) {echo $stringDoc ;}


                        $webPages = $page[0]['pages'];
                        $countWP = 0;
                        $strWP = '';
                        if (is_array($webPages)) {
                            
                            $countWP =  count($webPages);
                            $strWP .=  "\n<h4>Web Pages for keyword <u>".$page[0]['keyword']."</u></h4>";
                            $strWP .=  "\n<ul>";
                            foreach ($webPages as $webPage) {
                                $countWP +=1;
                                $exptPage = "";
                                if ($webPage['pageType']!= 'default') { $exptPage =  "- <a href=\"". $webPage['pageType'] ."/" . $webPage['exptID'] . "\">" . $webPage['exptID'] . "</a>";}
                                $strWP .=  "\n<li><a href=\"" . $webPage['URL'] . "\" >" . $webPage['title'] . "</a>  ". $exptPage ." </li>";
                            }
                            $strWP .=  "\n</ul>";
                        } else {
                            $strWP = '';
                        }
                        if ($countWP >0 ) {echo $strWP;}

                    /*
                     "URL": "info/rbk1/soilphys",
                    "title": "Soil Physical measurements",
                     "exptID": "rbk1",
                        "sampleText": "\t<li>For information on soil organic carbon, see <a\n"
                        */
			} 
                echo("<div class=\"border border-bottom border-light\"></div>");
                echo ("<h4>Keyword Cloud</h4>");
                echo ("<div class=\"border border-dark bg-light p-3 mb-3 rounded\">"); // attempt at making this container a circle
                $excludedKeywords = ["Rothamsted Research", 
                "long term experiments", 
                "Broadbalk long-term experiment", 
                "Hoosfield spring barley long-term experiment", 
                "Park grass long-term experiment"
            ];
                foreach ($data as $keywords)
                {
                    if (!in_array($keywords['keyword'], $excludedKeywords)) {
                        if (is_array($keywords['datasets'])) {
                            $countDatasets = count($keywords['datasets']);
                        }
                        if (is_array($keywords['pages'])) {
                            $countWP = count($keywords['pages']);
                        }
                        if (is_array($keywords['documents'])) {
                            $countDocs = count($keywords['documents']);
                        }
                    $countDS = $countDatasets + $countDocs + $countWP;
                    $size = $countDS + 12;
                    if ($size > 40) {$size = 40;}
                    echo  "<span  style=\"font-size:".$size."px;\" > <a href=\"keyword/".$keywords['keyword']."\">".$keywords['keyword']. "</a></span> ";
                }
                }
                echo ("</div>");
?>
                </div>
            </div>
            <?php

include_once 'includes/footer.html'; // this has the green bar and bottom
?>


        </div>
        <?php
include_once 'includes/finish.inc'; // this has the common js scripts
?>
        <!--  include here the page dependant scripts -->
        <script>
            $(document).ready(function () {

                $.ajaxSetup({
                    cache: false
                });

                $('#search').keyup(function () {

                    $('#result').html('');
                    $('#state').val('');
                    var searchField = $('#search').val();
                    var expression = new RegExp(searchField, "i");
                    $.getJSON('metadata/default/keywords.json', function (data) {
                        $.each(data, function (key, value) {
                            if (value.keyword.search(expression) != -1) {
                                $('#result').append(
                                    '<li class="list-group-item link-class list-group-item-action border border-light"> ' +
                                    value.keyword + ' </li>');
                            }
                        });
                    });
                });

                $('#result').on('click', 'li', function () {
                    var click_text = $(this).text().split('|');
                    $('#search').val($.trim(click_text[0]));
                    var x = document.getElementsByTagName("form");
                    x[0].submit(); // Form submission
                    $("#result").html('');
                    let word = $(this).text().trim();
                    window.location.href = 'keyword/'+word;
                });


            });
        </script>

</body>

</html>