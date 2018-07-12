<?php
$KeyRef = "KeyRefDET" ;

?>


<h1>The Data Extraction Tool</h1>
<p>
</p>

<UL>
<LI><A href="<?php echo $request; ?>#SEC1">Background</A></LI>
<LI><A href="<?php echo $request; ?>#SEC2">Phases of Development</A></LI>
<LI><A href="<?php echo $request; ?>#SEC3">Help Available</A></LI>
<LI><a href="<?php echo $request; ?>#SEC4">Data user statistics</a></LI>
<LI class="nicelist"><A href="<?php echo $request; ?>#papers">Key References</A> related to the data extration tool</LI>
</UL>

<A NAME="SEC1"></a>
<H2>Background</H2>
<p><b>The e-RA programs: </b></p>
<UL>
<LI>ERA-LOAD	loads the data files, checking format conforms to sheet definitions and creates warning messages if uniformity check is not met.   </li>
<li>ERA-DATA	xxx     </li>

<li>ERA-COPY	xxx     </li>

<li>ERA-ADD	adds the sheet description information and creates a data table for each group in the sheet. </li>

<li>ERA-JOIN	translates data from the separate tables into a dataset table that contains the whole data from an entire experiment. It transforms numerical data into standard units as 
specified in the sheet description.   </li>

<li>ERA-DROP	drops a sheet of data from the data set table.  </li>

<li>ERA-REMOVE	removes the corresponding sheet data tables.      </li>
</ul>


<p>For more details, refer to the <A href="<?php echo $request; ?>#papers">Key References</A> listed below.</p>






<a name="SEC2"></a>
<h2>Phases of Development</h2>
 <p><b>Phase 1 1990-1993</b>: Plans for e-RA were laid out in 1990 (Verrier & Perry, 1990).  e-RA was then started in 1991 (Barnett, 1991), funded by the Lawes Agricultural Trust (LAT) and the Leverhulme Trust.
 The projected design for e-RA was proposed in 1991 (Caiger and Verrier 1991) and programs were developed in 1991 and 1992 (Caiger 1991, Caiger 1992) to join and load the data. 
 At this stage it was based on an ORACLE database management system under UNIX and was a complex organisation of co-operating software systems.  Programs specific to e-RA were 
 written in C, PRO*C, SQL*Plus and Tcl-TK to perform tasks like data entry, description and extraction. Perl scripts were used to generate HTML compliant web pages (Potts et al, 1996).
 Initially only Broadbalk wheat yields, Park Grass hay yields and meteorological data were added. A dedicated website for data extraction and background information was developed (Potts et al, 1997).
 This was one of the first active scientific websites in the UK. The initial test version of the database Version 1 (V1) was available with a limited subset of data in 1993.  </p>  

<p><b>Phase 2 1994-1998</b>: The LAT continued to fund the development of e-RA, mainly for data collection.   This phase involved continual amendment and refinement and further testing 
as data began to be collated and input. This involved determination of the most useful forms of output from the database. The provision of a suitable interface between the database and 
the data extraction tool was addressed.   </p>
<p><b>Phase 3 1998-2001</b>: Various short-term grants enabled maintenance, updating existing datasets and adding new datasets. </p>
<p><b>Phase 4 2002-2004</b>: No direct funding, basic maintenance. In these two years, lack of funds meant that the development stopped, and only basic maintenance was possible. </p>
<p><b>Phase 5 2005-2011</b>: A major renovation  began in 2005. This involved the allocation of a full time programmer, a full time curator and a web interface developer.  
During this period Oracle ceased to be supported at Rothamsted causing the database to be migrated to Microsoft SQL Server. V1  code had to be refactored to support the new SQL
Server DBMS and the  web user interface overhauled to provide a more user friendly experience.   </p>
<p>Following migration to SQL Server, version 2 (V2) of the e-RA database was released to Rothamsted users in February 2009. It included substantial re-writing of the back end database,
data query tools, data entry and data verification; extending existing datasets; adding new datasets; the development of a comprehensive searchable bibliography. V1 hardware and software was retired. </p>

<p>A new  <A href="http://www.era.rothamsted.ac.uk/"target="_blank">e-RA website </A>  was released (March 2011).

This was an extensive overhaul of the previous site with major additions to the content including comprehensive background information about the field experiments and meteorological data.
</p>
<p><b>Phase 6 2012-2017:</b> The electronic Rothamsted Archive, e-RA, became part of the Long-term Experiments National Capability, funded by the BBSRC. 
Refinements were made to the database to provide public access to updated e-RA V2 and the launch of e-RA database externally to public and wider scientific 
community in May 2013 . This is accessed via the <A href="http://www.era.rothamsted.ac.uk/"target="_blank">e-RA website </A> using the e-RA data extraction tool (DET).
Web pages were finalised and the website moved to a publicly  accessible web server for external access.   </p>
<p>Currently two versions of e-RA are maintained, the development version used by the curators on the internal website and a public database on the external website.
The database itself has kept its complex structure but the new interface simplifies greatly the experience for the user.  The end product is user friendly and available to 
anyone  after a registration step. It is accompanied by extensive supporting documentation and the e-RA curators provide tailored assistance and support in selecting and understanding
data to suit users' needs.   </p>
<p><A NAME="SEC3"></a>
<H2>Data user statistics</H2>
&nbsp;The e-RA curators monitor requests for data from e-RA. Data gathered includes:
<p><strong>What data is requested</strong>:-<br />
  <a href="<?=$metadata?>Numbers_of_requests_for_e-RA data_what_data.pdf" target="_blank">Summary of what data is requested<br />
</A>inlcudes:<br />
  Which field experiment<br />
  Which field experiment variable<br />
  Which weather variable
  <br />
  <br />
  <strong>Who is requesting the data:-</strong><br />
  <a href="<?=$metadata?>Numbers_of_requests_for_e-RA_who_is_requesting.pdf" target="_blank">Summary of who is requesting the data</a><br />
  inlcudes:<br />
  Level of interest<br />
  Role of requestor<br />
  Requesting institute<br />
Country</p>
<p><strong>Project category:-</strong><br />
<a href="<?=$metadata?>Summary_of_disciplines_using_eRA_data.pdf" target="_blank">Summary of projects<br />
</A>
<a href="<?=$metadata?>Complete_list_of_projects.pdf" target="_blank">Complete list of projects<br />
</A>
<br />
Last update: December 2016</p>
<?php 	if ($KeyRef) { 		GetKeyRefs ($KeyRef);	}	?>	</div><a name="pixies"></a><div class="col-2">
<!-- 	<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>wheatandfallow.jpg"><img src="<?=$metadata?>/wheatandfallowsmall.jpg" title="Alternate Wheat & Fallow" 
width="100" /><br>Aerial view Alternate Wheat & Fallow Expt    </a>
</div>

<div class="thumbnail">
<a href="pix.php?area=home&image=<?=$metadata?>wheatandfallow.jpg"><img src="<?=$metadata?>/wheatandfallowsmall.jpg" title="Alternate Wheat & Fallow"
width="100" /></a><br>Aerial view Alternate Wheat & Fallow Expt
</div>
-->

</div>




