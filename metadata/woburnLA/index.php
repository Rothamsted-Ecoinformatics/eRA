<?php
/*
 * In this page, we have a nice use of the function to get the keyrefs (or any keyword related references):
 * use:
 *
 * $KeyRef = "KeyRefWobMG" ;
 *
 * GetKeyRefs2 ($KeyRef);
 *
 * At the end of the page, please use unset ($KeyRef) to avoid listing another set of references at the end of the page.
 */
$KeyRef = "KeyRefOthers";

?>

<h1>Woburn Ley Arable</h1>

<div align="center">
	<img src="<?=$metadata?>Woburn_ley_arable_675.jpg"
		title="Woburn Ley Arable" width="675" height="278"
		alt="Woburn Ley Arable CS427" />
</div>

<p><a href="WoburnLA/data">Link to additional data for Johnston et al (2017)</a>, European Journal of Soil Science. </p>
<p>
	<B>Current design:</b> Five year rotation of three years in arable
	crops or grass leys followed by two years of test crops (wheat and
	barley). Total of 80 plots divided into 5 blocks. Yields are recorded
	every year and one block is soil sampled each year. One block limed
	each year.
</p>
<p>
	<b>Strengths:</b> Cropping data and yields available since 1938. Soil
	samples available from 1938, and then every 5 years since the
	mid-1950s. Only long-term ley-arable cropping experiment based on the
	sandy loam at Woburn. Provides a comparison with the two ley-arable
	experiments at Rothamsted.
</p>

<p>
	<b>Background: </b> started in 1938 to compare the effects of rotations
	with or without grass or grass-clover leys on SOM and the yield of two
	arable test crops. Soils at Woburn that have been in continuous arable
	cropping since 1876 contain about 0.9 % C, and %C is still declining
	slowly; soils that have alternated between 3-year leys and 2-years
	arable since 1938 contain about 1.2 % C. Typically, where no fertilizer
	N is applied, grain yields of the first wheat test crop are greater
	following grass leys than in the continuous arable sequence because
	more N is available from the mineralisation of SOM. Following
	grass-clover leys, yield is increased further because of the extra N
	being made available from the breakdown of the leguminous residues.
	Following the leys, a larger yield is often achieved, with less
	fertilizer N, compared with continuous arable cropping.
</p>
<p><b><a href="WoburnLA/data">Data available: </a></b></p>
<p>Soil % Organic Carbon, 0-25cm 1938-2009</p>
<p>Soil % Nitrogen, 0-25cm, 1980-2008   </p>
<p>Yields and estimates of carbon inputs to the soil, selected plots, 1938-2007, from Johnston et al, (2017)</p>



<p>
	Background taken from the <i>Rothamsted Guide to the Classical
		Experiments</i> 2006, page 41.
</p>

<p>
	<b>Key References:</b>
</p>

<?php
$KeyRef = "KeyRefWLA";

GetKeyRefs2 ( $KeyRef );
?>



</div>
<a name="pixies"></a>
<div class="col-2">
	
	<div class="thumbnail">
		<a
			href="pix.php?area=home&image=<?=$metadata?>Woburn_Fields_Stackyard_750.jpg"><img
			src="<?=$metadata?>/ty_Woburn_Fields_Stackyard_100.jpg"
			title="Woburn Fields 2015" width="100" /><br> Woburn Fields 2015 </a>

	</div>

	<div class="thumbnail">
		<a href="pix.php?area=home&image=<?=$metadata?>Woburn_LTEs_750.jpg"><img
			src="<?=$metadata?>/ty_Woburn_LTEs_100.jpg"
			title="Woburn Fields Plan" width="100" /><br> Woburn Fields Plan </a>

	</div>

	

	<div class="thumbnail">
		<a
			href="pix.php?area=home&image=<?=$metadata?>Woburn_Farm_map_750.jpg"><img
			src="<?=$metadata?>/ty_Woburn_Farm_map_100.jpg"
			title="Woburn Farm plan" width="100" /><br> Woburn Farm plan </a>

	</div>

	
    
<?php
// This ensures that there are no more keyrefs listed after that: Otherwise, the script will continue and list the last set of references.

unset ( $KeyRef );
?>
<!--           that is an example of pixy
<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>name.gif"><img src="<?php echo $metadata ; ?>/ty-name.gif" title="1865" width="100" /><br>
Legend  </a>
</div>
</div>
-->
