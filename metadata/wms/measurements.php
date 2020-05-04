<?php
/* @name measurements.php / WMS
 * This describes the weather variables available in WOBMET and how they are measured
 * created: Nathalie - 05/05/2020
 * 
 */
?>
<div class="row mx-3">
	<h2 class="d-block">Weather data available in WOBMET</h2>
	</div>
	<div class="row mx-3">
	<p class="clearfix">Daily meteorological data recorded at Woburn.</p>
	<div class="table-responsive-sm">
		<table
			class="table  table-responsive-sm table-sm  table-hover table-bordered">
			<thead>
				<th scope="col">Variable</th>
				<th scope="col">Units</th>
				<th scope="col">Description</th>
				<th scope="col">How is it measured?</th>
			</thead>
			<tbody>
				<tr>
					<td colspan="4"><h3>Air temperature</h3></td>
				</tr>
				<tr>
					<td>TMAX</td>
					<td>degrees C</td>
					<td>Maximum temperature, 1928-current date</td>
					<td>Maximum (TMAX) and minimum (TMIN) temperatures were first
						recorded in 1928 using mercury column thermometers. Dry (DRYB) and
						wet (WETB) bulb mercury column thermometers were used to record
						air temperatures and calculate variables such as relative
						humidity, vapour pressure and dew point. On 1st December 2009 WETB
						was discontinued and replaced by a Relative Humidity Sensor
						(Campbell Scientific, MP100A) to measure relative humidity (RELH)
						and from which vapour pressure (VAP) and dew point (DEWP) are now
						calculated after the method of Lowe (1977).</td>
				</tr>
				<tr>
					<td>TMIN</td>
					<td>degrees C</td>

					<td>Minimum temperature, 1928-current date</td>
					<td></td>
				</tr>
				<tr>
					<td>WETB</td>
					<td>degrees C</td>

					<td>Wet bulb temperature, 1928-2009</td>
					<td></td>
				</tr>
				<tr>
					<td>DRYB</td>
					<td>degrees C</td>

					<td>Dry bulb temperature, 1928-current date</td>
					<td></td>
				</tr>
				<tr>
					<td>DEWP</td>
					<td>degrees C</td>

					<td>Dew point (derived from DRYB and WETB), 1968-current date</td>
					<td></td>
				</tr>
				<tr>
					<td>GRSMIN</td>
					<td>degrees C</td>

					<td>Grass minimum temperature, 1929-current date</td>
					<td></td>
				</tr>
				<tr name="title_row">
					<td colspan="4"><h3>Soil temperature under grass</h3></td>
				</tr>
				<tr>
					<td>G30T</td>
					<td>degrees C</td>

					<td>Soil temperature at 30cm under grass, 1971-87</td>
					<td></td>
				</tr>
				<tr>
					<td>E30T</td>
					<td>degrees C</td>

					<td>Soil temperature at 30cm under grass, 1928-70; 1988-current
						date</td>
					<td></td>
				</tr>
				<tr>
					<td>E50T</td>
					<td>degrees C</td>

					<td>Soil temperature at 50cm under grass, 1971-current date</td>
					<td></td>
				</tr>
				<tr>
					<td>E60T</td>
					<td>degrees C</td>

					<td>Soil temperature at 60cm under grass, 1968-70</td>
					<td></td>
				</tr>
				<tr>
					<td>E100T</td>
					<td>degrees C</td>

					<td>Soil temperature at 100cm under grass, 1928-67; 1971-current
						date</td>
					<td></td>
				</tr>
				<tr>
					<td>E122T</td>
					<td>degrees C</td>

					<td>Soil Temperature at 122cm under grass, 1968-70</td>
					<td></td>
				</tr>
				<tr name="title_row">
					<td colspan="4"><h3>Soil temperature under bare soil</h3></td>
				</tr>
				<tr>
					<td>S10T</td>
					<td>degrees C</td>

					<td>Bare soil temperature at 10cm depth, 1968-current date</td>
					<td></td>
				</tr>
				<tr>
					<td>S20T</td>
					<td>degrees C</td>

					<td>Bare soil temperature at 20cm depth, 1968-current depth</td>
					<td></td>
				</tr>
				<tr name="title_row">
					<td colspan="4"><h3>Rainfall</h3></td>
				</tr>
				<tr>
					<td>RAIN</td>
					<td>mm</td>

					<td>Rainfall, 1928-current date</td>
					<td>Woburn: Rainfall (RAIN) was originally measured manually using
						a 5" (12.7cm) copper cylindrical rain gauge. Since 1999, when the
						met station was automated, rainfall has been measured by an
						electronic tipping bucket rain gauge of 25.4cm diameter,
						calibrated to tip at 0.2mm (Campbell Scientific, ARG100).</td>
				</tr>
				<tr>
					<td>RDUR</td>
					<td>hr</td>

					<td>Rainfall duration, 1988-99</td>
					<td>It is defined as the number of hours during which rain fell
						over the previous 24 hours, recorded at 0900 GMT each day.</td>
				</tr>
				<tr name="title_row">
					<td colspan="4"><h3>Sunshine</h3></td>
					<td></td>
				</tr>
				<tr>
					<td>SUN</td>
					<td>hr</td>

					<td>Hours sunshine, 1928-current date</td>
					<td></td>
				</tr>
				<tr name="title_row">
					<td colspan="4"><h3>Radiation</h3></td>
				</tr>
				<tr>
					<td>RAD</td>
					<td>MJ/m2</td>

					<td>Total radiation, 1981-current date</td>
					<td></td>
				</tr>
				<tr name="title_row">
					<td colspan="4"><h3>Cloud</h3></td>
				</tr>
				<tr>
					<td>CLOUD</td>
					<td></td>

					<td>Cloud cover (in Oktas with 9=Fog) at 0900 GMT, 1928-99</td>
					<td></td>
				</tr>
				<tr name="title_row">
					<td colspan="4"><h3>Wind</h3></td>
				</tr>
				<tr>
					<td>WDIR</td>
					<td></td>

					<td>Wind direction at 0900 GMT (0-360 degrees), 1928-current date</td>
					<td></td>
				</tr>
				<tr>
					<td>WFORCE</td>
					<td></td>

					<td>Wind force in Beaufort scale (0-12) at 0900 GMT, 1928-67</td>
					<td></td>
				</tr>
				<tr>
					<td>WINDSP</td>
					<td>m/s</td>

					<td>Wind speed at 0900 GMT (at 10m), 1968-current date</td>
					<td></td>
				</tr>
				<tr>
					<td>WINDRUN</td>
					<td>km</td>

					<td>Run of wind 0900 to 0900 GMT (at 2m), 1968-current date</td>
					<td></td>
				</tr>
				<tr name="title_row">
					<td colspan="4"><h3>Diary</h3></td>
				</tr>
				<tr>
					<td>DYHAIL</td>
					<td></td>

					<td>Code indicating type of hail, 1968-87; 1997-99</td>
					<td></td>
				</tr>
				<tr>
					<td>DYSNOW</td>
					<td></td>

					<td>Code indicating day with snow or sleet, 1968-87; 1997-99</td>
					<td></td>
				</tr>
				<tr>
					<td>DYTHUN</td>
					<td></td>

					<td>Code indicating day with thunder, 1968-87; 1997-99</td>
					<td></td>
				</tr>
				<tr>
					<td>FOG</td>
					<td></td>

					<td>Code indicating fog at 0900 GMT, 1968-78</td>
					<td></td>
				</tr>
				<tr>
					<td>SNOWL</td>
					<td></td>

					<td>Code indicating whether snow lying, 1968-78</td>
					<td></td>
				</tr>
				<tr>
					<td>SNOWD</td>
					<td>mm</td>

					<td>Total depth of snow, 1968-99</td>
					<td></td>
				</tr>
				<tr>
					<td>FSNOWD</td>
					<td>mm</td>

					<td>Depth of freshly-fallen snow at 0900 GMT, 1968-78</td>
					<td></td>
				</tr>
				<tr name="title_row">
					<td colspan="4"><h3>Other selected fields</h3></td>
				</tr>
				<tr>
					<td>RELH</td>
					<td>%</td>

					<td>Relative Humidity, 1928-70; 2009-current date</td>
					<td></td>
				</tr>
				<tr>
					<td>BAR</td>
					<td>mb</td>

					<td>Barometric pressure, 1928-70; 1988-99</td>
					<td></td>
				</tr>
				<tr>
					<td>VAP</td>
					<td>mb</td>

					<td>Vapour pressure (derived from DRYB and WETB), 1928-78;
						1988-current date</td>
					<td></td>
				</tr>
				<tr>
					<td>VIS</td>
					<td></td>

					<td>Visibility at 0900 GMT (code), 1928-99</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		</tbody>

	</div>

</div>
