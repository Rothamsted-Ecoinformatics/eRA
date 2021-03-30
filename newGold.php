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
.bootstrap-select.show > .dropdown-menu > .dropdown-menu {
  display: block;
}
.bootstrap-select > .dropdown-menu > .dropdown-menu li.hidden {
  display: none;
}
.bootstrap-select > .dropdown-menu > .dropdown-menu li a {
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
.bootstrap-select > .dropdown-menu > .dropdown-menu li a:hover {
  background-color: #f4f4f4;
}
.bootstrap-select > .dropdown-toggle {
  width: 100%;
}
.dropdown-menu > li.active > a {
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
    </head>

<body>
	<div class="container bg-white px-0">

<?php

include 'includes/header.html'; // all the menus at the top
                                
// -- start dependant content ---------------------------------------------------------
?>
<div id="idRegister">
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

