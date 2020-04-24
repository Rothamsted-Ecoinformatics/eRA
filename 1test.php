<?php
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <title>e-RA: : Woburn Station    </title>
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
</nav>


<div id="WS"  class="p-0 mb-0">
	<h1 class="mx-3">Woburn Experimental Farm</h1>
	<div class="row">
		<div class="col-12 pt-3">
			<ul class="nav nav-tabs nav-fill text-body ">
				<li class="nav-item"><a class="nav-link active show"
					id="summary-tab" data-toggle="tab" href="#summary">Overview</a></li>
				<li class="nav-item"><a class="nav-link" id="site-tab"
					data-toggle="tab" href="#site">Site</a></li>
				<li class="nav-item"><a class="nav-link" id="history-tab"
					data-toggle="tab" href="#history">History</a></li>

				<li class="nav-item"><a class="nav-link" id="experiments-tab"
					data-toggle="tab" href="#experiments">Experiments</a></li>


				<li class="nav-item"><a class="nav-link" id="experiments2-tab"
					data-toggle="tab" href="#experiments2">Experiments Cards</a></li>

				<li class="nav-item"><a class="nav-link" id="images-tab"
					data-toggle="tab" href="#images">Images</a></li>

				<li class="nav-item"><a class="nav-link" id="keyrefs-tab"
					data-toggle="tab" href="#keyrefs">Bibliography</a></li>


			</ul>

			<div class="tab-content mh-100" id="idExptTabs">

				<div class="tab-pane active show pb-3" id="summary" role="tabpanel"
					aria-labelledby="summary-tab">

					<div class="row m-3">
						<div class="col-6">
							<p>
								In addition to the farm at Rothamsted, there is a further
								contrasting site at Woburn, Bedfordshire, 40 km North of
								Rothamsted. Experiments at <b>Woburn</b> began in 1876 under the
								auspices of the Royal Agricultural Society of England. The
								principal aim was to test the residual manurial value to crops
								of two contrasted feedstuffs fed to animals in covered yards or
								on the land. Rothamsted took over the management of the farm in
								the 1920s. In contrast to the silty clay loam at Rothamsted,
								which typically contains 20-40% clay, the soil at Woburn is
								principally a sandy loam containing about 8-14% clay. It is much
								more difficult to maintain or increase Soil Organic Matter (SOM)
								in this soil, and several long-term experiments at Woburn were
								established to study the effects of management on SOM and yield.
							</p>
						</div>
						<div class="col-6">
							<div id="mapid" style="width: 500px; height: 400px;"></div>
							<script>
var mymap = L.map('mapid').setView([52.013815 , -0.596090], 14);

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery � <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);
	L.marker([52.013815 , -0.596090]).addTo(mymap)
	.bindPopup("<b>Woburn Farm </b><br />").openPopup();
</script>
						</div>

					</div>
				</div>

				<div class="tab-pane  pb-3" id="history" role="tabpanel"
					aria-labelledby="history-tab">
					<h2>History</h2>

					<p>
						<B>History:</b> Woburn Experimental Farm, despite the name, lies
						in the parish of Husborne Crawley and was previously known as Mill
						Farm due to its proximity to a watermill. Mill Farm was owned by
						the Duke of Bedford, who remains owner of the Experimental Farm.
					</p>
					<p>The last reference to a mill in Husborne Crawley in any
						directory for Bedfordshire is in 1869 and on the 1st edition
						Ordnance Survey map of 1883 Mill Farm is shown but not the mill,
						suggesting that it was pulled down some time between these two
						dates, which was probably when today's Mill Farm house (a mid 19th
						century Bedford Estate structure) was built. Bedfordshire and
						Luton Archives and Records Service has a booklet on the history of
						the experimental farm written for its centenary in 1977 by A. E.
						Johnston. John Bennet Lawes (1814-1900) set up the Rothamsted
						Experimental Station at Harpenden [Hertfordshire] in 1843.
						Hastings, 9th Duke of Bedford was vice-president of the Royal
						Agricultural Society of England. He was interested in agricultural
						experimentation and offered a farm on the Woburn Estate on which
						to conduct experiments on the value of different types of animal
						manure on different types of soil. The Chemical Committee of the
						Royal Agricultural Society accepted and asked Lawes and his
						co-worker John Christopher Augustus Voelcker (1822-1884) to set up
						suitable experiments.</p>

					<p>Mill Farm was selected as the place to carry out the trials but
						no single field was big enough and so the Duke also leased
						Stackyard Field from his tenant at Birchmore Farm, a mile away and
						on the west side of the road from Husborne Crawley to Woburn. When
						the tenant died Stackyard Field was added to Mill Farm and it
						remains part of the Experimental Farm to the present day [2012].</p>

					<p>The Royal Agricultural Society became tenants of Stackyard Field
						and Mill Farm at Michaelmas 1876. The farm then comprised 67 acres
						of arable and 23 acres of grass; Stackyard Field was 26 acres. In
						Michaelmas 1879 Warren Field of 14 acres was added to Mill Farm.
						New feeding boxes for cattle were built at the farm at the Duke's
						expense in 1876 or 1877 and demolished in the early 1970s to make
						way for a potato store. The Duke of Bedford supported the
						Experimental Farm with money whenever it was needed and his
						successors George, the 10th Duke and Herbrand, the 11th Duke – the
						farm cost the successive dukes about £600 between 1876 and 1912,
						not an inconsiderable sum in those days. Lawes and Voelcker
						decided to take advantage of the light, sandy soils at Husborne
						Crawley in order to carry out experiments on the continuous
						growing of winter wheat and spring barley crops as well as their
						experiments with manure. They had already achieved the feat of
						continuous growing of crops on the heavy clay soil at Rothamsted.
						The first crops were harvested in 1877, the same year in which the
						manure experiments began. Lawes quickly became disenchanted with
						Husborne Crawley due to interference by the Royal Agricultural
						Society's Chemical Committee, now renamed the Woburn Committee and
						Voelcker carried on the work until his death in 1884 when he was
						succeeded by his son J. Augustus Voelcker (1854-1937).</p>

					<p>In 1897 a laboratory was built at Husborne Crawley in which to
						test samples. This was made possible by a bequest of £10,000 by E.
						H. Hills, a member of a firm of chemical manufacturers which made
						artificial manure. This interesting building remains though it is
						now disused. The Development Act 1909 established a permanent
						Development Commission. One of its tasks was to increase
						productivity of land and one of its commissioners was the Director
						of Rothamsted. The Royal Agricultural Society thus received
						£2,900,000 per annum until 1915 and as a result the 11th Duke
						decided that he could withdraw his financial support from the
						Experimental Farm and a grant of £500 per annum was secured from
						1912 onwards. In 1915 there was a long debate about whether to
						terminate the experiments but the idea was rejected.</P>
					<p>By 1917 German U-boats were sinking alarming quantities of
						allied shipping, so much so that it was feared that Britain would
						be starved into submission. As a panic measure War Agricultural
						Executive Committees in each county were told to order quantities
						of ancient pasture to be ploughed up and used for arable crops.
						This alienated local farmers who feared that they would make a
						loss because the crops grown would be likely to be less than on
						proper arable land and, meanwhile, they would loose valuable
						grazing for their cattle or sheep. The Royal Agricultural Society
						was ordered to plough up 14.5 acres at Husborne Crawley including
						Great Hill Bottom [WW1/AC/OP2/111]. After cropping the society put
						in a claim for loss but this was unsuccessful as the profit made
						on one field was greater than the loss made on the other. In the
						end the introduction of the convoy system greatly decreased the
						effectiveness of the German submarines and the emergency measures
						were discontinued.</p>
					At Michaelmas 1921 the Royal Agricultural Society terminated its
					tenancy of Mill Farm in order to save money. Voelcker, however,
					wished to continue his work at Husborne Crawley and arranged to
					become the tenant in October 1921. Live and dead stock at the farm
					were sold and realised £635 [SF75/25]. The £500 grant to the
					Experimental Farm from government continued provided that some body
					succeeded the Royal Agricultural Society in a supervisory role. The
					obvious choice was the new governing body for Rothamsted, the Lawes
					Agricultural Trust. Voelcker gave up the tenancy of the farm in
					October 1926, he had spent around £2,000 in maintaining his work;
					the Trust became the new tenants. Voelcker continued to be Honorary
					Local Director until 1936.
					</p>

					<p>The Rating and Valuation Act 1925 specified that every building
						and piece of land in the country was to be assessed to determine
						its rateable value. The valuer visited the Experimental Farm
						[DV1/H5/12] on 12th November 1926, just after the Lawes
						Agricultural Trust had taken over the tenancy. It paid rent of
						£160/10/- to the Duke of Bedford, set in 1921, the pre-war rent
						having been £120. The valuer calculated the area of the farm as
						131 acres. Water was laid on but there was no electricity,
						lighting being by lamps. Sanitation was to a cesspool. The valuer
						noted: "Saw Mr. A. W. Greenhill of Lawes Agricultural Trust.
						Tenant's manager is Atkinson of Heather Lea, Woburn Sands This
						farm is an experimental test farm probably run at considerable
						loss". The farmhouse comprised two living rooms, a kitchen, an
						office, a pantry and two cellars under the ground floor. Four
						bedrooms stood on the first floor, along with a boxroom, a
						bathroom, a W. C., a coal shed and a wood barn.</p>

					<p>The Farm buildings comprised:</p>
					<p>
						<b>South Block A:</b> a large store room; an experimental drying
						room; a specimen room; a brick, wood and slate garage and a
						granary with a loft over;
					</p>
					<p>
						<b>Separate Block B:</b> a laboratory, an office and storeroom; a
						pot culture station; a glasshouse and a cage. Water was laid on;
					</p>
					<p>
						<b>West Block C:</b> a wood and corrugated iron cattle weighing
						bridge; a brick and slate mixing house; a pig house with three
						fattening pens and a two bay open cowshed;
					</p>
					<p>
						<b>North Block D:</b> a carthorse stable for six; a chaff house; a
						wood and corrugated iron three bay open implement shed; a lean-to
						brick and corrugated iron engine shed containing an eight
						horsepower oil engine driving the chaff cutter etc.; a brick and
						slate barn with loft over and another chaffhouse;
					</p>
					<p>
						<b>East Block E:</b> a brick and slate cowhouse for six cows used
						as a piggery; two loose boxes and two semi-covered corrugated iron
						yards;
					</p>
					<p>
						<b>Separate North Block F:</b> a wood and tiled four bay open cart
						shed; a brick and slate mixing house and an experimental cattle
						feeding house containing eight loose boxes with central feeding
						passage.
					</P>
					<p>The valuer commented: "Buildings in good order. Farm runs as
						Experimental Station probably at considerable loss: is rather a
						show place and calls itself "The Woburn Agricultural Test Farm".</p>

					<p>On J. Augustus Voelcker's retirement as Honorary Local Director
						in 1936 Harold Hart Mann (1872-1961) took over supervision of the
						field experiments and laboratory work and Tom W. Barnes
						(1901-1974) was appointed as chemist in 1928. Mann took sole
						charge of the farm in 1936. He retired in 1956 and was replaced by
						C. A. Thorold until 1968 when he retired. The Dairy Farm of 17.5
						hectares was transferred to the Experimental farm by the Bedford
						Estate in 1962 as, were two more fields: Horsepool Lane Close of
						just over eight acres in 1971 and Far Field of about nine acres in
						1972.</p>

					<p>
						<b>Past Managers and Directors:</b> Directories for Bedfordshire,
						which were not published annually but every few years, give the
						names of the occupiers of the various officers responsible for the
						Experimental Farmfrom 1885 to 1940 and the following names are
						taken from these directories. The dates are those of the first and
						last appearance of a name, not the full span of dates of
						employment:
					</p>

					<p>
					
					
					<ul>
						<li>1885: Francis Edwin Fraser, manager</li>
						<li>1890-1894: Arthur Edward Elliott, manager</li>
						<li>1898: James J. Forrester, manager</li>
						<li>1903: William H. Hogg, manager</li>
						<li>1910: J. Augustus Voelcker, director</li>
						<li>1914: J. Augustus Voelcker, director; Harry Marshall Freear,
							analytical chemist; Frank C. Atkinson, farm manager</li>
						<li>1920: J. Augustus Voelcker, director; Alfred Blenkinsop,
							analytical chemist; Frank C. Atkinson, farm manager</li>
						<li>1924: The Lawes Trust - J. Augustus Voelcker, director; Alfred
							Blenkinsop, analytical chemist and farm manager;</li>
						<li>1928: The Lawes Trust - J. Augustus Voelcker, director;
							William Charles Collett, analytical chemist and farm manager;</li>
						<li>1931: The Lawes Trust - J. Augustus Voelcker, director; H. H.
							Mann, analytical chemist and farm manager;</li>
						<li>1936: The Lawes Trust - J. Augustus Voelcker, director; H. H.
							Mann, assistant director; T. C. V. Bright, assistant manager</li>
						<li>1940: The Lawes Trust – Sir E. J. Russell, director; H. H.
							Mann, assistant director in charge</li>

					</ul>
					</p>

					<p>Background, maps, keys and images provided by Dr Chris Watts,
						2017.</p>



				</div>

				<div class="tab-pane  pb-3" id="site" role="tabpanel"
					aria-labelledby="site-tab">
					<h2>Site details</h2>


					<p>
						<b>Location:</b>
					
					
					<p />
					<p class="center">
					
					
					<table class="center">
						<tr>
							<th class="border"><b> Site </b></th>
							<th class="border"><b> Location</b></th>
							<th class="border"><b> Latitude</b></th>
							<th class="border"><b>Longitude</b></th>
							<th class="border"><b>Altitude (m asl)</b></th>
						</tr>
						<tr>
							<td class="border">Woburn Farm</td>
							<td class="border">Husborne Crawley, Woburn, Bedfordshire</td>
							<td class="border">52.02 N</td>
							<td class="border">0.62 W</td>
							<td class="border">79-110m</td>
						</tr>
					</table>
					</p>
					<p>
						<b>Soil details:</b>
					
					
					<p />

					<UL>
						<LI class="nicelist"><a
							href="metadata/Woburn/Woburn farm soil series map.pdf"
							target="_blank">Woburn Farm Soil Series map (pdf)</A>, use
							REVISED LEGEND, 2017</li>
						<LI class="nicelist"><a
							href="metadata/Woburn/Woburn Farm soil series legend revised 2017.xlsx"
							target="_blank">Woburn Farm Soil Series Revised Legend,
								2017(xlsx)</A></li>
						<LI class="nicelist"><a
							href="metadata/Woburn/Woburn farm soil texture map.pdf"
							target="_blank">Woburn Farm Soil Texture map (pdf)</A>, showing
							surface texture class of the different fields. Scale 1:2500.</li>
					</ul>
					</p>


					<p>For detailed information about the soil types at Woburn Farm,
						see Catt et al (1975, 1977 and 1980) in Key References, below.</p>


					<p>Maps, revised legend and images provided by Dr Chris Watts,
						2017.</p>
					<h2>Farm plans</h2>




					<ul>
						<LI class="nicelist"><a
							href="metadata/Woburn/Woburn farm field plan green.pdf"
							target="_blank">Woburn Farm field layout (pdf)</A>, plan showing
							names of all the fields</li>
						<LI class="nicelist"><a
							href="metadata/Woburn/Woburn Farm Fields Map - 2009.pdf"
							target="_blank">Woburn Farm field map (pdf)</A>, 1:10,000 scale,
							dated 10/07/2009</li>
					</ul>

				</div>

				<div class="tab-pane  pb-3" id="experiments2" role="tabpanel"
					aria-labelledby="experiments2-tab">
					<p>Experiments displayed as Cards</p>
				</div>

				<div class="tab-pane  pb-3" id="experiments" role="tabpanel"
					aria-labelledby="experiments-tab">
					<h2>Long-term experiments</h2>
					<p>The long-term term experiments at Woburn include:</p>

					<table>
						<tr>
							<th><b>Experiment</b></th>
							<th><b>Code</b></th>
							<th><b>Experimental Objectives</b></th>
							<th><b>Year started</b></th>
						</tr>

						<tr>
							<td><A href="http://www.era.rothamsted.ac.uk/Other#SEC9">Woburn
									Ley-Arable</a></td>
							<td>W/RN/3</td>
							<td>Effects of continuous arable and ley-arable cropping on crop
								production, soil organic matter dynamics and fertility in a
								sandy loam</td>
							<td>1938</td>
						</tr>
						<tr>
							<td><A href="http://www.era.rothamsted.ac.uk/Other#SEC10">Woburn
									Market Garden</a></td>
							<td>W/RN/4</td>
							<td>Originally, effects of organic inputs (FYM, compost and
								sewage sludge) on soil and crop yield. Later the effects of
								heavy metals, added in the sewage sludge, were investigated.
								Part of the experiment was moved in 2005. The experiment was put
								under grass in 2006.</td>
							<td>1942</td>
						</tr>
						<tr>
							<td><A href="http://www.era.rothamsted.ac.uk/Other#SEC11">Woburn
									Long-term sludge </a></td>
							<td>W/CS/427, 428 & 439<b></b>
							</td>
							<td>Effects of heavy metals contained in sewage sludge on soil
								fertility, crop quality and microbial activity.</td>
							<td>1994</td>
						</tr>
						<tr>
							<td><A href="http://www.era.rothamsted.ac.uk/Other#SEC12">Woburn
									Organic Manuring</a></td>
							<td>W/RN/12</td>
							<td>Effects of organic manures and grass leys on soil fertility,

								organic matter and crop production</td>
							<td>1964</td>
						</tr>

						<tr>
							<td><A href="http://www.era.rothamsted.ac.uk/Other#SEC13">Amounts
									of straw </a></td>
							<td>R/CS/326 & W/CS/326</td>
							<td>Effects of straw incorporation on soil organic matter
								dynamics, soil structure and fertility in a silty clay loam
								(Rothamsted) and sandy loam soil (Woburn). The experiments
								finished in 2017.</td>
							<td>1987-2017</td>
						</tr>

						<tr>
							<td><A href="http://www.era.rothamsted.ac.uk/Other#SEC14">Continuous
									maize </a></td>
							<td>R/CS/477 & W/CS/478</td>
							<td>Effects of different organic matter inputs (maize tops vs
								cereal stubble) on soil organic matter dynamics and fertility in
								a silty clay loam (Rothamsted) and a sandy loam (Woburn). The
								experiments finished in 2015</td>
							<td>1997-2015</td>
						</tr>


						<tr>
							<td><a href="http://www.era.rothamsted.ac.uk/Other#SEC17">Long-term
									Liming</a></td>
							<td>R/CS/10 & W/CS/10</td>
							<td>Effects of liming on crop yields in heavy soil (Rothamsted)
								and light sandy soil (Woburn). Since 1997 the Rothamsted plots
								have been in grass; the Woburn experiment is discontinued.</td>
							<td>1962-1997</td>
						</tr>

						<tr>
							<td><a href="http://www.era.rothamsted.ac.uk/Other#SEC18">Intensive
									cereals</a></td>
							<td>W/RN/13</td>
							<td>One of the first experiments to demonstrate the problem
								associated with soil acidification on cereal production
								following long-term use of ammonium fertilisers. Winter wheat
								and spring barley, Stackyard. Also known as the Woburn
								Continuous Wheat and Barley experiments.</td>
							<td>1876-1990</td>
						</tr>
					</table>


					<p>
						For more details, refer to the <b>Key References</b> listed at the
						end of the brief description of each experiment. Data from these
						experiments is not currently available from e-RA. For more details
						of what data is available and how to access it, please contact the
						<a href="mailto:era@rothamsted.ac.uk" target="_blank"> e-RA
							Curators</a>.
					
					
					<p>With thanks to Andy Macdonald, Paul Poulton and Steve McGrath.</P>
					</P>

				</div>

				<div class="tab-pane" id="images" role="tabpanel"
					aria-labelledby="images-tab">
														</div>

				<div class="tab-pane  pb-3" id="keyrefs" role="tabpanel"
					aria-labelledby="keyrefs-tab">
														</div>


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

<!--  include here the page dependant scripts -->
</body>

</html>

