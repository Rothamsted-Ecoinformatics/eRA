<?php
$KeyRef = "KeyRefClover" ;

?>


<h1>Garden Clover</h1>
<p>
</p>

<UL>
<LI><A href="<?php echo $request; ?>#SEC1">Background</A></LI>
<LI><A href="<?php echo $request; ?>#SEC2">Plot descriptions and treatments</A></LI>
<LI><A href="<?php echo $request; ?>#SEC3">Data Available</A></LI>
<LI class="nicelist"><A href="<?php echo $request; ?>#papers">Key References</A> related to the Garden Clover</LI>
</UL>

<A NAME="SEC1"></a>
<H2>Background</H2>
<p></p>

<p>For more details, refer to the <A href="<?php echo $request; ?>#papers">Key References</A> listed below.</p>






<a name="SEC2"></a>
<h2>Plot Descriptions and treatments</h2>


<p> </p>
<?php 	if ($KeyRef) { 		GetKeyRefs ($KeyRef);	}	?>	</div><a name="pixies"></a><div class="col-2">
	<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>wheatandfallow.jpg"><img src="<?=$metadata?>/wheatandfallowsmall.jpg" title="Alternate Wheat & Fallow" 
width="100" /><br>Aerial view Alternate Wheat & Fallow Expt    </a>
</div>
<!-- 
<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>wheatandfallow.jpg"><img src="<?=$metadata?>/wheatandfallowsmall.jpg" title="Alternate Wheat & Fallow"
width="100" /></a><br>Aerial view Alternate Wheat & Fallow Expt
</div>
-->

</div>




