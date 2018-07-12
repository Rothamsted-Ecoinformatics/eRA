<?php
$KeyRef = "KeyRefOARESmatemp" ;

?>
<title>Meteorological open access data</title>
<H1>Annual mean air temperature at Rothamsted</H1>
<p>Last updated 21/04/2017</p>
<p><A NAME="SEC1"></a></p>
<H2>Access Use and Conditions</H2>

<p>
This summary data is derived from annual daily data measured at Rothamsted Meteorological Station. The original raw data is available, after registering, from the e-RA database. Contact the <a href="era@rothamsted.ac.uk" target="_blank">e-RA curators</a> to arrange a password.</p>
<P><b><a href="<?php echo $metadata ; ?>Mean annual temp fig.pdf"  target="_blank"><img src="<?php echo $metadata ; ?>long-termtemp.png" width="727" height="485" alt="Click to download chart Annual mean Rothamsted temperature" /></a></b>
  
  Click the chart above for a PDF version. Summary data used for this chart are available to download as an Excel Spreedsheet:
  <a href="<?php echo $metadata ; ?>Mean annual temp data.xlsx">Annual mean Rothamsted temperature</a>. Please contact the <a href="mailto:era@rothamsted.ac.uk">e-RA Curators</a> for help with questions about the data or its interpretation. </p>
<P><a rel="license" href="http://creativecommons.org/licenses/by/4.0/" target="out"><img style="width:50px;"  alt="Creative Commons License"
src="includes/cc4.png" align="middle" /></a> This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>.</p>
<p><strong>YOU MUST CITE AS:</strong> Rothamsted Research (2017). Rothamsted meanlong-term annual temperature. Electronic Rothamsted Archive <a href="https://doi.org/10.23637/HOOSFIELD-BARLEY-YIELD-OA">XXXXXXXXXXXXXXXX</a></p>
<h2>Description</h2>
<p>The figure shows the annual mean air temperature at Rothamsted every year from 1878 - 2013. Also shown is the mean over each five year period, 1878-1882, 1883-1887, etc. The red line shows the mean temperature, 1878-1987. The mean air temperature at Rothamsted is now 10 &ordm;C, 1 &ordm;C higher than the 1878-1987 average. The 10 warmest years on record occurred in the last 17 years. Mean soil temperatures have also risen.</p>
<H2>Keywords:</H2>
</p>
xx<br />
xx<br />
xx
<h2>Further Information </h2>
<p>For further information about the measurement of temperature at Rothamsted see <a href="http://www.era.rothamsted.ac.uk/Met/instrumentdescription"> Temperature</a>.<br />
  <br />
Updated from Scott, T (2014) &quot;The U.K. Environmental Change Network Rothamsted. Physical and Atmospheric Measurements&quot;, p8. Lawes Agriculture Trust Co. Ltd, Harpenden, UK.  See <a href="http://www.rothamsted.ac.uk/sites/default/files/groups/Environmental_Change_Network_at_Rothamsted/downloads/ECNRothamstedFirst20yr.pdf" target="_blank">ECN Rothamsted (2014)</a>.</p>
<p><a href="<?php echo $request; ?>#top">Back to top</a></p>
  <a name="pixies"></a></p>

<!--
<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>Aerial pic 3.34.jpg"><img src="<?php echo $metadata ; ?>/ty_Aerial pic 3.34.jpg" title="Broadbalk aerial view" width="100" /><br>
Broadbalk aerial view   </a>
</div>
-->

<?php 	if ($KeyRef) { 		GetKeyRefs ($KeyRef);	}	?>	</div><a name="pixies"></a><div class="col-2">
<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>MetStation.jpg"><img src="<?=$metadata?>/ty_MetStation.jpg" title="Met Station overview" width="100" /><br>
Rothamsted Met Station     </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>RothStevensonScreen.jpg"><img src="<?=$metadata?>/ty_RothStevensonScreen.jpg" title="Stevenson Screen" width="100" /><br>
Rothamsted Stevenson Screen    </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>InsideStevenson.jpg"><img src="<?=$metadata?>/ty_InsideStevenson.jpg" title="wet bulb,dry bulb,tmax,tmin " width="100" /><br>
Stevenson Screen thermometers      </a>
</div>



</div>
<!--           that is an example of pixy
<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>name.gif"><img src="<?php echo $metadata ; ?>/ty-name.gif" title="1865" width="100" /><br>
Legend  </a>
</div>
</div>
-->


