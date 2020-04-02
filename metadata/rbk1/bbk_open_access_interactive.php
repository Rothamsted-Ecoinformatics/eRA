<?php
$KeyRef = "KeyRefBroadbalk" ;

?>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<title>Broadbalk open access data</title>
<H1>Broadbalk Open Access Data</H1>
<p>Selected data from our long term experiments is being made freely available to the scientific community, as prepared summaries of commonly requested data.
This recognises the national and international importance of the data. The aim is that greater use of the data will lead to further understanding and wider benefits.
Rothamsted  relies on the integrity of the user to ensure that Rothamsted Research receives suitable academic acknowledgment as being the originators of these data,
and offer assistance to users to help ensure that where these data are being applied they are represented and interpreted in a rigorous way.
Please contact the <a href="mailto:era@rothamsted.ac.uk" target="_blank">e-RA curators</a> for help with questions about the data or its interpretation.</p>

<p><a rel="license" href="http://creativecommons.org/licenses/by/4.0/" target="out"><img style="width:50px;"  alt="Creative Commons License"
src="includes/cc4.png" align="middle" /></a> This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>.</p>

<p>The following Broadbalk Open Access Datasets are currently available:</p>

<ul>
<li><A href="<?php echo $request; ?>#SEC1">Broadbalk Yields</A> </li>
<li><A href="<?php echo $request; ?>#SEC2">Broadbalk Soil Organic Carbon</A> </li>
<li><A href="<?php echo $request; ?>#SEC3">Broadbalk soil Olsen P content (plant-available P)</A> </li>
</ul>


<A id="SEC1"></a>
<H2>Broadbalk Yields</H2>
<P>

The figure shows the mean long-term winter wheat yields from selected treatments on Broadbalk 1852-2016, excluding spring wheat in 2015. The changes reflect the improved cultivars and better
control of pests, diseases and weeds that have been introduced on Broadbalk, especially since the 1960s.  To control weeds, the  experiment was divided into five sections in the 1920s and one section bare  fallowed each year. The introduction
of herbicides removed the need for  fallowing. Yields of continuous wheat given no fertilizer or manure have remained  at around 1 t ha<sup>-1</sup>.
In 1968 a rotation was  introduced on part of the experiment, so that it is now possible to compare the  yields of wheat grown continuously and as the first wheat after a two year  break. 
Since 1979 summer fungicides have been used, which has allowed us to exploit the greater grain  yield potential of modern cultivars. From 1985, two higher N rates have been tested, 240 and 288 kg N ha <sup>-1</sup>. 
The highest yields are now from the first wheat crop in
rotation, with the  greatest yields from fertilizer alone exceeding those from FYM alone, and the  combination of FYM + 96 kgN ha<sup>-1</sup> (144 kgN ha<sup>-1</sup> since 2005) often exceeding 
both. The largest annual wheat yields on Broadbalk (>13 t ha<sup>-1</sup>) were recorded in 2014, following the change in variety from Hereward to Crusoe. </p>
<p>The greatest yields were not always achieved with the highest N rate. The figure shows the mean greatest first wheat yields achieved from the NPK treatments, receiving up to a maximum of 288 kg N ha<sup>-1</sup> (a maximum of 192 kg N ha<sup>-1</sup> from 1968-1984). </p>

<div id="bbkYieldPlotDiv" style="width: 99%; height: 800px;"><!-- Plotly chart will be drawn inside this DIV --></div>
  <script>
	Plotly.d3.csv("http://local-info.rothamsted.ac.uk/eRA/tera/<?php echo $metadata ; ?>Broadbalk_YieldsJune2017.csv", function(err,allRows){ 
	console.log(allRows);
  var x = [], ynone = [], yfym = [], ypkn1 = [], yfymn = [], yhighest = [];
  var cultivars = ['Old Red',
'Red Rostock',
'Red Club',
'Squareheads Masters',
'Giant Red',
'',
'Browick Red',
'Little Joss',
'',
'Red Standard',
'',
'',
'',
'Stand up',
'',
'',
'',
'Capelle',
'Desprez',
'Flanders',
'Brimstone',
'Brimstone + Squareheads Masters',
'Apollo',
'Hereward',
'Crusoe',
'Milka',
''];
  for (var i=0; i<allRows.length; i++) {
    row = allRows[i];
    x.push(row['Period'] );
	//xcat.push(row['Period2'] );
    ynone.push(row['unmanured']);
	yfym.push(row['fym']);
	ypkn1.push(row['pkn1']);
	yfymn.push(row['fymn']);
	yhighest.push(row['highest']);
  }
  
  var plotDiv = document.getElementById("bbkYieldPlotDiv");
  var traces = [
  {
	x:[1848,
1867,
1890.5,
1902,
1905,
1907.5,
1910,
1911.5,
1914.5,
1922.5,
1929,
1934.5,
1940.5,
1942,
1943,
1944.5,
1956.5,
1968,
1973.5,
1981.5,
1985.5,
1988.5,
1993,
2004,
2013.5,
2015,
2016,
],
	y:[-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2,
-2],
	width:[8,
28,
17,
4,
1,
3,
1,
1,
3,
11,
1,
9,
1,
1,
1,
1,
21,
1,
9,
5,
1,
3,
4,
16,
1,
1,
1],
	text: cultivars,
	textposition: 'auto',
	constraintext: 'none',
	hoverinfo: 'none',
	type: 'bar',
	legend: 'none',
	marker:{
		xanchor:'centre',
		color:['#ffebe6',
'#ffffcc',
'#ffe6f0',
'#fff5e6',
'#f0f0f5',
'#fff5e6',
'#f0f0f5',
'#f0f0f5',
'#fff5e6',
'#f2e6ff',
'#fff5e6',
'#f2e6ff',
'#fff5e6',
'#f0f0f5',
'#fff5e6',
'#f2e6ff',
'#fff5e6',
'#f0f0f5',
'#e6fff2',
'#e6f9ff',
'#ebfaeb',
'#ebfaeb',
'#e6e6ff',
'#f5e6ff',
'#e6f0ff',
'#f2ffe6',
'#e6f0ff']
	}
  },
  {
    x: x,
    y: yfym,	
	name: 'Continuous wheat FYM',
	type: 'scatter',
	mode:'lines+markers',
	line:{ 
		color:'#FF00FF'
	},
	marker: {
		symbol: 'triangle-up',
		size: '10',
		color:'#FF00FF'
	}
  },
  {
	x: x,
    y: ypkn1,	
	name: 'Continuous wheat PK + 144kgN/ha',
	type: 'scatter',
	mode:'lines+markers',
	line:{ 
		color:'navy'
	},
	marker: {
		symbol: 'square',
		size: '10',
		color:'navy'
	}
  },
  {
	x: x,
    y: ynone,	
	name: 'Continuous wheat unfertilized',
	type: 'scatter',
	mode:'lines+markers',
	line:{ 
		color:'deepskyblue'
	},
	marker: {
		symbol: 'circle',
		size: '10',
		color:'deepskyblue'
	}
	},
  {
	x: x,
    y: yfymn,	
	name: '1st wheat FYM 96kgN/ha (+144KgN since 2005)',
	type: 'scatter',
	mode:'lines+markers',
	line:{ 
		color:'green',
		dash:'dash'
	},
	marker: {
		symbol: 'triangle-up',
		size: '10',
		color:'green'
	}
	},
  {
	x: x,
    y: yhighest,	
	name: '1st wheat greatest yield from NPK plots (max 288kgN)',
	type: 'scatter',
	mode:'lines+markers',
	line:{ 
		color:'#FF8C00',
		dash:'dash'
	},
	marker: {
		symbol: 'square',
		size: '10',
		color:'#FF8C00'
	}
  }
  ];
  var layout = {
	yaxis: {title:'Grain yield t ha-1 at 85% dry matter'},
	legend: {
		x:'0.05', 
		y:'0.8'
	},
	annotations: [ 
		{
			x: 1950,
			y: 4,
			xref: 'x',
			yref: 'y',
			text: 'Liming',
			showarrow: true,
			arrowhead: 'triangle-down',
			ax: 0,
			ay: -80,
			hovertext: 'Lime (calcium carbonate,often referred to as chalk) has been applied since the 1950s<br>to maintain soil pH at a level which does not limit yield'
		},
		{
			x: 1931,
			y: 4,
			xref: 'x',
			yref: 'y',
			text: 'Fallowing',
			showarrow: true,
			arrowhead: 'triangle-down',
			ax: 0,
			ay: -80,
			hovertext: 'Between 1926 and 1967 the experiment was divided into five sections which were<br>bare fallowed sequentially one year in five to control weeds.<br>Wheat was grown in the other four years.'
		},
		{
			x: 1957,
			y: 5,
			xref: 'x',
			yref: 'y',
			text: 'Herbicides',
			showarrow: true,
			arrowhead: 'triangle-down',
			ax: 0,
			ay: -100,
			hovertext: 'Herbicides were introduced in 1964; previously weeds<br>were controlled by hand-hoeing or by fallowing and cultivation'
		},
		{
			x: 1968,
			y: 6.5,
			xref: 'x',
			yref: 'y',
			text: 'Modern cultivars',
			showarrow: true,
			arrowhead: 'triangle-down',
			ax: 0,
			ay: -100,
			hovertext: 'Modern short-strawed, high-yielding cultivars since 1968'
		},
		{
			x: 1978,
			y: 9,
			xref: 'x',
			yref: 'y',
			text: 'Fungicides',
			showarrow: true,
			arrowhead: 'triangle-down',
			ax: 0,
			ay: -40,
			hovertext: 'Spring and summer fungicides as necessary since 1978'
		}
	]
  }
  Plotly.newPlot('bbkYieldPlotDiv', traces, layout);
 });
</script>

<P><b><a href="<?php echo $metadata ; ?>Broadbalk Yield Fig June 2017.pdf" target="_blank"><img src="<?php echo $metadata ; ?>Broadbalk-Yield-Fig-June-2017.png" width="727" height="485" alt="Click to download chart Broadbalk Yields" /></a></b>    </p>
<p>Click the chart above for a PDF version. <b>Data, and information on treatments, are available to download as an Excel Spreedsheet:</b>
  <a href="<?php echo $metadata ; ?>Broadbalk_YieldsJune2017.xlsx"> Yield data and treatments</a>. These data are freely available, no password is required,
however users are requested to acknowledge Rothamsted Research as the data source.


<p><strong>Reference</strong>: Rothamsted Research (2006) &quot;Guide to the Classical and other Long-term Experiments, Datasets and Sample Archive&quot;, pp 8-18. Lawes Agriculture Trust Co. Ltd, Harpenden, UK.  See
<a href="http://www.rothamsted.ac.uk/sample-archive/guide-classical-and-other-long-term-experiments-datasets-and-sample-archive" target="_blank">Rothamsted Guide to the Classical Experiments (2006)</a>.</p>
<p>  For further information about the experiment see  <a href="Broadbalk" target="_blank">Broadbalk Winter Wheat Experiment</a>.
<p><a href="<?php echo $request; ?>#top">Back to top</a></p>

<p>  <A id="SEC2"></a></p>
<H2>Broadbalk Soil Organic Carbon </H2>
<P>

The figure shows the long-term changes in soil organic carbon (SOC) (t ha<sup>-1</sup>) content in the topsoil (0-23 cm) in selected treatments of
the Broadbalk experiment, where winter wheat has been grown each year since 1843 (&quot;continuous wheat&quot;). Data has been calculated from measured % SOC (0-23 cm) and standard
soil weights, adjusted for observed decreases in topsoil bulk density of plots given FYM, by including the appropriate amount of subsoil to ensure 
soil weights were comparable over time. SOC has remained almost constant in the unfertilized plot, at the equilibrium level for this farming system 
on this soil type. Inorganic fertilizer (N3PK) has enhanced SOC a little, probably due to increased returns of organic matter in crop roots and above-ground crop residues. 
The treatment given FYM (35 t ha<sup>-1</sup>) since 1843 now contains almost three times as much SOC as the unfertilized plot. Increases due to FYM were greatest 
in the initial years of the experiment. The same trends can be seen in the FYM treatments that started in 1885 and 1968.


<P><b><a href="<?php echo $metadata ; ?>BroadbalkOrgC.pdf" target="_blank"><img src="<?php echo $metadata ; ?>BroadbalkOrgC.png" width="727" height="475" 
alt="Click to download chart Broadbalk SOC" /></a></b>

Click the chart above for a PDF version. <b>Data, information on treatments and methods of sampling and analysis, are available to download as an Excel Spreedsheet:</b>
  <a href="<?php echo $metadata ; ?>BroadbalkSOCdata.xlsx"> SOC data and treatments</a>. For further information about the fertilizer treatments see 
  <a href="<?php echo $metadata ; ?>BroadbalkFertilizerTreatments.pdf" target="_blank">Broadbalk Fertilizer Treatments (pdf).</A> For further information about the soil, including site details and soil weights, see 
<a href="Broadbalk/bbksoils" target="_blank">Broadbalk Soils</a>.
</p>
  <p>These data are freely available, no password is required, however users are requested to acknowledge Rothamsted Research as the data source.</p>
<p><strong>Reference</strong>: Updated from Powlson et al, 2012. With thanks to Andy Macdonald and Paul Poulton for providing the data. </p>
<p>  For further information about the experiment see  <a href="Broadbalk" target="_blank">Broadbalk Winter Wheat Experiment</a>.</p>

<p><a href="<?php echo $request; ?>#top">Back to top</a></p>


<p><A id="SEC3"></a></p>
<H2>Broadbalk soil: Concentration of Olsen P (plant-available P) </H2>
<P>
The figure shows changes in plant-available phosphorus (Olsen P) in the topsoil (0-23cm) of selected plots of the Broadbalk Wheat experiment.
Olsen P, which is commonly used to assess plant-available P, is measured by extracting soil with a solution of 0.5M NaHCO3, buffered at pH 8.5. Until 2000, most of the Broadbalk plots had received superphosphate P (35 kg P ha<sup>-1</sup>) each year since 1844. Since 2001, applications of P have been withheld on some plots. </p> 
<p>The accumulation of available P was greatest on the FYM plot, reflecting the larger total P inputs in FYM (approx 45 kg P ha<sup>-1</sup>) compared to that applied as inorganic fertilizer or where no P was applied. The greater Olsen P concentrations on plot 5 (PKMg) compared to plot 8 (N3PKMg), despite their similar P inputs, were a result of the higher yields and greater P offtakes in the crop on plot 8, due to the applied N. Plot 18 (N4 1/2PKMg) received P at half the standard rate between 1844 and 2001, resulting in relatively low Olsen P concentrations. Since 2001 fertilizer P has been applied at the full rate on this plot, and there has been a corresponding increase in Olsen P. Olsen P concentrations were least on plots receiving no (or very little) P inputs in fertilizer (plot 3, given no fertilizer or manure). Since 2001, fertilizer P has not been applied to plots 5 and 8 (and others not shown), due to the high reserves of plant-available P in the soil. This is reviewed each year. </p>

<P><b><a href="<?php echo $metadata ; ?>Open Access BK Olsen P.pdf" target="_blank"><img src="<?php echo $metadata ; ?>OlsenP.png" width="727" height="475" 
alt="Click to download chart Broadbalk Olsen P" /></a></b>

<p>Click the chart above for a PDF version. <b>Data, information on treatments and methods of sampling and analysis, are available to download as an Excel Spreedsheet:</b>
  <a href="<?php echo $metadata ; ?>BroadbalkOlsenPdata.xlsx" target="_blank"> Olsen P data and treatments</a>. For further information about the fertilizer treatments see 
  <a href="<?php echo $metadata ; ?>BroadbalkFertilizerTreatments.pdf" target="_blank">Broadbalk Fertilizer Treatments (pdf).</A> For further information about the soil, including site details and soil weights, see 
<a href="Broadbalk/bbksoils" target="_blank">Broadbalk Soils </a>.
</p>
  <p>These data are freely available, no password is required, however users are requested to acknowledge Rothamsted Research as the data source. With thanks to Andy Macdonald and Paul Poulton for providing the data. </p>
<p>  For further information about the experiment see  <a href="Broadbalk" target="_blank">Broadbalk Winter Wheat Experiment</a>.</p>

<p><a href="<?php echo $request; ?>#top">Back to top</a></p>


<?php
	if ($KeyRef) {
		GetKeyRefs ($KeyRef);
	}
	?>
	</div> <!-- the corresponding div is in the top index file -->
<A id="pixies"></a>
<div class="col-2">
  <div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>broadbalk2003.jpg"><img src="<?php echo $metadata ; ?>/ty_broadbalk2003.gif" title="May 2003" width="100" /><br>
Broadbalk aerial view 2003     </a>
</div>
<!--
<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>Aerial pic 3.34.jpg"><img src="<?php echo $metadata ; ?>/ty_Aerial pic 3.34.jpg" title="Broadbalk aerial view" width="100" /><br>
Broadbalk aerial view   </a>
</div>
-->


<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>broadbalkplantoday.jpg"><img src="<?php echo $metadata ; ?>/ty_broadbalkplantoday.jpg" title="Current plan" width="100" /><br>
Broadbalk today        </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>Broadbalk20August.jpg"><img src="<?php echo $metadata ; ?>/ty_Broadbalk20August.gif" title="August 1925" width="100" /><br>
Broadbalk 1925        </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>Broadbalkharvest1880.jpg"><img src="<?php echo $metadata ; ?>/ty_Broadbalkharvest1880.jpg" title="Summer 1880" width="100" /><br>
Broadbalk harvest 1880   </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>Tractorplough1935.jpg"><img src="<?php echo $metadata ; ?>/ty_Tractorplough1935.gif" title="1935" width="100" /><br>
Broadbalk 1935 tractor plough   </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>1935horseharvest.jpg"><img src="<?php echo $metadata ; ?>/ty_1935horseharvest.gif" title="1935" width="100" /><br>
Broadbalk 1935 horse harvest by reaper-binder </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>1935tractoharvest.jpg"><img src="<?php echo $metadata ; ?>/ty_1935tractoharvest.gif" title="1935" width="100" /><br>
Broadbalk 1935 tractor harvest</a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>Broadbalk1954Section5.jpg"><img src="<?php echo $metadata ; ?>/ty_Broadbalk1954Section5.gif" title="1954" width="100" /><br>
Chalk application to Section V Broadbalk 1954  </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>bbk49.jpg"><img src="<?php echo $metadata ; ?>/ty_bbk49.gif" title="1849" width="100" /><br>
Broadbalk drainage plan 1849  </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>posterMacDonald.jpg"><img src="<?php echo $metadata ; ?>/ty_posterMacDonald.jpg" title="1954" width="100" /><br>
General Poster </a>
</div>


</div>
<!--           that is an example of pixy
<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>name.gif"><img src="<?php echo $metadata ; ?>/ty-name.gif" title="1865" width="100" /><br>
Legend  </a>
</div>
</div>
-->


