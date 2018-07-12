<?php
$KeyRef = "KeyRef2met" ;

?>
<title>Meteorological open access data</title>
<H1>Open Access Met Data </H1>

<p>The following Meteorological Open Access Dataset is available for schools, colleges and any other interested parties:</p>

<ul>
<li><A href="<?php echo $request; ?>#SEC1">Annual mean Rothamsted temperature</A> </li>
</ul></p>

<A NAME="SEC1"></a>
<H2>Annual mean Rothamsted temperature</H2>
<P>
The figure shows the annual mean air temperature at Rothamsted every year from 1878 - 2013. Also shown is the mean over each five year period, 1878-1882, 1883-1887, etc. The red line shows the mean temperature, 1878-1987. The mean air temperature at Rothamsted is now 10 ºC, 1 ºC higher than the 1878-1987 average. The 10 warmest years on record occurred in the last 17 years. Mean soil temperatures have also risen. 

<P><b><a href="<?php echo $metadata ; ?>Mean annual temp fig.pdf" target="_blank"><img src="<?php echo $metadata ; ?>long-termtemp.png" width="727" height="485" alt="Click to download chart Annual mean Rothamsted temperature" /></a></b>

Click the chart above for a PDF version. <b>Data are available to download as an Excel Spreedsheet:</b>
  <a href="<?php echo $metadata ; ?>Mean annual temp data.xlsx"> Annual mean Rothamsted temperature</a>. </p>

<p>
These data are freely available, no password is required, however users are requested to acknowledge Rothamsted Research as the data source.</p>
<p><strong>Reference</strong>: Scott, T (2014) &quot;The U.K. Environmental Change Network Rothamsted. Physical and Atmospheric Measurements&quot;, p8. Lawes Agriculture Trust Co. Ltd, Harpenden, UK.  See 
<a href="http://www.rothamsted.ac.uk/sites/default/files/groups/Environmental_Change_Network_at_Rothamsted/downloads/ECNRothamstedFirst20yr.pdf" target="_blank">ECN Rothamsted (2014)</a>.</p>
<p>  For further information about the measurement of temperature at Rothamsted see  
<a href="http://www.era.rothamsted.ac.uk/Met/instrumentdescription" Temperature</a>.</p>

<p> 
The ECN also has a section on <a href="http://www.ecn.ac.uk/what-we-do/education">data for schools</a>. 
The ECN's long-term environmental data represent a unique teaching resource. Use the time series viewer to plot data and explore environmental change, or request raw data, providing students with actual environmental datasets for use in science, geography and maths.</p>

<p>With thanks to Tony Scott for providing the images and the data.</p>

 


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


