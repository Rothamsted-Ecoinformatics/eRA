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

<h2>Woburn Ley-Arable Experiment - Additional Data to accompany Johnston et al, 2017:</h2>


<p>Johnston, A. E. , Poulton, P. R. , Coleman, K. , Macdonald, A. J. and White, R. P. (2017) "Changes in soil organic matter over 70 years in continuous arable and ley–arable rotations on a sandy loam soil in England",
European Journal of Soil Science,    <a href="http://onlinelibrary.wiley.com/doi/10.1111/ejss.12415/abstract"target="_blank">On-line verson </a></p>

<h1>Supporting Information from online version of the paper:</h1>


<p><b>
<a href="<?php echo $metadata ; ?>Table S1.xlsx"target="_blank">Table S1.</a></b> Yields, t ha<sup>-1</sup>, and estimates of carbon inputs, t ha<sup>-1</sup>, to the soil on selected plots 
without FYM residues, Block III only, Woburn ley-arable experiment. </p>
<p><b>
<a href="<?php echo $metadata ; ?>Table S2.xlsx"target="_blank">Table S2.</a></b> Percentage of organic carbon in the top 25cm of soil with and without FYM residues, in different all-arable
and ley-arable cropping systems since 1938; mean of five blocks, Woburn ley-arable experiment. (Individual block data available below.) </p>
<p><b><a href="<?php echo $metadata ; ?>Figure 1.pdf "target="_blank">Figure S1.</a></b> Schematic diagram showing the flow of carbon throught the Rothamsted turnover model (RothC-26.3) with rate constants and turnover
times for the different carbon pools. Redrawn, with permission, from Jenkinson <i>et al</i> (1994). </p>
<P>Please ensure full acknowledgment is given to the Authors and the European Journal of Soil Science, if any of this supporting information is reproduced in any medium.
This is an open access article under the terms of the Creative Commons Attribution License, which permits use, distribution and reproduction in any medium, provided
the original work is properly cited. </p>

<h1>The following additional information, not in the paper, is available on request from the <a href="mailto:era@rothamsted.ac.uk">e-RA Curators</a> as Excel spreadsheets:</h1>

<p><b>Soil % total Nitrogen,</b> 0-25cm, 1980-2008 for each Block and Plot, for the continuous and alternating ley-arable rotations. </p>
<P><b>Soil % organic Carbon</b> 0-25cm, 1938-2009. Continuous and alternating ley-arable rotations.  Data for each of the five blocks (I - V) and plots, shown as means in Table S2.
<p><b>Soil organic Carbon, t ha<sup>-1</sup>, </b>calculated from %OC and soil weights, 1938-2009. Continuous and alternating ley-arable rotations. Data for each of the
blocks and plots.   </p>
<p><b>Lime applications</b>, to each of the five blocks, 1938-2009</p>
<p><b>FYM applications. </b>Years when FYM was applied</p>
<p><b>Cropping sequence,</b> 1938-2009, including the new cropping sequence from 1973 with 8-year leys.</p>

<P>Please contact the <a href="mailto:era@rothamsted.ac.uk">e-RA Curators</a> for questions about the data or its interpretation. This data is freely available, however, 
Rothamsted relies on the integrity of the user to ensure that Rothamsted Research receives suitable academic acknowledgment, crediting Rothamsted Research as being the 
originators of these data, with a suitable link to the e-RA website and acknowledging funding support for the e-RA database from the Lawes Agricultural Trust and the BBSRC. </p>

<p><a href="<?php echo $request; ?>#top">Back to top</a></p>

<div align="center">
	<img src="<?=$metadata?>Woburn_ley_arable_675.jpg"
		title="Woburn Ley Arable" width="675" height="278"
		alt="Woburn Ley Arable CS427" />
</div>

<?php
$KeyRef = "KeyRefWLAJt";

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
