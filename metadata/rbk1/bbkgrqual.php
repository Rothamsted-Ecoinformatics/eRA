<?php
$KeyRef = "KeyRefBKGRQUAL" ;

?>

<H1>Broadbalk grain quality data</H1>
<p>The Broadbalk experiment was started in 1843 to investigate the relative importance of different fertilizers and manures on the grain yield of winter wheat.  Since 1974, the wheat grain has been regularly analysed for standard grain quality characteristics. </p>

<ul><li><A href="<?php echo $request; ?>#SEC1">Data available</A> </li>
<li><A href="<?php echo $request; ?>#SEC2">Methodology and background information</A> </li>
<li><A href="<?php echo $request; ?>#SEC3">Early studies</A> </li>
<li><A href="<?php echo $request; ?>#SEC4">Related studies</A> </li>
<LI><A href="<?php echo $request; ?>#SEC5">Acknowledgements and references</A></LI>

</ul>

<A NAME="SEC1"></a>
<h2>Data available</h2>
<p>Data is available from e-RA in the following datasets: </p>

<p><b> BKGR_QUALITY</b>: Broadbalk <b>wheat</b> grain quality, 1974-2016, on selected plots, containing:
<ul><li>Thousand grain weight (TGW) since 1974 </li>
<li>Hagberg Falling Number (HFN) since 1999 </li>
<li>Hectolitre weight (HLWT) since 1999 </li>
<li>Grain size classes (% grain between 1-3.5mm) since 1999 </li>
<li>Wheat variety </li>
<li>Previous crop (for the Sections of Broadbalk in rotation) </li>
<li>Number of years since last non-wheat crop, which indicates when the section was last fallowed, for the Sections in continuous wheat </li>
</ul></p>

<p>See <a href="<?php echo $metadata ; ?>Broadbalk Sections Wheat GRAIN QUALITY.pdf" target="_blank">grain quality data available</A> for details of what measurements are available, and from which plots and sections of Broadbalk. Data is available for Section 1 (continuous wheat) and the Section in the 1st wheat of the rotation every year, with other sections in other years.  
<br /></p>

<p><b> Other data</b>:
<ul><li>Wheat Hectolitre weight (HLWT) derived from Bushel weights, 1844 - 1955. See <A href="<?php echo $request; ?>#SEC3">Early studies</A> for more details.</li>
</li>
</ul></p>

<p><b>BKOATS </b>: Broadbalk <b>oats</b> grain quality, 1996-2016, for all plots each year, containing:
<ul><li>Thousand grain weight (TGW) since 1996 </li>
<li>Hectolitre weight (HLWT) since 1999 </li>
<li>Grain size classes (% grain between 1-3.5mm and % 1-2.2mm)  1999-2004 </li>
</ul></p>


<A NAME="SEC2"></a>
<h2><strong>Methodology and background information</strong> </h2>
<p><b>TGWs:</b> The thousand grain weight is the weight in grams of 1000 cereal kernels. It is determined using an automatic grain counter. After counting, the grain is dried overnight at 105 degrees C. TWGs are useful for determining the evenness of grain size (by comparing several TGWs). The TGW is also important when calculating the drilling rate for sowing cereals. </p>

<p><b>HFN:</b> The Hagberg Falling Number is a recognised international test used by millers to assess the level of germination/sprouting within a batch of wheat intended for bread making. Developed in the 1950s, the Hagberg apparatus measures the time taken for a plunger to fall through a standardised hot slurry of milled wheat flour. As wheat begins to germinate it produces the enzyme alpha-amylase, which reduces the bread making potential of the wheat, and reduces the HFN. A HFN of 300 seconds or more is generally accepted as the cut-off point for bread making. A low HFN would reduce the value of the crop and could mean that the grain could only be sold for animal feed. The process includes 60 seconds of mixing, when the plunger is automatically rapidly lifted up and down by the mechanism. At 60 seconds, the plunger is released at its highest point so it can fall through the mixture. Thus the minimum possible reading is 60. THe HFN is determined on fresh grain. From 2016 the HFN is measured with a Perten Instruments FN1000, and is the mean of two readings. </p>
<p>HFNs in 2007 and 2010 were very low. This is probably because it was very wet around harvest, and the grain had started to sprout before it could be harvested. </p>

<p><b>HLWT:</b> The hectolitre weight is the weight in kilograms of 100 litres of grain. It is calculated from specific weight of grain. Specific weight of grain is measured using a chondrometer and is equal to the weight in grams of a one litre volume of grain. HLWT is calculated from specific weight (grams per litre) as  g/l x 0.10033 + 0.42119 = kg/hl. HLWT is determined using fresh grain, and the sample is weighed fresh. </p>
<p>HLWT is used to quantify the size of grains and the proportion of broken or thin, shrivelled grain. Millers use HLW to help determine the quality of grain and its potential end use as bread, biscuit or pasta flours. </p>

<p><b>Size classes:</b> Size classes of grain are determined using a Winnower sieve, using fresh grain. The % of grain between 1-3.5mm is recorded. This is divided into the 
% between 1-2.25mm and the % between 2.25 and 3.5mm. The proportion of grain between 2.25 and 3.5mm is what would normally be used by millers for flour. This is calculated 
by subtracting the proportion of grain between 1-2.25mm from the proportion of grain between 1-3.5mm. A weighed sample is passed through slotted sieves. The same sample is 
sieved twice, using different sized sieves in turn. Screenings are undersized, broken or shrivelled grain between 1 and 2.25mm. Admixture comprises impurities, such as straw,
chaff, weed seeds and earth, which must be removed before milling marketable flour. Screenings and admixture represent a loss to the miller, so a maximum of 2% is normally 
allowed.  </p>
<p>In <b>2014</b>, a few of the plots had a measurable amount of grain greater than 3.5mm. If you would like this data, please contact the <a href= "<?=$Era_Curator[Email]?>"> e-RA Curators.</p>

<A NAME="SEC3"></a>
<h2>Early studies </h2>
<p>Hectolitre weights (HLWT), derived from bushel weights, are available for all plots and sections on Broadbalk from 1844 - 1955, for dressed grain measured at threshing. Bushel weight is the weight of a bushel of grain (one bushel = 36.369 litres). Bushel weights (measured in lbs/bushel) have been converted to HLWT (kg/hl), (one lb = 0.4536 kg). From 1844 to 1901 Broadbalk was harvested by hand, and then by binder until 1956. The sheaves were 'stooked' on the plot, then carted to a barn and stored until threshing in winter, when bushel weight was determined by weighing a bushel measure filled with grain (see Atkinson <i>et al</i>, 2008 in Key References below). The measurement of bushel weights was discontinued in 1955 (Johnston and Garner, 1969). If you would like access to this early data, please contact the <a href= "<?=$Era_Curator[Email]?>"> e-RA Curators</a>.</p>  


<A NAME="SEC4"></a>
<h2>Related studies </h2>
<p><b>Godfrey <i>et al</i> (2010)</b> assessed wheat grain protein compostion and dough properties on selected Broadbalk plots, 2005-2007. See Key References below. </p>

<p><b>Atkinson <i>et al</i> (2008)</b> looked at the relationship between grain specific weight/hectolitre weight and the winter North Atlantic Oscillation for plot 22 (FYM) Section 1 of Broadbalk, from 1844-2001. Grain specific weight was derived from the bushel weight of dressed grain, 1844-1955 (see Early studies, above). Specific weight was measured in archived samples of clean grain from 1956-2001. For further details, see Key References below. </p>

<p><b>Gutteridge <i>et al</i> (2003)</b> investigated the relationship between take-all disease and wheat grain quality (TGW, HLWT, HFN and grain size) at other field sites at Rothamsted. For further details, see Key References below. </p>

<p><b>Grain protein content</b> is an important property, determining suitability for breadmaking. A minimum protein content for breadmaking wheat in the UK is typically 13% dry basis. Protein % can be calculated as %N x 5.7. See <a href="http://www.era.rothamsted.ac.uk/Broadbalk/bbknutr">Broadbalk Crop Nutrient Content</a> for details of Broadbalk grain %N.</p> 

<p>For more details, contact the <a href= "<?=$Era_Curator[Email]?>"> e-RA Curators. </a>


<A NAME="SEC5"></a>
<h2> Acknowledgements</h2>
 
<p>With thanks to Steve Freeman, Chris Hall, Andy Macdonald and Paul Poulton for help with compiling the information, images and text.  </p>
 

<?php 	if ($KeyRef) { 		GetKeyRefs ($KeyRef);	}	?>	</div><a name="pixies"></a><div class="col-2">

<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>wheat_ripe.jpg"><img src="<?php echo $metadata ; ?>/ty_wheat_ripe.jpg" title="Ripe wheat" width="100" /><br>
Ripe wheat </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>wheat_seeds.jpg"><img src="<?php echo $metadata ; ?>/ty_wheat_seeds.jpg" title="Wheat grain" width="100" /><br>
Wheat grain </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>grain_counter.jpg"><img src="<?php echo $metadata ; ?>/ty_grain_counter.jpg" title="Automatic seed counter" width="100" /><br>
Grain counter </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>hfn.jpg"><img src="<?php echo $metadata ; ?>/ty_hfn.jpg" title="Hagberg Falling Number apparatus" width="100" /><br>
Hagberg Falling Number apparatus</a>
</div>


<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>condrometer_half_litre.jpg"><img src="<?php echo $metadata ; ?>/ty_condrometer_half_litre.jpg" title="Half-litre chondrometer" width="100" /><br>
Half-litre chondrometer </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>condrometer_litre.jpg"><img src="<?php echo $metadata ; ?>/ty_condrometer_litre.jpg" title="Litre chondrometer" width="100" /><br>
Litre chondrometer </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>winnower_sieve.jpg"><img src="<?php echo $metadata ; ?>/ty_winnower_sieve.jpg" title="Winnower sieve" width="100" /><br>
Winnower sieve </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>Aerial pic 3.34.jpg"><img src="<?php echo $metadata ; ?>/ty_Aerial pic 3.34.jpg" title="Broadbalk aerial view" width="100" /><br>
Broadbalk aerial view   </a>
</div>


</div>
