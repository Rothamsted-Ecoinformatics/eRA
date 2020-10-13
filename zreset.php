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
session_start();
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);

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

testvar();

phpinfo();

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

