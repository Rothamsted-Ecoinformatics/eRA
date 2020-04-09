<?php
?>
<div class="row mx-3">
<h2>Rothamsted Weather data available in ROTHMET</h2>
	
<p>
	Daily meteorological data recorded at Rothamsted, Harpenden,
	Hertfordshire available from e-RA. Hourly data for Rothamsted from 2004
	is available from the <a href="mailto:era@rothamsted.ac.uk"> e-RA
		Curators.</a>
</p>
<div class="table-responsive-sm">
	<table class="table  table-responsive-sm table-sm  table-hove table-bordered">
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
				<td rowspan="2"><p>Daily temperature is measured over the 24 hour
						period 0900 to 0900GMT; this is used for the previous day's
						maximum (TMAX) and the current day's minimum temperature (TMIN).
						All other temperatures are recorded at 0900GMT. Until 1970 all
						temperatures were measured in &deg;F; since 1972 they have been
						recorded in &deg;C. All temperatures in e-RA are displayed as &deg;C.</p>
					<p>Air temperatures: Maximum (TMAX) and minimum (TMIN) air
						temperatures were first recorded in 1878. TMAX was recorded using
						a mercury column thermometer and TMIN using a spirit-in-glass with
						indicator bar minimum thermometer.</p></td>
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
				<td rowspan="2"><p>In 1915 dry (DRYB) and wet (WETB) bulb mercury
						column thermometers were introduced to record air temperatures and
						calculate variables such as relative humidity, vapour pressure and
						dew point.</p>
					<p>On 15th January 2014 WETB was discontinued and replaced by a
						Relative Humidity Sensor (Campbell Scientific, MP100A) to measure
						relative humidity (RELH)</p></td>
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
					<td><p>On 15th January 2014 <B>WETB </B>was discontinued and replaced by a Relative Humidity Sensor (Campbell Scientific, MP100A) to measure relative humidity <B>(RELH) </B>and from which vapour pressure <B>(VAP)</B> and dew point <B>(DEWP)</B> are now calculated after the method of <a href="https://doi.org/10.1175/1520-0450(1981)020<1527:NEFCVP>2.0.CO;2">Buck (1981)</a>. </p>
			</tr>
			<tr>
				<td>GRSMIN</td>
				<td>&deg;C</td>

				<td>Grass minimum temperature, 1909-current date</td>
				<td>
					<p>Recorded using a spirit-in-glass with indicator bar minimum
						thermometer.</p>
				</td>
			</tr>
			<tr>
				<td colspan="5"><h3>Soil temperature under grass</h3></td>
			</tr>
			<tr>
				<td>G10T</td>
				<td>&deg;C</td>

				<td>Soil temperature under grass at 10cm, 1931-current date</td>
				<td rowspan="3">
					<p>
					
					<p>
						<B>Soil temperatures</B> are recorded at 0900GMT. They were first
						recorded in the 1930's using specially adapted thermometers. These
						were set at depths of 4, 8, 12, 24 and 48 inches (10, 20, 30, 61,
						and 122 cm) under grass cover <B>(G10T, G20T, G30T, E30T, E50T and
							E100T) </B>and 4, 8 and 12 inches (10, 20 and 30 cm) under bare
						soil <B> (S10T, S20T and S30T)</B>. <B>G10T, G20T, G30T, S10T and
							S20T </B>were in direct contact with the soil; G30T was
						discontinued in 1997.
					
					<P>Since 2004, all temperatures (air and soil) have been recorded
						by thermistors (electronic temperature probes, Campbell
						Scientific, type 107). For measuring soil temperatures, these are
						buried in the soil at the appropriate depth.</p>


				</td>
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
				<td rowspan="3"><p>
						The thermometers used to measure <B> E30T, E50T, E100T and S30T</B>
						were encased in a glass sheath in a metal tube, so that they could
						easily be removed to read the temperature. The bulb was set in
						paraffin wax to minimize rapid temperature fluctuations when the
						thermometer was removed from the soil.
					</P></td>
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
				<td rowspan="3"><p>
						The thermometers used to measure E30T, E50T, E100T and <B>S30T</B>
						were encased in a glass sheath in a metal tube, so that they could
						easily be removed to read the temperature. The bulb was set in
						paraffin wax to minimize rapid temperature fluctuations when the
						thermometer was removed from the soil.
					</P></td>
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
				<td><p>
						The variable <B> RAIN_L</B> measures rain in a gauge of 1/1000th
						of an acre (4.047 sq metres), built in 1852/53. The gauge was
						constructed of timber with a lead funnel. Rain was collected daily
						in carboys and weighed to estimate the amount of rain. In 1873 a
						new gauge was installed and the carboys replaced by galvanized
						iron calibrated cylinders to measure rainfall. The old gauge was
						replaced by an identical new one in 1992. For details of the early
						history of the 1/1000th acre rain gauge, see Lawes,<a
							href="https://babel.hathitrust.org/cgi/pt?id=osu.32435010735041&view=1up&seq=7
				">Gilbert & Warington, 1881 (J Royal Agric Soc <b> 17</b>: 241-279)
						</a>
					</p>
					<p>From 2004 onwards the calibrated cylinders were replaced by an
						electronic tipping bucket rain gauge (Campbell Scientific, ARG100)
						calibrated to tip with every 0.0025mm of rain. In July 2010 the
						lead lining was stolen and it was replaced by a new stainless
						steel funnel of grade 316 and dimensions 2213mm x 1829mm in
						February 2011. No RAIN_L data was collected for this period.</p>

					<p>Since 2004, when the met station was automated, RAINL may have
						been underestimating rainfall when rain is intense. RAINL should
						only be used in conjunction with the drainage data, which has the
						same surface area (DR20, DR40, DR60). For general daily rainfall
						data please use RAIN. It is recommended that if you use RAINL,
						RAIN should be used as a check.</p>

					<p>"Missing values" There are many instances before 2004 when no
						data is shown for RAIN and RAINL. This is because a 'trace' of
						rain, snow, mist, dew or fog was manually recorded. A 'trace' is
						less than 0.05mm. For most purposes a missing value can be assumed
						to be zero.</p></td>
			</tr>
			<tr>
				<td>RDUR</td>
				<td>hr</td>

				<td>Rainfall duration, 1931-current date</td>
				<td>
					<p>Recorded at 0900 GMT each day. Originally it was measured by a
						Negretti and Zamra natural siphon rain recorder. Rain was
						collected in a float chamber and recorded on a daily chart on a
						clock drum, which recorded 10mm of rain before siphoning began and
						the recording restarted at the bottom of the chart. In 1978 this
						was replaced with a Cassella recorder with a diameter of 20.3cm.
						Since 2004 it has been measured by an electronic tipping bucket
						rain gauge.</p>
				</td>
			</tr>
			<tr>
				<td colspan="5"><h3>Drainage data</h3></td>
			</tr>
			<tr>
				<td>DR20</td>
				<td>inches</td>

				<td>Drainage from drain gauge at 20 inch (51cm) depth, 1870-current
					date</td>
				<td rowspan="3"><p>Three drain gauges (20, 40 and 60 inches) were
						constructed at Rothamsted in 1870. They consist of undisturbed
						blocks of soil 20, 40 and 60 inches (51,102 and 152 cm,
						respectively) deep and are equal in area to the rain gauge of
						1/1000th of an acre.</p>

					<p>The gauges were constructed by digging under and around the
						block of soil, placing perforated plates underneath at the
						required depth and bricking up the sides. The soil around the
						gauges remained undisturbed throughout the construction process.
						Drain water was originally measured by weighing the carboys of
						collected water (as for 1/1000th of an acre rainfall above), but
						these too were replaced by calibrated cylinders. In 2004 those
						were replaced by the electronic tipping bucket rain gauge.
						Percolation is the total over the previous 24 hours, recorded at
						0900GMT. All three drain gauges remain as originally built. The
						soil has never been deep cultivated or cropped and the top is kept
						clear by hand weeding.</p></td>
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
				<td><p>Recorded in 1892 using a Campbell-Stokes sunshine recorder.
						The sun's rays are focused onto a card (treated to prevent it from
						catching fire) and the brown scorch mark on the card is then
						measured. The cards are of varying lengths applicable to the time
						of year (winter, equinox, and summer). Since 2004 sunshine has
						been calculated using the Campbell-Stokes equation from solar
						radiation measured using a Kipp and Zonen thermopile pyranometer.
					</p>
			
			</tr>
			<tr>
				<td>SUNMAX</td>
				<td>&deg;C</td>

				<td>Maximum temperature in the sun</td>
				<td><p>Recorded between 1915 and 1935 using a black bulb in vacuo</p>
			
			</tr>
			<tr>
				<td colspan="5"><h3>Radiation</h3></td>
			</tr>
			<tr>
				<td>RAD</td>
				<td>J/cm2</td>

				<td>Total radiation, 1931-current date - Over 24-hour periods
					00.00-24.00 hrs GMT</td>
				<td><p>
						Measurements have been made since 1921, but the earliest recorded
						data in e-RA are from 1931. There were several gaps between 1921
						and 1923, probably due to equipment malfunction, so these early
						data have little value. From 1921-1930, radiation was calculated
						in calories/cm<sup>2</sup> but from January 1931, radiation was
						expressed in Joules/cm<sup>2</sup>, and these are the data that
						have been included in e-RA. Penman (1974, see key references
						below) stated that 'Apart from periods for instrument repairs,
						solar radiation has been recorded daily at Rothamsted since
						October 1921. The first instrument was a Callendar recorder,
						purchased by the Plant Physiology Department of Imperial College
						in 1916, and run at Rothamsted for the Department from 1921. In
						1943 Professor Blackman asked Rothamsted to take over the
						instrument and be responsible for all future repairs and
						replacements. Right up to 1954 there was great uncertainty about
						the sensitivity, and as the original supplier had ceased to make
						them the replacement then sought had to be found elsewhere: Over
						the first 30 years the readings were probably accurate enough for
						the use that could be made of them at the time … (but are not good
						enough for present needs) … In 1955 a Moll-type solarimeter (Kipp)
						was installed with a paper chart recording potentiometer. As
						before, daily totals were obtained by planimeter integration - a
						tedious and awkward task - until in 1958 an automatic integrator
						was added with a digital counter set to register directly in
						cal/cm<sup>2</sup> ' (Rothamsted Weather, Rothamsted Report for
						1973, Part 2, 172 - 201).
					</p>
					<p>Radiation figures between 1947 and 1954 were noted by Monteith
						to be 20% higher than would be expected (and the same probably
						applies to earlier data). Thus, data from before 1955 should be
						treated with some caution. A Kipp integrator and recorder was in
						use from 13th November 1975. A (new) Kipp and Zonen integrator was
						installed in 1989. In 2004 this was replaced by a Kipp and Zonen
						thermopile pyranometer.</p>

					<p>
						Data from Rothamsted are recorded as J/cm<sup>2</sup>. To convert
						to MJ/m<sup>2</sup> divide by 100. To convert MJ/m<sup>2</sup> to
						W/m<sup>2</sup> multiply by 11.6.
					</p></td>
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
				<td rowspan="4"><p>
						Wind direction<B> (WDIR) </B>has been measured since 1853. Wind
						direction is shown in e-RA as an angle, going clockwise from
						North. 360 = North, 90 = East, 180 = South, 270 = West. The
						reading 0 (or 000) indicates that there is no wind, ie the
						windspeed is 0 m/s. A WDIR reading of 0 with a windspeed greater
						than 0 implies that the WDIR is 360 degrees (North).
					</p>
					<p>
						Wind speed was originally estimated using the Beaufort scale. It
						is shown in e-RA as wind force<B> (WFORCE) </B>from 1915 to 1959.
						From 1960 onwards it is shown as wind speed <B>(WINDSP)</B>
						converted from knots to m/s (1 knot = 0.514 m/s).
					</p>

					<p>The Beaufort scale can be adjusted to wind speed using the
						following equation:</p>

					<p>
						V = 1.624 x SQRT (B<sup>3</sup>)
					</p>

					<p>Where V = wind speed in knots, B = Beaufort scale (1 knot =
						0.514 m/s) (Met Office 1982).</p>

					<p>
						Wind direction <B> (WDIR) </B> and wind speed <B>(WINDSP) </B>
						were then measured by wind vane and a cup anemeometer linked to a
						Munro roll chart recorder (model IM175) installed in 1978. From
						2004 an electronic wind vane (Vector Instruments, W200P) and cup
						anemometer (Vector Instruments, A100LK/2) were installed at a
						height of 12.8m above ground level. The standard height for
						surface wind measurements over open and level terrain is 10m.
						However, no correction is needed for wind speeds measured between
						8 and 13m (Met Office, 1982). We therefore assume a mid-point
						height of 10m. From 2004 wind direction and speed are calculated
						as an average over 10 minutes from 8.50 to 9am
					</p>

					<p>
						Measurements of wind run <B>(WINDRUN)</B> are available from 1946
						onwards, first measured using a cup anemometer with a calibrated
						meter installed at a height of 2m. From 2004 to January 2014 wind
						run has been measured using an electronic cup anemometer (see
						above). The cup anemometer was at a height of 12.8m. This was then
						corrected to 2m by multiplying by 0.78:
					</p>

					<p>Vh/V10 = 0.233+0.656*log10 (h+4.75), where Vh = speed in knots
						at height h, V10 = speed at 10m and h = height in m (Met Office
						1982).</p>
					<p>Since February 1st 2014 a second cup anemometer (Vector
						Instruments A100LK) installed at a height of 2m has been used to
						measure wind run, so no adjustment for height is now required.</p>
				</td>
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
				<td>
					
					<p>
						Relative Humidity <b>RELH</b> was originally derived from wet and
						dry bulb temperatures. A Relative Humidity Sensor (MP100A, made by
						Rotronics, supplied by Campbell Scientific) replaced the wet bulb
						sensor at Woburn and Brooms Barn in 2009 and at Rothamsted in late
						2013. The MP100A was replaced by an EE181 E+E RH probe, which is
						made by E+E Elektronic Corporation, supplied by Campbell
						Scientific, on August 7th 2018.
					</p>
				</td>
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

</div>
