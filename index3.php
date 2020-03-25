<?php
include_once 'includes/init.inc'; // these are the settings that refer to more than one page

$page_title .= "";

?>
<?php include 'includes/head.html';     // that is the <head tags>?>
<body>

	<div class="container bg-white px-0">
<div class="row">
	<div class="col-md-9">
<?php

include 'includes/header.html'; // all the menus at the top
                                      
// -- start dependant content ---------------------------------------------------------

include '_carousel.php';
include '_about.php';
include '_tools.php';
include '_people.php';

// -- start footers -----------------------------
?>
    </div>
	<div class="col-md-3">
	<?php include '_tweet.php';?>
	</div>
</div>
<?php 
include_once 'includes/footer.html';
include_once 'includes/finish.inc';
?>

 
</div>
</body>

</html>

