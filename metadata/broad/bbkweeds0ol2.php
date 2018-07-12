<?php
$KeyRef = "KeyRefBKWeeds" ;

?>


<H1>Broadbalk Weeds</H1>
<p>
Weeds were originally controlled on Broadbalk by hand-hoeing and fallowing, but since 1964, herbicides have been applied to the  
whole experiment except Section 8. Since 1867, 130 plant species have been recorded on Broadbalk, but many of these only occur 
sporadically. 

Detailed visual surveys of weeds on Broadbalk were carried out every year between 1921 and 1979. Various different 
codes were used to indicate species abundance (STATE). The main ones are as follows:
</p>

<TABLE>
<TR><td class="border"> 0</TD><td class="border"> Occasional</TD></TR>
<TR><td class="border"> 0+</TD><td class="border"> Between 0 and T</TD></TR>
<TR><td class="border"> T</TD><td class="border"> Distributed</TD></TR>
<TR><td class="border"> T+</TD><td class="border"> Between T and P</TD></TR>
<TR><td class="border"> P</TD><td class="border"> Plentiful</TD></TR>
<TR><td class="border"> P+</TD><td class="border"> Between P and PP</TD></TR>
<TR><td class="border"> PP</TD><td class="border"> Very plentiful</TD></TR>
<TR><td class="border"> PP+</TD><td class="border"> Between PP and PPP</TD></TR>
<TR><td class="border"> PPP</TD><td class="border"> Extremely plentiful</TD></TR>
</TABLE>


<p> The following datasets are available: </p>
<p>BBKWEEDS_FAL for 1933-67 </p>
<p>BBKWEEDS_ROT for 1968-79</p>
<p>It is recommended that you extract both STATE and SPEC_REMARK since the presence of
a species may be indicated by a remark such as 'patch' even though there is no code for the state. In view of the
large number of null values it is probably best to tick the checkbox for STATE and exclude 'null' and '-', meaning none. 
</p>
<p>You can choose to extract data from a particular plot
or species by choosing an item from the appropriate menu and can also choose a
range of values for the survey date. 
</p>

<p>The annual weed survey was restarted on Section 8 in 1991. For more details, refer to the  
<A HREF="http://www.rothamsted.ac.uk/sample-archive/guide-classical-and-other-long-term-experiments-datasets-and-sample-archive">
Rothamsted Guide to the Classical Experiments 2006</A>  page 16 or
contact the <a href= "<?=$Era_Curator[Email]?>"> e-RA Curators. </a> </p>



