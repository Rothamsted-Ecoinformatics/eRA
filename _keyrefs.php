<?php
/**
 * @file _keyrefs.php
 * @brief module that displays the research papers taged with the keyword Keyrefs .
 *
 * @author Nathalie Castells-Brooke
 * @date 9/27/2018
 */

if ($KeyRef != " - ") {
    ?>
<h2 class="mx-3">Key References</h2>
	<div class="mx-5">
	<?php
        // keyref : keyword to look for in eRAbib. usually a keyref keyword
    
     $papers = GetKeyRefs($KeyRef);
        echo $papers;
        echo "</div>";
} else {echo $KeyRef;}

?>

