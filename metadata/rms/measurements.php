<?php
?>
<h1>Rothamsted Weather data available in 'Rothmet'</h1>

<p>
	Daily meteorological data recorded at Rothamsted, Harpenden,
	Hertfordshire available from e-RA. Hourly data for Rothamsted from 2004
	is available from the <a href="mailto:era@rothamsted.ac.uk"> e-RA
		Curators.</a>
</p>
<div class="table-responsive-sm">
	<table class="table  table-responsive-sm table-sm  table-hove">
		<thead>

			<th scope="col">Variable</th>
			<th scope="col">Units</th>
			<th scope="col">Description</th>
			<th scope="col">How is it measured?
		
		</thead>
		<tbody>
			<tr>
				<td colspan="5"><h3>Air temperature</h3></td>
			</tr>
			<tr>
				<td>TMAX</td>
				<td>&deg;C</td>
				<td>Maximum temperature, 1878-current date</td>
			</tr>
			<tr>
				<td>TMIN</td>
				<td>&deg;C</td>

				<td>Minimum temperature, 1878-current date</td>
			</tr>
			<tr>
				<td>WETB</td>
				<td>&deg;C</td>

				<td>Wet bulb temperature, 1915-January 2014</td>
			</tr>
			<tr>
				<td>DRYB</td>
				<td>&deg;C</td>

				<td>Dry bulb temperature, 1915-current date</td>
			</tr>
			<tr>
				<td>DEWP</td>
				<td>&deg;C</td>

				<td>Dew point 1915-current date (derived from DRYB &amp; WETB until
					2013, derived from DRYB &amp; RELH since 2014)</td>
			</tr>
			<tr>
				<td>GRSMIN</td>
				<td>&deg;C</td>

				<td>Grass minimum temperature, 1909-current date</td>
			</tr>
			<tr>
				<td colspan="5"><h3>Soil temperature under grass</h3></td>
			</tr>
			<tr>
				<td>G10T</td>
				<td>&deg;C</td>

				<td>Soil temperature under grass at 10cm, 1931-current date</td>
			</tr>
			<tr>
				<td>G20T</td>
				<td>&deg;C</td>

				<td>Soil temperature under grass at 20cm, 1931-current date</td>
			</tr>
			<tr>
				<td>G30T</td>
				<td>&deg;C</td>

				<td>Soil temperature under grass at 30cm, 1931-97</td>
			</tr>
			<tr>
				<td>E30T</td>
				<td>&deg;C</td>

				<td>Soil temperature under grass at 30cm, 1915-57; 1997-current date</td>
			</tr>
			<tr>
				<td>E50T</td>
				<td>&deg;C</td>

				<td>Soil temperature under grass at 50cm, 1948-current date</td>
			</tr>
			<tr>
				<td>E100T</td>
				<td>&deg;C</td>

				<td>Soil temperature under grass at 100cm, 1945-current date</td>
			</tr>
			<tr>
				<td colspan="5"><h3>Soil temperature under bare soil</h3></td>
			</tr>
			<tr>
				<td>S10T</td>
				<td>&deg;C</td>

				<td>Bare soil temperature at 10cm, 1931-current date</td>
			</tr>
			<tr>
				<td>S20T</td>
				<td>&deg;C</td>

				<td>Bare soil temperature at 20cm, 1931-current date</td>
			</tr>
			<tr>
				<td>S30T</td>
				<td>&deg;C</td>

				<td>Bare soil temperature at 30cm, 1931-current date</td>
			</tr>
			<tr>
				<td colspan="5"><h3>Rainfall</h3></td>
			</tr>
			<tr>
				<td>RAIN</td>
				<td>mm</td>

				<td>Rainfall from original 5 inch gauge, 1853-1879; 1914-current
					date</td>
				<td><p>
						The variable <B>RAIN </B> was originally recorded in a 5 inch
						(12.7cm) rain gauge built in a garden near the laboratory in 1852.
						The water collected was measured in a graduated cylinder until
						about 1880. The gauge was then moved to the meteorological
						enclosure. In 1948, a 5 inch (12.7cm) copper rain gauge of
						Meteorological Office standard was installed within a 0.3 m high,
						1.5 m radius turf wall retained by brick to reduce wind eddies.
						Since 2004, when the met station was automated, <B>RAIN </B> has
						been measured by an electronic tipping bucket rain gauge of 25.4cm
						diameter, calibrated to tip at 0.2mm, also within the turf wall.
						The old 5 inch manual copper rain gauge is still used to measure
						precipitation fallen as snow when the tipping bucket rain gauge is
						blocked with snow or ice.
					</p>
					<p>
						The manufacturers of the ARG100 state that the "ARG100 rain gauge
						typically captures over 5% more rainfall than most
						traditionally-shaped cylindrical gauges due to its unique
						aerodynamic shape and reduced evaporation-loss properties". This
						has found to be the case at Rothamsed. A review of the differences
						in rainfall capture between the ARG100 and the manual 5 inch gauge
						at Rothamsted was conducted. Using a double mass curve analysis,
						annual data from 1990-2017, and looking at each added year from
						2004 (when the ARG100 was introduced), the overall correction
						factor is 1.1 or 10%. This means that the ARG100 captures 10% more
						rainfall than the manual 5 inch gauge. This correction is only
						applicable to annual and monthly totals, and to the variable <b>RAIN</b>
						at Rothamsted (ie <b>ROTHMET</b> only). It is not applicable to <b>RAINL</b>
						or <b>RAIN5</b>. To convert 5 inch data to ARG100 data, multiply
						by 1.1. To convert ARG100 data to 5 inch, divide by 1.1. We
						recommend that when you download data that spans both gauges, you
						multiply the 5 inch data by 1.1. Please contact the e-RA curators
						for more information.
					</p></td>
			</tr>
			<tr>
				<td>RAIN5</td>
				<td>mm</td>

				<td>Rainfall from second 5 inch gauge, 1873-1987</td>
				<td><p>
						The variable <b>RAIN5 </b> was originally recorded in another 5
						inch (12.7cm) cooper rain gauge, established in 1873. Data was not
						recorded in e-RA after 1987. RAIN and RAINL are two separate
						gauges, hence the values do not exactly agree.
					</p>

					<p>Data is available for RAIN from 05/02/1853 - present, except
						between 1880-1914. It is recommended that for a complete run of
						data from a standard rain gauge that a composite of RAIN and RAIN5
						is used, based on RAIN, with data from RAIN5 being used from
						1880-1914 only.</p></td>
			</tr>
			<tr>
				<td>RAINL</td>
				<td>mm</td>

				<td>Rainfall in the 1/1000th acre rain gauge, 1853-current date</td>
				<td><p>The variable <B> RAIN_L</B> measures rain in a gauge of 1/1000th of an acre (4.047 sq metres), built in 1852/53. The gauge was constructed of timber with a lead funnel. Rain was collected daily  in carboys and weighed to estimate the amount of rain. In 1873 a new gauge was installed and the carboys replaced by galvanized iron  calibrated cylinders to measure rainfall. The old gauge was replaced by an identical new one in 1992. For details of the early history of the 1/1000th acre rain gauge, see Lawes,<a href="https://babel.hathitrust.org/cgi/pt?id=osu.32435010735041&view=1up&seq=7
				">Gilbert & Warrington, 1881 (J Royal Agric Soc <b> 17</b>: 241-279)</a> </p></td>
			</tr>
			<tr>
				<td>RDUR</td>
				<td>hr</td>

				<td>Rainfall duration, 1931-current date</td>
			</tr>
			<tr>
				<td colspan="5"><h3>Drainage data</h3></td>
			</tr>
			<tr>
				<td>DR20</td>
				<td>inches</td>

				<td>Drainage from drain gauge at 20 inch (51cm) depth, 1870-current
					date</td>
			</tr>
			<tr>
				<td>DR40</td>
				<td>inches</td>

				<td>Drainage from drain gauge at 40 inch (102cm) depth, 1870-current
					date</td>
			</tr>
			<tr>
				<td>DR60</td>
				<td>inches</td>

				<td>Drainage from drain gauge at 60 inch (152cm) depth, 1870-current
					date</td>
			</tr>
			<tr>
				<td colspan="5"><h3>Sunshine</h3></td>
			</tr>
			<tr>
				<td>SUN</td>
				<td>hr</td>

				<td>Hours of sunshine, 1890-current date</td>
			</tr>
			<tr>
				<td colspan="5"><h3>Radiation</h3></td>
			</tr>
			<tr>
				<td>RAD</td>
				<td>J/cm2</td>

				<td>Total radiation, 1931-current date</td>
			</tr>
			<tr>
				<td colspan="5">Cloud</td>
			</tr>
			<tr>
				<td>CLOUD</td>
				<td></td>

				<td>Cloud cover (in Oktas with 9=Fog) at 0900 GMT, 1915-2007</td>
			</tr>
			<tr>
				<td colspan="5"><h3>Wind</h3></td>
			</tr>
			<tr>
				<td>WDIR</td>
				<td>degrees</td>

				<td>Wind direction at 0900 GMT (0-360 degrees), 1853-current date</td>
			</tr>
			<tr>
				<td>WFORCE</td>
				<td></td>

				<td>Wind force in Beaufort scale (0-12) at 0900 GMT, 1915-59</td>
			</tr>
			<tr>
				<td>WINDSP</td>
				<td>m/s</td>

				<td>Wind speed at 0900 GMT (at 10m), 1960-current date</td>
			</tr>
			<tr>
				<td>WINDRUN</td>
				<td>km</td>

				<td>Run of Wind 0900 to 0900 GMT (at 2m, see notes), 1946-current
					date</td>
			</tr>
			<tr>
				<td colspan="5"><h3>Diary</h3></td>
			</tr>
			<tr>
				<td>DYHAIL</td>
				<td></td>

				<td>Code indicating type of hail, 1960-88; 1998-2007</td>
			</tr>
			<tr>
				<td>DYSNOW</td>
				<td></td>

				<td>Code indicating day with snow or sleet, 1960-88; 1998-2007</td>
			</tr>
			<tr>
				<td>DYTHUN</td>
				<td></td>

				<td>Code indicating day with thunder, 1960-88; 1998-2007</td>
			</tr>
			<tr>
				<td>FOG</td>
				<td></td>

				<td>Code indicating day with fog at 0900 GMT, 1960-78</td>
			</tr>
			<tr>
				<td>SNOWL</td>
				<td></td>

				<td>Code indicating whether snow lying, 1960-78</td>
			</tr>
			<tr>
				<td>SNOWD</td>
				<td>mm</td>

				<td>Total depth of snow, 1960-2007</td>
			</tr>
			<tr>
				<td>FSNOWD</td>
				<td>mm</td>

				<td>Depth of freshly-fallen snow at 0900 GMT, 1960-78</td>
			</tr>
			<tr>
				<td colspan="5"><h3>Other selected fields</h3></td>
			</tr>
			<tr>
				<td>RELH</td>
				<td>%</td>

				<td>Relative humidity at 0900 GMT 1925-current date (derived from
					DRYB &amp; WETB until 2013)</td>
			</tr>
			<tr>
				<td>BAR</td>
				<td>mb</td>

				<td>Barometric pressure, 1915-59; 1977-2003</td>
			</tr>
			<tr>
				<td>BAR_MSL</td>
				<td>mb</td>

				<td>Air pressure at Mean Sea Level, 1950-77</td>
			</tr>
			<tr>
				<td>VAP</td>
				<td>mb</td>

				<td>Vapour pressure 1946-current date (derived from DRYB &amp; WETB
					until 2013, derived from DRYB &amp; RELH since 2014)</td>
			</tr>
			<tr>
				<td>VIS</td>
				<td></td>

				<td>Visibility at 0900 GMT (code), 1923-2007</td>
			</tr>
		</tbody>
	</table>
</div>