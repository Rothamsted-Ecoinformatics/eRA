<?php
$KeyRef = "KeyRef2met" ;

?>
<title>Meteorological open access data</title>
<H1>Open Access Met Data </H1>
<p>Selected data from the Rothamsted long term experiments is being made freely available as prepared summaries of commonly requested data. This recognises the national and international importance of the data. The aim is that greater use of the data will lead to further understanding and wider benefits. Rothamsted  relies on the integrity of the user to ensure that Rothamsted Research receives credit for the data, and manuscripts using the data should be sent to the e-RA curators before they are submitted for publication so we can ensure that the data are accurately represented.</p>
<p>We also hope that the Open Access Data will be widely used by <b>schools, colleges and universities</b>, as a teaching resource, and would welcome any feedback on this. </p>
<p>The following Meteorological Open Access Dataset is currently available:</p>

<ul>
<li><A href="<?php echo $request; ?>#SEC1">Annual mean Rothamsted temperature</A> </li>
</ul></p>
<p>
<H2>Other sources of Open Access Met Data:</H2></p>
<p>The <b>UK Environmental Change Network</B><a href="http://www.rothamsted.ac.uk/aen/ecn/"> (ECN)</a> provides many meteorological data variables measured at Rothamsted which can easily be downloaded.
<a href="http://www.rothamsted.ac.uk/aen/ecn/YEARLYSUMMARY.htm">Monthly weather summaries</a> are provided since 2001. These show:

<ul>
<li>Sunshine (hours per month)</li>
<li>Mean maximum air temperature (C) </li>
<li>Mean minimum air temperature (C) </li>
<li>Ground frosts (number per month) </li>
<li>Mean soil temperature at 10cm under bare soil (C) </li>
<li>Mean soil temperature at 30cm under grass (C) </li>
<li>Total monthly rainfall (mm) </li>
<li>Rainfall duration (days per month) </li>
</ul></p>
<p>
The departure from the 30 year mean (1981-2010) is also shown for sunshine, maximum and minimum temperatures and rainfall. </p>
<p>
There are also <a href= "http://www.rothamsted.ac.uk/aen/ecn/index.htm#Climate">daily, weekly and annual </a>charts on many variables including temperature, rain, sun and wind over the last 365 days. These are based on weather variables collected on an hourly basis. </p>

<p> The ECN also has a section on <a href="http://www.ecn.ac.uk/what-we-do/education">data for schools</a>. 
The ECN's long-term environmental data represent a unique teaching resource. Use the time series viewer to plot data and explore environmental change, or request raw data, providing students with actual environmental datasets for use in science, geography and maths.</p>


<A NAME="SEC1"></a>
<H2>Annual mean Rothamsted temperature</H2>
<P>
The figure shows the annual mean air temperature at Rothamsted every year from 1878 - 2013. Also shown is the mean over each five year period, 1878-1882, 1883-1887, etc. The red line shows the mean temperature, 1878-1987. The mean air temperature at Rothamsted is now 10 ºC, 1 ºC higher than the 1878-1987 average. The 10 warmest years on record occurred in the last 17 years. Mean soil temperatures have also risen. 

<P><b><a href="<?php echo $metadata ; ?>Mean annual temp fig.pdf" target="_blank"><img src="<?php echo $metadata ; ?>long-termtemp.png" width="727" height="485" alt="Click to download chart Annual mean Rothamsted temperature" /></a></b>

Click the chart above for a PDF version. <b>Data are available to download as an Excel Spreedsheet:</b>
  <a href="<?php echo $metadata ; ?>Mean annual temp data.xlsx"> Annual mean Rothamsted temperature</a>. </p>

<p>
These data are freely available, no password is required, however users are requested to acknowledge Rothamsted Research as the data source.</p>
<p><strong>Reference</strong>: Updated from Rothamsted Research (2006) &quot;Guide to the Classical and other Long-term Experiments, Datasets and Sample Archive&quot;, pp 44-45. Lawes Agriculture Trust Co. Ltd, Harpenden, UK.  See 
<a href="http://www.rothamsted.ac.uk/sample-archive/guide-classical-and-other-long-term-experiments-datasets-and-sample-archive" target="_blank">Rothamsted Guide to the Classical Experiments (2006)</a>.</p>
<p>  For further information about the measurement of temperature at Rothamsted see  
<a href="http://www.era.rothamsted.ac.uk/href="<?php echo $request; ?>"> Temperature</a>.</p>
<p>With thanks to Tony Scott for providing the images and the data.</p>
 
  <a name="pixies"></a></p>

<!--
<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>Aerial pic 3.34.jpg"><img src="<?php echo $metadata ; ?>/ty_Aerial pic 3.34.jpg" title="Broadbalk aerial view" width="100" /><br>
Broadbalk aerial view   </a>
</div>
-->

<?php 	if ($KeyRef) { 		GetKeyRefs ($KeyRef);	}	?>	</div>

<a name="pixies"></a><div class="col-2">
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


