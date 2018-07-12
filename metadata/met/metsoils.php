<?php
$KeyRef = "KeyRefMetsoil" ;

?>

<H1>Met station site data</H1>
<p>Here, details are given of the site and soil.</p>
<UL>
  <LI><A href="<?php echo $request; ?>#SEC1">Rothamsted site details</A> </LI>
  <LI><A href="<?php echo $request; ?>#SEC2">Rothamsted soil details</A> </LI>
  <LI><A href="<?php echo $request; ?>#SEC3">Further information and references</A></LI>
</UL>
<A NAME="SEC1"></a>
<H2>Rothamsted site details</H2>
<p> </p>
<ul>
<LI><b>Location:</b> Rothamsted Research, Harpenden, Herts, AL5 2JQ, UK</LI>
<LI><b>Latitude:</b> 51 degrees 48 mins 36 secs North</LI>
<LI><b>Longitude:</b> 0 degrees 22 mins 30 secs West </LI>
<LI><b>GB Grid Reference:</b> TL121134</LI>
</ul>

<A NAME="SEC2"></a>
<h2>Rothamsted Soil details</h2>
<p> </p>
<ul>
<li> FAO Classification: Chromic Luvisol </li>
<li> U.S. Soil Taxonomy: Aquic  (or Typic) Paleudalf</li>
<li> Soil Survey of England & Wales Group: Paleo-argillic brown earth (Avery, 1980) </li>
<li> Soil Survey of England & Wales Series:  Predominately Batcombe Series (Avery & Catt, 1995 – see pop-out soil map at top right of this page).
</ul>
  <p>
<b>Soil texture class: </b> Flinty silty clay loam (U.S. silt loam) over clay-with flints. Moderately well drained, the clay-with-flints subsoil is slowly permeable and hence periodically saturated with water in most years (Avery & Catt, 1995). The soils contain a large number of flints and are slightly calcareous. Below about 2m depth the soil becomes chalk. </p>


<A NAME="SEC3"></a>
<h2>Further information and acknowledgements</h2>
<p>For more details, contact the <a href= "<?=$Era_Curator[Email]?>"> e-RA Curators. </a> 

<?php 	if ($KeyRef) { 		GetKeyRefs ($KeyRef);	}	?>	</div><a name="pixies"></a><div class="col-2">

  <div class="thumbnail">
 <a href="pix.php?area=home&image=<?php echo $metadata ; ?>soilsmap-orig.png"><img src="<?php echo $metadata ; ?>/soilsmap-ty.png" alt="Source: Watts et al 2006" width="100" title="Watts et. al. 2006" /><br>
    Clay content contour map </a> 
</div>

 <div class="thumbnail">
 <a href="pix.php?area=home&image=<?php echo $metadata ; ?>1623_map.jpg"><img src="<?php echo $metadata ; ?>/ty_1623_map.jpg" alt="Rothamsted map 1623" width="100" title="1623 map" /><br>
    Rothamsted map 1623 </a> 
</div>
  
    <div class="thumbnail"><a href="home/studies/PoultonSOMposter.pdf"><img src="home/studies/ty_Johnston1.jpg" alt="Johnston et al" width="100" title="Hoosfield soil organic carbon" /><br>
      Johnston <i>et al</i>, soil organic matter </a> </div>
      
    <div class="thumbnail"> 
    <a href="home/studies/Gregorybbk.pdf"><img src="home/studies/ty_Gregorybbk3.jpg" alt="Gregory et al poster" width="100" title="Soil carbon with depth" /><br />
      Gregory <i>et al</i>, subsoil organic matter </a> </div>
      
    <div class="thumbnail"> <a href="home/studies/Wattsbbk.pdf"><img src="home/studies/ty_Watts1.jpg" alt="Watts et al" width="100" title="Broadbalk plough draught" /><br />
      Watts <i>et al</i>, soil plough draught </a></div>
  
 <div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>750-Ploughing_Broadbalk_2013.jpg"><img src="<?php echo $metadata ; ?>/ty-Ploughing_Broadbalk_2013.jpg" title="Ploughing Broadbalk" width="100" /><br>
Ploughed soil Broadbalk        </a>
</div>


 
</div>
