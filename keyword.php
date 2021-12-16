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
    echo "Not Found";
}
			}
?>

                    </ul>
                </div>

                <div class="col-9">
                    <h2>eRAseek: keyword search</h2>
                    <p>Use the search field or the cloud to retrieve datasets - curated keywords</p>
                        <?php
			if ($sendSearch == "Search" ) {
                        $datasets = $page[0]['datasets'];
                        if (count($datasets)) {
                            
                            
                            echo "<h4>Datasets for keyword <u>".$page[0]['keyword']."</u></h4>";
                            echo "<ul>";
                            foreach ($datasets as $dataset) {
                                echo "<li><a href=\"" . $dataset['URL'] . "\" >" . $dataset['DOI'] . "</a>: " . $dataset['title'] . " - <a href=\"experiment/" . $dataset['exptID'] . "\">" . $dataset['exptID'] . "</a></li>";
                            }
                            echo "</ul>";
                        } else {
                            echo "Not Found";
                        }
                        $documents = $page[0]['documents'];
                        if (count($documents)) {
                            
                            
                            echo "<h4>documents for keyword <u>".$page[0]['keyword']."</u></h4>";
                            echo "<ul>";
                            foreach ($documents as $document) {
                                echo "<li><a href=\"" . $document['URL'] . "\" >" . $document['DOI'] . "</a>: " . $document['title'] . " - <a href=\"experiment/" . $document['exptID'] . "\">" . $document['exptID'] . "</a></li>";
                            }
                            echo "</ul>";
                        } else {
                            echo "Not Found";
                        }
			} 
                echo("<div class=\"border border-bottom border-light\"></div>");
                echo ("<h4>Keyword Cloud</h4>");
                echo ("<div class=\"border border-dark bg-light p-3 mb-3 rounded\">"); // attempt at making this container a cirlce
                foreach ($data as $keywords)
                {
                    $countDS = count($keywords['datasets']) + count($keywords['documents']);
                    $size = $countDS + 9;
                    echo  "<span  style=\"font-size:".$size."px;\" > <a href=\"keyword/".$keywords['keyword']."\">".$keywords['keyword']. "</a></span> ";
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
                });


            });
        </script>

</body>

</html>