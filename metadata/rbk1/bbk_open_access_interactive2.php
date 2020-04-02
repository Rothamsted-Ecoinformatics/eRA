<?php
$KeyRef = "KeyRefBroadbalk" ;

?>
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
