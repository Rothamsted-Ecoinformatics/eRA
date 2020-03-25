<?php
include_once 'includes/init.inc'; // these are the settings that refer to more than one page

$page_title .= "";

?>
<?php include 'includes/head.html';     // that is the <head tags>?>
<body>

	<div class="container bg-white px-0">

<?php

include 'includes/header.html'; // all the menus at the top
                                      
// -- start dependant content ---------------------------------------------------------

include '_carousel.php';
?>
<div class="row">
	<div class="col-md-9">
	<?php
         include '_about.php';
         include '_tools.php';

    ?>
    </div>
	<div class="col-md-3 pl-0 pr-4 mt-3 ">
	<?php include '_tweet.php';?>
	</div>
</div>
<?php

include '_people.php';

// -- start footers -----------------------------

include_once 'includes/footer.html';
include_once 'includes/finish.inc';

?>

 
</div>
</body>

</html>

