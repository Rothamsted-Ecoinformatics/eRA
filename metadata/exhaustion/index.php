<?php
/*
 * In this page, we have a nice use of the function to get the keyrefs (or any keyword related references):
 * use: 

$KeyRef = "KeyRefWobMG" ;

GetKeyRefs2 ($KeyRef);

At the end of the page, please use unset ($KeyRef) to avoid listing another set of references at the end of the page.
 */
$KeyRef = "KeyRefOthers" ;

?>

<h1>Exhaustion Land Experiment</h1>

<p>The <b>Exhaustion Land</b> experiment has had several distinct phases since it started in 1856. Today, it is used to study the residual effects of fertilizers and manures applied from 1856-1901 and additional phosphate applied since 1986, on the yield of cereals. A test of potassium was introduced in 2007. Treatments have been managed so that the soils now have a wide range of plant available P and K. </p>

<div align="center"><img src="<?=$metadata?>Hoosfield_625.jpg" title="Exhaustion Land, Hoosfield" width="625" height="176" alt="Exhaustion Land, Hoosfield" />


<ul>
<li><A href="<?php echo $request; ?>#SEC1">Background:</A> how the plots have been managed and modified over the years</li>
<li><A HREF="Exhaustion/exhsoils" target="_blank">Soils:</A> information about the site, soil type and texture </li>
<li><A href="<?php echo $request; ?>#SEC2">Data Available</A> </li>
</ul>


<A NAME="SEC1"></a>
<H2>Background</H2>

<p><b>Previous cropping: </b> From 1852-1855, this site was the 'Lois Weedon' plots, an experiment that tested different methods of husbandry, with no fertilizer or manure. Winter wheat was grown. See Johnston & Poulton (1977) for more details. <p>

<p><b>Phase I: </B>Four plots were established on the Exhaustion Land site in 1856, this was known as 'Smith's Wheat' experiment. Winter wheat was grown each year. In 1876  the four plots were divided and two more plots were added, from a strip of unmanured and unfertilized wheat on the north side of the experiment. This was known as the 'Potato experiment', and potatoes were grown every year from 1876-1901. From 1856 to 1901, the plots received annual applications of N, P, K or FYM. There were 10 plots from 1876 to 1901, each 0.067 ha (1/6th of an acre). 
See <a href="<?php echo $metadata ; ?>Fertilizer treatments & cropping Phase I&II.pdf" target="_blank">Fertilizer treatments & cropping Phase I&II</A> and <a href="<?php echo $metadata ; ?>Layout & total nutrients applied Phase I.pdf" target="_blank">Layout and nutrients applied</a> for full details. </p>

<p><b>Phase II:</b> Between 1902 and 1939 no fertilizers or manures were applied and, with a few exceptions, cereals (usually spring barley) were grown. The site was fallow in 1920. Yields were recorded in some of the earlier years, and residual effects of the previous treatments were very small in the absence of fresh nitrogen fertilizer. 
Yields were not recorded from 1923-1939, except in 1935.  </p>

<p><b>Phase III: </b> Between 1940 and 1985, spring barley was grown and N fertilizer applied to all plots every year. Initially a single rate was applied, 63-88 kg N/ha. No crop was grown in 1967 or 1975. In 1976 the 10 main plots were each divided to test four rates of N (0, 48, 96 and 144 kg N/ha), which were rotated each year. Grain and straw yields were recorded from 1949 onwards.  
Nitrogen not only increased yields, but allowed the crop to take advantage of P and K residues remaining in the soil from Phase I of the experiment. 
The effects of these were initially large but declined as amounts of phosphate in the soil declined. 

<?php



/* Figure from Guide, currently not showing well. 
 * <div align="center"><img src="<?=$metadata?>Exhaustion Land fig 6 of guide.jpg" title="Exhaustion Land, mean yields of barley grain Phase III" width="325" height="176" 
 * alt="Exhaustion Land, Hoosfield" />
*/
?>

<p>See <a href="<?php echo $metadata ; ?>Fertilizer treatments Phase III.pdf" target="_blank"> Plan and fertilizer treatments Phase III</A> for more details. </p>

<p><b>Phase IV:</b> In 1986, after a long period when the P residues in particular were being “exhausted”, it was decided to see how quickly this decline in soil fertility could be reversed. Annual, cumulative dressings of 0 v 44 v 87 v 131 kg P ha<sup>-1</sup>, as triple superphosphate, were tested on five of the original plots 
(each divided into four sub-plots). Spring barley was grown. This was known as the "P Test".
See <a href="<?php echo $metadata ; ?>Fertilizer treatments 1986-92.pdf" target="_blank">fertilizer treatments 1986-92 </A> and <a href="<?php echo $metadata ; ?>Exhaustion land P and K inputs 1986 onwards.pdf" target="_blank">Annual P & K inputs 1986 onwards </A>for more details.
Basal N and K were applied such that these nutrients did not limit yield. Responses to fresh P were rapid. Applications of P stopped after seven years. No P was applied between 1993 
and 1999, but since 2000, maintenance dressings, equivalent to offtakes by the crop, have been applied 
(not to the no-fresh-P sub-plots). See <a href="<?php echo $metadata ; ?>Fertilizer treatments 2000-06.pdf" target="_blank">fertilizer treatments 2000-06 </A>for more details. 
Wheat has been grown since 1992. Typically, it showed the same response to available-P as spring barley i.e. above a critical level, <i>on this soil</i>, of about 12 mg kg<sup>-1</sup> 
there is no further increase in yield. 
 </p>

<p><b>Phase V:</b> On the other half of the experiment, the effects of K residues (in the presence of basal P and N) on yield are investigated (the "K Test" plots). Since 2007, 
annual cummulative applications of 0, 62.2 and 124.5 kg K ha<sup>-1</sup> as muriate of potash have been applied (K0, K1 and K2). Basal N and P has been applied so that yields are not limited. From autumn 2015 P was withheld from plots 013, 033, 053, 073 and 093 ("P Test" plots) in addition to those which no longer receive P (plots 014, 034, 054, 074 and 094) because the plant available P was increasing on these plots. 
See <a href="<?php echo $metadata ; ?>Fertilizer treatments Phase V 2007-.pdf" target="_blank">Exhaustion Land today </A>for more details. </p>
<p>Soils are sampled regularly to follow changes in plant-available P and K. </p>

<h2>Plot Descriptions and treatments</h2>
<UL>
<LI class="nicelist"><a href="<?php echo $metadata ; ?>Overview.pdf" target="_blank">Exhaustion land overview (pdf)</A> </li>


<LI class="nicelist"><a href="<?php echo $metadata ; ?>Layout & total nutrients applied Phase I.pdf" target="_blank">Exhaustion Land total nutrients applied Phase I (pdf)</A> </li>

<LI class="nicelist"><a href="<?php echo $metadata ; ?>Fertilizer treatments & cropping Phase I&II.pdf" target="_blank">Exhaustion Land plan & fertilizer treatments, Phases I & II (pdf)</A>    </li>

<LI class="nicelist"><a href="<?php echo $metadata ; ?>Fertilizer treatments Phase III.pdf" target="_blank">Exhaustion Land plan & fertilizer treatments Phase III (pdf)</A>    </li>
<LI class="nicelist"><a href="<?php echo $metadata ; ?>Fertilizer treatments 1986-92.pdf" target="_blank">Exhaustion Land plan & fertilizer treatments Phase IV 1986-92 (pdf)</A>    </li>
<LI class="nicelist"><a href="<?php echo $metadata ; ?>Fertilizer treatments 1993-99.pdf" target="_blank">Exhaustion Land plan & fertilizer treatments Phase IV 1993-99 (pdf)</A>    </li>
<LI class="nicelist"><a href="<?php echo $metadata ; ?>Fertilizer treatments 2000-06.pdf" target="_blank">Exhaustion Land plan & fertilizer treatments Phase IV 2000-06 (pdf)</A>    </li>
<LI class="nicelist"><a href="<?php echo $metadata ; ?>Fertilizer treatments Phase V 2007-.pdf" target="_blank">Exhaustion Land today (pdf)</A>    </li>
<LI class="nicelist"><a href="<?php echo $metadata ; ?>Exhaustion land P and K inputs 1986 onwards.pdf" target="_blank">Annual P & K inputs 1986 onwards (pdf)</A>    </li>

</li></ul> </p>
<p>Taken from the <i>Rothamsted Guide to the Classical Experiments</i> 1970, 1992 and 2006; Johnston & Poulton, 1977, Poulton et al, 2013 and Johnston et al, 2016.  </p>

<A NAME="SEC2"></a>
<H2>Data available</H2>
<p>For more information refer to the <b>Key References</b> listed at the end of this section. Data from this experiment is not currently available from e-RA. 
For more details of what data is available and how to access it, please contact the <a href="<?=$Era_Curator[Email]?>"target="_blank"> e-RA Curators</a>. 


<p><b>Key References:</b></p>

<?php
$KeyRef = "KeyRefEX" ;

GetKeyRefs2 ($KeyRef);
?>





</div>
</div><a name="pixies"></a><div class="col-2">
	

 <div class="thumbnail">
		<a href="pix.php?area=home&image=<?=$metadata?>Classical_Experiments_aerial_layout_750.jpg"><img src="<?=$metadata?>/ty_Classical_Experiments_aerial_layout_100.jpg" title="Classical Experiments aerial layout" width="100" /><br>
Classical Experiments aerial layout     </a>

	</div>

 
        
    <div class="thumbnail">
		<a href="pix.php?area=home&image=<?=$metadata?>Hoosfield_LTEs_750.jpg"><img src="<?=$metadata?>/ty_Hoosfield_LTEs_100.jpg" title="Hoosfield Plan5" width="100" /><br>
Hoosfield Plan      </a>

	</div>

    
    <div class="thumbnail">
		<a href="pix.php?area=home&image=<?=$metadata?>ty_Hoosfield_750.jpg"><img src="<?=$metadata?>/ty_Hoosfield_100.jpg" title="Hoosfield with acid strip, exhaustion land, wheat & fallow, continuous maize (top to bottom) 2015" width="100" /><br>
Hoosfield 2015      </a>

	</div> 
   
 

	</div>

<?php 
// This ensures that there are no more keyrefs listed after that: Otherwise, the script will continue and list the last set of references. 

unset($KeyRef);
?>
<!--           that is an example of pixy
<div class="thumbnail">
<a href="pix.php?area=home&image=<?php echo $metadata ; ?>name.gif"><img src="<?php echo $metadata ; ?>/ty-name.gif" title="1865" width="100" /><br>
Legend  </a>
</div>
</div>
-->

