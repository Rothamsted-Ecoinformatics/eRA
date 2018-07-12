
<h1>Important met data corrections and updates</h1>
<ul>
<li><A href="<?php echo $request; ?>#SEC1">Rain</A> </li>
<li><A href="<?php echo $request; ?>#SEC2">Wind</A> </li>
<li><A href="<?php echo $request; ?>#SEC3">Grass minimum temperature</A> </li>
<li><A href="<?php echo $request; ?>#SEC4">Radiation</A> </li>
<li><A href="<?php echo $request; ?>#SEC5">Sunhours</A> </li>
<li><A href="<?php echo $request; ?>#SEC6">Wet bulb, Relative Humidity, Vapour Pressure, Dew Point</A> </li>
<li><A href="<?php echo $request; ?>#SEC7">Woburn 2011 data correction</A> </li>
</ul>


<p>Back to main <A HREF="<?php echo $webbase; ?>Met" >Met Data page</A> </p>


<A NAME="SEC1"></a>
<h2>Rain</h2>
<p><b> RAIN (ROTHMET and WOBMET): Change of rain gauge and the effect on rainfall capture.</b> Rainfall up until 2004 was measured manually using a 5" copper cylindrical rain gauge. In 2004 the Met Stations at Rothamsted and Woburn were automated and the 5" rain gauges replaced by an ARG100 tipping bucket rain gauge of diameter 10". The manufacturers of the ARG100 state that the "ARG100 rain gauge typically captures over 5% more rainfall than most traditionally-shaped cylindrical gaugesdue to its unique aerodynamic shape and reduced evaporation-loss properties". This has been found to be the case at Rothamsted. When we have compared the ARG100 with the 5" within the turf-wall enclosure we get a difference of approx. 10% over an 8 year period (2004 to 2011). This value however does change on a year to year basis. Please contact the e-RA curators for more information and a correction factor. This applies to the variable RAIN in the Rothmet and Wobmet datasets. </p>

<p><b>RAIN (WOBMET) correction:</b> Errors found in WOBMET variable RAIN 01/06/2009 - 08/10/2009, due to problems with the datalogger. This was corrected on 17/11/2014 and replaced with data from the Met Office, for 01/07/2009 - 08/10/2009. Data for June 2009 was set to null, as there is no data from the Met Office for this period. </p>

<p><b>RAINL (ROTHMET):</b> Since 2004, when the met station was automated, the large rain gauge, with surface area of 1/1000th of an acre (4.04 m2) may have been underestimating rainfall when rain is intense. RAINL should only be used in conjunction with the drainage data, which has the same surface area (DR20, DR40, DR60). For general daily rainfall data please use RAIN. It is recommended that if you use RAINL, RAIN should be used as a check.</p>
<p>Thieves stole the lead lining of RAINL at the beginning of July 2010. It has been replaced and in operation since 15/02/2011. This means there is no RAINL data between 01/07/2010 and 14/2/2011.</p>

<p><b>RAINL correction:</b> Between 10/08/2011 and 06/08/2012 the wrong correction factor had been applied for tipping buckets in datalogger program. The corrected data was loaded on 17/12/2012. All data is now correct. </p>

<p><b>"Missing values" in RAIN and RAINL data.</b> For both Rothmet and Wobmet, there are many instances before 2004 when no data is shown for RAIN (Rothmet and Wobmet) and RAINL (Rothmet only). This is because a 'trace' of rain, snow, mist, dew or fog was manually recorded. A 'trace' is less than 0.05mm. For most purposes a missing value can be assumed to be zero. However, if you would like further details of traces of rain recorded between 1853 and 2003, please contact the e-RA curators. 

</p>
<A NAME="SEC2"></a>
<h2>Wind</h2>
<p><b>WINDSP (WOBMET):</b> Wind speed between 01/01/1998 and 01/06/2009 has been amended. 
Wind speed is measured in knots but converted to m/s within e-RA and displayed as m/s. However, between 01/01/1998 
to 01/06/2009 this conversion was not made, so although the data was displayed as m/s it was still in knots. This has been corrected (the conversion is knots x 0.514). The data for height, from 01/07/1999 to 01/06/2009, has also been corrected as it was measured at 2m but by convention is adjusted to 10m. Data was corrected on 01/03/2010. All data is now correct.</P>
<p>Values for wind speed are based on a single measurement made at 9am. If an average daily value 
for wind speed is required, this can be derived from total daily wind run.
<b>Wind speed (m/s) = wind run (km/day)/86.4</b></p>   

<A NAME="SEC3"></a>
<h2>Grass minimum temperature</h2>
<p><b>GRSMIN (ROTHMET):</b> The grass minimum temperature, at Rothamsted was adjusted for drift, from 01/01/2014 to 05/08/2014. The data was corrected on 21/08/2014. All data is now correct. Please contact the e-RA curators for further details. </p> 

<A NAME="SEC4"></a>
<h2>Radiation</h2>
<p><b>RAD (ROTHMET): </b>Radiation data for <b>1949-1954</b> at Rothamsted should 
be treated with caution, as it appears to be around 25% higher than in other years. 
This is being investigated; please contact the e-RA curators for more details.  
</p>
<p><b>RAD (WOBMET): </b>Correction to Woburn radiation data for 1/12/1998 - 28/6/1999. This was incorrectly shown as 0.0, and was corrected to missing data (NULL) on 14/3/2016 in dataset WOBMET. 
</p>

<A NAME="SEC5"></a>
<h2>Sun hours</h2>
<p><b>SUN (BROOMET): </b>Sun hour data for <b>Jan 1st - June 28th, 2013-2016</b> at Brooms Barn. 
Sun hours is calculated in the datalogger, based on the Campbell-Stokes equation. A small error has been found in the calculation between Jan 1st and June 28th, for 2013-2016 inclusive. The calculation is correct from June 29th – Dec 31st each year. This calculation has now been corrected, so that data from 1st Jan 2017 onwards will be correct. However, we have not changed the sun hour data for 2013-2016. Please refer to the e-RA curators for more information.   
</p>

<A NAME="SEC6"></a>
<h2>WETB, RELH, VAP, DEWP</h2>
<p><b>Updates to Rothmet for WETB, RELH, VAP and DEWP</b>. Wet bulb (<b>WETB</b>) stopped being measured at Rothamsted on 14/1/2014. Instead, <i>measured</i> Relative Humidity (<B>RELH</b>) is now available from 15/01/2014. Back-dated calculations of RELH have been added to Rothmet, back to 1971, so we now have a complete RELH dataset from 1925. RELH from 1971 – 14/1/2014 has been <i>calculated</i> from <b>WETB</b> and <b>DRYB</b> temperatures. 
We have also taken the opportunity to update the Vapour Pressure (<b>VAP</b>) and Dew Point (<b>DEWP</b>) variables. Both had been calculated from <b>DRYB</b> and <b>WETB</b> up to 2009, we have now completed the dataset so that calculations are available to the current day. Up to 14/1/2014 the calculations used measured DRYB and WETB, since 15/1/2014 the calculations use measured DRYB and RELH. Data for <b>DEWP</b> from 1915 to the current date and  data for <b>VAP</b> from 1946 to the current date is now available. Please contact the e-RA curators for more details. </p>

<A NAME="SEC7"></a>
<h2>Woburn 2011 data correction</h2>
<p><b>Updates to Woburn met data, 2011</b>. There was a small timing error in the met data recorded at Woburn 10/08/2011 - 15/12/2011. The readings were mistakenly taken at 10am instead of 9am. This has now been corrected and the data reloaded on 8/6/2017. This will not affect the overall totals for the period, but may affect individual daily values, especially rainfall and sun hours. Contact the e-RA curators for more details. </p>



 









