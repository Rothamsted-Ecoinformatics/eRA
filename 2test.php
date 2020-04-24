<?php
?>


<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>e-RA: : Broadbalk    </title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
    <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.knightlab.com/libs/timeline3/latest/css/timeline.css" title="timeline-styles" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" /> <!--  for the image gallery in images2.php 15/10/2018 -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-cg.css">
    <link rel="stylesheet" href="css/style-map.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
   
    
    <script type="application/ld+json">{
    "administrative": {
        "type": "Experiment",
        "identifier": "Broadbalk",
        "localIdentifier": "R/BK/1",
        "name": "Broadbalk",
        "url": null,
        "description": "The Broadbalk experiment is one of the oldest continuous agronomic experiments in the world. Started by Lawes and Gilbert in the autumn of 1843, winter wheat has been sown and harvested on all or part of the field every year since then. The original aim of the experiment was to test the effects of various combinations of inorganic fertilizers (supplying the elements N, P, K, Na and Mg) and different organic manures on the yield of winter wheat; a control strip has received no fertilizer or organic manures since 1843. For the first few years these treatments varied a little, but in 1852 a scheme was established that has continued, with some modifications, until today.",
        "disambiguatingDescription": "The aim of the experiment was to test the effect of different organic manures and inorganic fertilizers on the yield of winter wheat."
    },
    "dataAccess": {
        "type": "creativeWork",
        "conditionsOfAccess": null,
        "isAccessibleForFree": "YesOffline",
        "publishingPrinciples": null,
        "actionableFeedbackPolicy": "The aim of the experiment was to test the effect of different organic manures and inorganic fertilizers on the yield of winter wheat.",
        "correctionsPolicy": "The aim of the experiment was to test the effect of different organic manures and inorganic fertilizers on the yield of winter wheat.",
        "unnamedSourcesPolicy": null
    },
    "license": {
        "type": "CreativeWork",
        "name": "CC-by-4",
        "license": "http://creativecommons.org/licenses/by/4.0"
    },
    "temporalCoverage": "1953/1970 from schema",
    "dateStart": 1843,
    "dateEPEnd": 1951,
    "dateEnd": null,
    "funder": "NOT in GLTEN",
    "citation": []
}</script>
</head>
<body>
	<div class="container bg-white px-0">

<nav id="custom-top-right" class="navbar navbar-expand-lg bg-lighter">
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbarSupportedContent">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item"><a class="btn btn-info mx-1"
				href="e-RApubs.php"> <i class="fa fa-mortar-board"></i> e-RApubs
			</a></li>
			<li class="nav-item"><a class="btn btn-info mx-1"
				href="e-RAdata.php"><i class="fa fa-list-alt"></i> e-RAdata</a></li>

			<li class="nav-item"><a class="btn btn-info mx-1"
				href="http://www.era.rothamsted.ac.uk/eradoc/"><i
					class="fa fa-book"></i> e-RAdoc</a></li>

			<li class="nav-item"><a class="btn btn-info mx-1"
				href="e-RAsearch.php"><i class="fa fa-search"></i> e-RAsearch</a></li>
		</ul>
	</div>
</nav>
<nav id="custom-main-menu" class="navbar navbar-expand-lg bg-lighter"
	id="custom-main-menu">
	<button class="navbar-toggler" type="button" data-toggle="collapse"
		data-target="#navbarera">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="index.php"> <img
		src="images/logos/eRALogoSmall.gif" class="rounded"
		alt="The
        electronic Rothamsted Archive"> The electronic
		Rothamsted Archive
	</a>
	<div class="collapse navbar-collapse" id="navbarera">
		<ul class="nav navbar-nav">

			<li class="dropdown menu-large nav-item"><a href="#"
				class="dropdown-toggle nav-link" data-toggle="dropdown">EXPERIMENTS
			</a>
				<ul class="dropdown-menu megamenu">
					<div class="row">
					<li class="col-md-4 dropdown-item">
							<ul>
								<li class="dropdown-header"><a name="sites">Sites</a></li>
								<li><a href="info.php?expt=rothamsted">Rothamsted</a></li>
								<li><a href="info.php?expt=woburn">Woburn</a></li>
								<li><a href="info.php?expt=saxmundham">Saxmundham</a></li>
								<li><a href="info.php?expt=broomsbarn">Broom's Barn</a></li>
							</ul>
						</li>
						<li class="col-md-4 dropdown-item">
							<ul>
								<li class="dropdown-header">Rothamsted</li>
								<li><a href="expt.php?expt=rrs9">Acid Strip</a></li>
								<li><a href="expt.php?expt=rwf3">Alternate Wheat and
										Fallow</a></li>
								<li><a href="expt.php?expt=rcs326">Amounts of Straw </a></li>
								<li><a href="expt.php?expt=rbk1">Broadbalk</a></li>
								<li><a href="expt.php?expt=rcs477">Continuous Maize </a></li>
								<li><a href="expt.php?expt=rex4">Exhaustion Land</a></li>
								<li><a href="expt.php?expt=rgc8">Garden Clover</a></li>
								<li><a href="expt.php?expt=rge9">Geescroft Wilderness</a></li>
								<li><a href="expt.php?expt=rrs1">Highfield Bare Fallow</a></li>
								<li><a href="expt.php?expt=rcs767">Highfield Conversion</a></li>
								<li><a href="expt.php?expt=rhb2">Hoosfield Spring
										Barley</a></li>
								<li><a href="expt.php?expt=rcs408">Miscanthus sinensis
										giganteus study</a></li>
								<li><a href="expt.php?expt=rpg5">Park Grass</a></li>
								<li><a href="expt.php?expt=rcs10"> Longterm Liming</a></li>
							</ul>
						</li>

						<li class="col-md-4 dropdown-item">
							<ul>
								
								<li class="dropdown-header">Saxmundham</li>
								<li><a href="expt.php?expt=srn1"> Rotation 1</a></li>
								<li><a href="expt.php?expt=srn2"> Rotation 2</a></li>
					
								<li class="dropdown-header">Woburn
								</li>
								<li><a href="expt.php?expt=wcs326">Amounts of Straw </a></li>
								<li><a href="expt.php?expt=wcs478">Continuous Maize </a></li>
								<li><a href="expt.php?expt=wcs428">Liquid Sludge
										Experiment</a></li>
								<li><a href="expt.php?expt=wcs439">Metal Salts
										Experiment</a></li>
							</ul>
						</li>


					</div>
				</ul></li>
			<li class="dropdown menu-large nav-item"><a href="#"
				class="dropdown-toggle nav-link" data-toggle="dropdown">WEATHER
					DATA </a>
				<ul class="dropdown-menu megamenu">
										<div class="row">
						<li class="col-md-4 dropdown-item">
							<ul>
								<li><a href="station.php?expt=rms#measurements">Recording Weather Data</a></li>
								<li><a href="#">Datasets for School</a></li>
								<li><a href="#">Weather on your birthday</a></li>


							</ul>
						</li>
						<li class="col-md-8 dropdown-item">
							<ul>
								
								<li><a href="station.php?expt=rms#datasets">Records for Rothamsted</a></li>
								<li><a href="#">Records for Woburn</a></li>
								<li><a href="#">Records for Broom's Barn</a></li>

							</ul>
						</li>
						
						
					</div>
				</ul></li>
				
<!-- ----DATA   -->
<li class="dropdown menu-large nav-item"><a href="#"
				class="dropdown-toggle nav-link" data-toggle="dropdown">DATA </a>
				<ul class="dropdown-menu megamenu">
					<div class="row">
						<li class="col-md-3 dropdown-item">
							<ul>
								
								<li class="dropdown-header">Documentation</li>
								<li><a href="info.php?FileName=dataQuality.php">Data Quality</a></li>
								<li><a href="info.php?FileName=CF.php">Conversion Factors</a></li>
								<li><a href="register.php">Access Data</a></li>
								<li><a href="#">Data Updates</a></li>

							</ul>
						</li>
						<li class="col-md-3 dropdown-item">
							<ul>
								<li class="dropdown-header">Rothamsted</li>
								
								<li><a href="expt.php?expt=rbk1#datasets2">Broadbalk</a></li>
								<li><a href="expt.php?expt=rex4#datasets2">Exhaustion Land</a></li>
				
							</ul>
						</li>

						<li class="col-md-3 dropdown-item">
							<ul>
								
								<li class="dropdown-header">Saxmundham</li>
							
								<li><a href="expt.php?expt=srn2#datasets2"> Rotation 2</a></li>

								
							</ul>
						</li>
						<li class="col-md-3 dropdown-item">
							<ul>
								
								<li class="dropdown-header">Other Datasets</li>
							
								<li><a href="expt.php?expt=srn2#datasets2"> Proof of concept</a></li>

								
							</ul>
						</li>

						
						
						
					</div>
				</ul></li>


<!-- -----------  ABOUT ------------- -->
			<li class="dropdown menu-large nav-item"><a href="#"
				class="dropdown-toggle nav-link" data-toggle="dropdown">ABOUT </a>
				<ul class="dropdown-menu megamenu">
					<div class="row">
						
						
						<li class="col-md-4 dropdown-item">
							<ul>
								<li class="dropdown-header">News and Updates</li>
								<li><a href="https://twitter.com/eRA_Curator">Twitter</a></li>
								
								<li><a href="#">e-RA news</a>
							</ul>
						</li>
						<li class="col-md-4 dropdown-item">
							<ul>
								<li class="dropdown-header"><a href="about.php">About</a></li>
								<li><a href="#">History</a></li>
								<li><a href="contact.php">Contact us</a></li>
								<li><a href="#">How to Credit</a></li>
								

							</ul>
						</li>
					</div>
				</ul></li>

			<li class="dropdown menu-large nav-item"><a href="#"
				class="dropdown-toggle nav-link" data-toggle="dropdown">DEV</a>
				<ul class="dropdown-menu megamenu">
					<div class="row">
						<li class="col-md-12 dropdown-item">
							<ul>
								<li><a
									href="http://local-info.rothamsted.ac.uk/eRA/era2018-doxy/html/index.html">Documentation</a></li>
								<li><a href="zdevHTK.html">devdevHTK.html: Bootstrap 4
										Kitchen Sink</a></li>
								<li><a href="zdevTemplate.html">zdevTemplate.html: an
										early stage templage</a></li>
								<li><a href="zdevBlank.php">devBlank: Blank template
										page (generic)</a>
								<li><a href="zdevdocuments.php">All the Documents</a></li>
								<li><a href="zdevProcessImages.php">Process Images</a></li>
							</ul>
						</li>

					</div>
				</ul>
		</ul>
	</div>
</nav><div id="idExpt" class="p-0 mb-0">
			<h1 class="mx-3"> Broadbalk</h1>
			<div class="row">
				<div class="col-12 pt-3">
					<ul class="nav nav-tabs nav-fill text-body ">
						<li class="nav-item"><a class="nav-link active show" id="summary-tab"
							data-toggle="tab" href="#summary">Overview</a></li>
						<li class="nav-item"><a class="nav-link" id="site-tab"
							data-toggle="tab" href="#site">Site</a></li>
						<li class="nav-item"><a class="nav-link" id="design-tab"
							data-toggle="tab" href="#design">Design</a></li>
						
												<li class="nav-item"><a class="nav-link" id="datasets-tab"
							data-toggle="tab" href="#datasets">Datasets</a></li>
																								<li class="nav-item"><a class="nav-link" id="datasets2-tab"
							data-toggle="tab" href="#datasets2">Datasets Cards</a></li>
												<li class="nav-item"><a class="nav-link" id="images-tab"
							data-toggle="tab" href="#images">Images</a></li>
						<li class="nav-item"><a class="nav-link" id="documents-tab"
							data-toggle="tab" href="#documents">Documents</a></li>
						<li class="nav-item"><a class="nav-link" id="keyrefs-tab"
							data-toggle="tab" href="#keyrefs">Bibliography</a></li>


					</ul>

					<div class="tab-content mh-100" id="idExptTabs">

						<div class="tab-pane active show pb-3" id="summary" role="tabpanel"
							aria-labelledby="summary-tab">
							

<h2 class="mx-3">Overview</h2>
<div class="mx-5">
	
	<div class="container">
		<div class="row">
			<div class="col">
				<ul class="list-group mx-3">
					<li class="list-group-item " ><b>Experiment Code: </b>R/BK/1</li><li class="list-group-item"  style="white-space: pre-wrap;" ><b>Description: </b>The Broadbalk experiment is one of the oldest continuous agronomic experiments in the world. Started by Lawes and Gilbert in the autumn of 1843, winter wheat has been sown and harvested on all or part of the field every year since then. The original aim of the experiment was to test the effects of various combinations of inorganic fertilizers (supplying the elements N, P, K, Na and Mg) and different organic manures on the yield of winter wheat; a control strip has received no fertilizer or organic manures since 1843. For the first few years these treatments varied a little, but in 1852 a scheme was established that has continued, with some modifications, until today.</li><li class="list-group-item"  style="white-space: pre-wrap;" ><b>Goals: </b>The aim of the experiment was to test the effect of different organic manures and inorganic fertilizers on the yield of winter wheat.</li>					
				

		<li class="list-group-item "><b>Date Start: </b>1843            	</li>
            	            	<li class="list-group-item "><b>Establisment Period End: </b>1951</li>
            	            	<li class="list-group-item "><b>Date End: </b>  Ongoing</li>

		
				</ul>
			</div>
			<div class="col">
            
<div id="mapid" style="width: 500px; height: 400px;"></div>            <script>

	var mymap = L.map('mapid').setView([51.80946 , -0.37301], 14);

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery � <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);
	L.marker([51.80946 , -0.37301]).addTo(mymap)
	.bindPopup("<b>Broadbalk</b><br />").openPopup();


</script>
			</div>
		</div>


	</div>
	
	
           
							  
            
    <h3 class="my-3 mt-5">Data Access</h3>
       <ul  class="list-group mx-3"><li  class="list-group-item " style="white-space: pre-wrap;"><b>Type:</b> creativeWork </li><li  class="list-group-item " style="white-space: pre-wrap;"><b>is Accessible for Free:</b> YesOffline </li><li  class="list-group-item " style="white-space: pre-wrap;"><b>Actionable Feedback Policy:</b> The aim of the experiment was to test the effect of different organic manures and inorganic fertilizers on the yield of winter wheat. </li><li  class="list-group-item " style="white-space: pre-wrap;"><b>Corrections Policy:</b> The aim of the experiment was to test the effect of different organic manures and inorganic fertilizers on the yield of winter wheat. </li></ul>    <h3 class="my-3 mt-5">License</h3>
            <ul  class="list-group mx-3"><li  class="list-group-item " style="white-space: pre-wrap;"><b>Type:</b> CreativeWork </li><li  class="list-group-item " style="white-space: pre-wrap;"><b>Title:</b> CC-by-4 </li><li  class="list-group-item " style="white-space: pre-wrap;"><b>License:</b> http://creativecommons.org/licenses/by/4.0 </li></ul><h3 class="my-3 mt-5">Contributors</h3> <ul class="list-group  mx-3">
<li class="list-group-item "><h4 class="mt-3">Andy Macdonald</h4></li>
<li class="list-group-item pl-5"><b>Role: </b> Principal Investigator</li>
<li class="list-group-item pl-5"><b>Organisation: </b>Rothamsted Research</li>
<li class="list-group-item pl-5"><b>Address: </b>West Common, Harpenden, Hertfordshire, AL5 2JQ, United Kingdom</li>
<li class="list-group-item "><h4 class="mt-3">Sarah Perryman</h4></li>
<li class="list-group-item pl-5"><b>Role: </b> Data Manager</li>
<li class="list-group-item pl-5"><b>Organisation: </b>Rothamsted Research</li>
<li class="list-group-item pl-5"><b>Address: </b>West Common, Harpenden, Hertfordshire, AL5 2JQ, United Kingdom</li>
<li class="list-group-item "><h4 class="mt-3">Margaret Glendining</h4></li>
<li class="list-group-item pl-5"><b>Role: </b> Data Manager</li>
<li class="list-group-item pl-5"><b>ORCID: </b><a href="https://orcid.org/0000-0002-6466-4629">https://orcid.org/0000-0002-6466-4629</a></li>
<li class="list-group-item pl-5"><b>Organisation: </b>Rothamsted Research</li>
<li class="list-group-item pl-5"><b>Address: </b>West Common, Harpenden, Hertfordshire, AL5 2JQ, United Kingdom</li></ul>               
    </div>						

							</div>

						<div class="tab-pane  pb-3" id="design" role="tabpanel"
							aria-labelledby="design-tab">
							<div class="row">
<div class="col-12">
	<h3 class="mx-3"> Experimental Design</h3>
</div>
<div class="col-10 mx-auto"> 
	<div  class="accordion" id="accordionDesign"> 

	<div class="card ">
		<div class="card-header" id="Earlyperiod>
		<h2 class="mb-0">
			<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Earlyperiod" aria-expanded="false" aria-controls="Earlyperiod">
					<i class="fa fa-angle-double-right mr-3"></i>Early period - 1852 - 1925
									</button>
									</h2>
	</div>
	<div id="Earlyperiod" class="collapse    fade "  data-parent="#accordionDesign"">
	<div class="card-body">
<h3 class="mx-3">Description</h3>
	        <ul class="list-group mx-3">
<li class="list-group-item " style="white-space: pre-wrap;">The experiment was divided into different Strips or 'Plots' (2 - 20) receiving the different fertilizer and manure treatments each year. Most treatment strips were established by 1852, except for strip 2A, which began in 1885, and strip 20, which began in 1906. Plot 19 was originally a half plot, and became its current size in 1904. Between 1894 and 1925 many plots were harvested in two halves, Top (T) and Bottom (B), equivalent to the Western and Eastern parts of the experiment.</li> 
      </ul>
<h3 class="mx-3">Design</h3>
	 <ul class="list-group mx-3">
<li class="list-group-item "><b>Period:</b> 1852 -  1925</li>
</ul>
<h3 class="mx-3">Crops</h3>
	 <ul class="list-group mx-3">
<li class="list-group-item "><b>winter wheat</b> </li>
</ul></div>
	</div>
	</div>
	<div class="card ">
		<div class="card-header" id="Middleperiod>
		<h2 class="mb-0">
			<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Middleperiod" aria-expanded="false" aria-controls="Middleperiod">
					<i class="fa fa-angle-double-right mr-3"></i>Middle period - 1926 - 1927
									</button>
									</h2>
	</div>
	<div id="Middleperiod" class="collapse    fade "  data-parent="#accordionDesign"">
	<div class="card-body">
<h3 class="mx-3">Design</h3>
	 <ul class="list-group mx-3">
<li class="list-group-item "><b>Period:</b> 1926 -  1927</li>
</ul>
<h3 class="mx-3">Crops</h3>
	 <ul class="list-group mx-3">
<li class="list-group-item "><b>winter wheat</b> </li>
</ul></div>
	</div>
	</div>
	<div class="card ">
		<div class="card-header" id="Currentperiod>
		<h2 class="mb-0">
			<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#Currentperiod" aria-expanded="false" aria-controls="Currentperiod">
					<i class="fa fa-angle-double-right mr-3"></i>Current period
									</button>
									</h2>
	</div>
	<div id="Currentperiod" class="collapse    fade "  data-parent="#accordionDesign"">
	<div class="card-body">
<h3 class="mx-3">Description</h3>
	        <ul class="list-group mx-3">
<li class="list-group-item " style="white-space: pre-wrap;">Two major modifications were made from 1968:
i) The division of Sections I to V to create 10 new Sections (0 - 9), so the yield of wheat grown continuously could be compared with that of wheat grown in rotation after a two-year break. 
ii) The introduction of modern, short-strawed cultivars, which lead to an increase in grain yields and a decrease in straw yields. The old cultivar Squarehead's Master was grown on parts of some plots between 1987 and 1990, enabling a comparison to be made with modern cultivars

After the 1968 changes, Sections 0, 1, 8 and 9 continued to grow winter wheat only, whilst Sections 2, 4, 7 and Sections 3, 5, 6 went into two different 3-course rotations (see 1968 cropping details link). In 1978, Section 6 reverted to continuous wheat and the other five Sections went into a five year rotation. Pesticides are applied where necessary, except on Section 6, which does not receive spring or summer fungicides. Herbicides have been used as required since 1964 on all of the experiment, except for Section 8 (old Section VA), which has never received herbicides. On Section 0 the straw on each plot has been chopped after harvest and incorporated in the soil since autumn 1986; on all other Sections the straw is baled and removed.

In 1993 Section 9 was re-drained so that water leaching through the soil could again be collected and analysed.

Lime has been applied as required since the 1950s to maintain soil pH at a level at which crop yield is not limited.

From 2001 P has not been applied to some plots until levels of plant available P decrease to more appropriate agronomic levels. This is reviewed each year.</li> 
      </ul>
<h3 class="mx-3">Crops</h3>
	 <ul class="list-group mx-3">
<li class="list-group-item "><b>winter wheat:</b> 1968</li>
<li class="list-group-item "><b>oats:</b> 1996</li>
<li class="list-group-item "><b>beans:</b> 1968 -  1978</li>
<li class="list-group-item "><b>potatoes:</b> 1968 -  1996</li>
<li class="list-group-item "><b>beans:</b> 2018</li>
<li class="list-group-item "><b>fallow</b> </li>
<li class="list-group-item "><b>maize:</b> 1997 -  2017</li>
</ul></div>
	</div>
	</div>
			</div>
		</div>
	</div>							</div>

						<div class="tab-pane  pb-3" id="site" role="tabpanel"
							aria-labelledby="site-tab">
							<h2 class="mx-3">Site: Broadbalk</h2>
<div class="mx-5">
    <ul class="list-group m-5">
<li class="list-group-item " style="white-space: pre-wrap;" ><b>Description:</b> The first experimental crop was harvested in 1844 after a rotation of turnips (dunged) 1839, barley 1840, peas 1841, wheat 1842 and oats 1843. The last four crops being entirely unmanured. The field was therefore considered to be exhausted according to contemporary practice.</li>
<li class="list-group-item " style="white-space: pre-wrap;" ><b>Management:</b> The site is managed using conventional tillage and pesticide applications are applied as necessary, except for herbicide and fungicide exclusion plots.

The plough layer (0-23 m) is limed when necessary to maintain a minimum soil pH of 7.0 – 7.5.</li>
<li class="list-group-item "><b>Visit Permitted?:</b> Yes </li>
<li class="list-group-item " style="white-space: pre-wrap;" ><b>Visiting Arrangments:</b> Contact Andy Macdonald</li>
<li class="list-group-item "><b>Elevation:</b> 130 Metres</li>
<li class="list-group-item "><b>Geolocation:</b> -0.37301 - 51.80946</li>
</ul>   <h2 class="mx-3">Soil</h2>
   <ul class="list-group m-5">
<li class="list-group-item "  style="white-space: pre-wrap;" ><b>Type:</b>  Luvisol
<br />The soil is classified as a Chromic luvisol. 

The soil texture is described as clay loam to silty clay loam over clay-with flints. The soils contain a large number of flints and are slightly calcareous. Below about 2m depth the soil becomes chalk. The experiment is under-drained and the site is free draining. There is considerable variation in soil texture across the site, with clay contents ranging from 19 – 39%</li>
</li>
</ul> 
</div>
							</div>
														<div class="tab-pane  pb-3" id="datasets2" role="tabpanel"
							aria-labelledby="datasets2-tab">
							
<h2 class="mx-3">Datasets available</h2>


<div class="row equal m-3">
	
	

<div class="card-columns">

	<div class="card  card-block bg-light mb-3 d-inline-block" >
			<div class="card-header">Cirsium arvense frequency on Broadbalk Section 8 1991-2018</div>
			<div class="card-body">
						<small class="card-muted">This dataset consists of the relative frequencies of Cirsium arvense (Creeping thistle) of the Family Asteraceae recorded on Section 8 plots of the Broadbalk Wheat Experiment, 1991-2018. Section 8 has not received any herbicides in its history.

The collective weed fauna, and frequency of each species such as C. arvense, vary in response to fertiliser treatments which vary with each plot (see Supporting Information below).</small>
				</div>
			<div class="card-footer"> <a href="dataset.php?expt=rbk1&amp;dataset=Circum1991">10.23637/bbk-2078416917-01 - Circum1991</a></div>
			</div>
	<div class="card  card-block bg-light mb-3 d-inline-block" >
			<div class="card-header">Broadbalk Soil Total % Nitrogen Content, 1843-2010</div>
			<div class="card-body">
						<small class="card-muted">Long-term changes in total % nitrogen concentration in the topsoil (0-23 cm) in selected treatments of the Broadbalk experiment, where winter wheat has been grown most years since 1843 ("continuous wheat").</small>
				</div>
			<div class="card-footer"> <a href="dataset.php?expt=rbk1&amp;dataset=Nitro1843">10.23637/BK-oadata-soilN-01 - Nitro1843</a></div>
			</div>
	<div class="card  card-block bg-light mb-3 d-inline-block" >
			<div class="card-header">Fisher 1921 Broadbalk wheat grain yields 1852-1918</div>
			<div class="card-body">
						<small class="card-muted">This dataset consists of annual wheat yields from selected plots of the Broadbalk Wheat Experiment, 1852-1918, as used by R.A. Fisher in his 1921 paper 'Studies in crop variation'.</small>
				</div>
			<div class="card-footer"> <a href="dataset.php?expt=rbk1&amp;dataset=FISHER1921">10.23637/rbk1-data-fisher-1921-01 - FISHER1921</a></div>
			</div>
	<div class="card  card-block bg-light mb-3 d-inline-block" >
			<div class="card-header">Broadbalk mean long-term winter wheat yields</div>
			<div class="card-body">
						<small class="card-muted">This summary data shows the mean long-term winter wheat yields from selected treatments on Broadbalk 1852-2016, excluding spring wheat in 2015. These changes in mean long-term winter wheat yields reflect the improved treatments and agronomic practices introduced on Broadbalk such as modern cultivars, better control of pests, diseases and weeds, especially since the 1960s.</small>
				</div>
			<div class="card-footer"> <a href="dataset.php?expt=rbk1&amp;dataset=OAWWYields">10.23637/KeyRefOABKyields - OAWWYields</a></div>
			</div>
	<div class="card  card-block bg-light mb-3 d-inline-block" >
			<div class="card-header">Broadbalk changes in Olsen P in top soil, 1844-2010</div>
			<div class="card-body">
						<small class="card-muted">Summary data showing changes in plant-available phosphorus (Olsen P) in the topsoil (0-23cm) of selected plots of the Broadbalk Wheat experiment, 1844-2010.</small>
				</div>
			<div class="card-footer"> <a href="dataset.php?expt=rbk1&amp;dataset=OAOlsenP1844">10.23637/keyrefoabkolsenp - OAOlsenP1844</a></div>
			</div>
	<div class="card  card-block bg-light mb-3 d-inline-block" >
			<div class="card-header">BKYIELD: Broadbalk wheat grain and straw yields 1844-1925</div>
			<div class="card-body">
						<small class="card-muted">Wheat grain and straw yields have been recorded every year since the experiment began, with the first harvest in 1844 (the crop was sown in autumn 1843). Dried grain and straw samples have also been kept for chemical analysis since 1844; these are preserved in the Rothamsted Sample Archive.</small>
				</div>
			<div class="card-footer"> <a href="dataset.php?expt=rbk1&amp;dataset=YIELD844925">10.23637/rbk1-1796346264-1 - YIELD844925</a></div>
			</div></div>
</div>							</div>
																				<div class="tab-pane  pb-3" id="datasets" role="tabpanel"
							aria-labelledby="datasets-tab">
							
<h2 class="mx-3">Datasets available</h2>

<h3 class="mx-3 mt-5">Cirsium arvense frequency on Broadbalk Section 8 1991-2018</h3><ul  class="list-group mx-5"><li class="list-group-item ">Dataset Page on old e-RA site: <a href="http://www.era.rothamsted.ac.uk/Broadbalk/Cirsiumarvense1991-2018">10.23637/bbk-2078416917-01</a></li><li class="list-group-item ">Dataset Page on new e-RA site: <a href="dataset.php?expt=rbk1&amp;dataset=Circum1991">10.23637/bbk-2078416917-01 - Circum1991</a></li><li class="list-group-item "    style="white-space: pre-wrap;" >This dataset consists of the relative frequencies of Cirsium arvense (Creeping thistle) of the Family Asteraceae recorded on Section 8 plots of the Broadbalk Wheat Experiment, 1991-2018. Section 8 has not received any herbicides in its history.

The collective weed fauna, and frequency of each species such as C. arvense, vary in response to fertiliser treatments which vary with each plot (see Supporting Information below).</li></ul><h3 class="mx-3 mt-5">Broadbalk Soil Total % Nitrogen Content, 1843-2010</h3><ul  class="list-group mx-5"><li class="list-group-item ">Dataset Page on old e-RA site: <a href="http://www.era.rothamsted.ac.uk/Broadbalk/bbk_open_access_soilN">10.23637/BK-oadata-soilN-01</a></li><li class="list-group-item ">Dataset Page on new e-RA site: <a href="dataset.php?expt=rbk1&amp;dataset=Nitro1843">10.23637/BK-oadata-soilN-01 - Nitro1843</a></li><li class="list-group-item "    style="white-space: pre-wrap;" >Long-term changes in total % nitrogen concentration in the topsoil (0-23 cm) in selected treatments of the Broadbalk experiment, where winter wheat has been grown most years since 1843 ("continuous wheat").</li></ul><h3 class="mx-3 mt-5">Fisher 1921 Broadbalk wheat grain yields 1852-1918</h3><ul  class="list-group mx-5"><li class="list-group-item ">Dataset Page on old e-RA site: <a href="http://www.era.rothamsted.ac.uk/Broadbalk/Fisher1921">10.23637/rbk1-data-fisher-1921-01</a></li><li class="list-group-item ">Dataset Page on new e-RA site: <a href="dataset.php?expt=rbk1&amp;dataset=FISHER1921">10.23637/rbk1-data-fisher-1921-01 - FISHER1921</a></li><li class="list-group-item "    style="white-space: pre-wrap;" >This dataset consists of annual wheat yields from selected plots of the Broadbalk Wheat Experiment, 1852-1918, as used by R.A. Fisher in his 1921 paper 'Studies in crop variation'.</li></ul><h3 class="mx-3 mt-5">Broadbalk mean long-term winter wheat yields</h3><ul  class="list-group mx-5"><li class="list-group-item ">Dataset Page on old e-RA site: <a href="http://www.era.rothamsted.ac.uk/Broadbalk/bbk_open_access_yields">10.23637/KeyRefOABKyields</a></li><li class="list-group-item ">Dataset Page on new e-RA site: <a href="dataset.php?expt=rbk1&amp;dataset=OAWWYields">10.23637/KeyRefOABKyields - OAWWYields</a></li><li class="list-group-item "    style="white-space: pre-wrap;" >This summary data shows the mean long-term winter wheat yields from selected treatments on Broadbalk 1852-2016, excluding spring wheat in 2015. These changes in mean long-term winter wheat yields reflect the improved treatments and agronomic practices introduced on Broadbalk such as modern cultivars, better control of pests, diseases and weeds, especially since the 1960s.</li></ul><h3 class="mx-3 mt-5">Broadbalk changes in Olsen P in top soil, 1844-2010</h3><ul  class="list-group mx-5"><li class="list-group-item ">Dataset Page on old e-RA site: <a href="http://www.era.rothamsted.ac.uk/Broadbalk/bbk_open_access_olsenp">10.23637/keyrefoabkolsenp</a></li><li class="list-group-item ">Dataset Page on new e-RA site: <a href="dataset.php?expt=rbk1&amp;dataset=OAOlsenP1844">10.23637/keyrefoabkolsenp - OAOlsenP1844</a></li><li class="list-group-item "    style="white-space: pre-wrap;" >Summary data showing changes in plant-available phosphorus (Olsen P) in the topsoil (0-23cm) of selected plots of the Broadbalk Wheat experiment, 1844-2010.</li></ul><h3 class="mx-3 mt-5">BKYIELD: Broadbalk wheat grain and straw yields 1844-1925</h3><ul  class="list-group mx-5"><li class="list-group-item ">Dataset Page on old e-RA site: <a href="http://www.era.rothamsted.ac.uk/Broadbalk/">10.23637/rbk1-1796346264-1</a></li><li class="list-group-item ">Dataset Page on new e-RA site: <a href="dataset.php?expt=rbk1&amp;dataset=YIELD844925">10.23637/rbk1-1796346264-1 - YIELD844925</a></li><li class="list-group-item "    style="white-space: pre-wrap;" >Wheat grain and straw yields have been recorded every year since the experiment began, with the first harvest in 1844 (the crop was sown in autumn 1843). Dried grain and straw samples have also been kept for chemical analysis since 1844; these are preserved in the Rothamsted Sample Archive.</li></ul>
							</div>
													<div class="tab-pane" id="images" role="tabpanel"
							aria-labelledby="images-tab">
														</div>
						<div class="tab-pane  pb-3" id="documents" role="tabpanel"
							aria-labelledby="documents-tab">
							
<h2 class="mx-3">Documents</h2>

No documents							
<h2>Related Pages</h2>

rbk1<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<br />
<b>Notice</b>:  Undefined variable: pCell in <b>D:\xampp\htdocs\era2018\includes\exptData.inc</b> on line <b>439</b><br />
<table  class="table table-striped table-bordered table-sm w-75 m-5">
	<thead class="thead-light">	<tr><th  scope="col">Credit</th><th  scope="col">FileName</th><th  scope="col">Caption</th><th  scope="col">Type</th><th  scope="col">exptID</th><th  scope="col">isReviewed</th></tr>
</thead><tbody>	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=bbk-open-access-interactive.php">bbk-open-access-interactive.php</a></td><td>bbk open access interactive</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=bbk-open-access-old.php">bbk-open-access-old.php</a></td><td>bbk open access old</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=bbk-open-access-olsenp.php">bbk-open-access-olsenp.php</a></td><td>bbk open access olsenp</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=bbk-open-access.php">bbk-open-access.php</a></td><td>bbk open access</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=bbknutr.php">bbknutr.php</a></td><td>bbknutr</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=bbksoils.php">bbksoils.php</a></td><td>bbksoils</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=bbksoils44.php">bbksoils44.php</a></td><td>bbksoils44</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=bbksoils66.php">bbksoils66.php</a></td><td>bbksoils66</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=bbksoils87.php">bbksoils87.php</a></td><td>bbksoils87</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=bbkweeds.php">bbkweeds.php</a></td><td>bbkweeds</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=bbkweeds0ol2.php">bbkweeds0ol2.php</a></td><td>bbkweeds0ol2</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=bbkweedsold.php">bbkweedsold.php</a></td><td>bbkweedsold</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=bbkyields-other-crops.php">bbkyields-other-crops.php</a></td><td>bbkyields other crops</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=bbkyields.php">bbkyields.php</a></td><td>bbkyields</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=index.php">index.php</a></td><td>index</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=indexoriginal.php">indexoriginal.php</a></td><td>indexoriginal</td><td>php</td><td>rbk1</td><td>0</td></tr>
	<tr scope="row"><td>eRA curators</td><td><a href="topic.php?expt=rbk1&FileName=pg-composition.php">pg-composition.php</a></td><td>pg composition</td><td>php</td><td>rbk1</td><td>0</td></tr>
</tbody></table>							</div>
						<div class="tab-pane  pb-3" id="keyrefs" role="tabpanel"
							aria-labelledby="keyrefs-tab">
														</div>


					</div>
				</div>
			</div>

		</div>
					
<!-- footer -->
<div id="greenBar"
	class="d-flex justify-content-end  py-3 p3-3 bg-primary text-white mt-0 ">
	<div class="pr-3">
		<a class="btn  bg-success text-primary   "
			href="//www.facebook.com/Rothamsted-Research-298539835982"> <i
			class="fa fa-facebook"></i>
		</a> <a class="btn  bg-success text-primary  "
			href="//www.youtube.com/user/RothamstedResearch"> <i
			class="fa fa-youtube" aria-hidden="true"></i>
		</a> <a class="btn  bg-success text-primary  "
			href="//www.instagram.com/rothamsted_docs/"> <i
			class="fa fa-instagram"></i>
		</a> <a class="btn  bg-success text-primary  "
			href="https://twitter.com/eRA_Curator"> <i class="fa fa-twitter"></i>
		</a> <a class="btn  bg-success text-primary  " href="mailto:era@rothamsted.ac.uk"> <i
			class="fa fa-envelope"></i>
		</a>
	</div>
</div>
<div class="d-flex justify-content-between mx-0 p-2 bg-white text-primary">
	<div class="p-2">
		<a href="http://www.rothamsted.ac.uk/"> <img class="rounded"
			 height="100" border="0" align="top"
			src="images/logos/rothamsted.png" alt="Rothamsted" hspace="0"
			vspace="0" />
		</a>
	</div>
	<div class="p2">
		<a href="http://www.bbsrc.ac.uk/"> <img src="images/logos/bbsrc.png"
			alt="BBSRC" class="height80"  hspace="0" vspace="0" height="100">
		</a>
	</div>

</div>
 
	</div>
<script src="js/jquery.min.js"></script>
<script src="js/era.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.knightlab.com/libs/timeline3/latest/js/timeline.js"></script> 
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

<script
		src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
	<script>
	      baguetteBox.run('.compact-gallery',{animation:'slideIn',
	    	    captions: function(element) {
	    	        return element.getElementsByTagName('img')[0].alt;
	    	    }});
</script>
	<div id="mapid"></div>
</body>

</html>



