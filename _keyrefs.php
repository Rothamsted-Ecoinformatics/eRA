<?php
/**
 * @file _keyrefs.php
 * @brief module that displays the research papers taged with the keyword Keyrefs .
 *
 * @author Nathalie Castells-Brooke
 * @date 9/27/2018
 */
?>
<h2>Key References</h2>
<div class="mx-3">
	<?php

if ($KeyRef != " - ") {

    // keyref : keyword to look for in eRAbib. usually a keyref keyword
    
    $papers = GetKeyRefs($KeyRef);

    echo $papers;
    
} else {
    echo "NO KEYREF PROVIDED";
}

?>
</div>
