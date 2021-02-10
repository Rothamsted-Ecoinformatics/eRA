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

/**
 * Anything to do with Cookies or sessions must happen before this line.. 
 */

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
<div id="idPHPinfo">
<?php 





$con = LogMangaAd();


//$con = LogMangaGuest();

$sql = "select * from newmarkers";
echo $sql ."<br />";
$results = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($results)) {
    echo ("<br />");
    foreach ($row as $value) {
        echo $value." - ";
    }
}
mysqli_close($con);



echo $debug;
?>
</div>
					
<?php
// -- start footers -----------------------------

include_once 'includes/footer.html'; // this has the green bar and bottome stu

?>
 
	</div>
<?php

include_once 'includes/finish.inc'; // this has the common js scripts

?>
<!--  include here the page dependant scripts -->
</body>

</html>

