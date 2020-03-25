<?php
/**
 * @file register.php
 * 
 * @brief For to register for a username in the database .
 *
 * @author Nathalie Castells-Brooke.
 * 
 * @version 1.00 : just a contact form (see Bootstrapious)
 * 
 * @version 0.1
 *  
 */


include_once 'includes/init.inc'; // these are the settings that refer to more than one page

include 'includes/head.html'; // that is the <head tags>
?>

<body>
	<div class="container bg-white px-0">

<?php

include 'includes/header.html'; // all the menus at the top
                                
// -- start dependant content ---------------------------------------------------------
?>
<div id="idRegister">
<?php 
include_once '_register.php';
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

