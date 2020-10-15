<?php
$KeyRef = "KeyRefBKYield" ;

?>


<H1>Broadbalk Yields</H1>
<p>
Wheat grain and straw yields have been recorded every year  since the experiment began, with the first harvest in 1844 (the crop was sown in 
autumn 1843). Dried grain and straw samples have also been kept for chemical  analysis since 1844; these are preserved in the Rothamsted 
Sample Archive. <br />
Yield data is held in four datasets, which reflect the  changes to the experimental layout and harvesting techniques:</p>
<p><strong>BKYIELD</strong> Broadbalk wheat grain and straw yields  1844-1925<br />
  <strong>BKYIELD_F</strong> Broadbalk  wheat grain and straw yields 1926-1953<br />
  <strong>BKYIELD_F85</strong> Broadbalk wheat grain and straw yields 1954-1967<br />
<strong>BKYIELD_R85</strong> Broadbalk  wheat grain and straw yields 1968-c<em>urrent year</em></p>
<p><strong>Harvesting:</strong><br />
From 1844 to 1901 the wheat crop was cut by hand by scythes,  from 1902 to 1956 a self-binder was used, originally horse drawn, and then 
powered  by a tractor. Hand cutting with scythes was often necessary if the ground was  very wet or the crop was badly lodged (flattened). 
After cutting the crop was bound  into sheaves which were &lsquo;stooked&rsquo; and left on the plot for about two weeks then  
&lsquo;carted<em>&rsquo;</em> into barns where they were  threshed over the winter. Cutting and carting may have been spread over several  
days. Thus the earlier datasets BBKYIELD and BBKYIELD_F include the dates of  both cutting and carting the crop. From 1957 the plots have been 
harvested by a  small plot combine harvester; only the central strip of each plot is taken for  yield and samples. Before 1957 the plots were 
usually cut in early August,  since 1957 combining has been in August or early September. Sowing and harvest dates are available 
from the <a href="<?=$eRA['curator'][Email]?>">e-RA Curators</a>.</p>
<p><strong>Yields from Section 8 (no herbicides):</strong><br />
Section 8 has never received herbicides, and many weed species are present. Many weed seeds and other weed debris are included in the 'grain' yield at harvest. The 'straw' 
will also include weed material. The FYM plots and plots given the higher N rates generally have more weed contamination than the other plots. A sub-sample of grain is cleaned 
(weed seeds and debris removed) after harvest, and an estimate of the cleaned grain yield made. Data currently in e-RA is of the uncleaned grain. It is not possible to correct 
the straw yield for weed contamination. For further details, and the cleaned grain data, please contact the <a href= "<?=$eRA['curator'][Email]?>"> e-RA Curators </a> 
</p>
<p><strong>Units:</strong><br />
Since 1954 dry matter (DM) content of the grain and straw  has been measured at harvest, and all yields have been converted to 85% DM  
(datasets BKYIELD_F85 and BKYIELD_R85). Before 1954 DM content was not measured  and the yields are expressed at the DM content at which 
they were harvested  (around 85% DM). </p>
<p><strong>Plot area:</strong><br />
When the experiment was established in 1843 most of the  plots were very large. Most comprised an &lsquo;a&rsquo; and &lsquo;b&rsquo; half (each 3.77m wide) and were 
320m long (the length of the field). Plots 21 and 22 are a little narrower.  In 1894 the two  halves were combined, giving a total plot area of 0.24ha. As  the experiment 
progressed these large plots have been subdivided into different Sections (see &lsquo;Background&rsquo; for more details), with corresponding  
changes in the area harvested. The current plot lengths vary depending on the Section  and are between 15.24m (Section 0) and 28.04m (Section 1).
 The plots are now 6m  wide (except plots 21 and 22 which are 4m wide) with 48 rows at 12.5 cm  spacing. The harvested area is 2.1m wide. 
The harvested area is shown in most  of the datasets.
<p><strong>Corrections:</strong><br />
<b>2013 plot 17 Section 3</b>, no straw yield was recorded. An estimated value has been used, based on the straw/grain ratio of plot 16, Section 3 (a plot with similar grain yield):  (5.44/8.01) * 7.95 = 5.39 t/ha. </p>
<p>
Further details can be obtained from the <a href= "<?=$eRA['curator'][Email]?>"> e-RA Curators </a> </p>


<p>For more information, refer to the  
  <A HREF="http://www.rothamsted.ac.uk/sample-archive/guide-classical-and-other-long-term-experiments-datasets-and-sample-archive">
Rothamsted Guide to the Classical Experiments 2006</A></p>


<?php 	if ($KeyRef) { 		GetKeyRefs ($KeyRef);	}	?>	</div><a name="pixies"></a><div class="col-2">
<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>Broadbalkharvest1880.jpg"><img src="<?=$metadata?>/ty_Broadbalkharvest1880.jpg" title="Summer 1880" width="100" /><br>
Broadbalk harvest 1880   </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>1935horseharvest.jpg"><img src="<?=$metadata?>/ty_1935horseharvest.gif" title="1935" width="100" /><br>
Broadbalk 1935 horse harvest by reaper-binder </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>1935tractoharvest.jpg"><img src="<?=$metadata?>/ty_1935tractoharvest.gif" title="1935" width="100" /><br>
Broadbalk 1935 tractor harvest</a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>ESlodging.jpg"><img src="<?=$metadata?>/ty_ESlodging.jpg" title="1935" width="100" /><br>
Badly lodged wheat crop</a>
</div>

</div>
