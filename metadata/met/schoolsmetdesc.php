<?php


?>
<H1>Description of Rothamsted weather data (met data)</H1>

<UL>
  <LI><A href="<?php echo $request; ?>#SEC1">Site details</A> </LI>
  <LI><A href="<?php echo $request; ?>#SEC2">Rain</A> </LI>
  <LI><A href="<?php echo $request; ?>#SEC3">Sun </A> </LI>
  <LI><A href="<?php echo $request; ?>#SEC4">Temperature </A> </LI>
  <LI><A href="<?php echo $request; ?>#SEC5">Wind</A></LI>
</UL>
<A NAME="SEC1"></a>
<H2>Site details</H2>
<UL>
<LI>Location: Rothamsted Research, Harpenden, Herts, AL5 2JQ, UK</LI>
<LI>Latitude: 51 degrees 48 mins 36 secs North</LI>
<LI>Longitude: 0 degrees 22 mins 30 secs West </LI>
<LI>Altitude: 128 metres above sea level </LI>
<LI>GB Grid Reference: TL121134</LI>
</ul>
<A NAME="SEC2"></a>
<h2>Rain</h2>
<p>
<b>RAIN:</b> This is total rain over 24 hours, measured in mm. It includes rain, snow, mist and fog (together called precipitation).  Rain is collected in a rain gauge, 
and the water measured in a graduated cylinder. Since 2004, rain has been measured by an electronic tipping bucket, calibrated to tip at 0.2mm. This means that 
since 2004, the minimum amount of rain that can be recorded is 0.2mm. The rain gauge is surrounded by a 1.5m radius turf wall, to reduce wind eddies. (photo)

</p>
<A NAME="SEC3"></a>
<H2>Sun</H2>
<p>
<b>SUNHOURS:</b>  The total amount of time when the sun shines during each day. This is measured in hours,  for example, 10.5 hours means 10 hours and 30 minutes.   
Hours of sunshine were originally measured by a Campbell-Stokes sunshine recorder. The sun's rays are focused onto a card (treated to prevent it from catching fire) 
and the brown scorch mark on the card is then measured. The longer the scorch mark, the longer the hours of sun. The cards were of varying lengths applicable to 
the time of year (winter, equinox, and summer). Since 2004 sunshine has been calculated using the Campbell-Stokes equation from solar radiation measured using a 
thermopile pyranometer. (photo)
</p>
<A NAME="SEC4"></a>
<h2>Temperature </h2>
<p>
<b>TMAX and TMIN:</b> The maximum and minimum air temperatures during the day, measured in °C. TMIN should be less than or equal to TMAX. Temperature used to 
be measured with a maximum and minimum mercury thermometer. Since 2004, electronic temperature probes have been used, which are linked to the automatic 
data logger. (photo)

</p>

<A NAME="SEC5"></a>
<h2>Wind</h2>
<p>
<b>WDIR:</b> Wind direction, measured at 09.00 GMT each morning. This is shown as an angle, going clockwise from the North. 360 = North, 90 = East, 180 = South, 
270 = West. The reading is in degrees. 0 degrees means that there is no wind. Wind direction was originally measured by wind vane linked to a Munro roll chart 
recorder. From 2004 an electronic wind vane linked to the automatic data logger has been used. (photo)
<p><b>WINDRUN:</b> The total amount of wind in a day, measured as a distance (km). Wind run is measured by a cup anemometer, which is blown around by the wind, 
and the distance it turns around is recorded, in km. This is on a pole at 2m above the ground. Since 2004, an electronic cup anemometer has been used, which is 
linked to the automatic data logger.   (photo)</p>
</p>
<p>For more details, contact the <a href= "<?=$Era_Curator[Email]?>"> e-RA Curators. </a> 
<p>With thanks to Tony Scott for help with compiling the information and text.</p>


