
<div id="idExpt">
	<div class="row mx-0 px-0">
		<p class="devnote">Timeline is done either online at timeline.js
			using the timeline tool - eventually we would want to have the
			timeline code and json locally</p>
		<iframe
			src='https://cdn.knightlab.com/libs/timeline3/latest/embed/index.html?source=1X4Mip5b5PqOUlXn14qclau7_l6OGCWhM4Paa8CLXGs0&font=Default&lang=en&initial_zoom=2&height=460'
			width='100%' height='460' webkitallowfullscreen mozallowfullscreen
			allowfullscreen frameborder='0'></iframe>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<div class="card card-summary">
				<div class="card-header">
					<h2 class="card-header">Summary</h2>
				</div>
				<div class="card-body devnote">database and built with either
					php or js/ajax. The button will download the different values
					provided on this page as a reusable file.</div>
				<div class="card-body">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><b>Location: </b> Value</li>
						<li class="list-group-item"><b>Latitude: </b> Value</li>
						<li class="list-group-item"><b>Longitude: </b> Value</li>
						<li class="list-group-item"><b>Altitude: </b> Value</li>
						<li class="list-group-item"><b>GB Grid Reference: </b> Value</li>
						<li class="list-group-item"><b>Plot sizes: </b> Value</li>
						<li class="list-group-item"><b>Plot sizes: </b> Value</li>
						</li>
					</ul>
				</div>
				<div class="card-footer text-center">
					<a href="<?php echo $det;?>" class="card-link btn btn-primary">Download</a>
				</div>
			</div>
		</div>
		<div class="col-sm-9">

			<div class="row">
				<div class="col-12 py-3">
					<ul class="nav nav-tabs nav-fill text-body ">
						<li class="nav-item active"><a class="nav-link active"
							id="summary-tab" data-toggle="tab" href="#summary">About</a></li>
						<li class="nav-item"><a class="nav-link" id="data-tab"
							data-toggle="tab" href="#data">Datasets</a></li>
						<li class="nav-item"><a class="nav-link" id="soil-tab"
							data-toggle="tab" href="#soil">Site and Soils</a></li>
						<li class="nav-item"><a class="nav-link" id="plot-tab"
							data-toggle="tab" href="#plots">Plots</a></li>
						<li class="nav-item"><a class="nav-link" id="treatments-tab"
							data-toggle="tab" href="#treatments">Treatments</a></li>
						<li class="nav-item"><a class="nav-link" id="varieties-tab"
							data-toggle="tab" href="#varieties">Varieties</a></li>

						<li class="nav-item"><a class="nav-link" id="ref-tab"
							data-toggle="tab" href="#ref">References</a></li>
						<li class="nav-item"><a class="nav-link" id="slide-tab"
							data-toggle="tab" href="#slides">Images</a></li>
					</ul>

					<div class="tab-content mh-100">
						<div class="tab-pane active" id="summary" role="tabpanel"
							aria-labelledby="summary-tab">
							<h1>Experiment Name</h1>
							<p>A summary of the experiment: If we want some formating, we
								could have this in a file somewhere, but with reference in the
								database:</p>
							<p class="devnote">the menu above could also be built with
								PHP depending of the presence of not of the data we need</p>
						</div>


						<div class="tab-pane" id="data" role="tabpanel"
							aria-labelledby="data-tab">
							<h1>Datasets Available</h1>
							<div class="devnote">
								<p class="devnote">For each experiment, there will be some
									datasets extracted and displayed here</p>
							</div>
							<div class="row flex-row flex-nowrap">
								<div class="col-sm-4">
									<div class="card text-white bg-info mb-3">
										<div class="card-body">
											<img class="card-img-top"
												src="images/squares/broadbalk2003.jpg" alt="Card image cap"
												width="100%" />
											<h5 class="card-title">Name of Dataset</h5>
											<h6 class="card-subtitle">1852-2016</h6>
											<p class="card-text">
												<small class="text-muted">Dataset Summary</small>
											</p>
										</div>
										<div class="card-footer text-center">
											<a href="dataset.php?doi" class="card-link btn btn-primary">More
												info... </a>

										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="card text-white bg-info mb-3">
										<div class="card-body">
											<img class="card-img-top"
												src="images/squares/broadbalk2003.jpg" alt="Card image cap"
												width="100%" />
											<h5 class="card-title">Name of Dataset</h5>
											<h6 class="card-subtitle">1852-2016</h6>
											<p class="card-text">
												<small class="text-muted">Dataset Summary</small>
											</p>
										</div>
										<div class="card-footer text-center">

											<a href="dataset.php?doi" class="card-link btn btn-primary">More
												info... </a>

										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="card text-white bg-info mb-3">
										<div class="card-body">
											<img class="card-img-top"
												src="images/squares/broadbalk2003.jpg" alt="Card image cap"
												width="100%" />
											<h5 class="card-title">Name of Dataset</h5>
											<h6 class="card-subtitle">1852-2016</h6>
											<p class="card-text">
												<small class="text-muted">Dataset Summary</small>
											</p>
										</div>
										<div class="card-footer text-center">

											<a href="dataset.php?doi" class="card-link btn btn-primary">More
												info... </a>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="slides" role="tabpanel"
							aria-labelledby="slide-tab">
							<h1>Images related to Experiment</h1>
							<div class="devnote">
								<p class="devnote">Here the images are displayed as a
									carrousel. Click on image could bring up a full size version as
									a modal with download option</p>
							</div>
							<div id="experimentCarousel" class="carousel slide"
								data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#experimentCarousel" data-slide-to="0"
										class="active"></li>
									<li data-target="#experimentCarousel" data-slide-to="1"></li>
									<li data-target="#experimentCarousel" data-slide-to="2"></li>
									<li data-target="#experimentCarousel" data-slide-to="3"></li>
								</ol>
								<!-- Wrapper for slides -->
								<div class="carousel-inner">
									<div class="item active">
										<img src="<?=$metadata?>aerialhoosfield.jpg"
											alt="Hoosfield aerial view"
											style="height: 400px; margin: auto;">
										<div class="carousel-caption">
											<h3>Hoosfield aerial view</h3>
										</div>
									</div>
									<div class="item">
										<img src="images/banners/hoosfield.jpg" alt="Hoosfield"
											style="height: 400px; margin: auto;">
										<div class="carousel-caption">
											<h3>Hoosfield - since 1852</h3>
											<p>Spring barley</p>
										</div>
									</div>
									<div class="item">
										<img src="<?=$metadata?>hoosfield1925.gif" alt="Hoosfield 192"
											style="height: 400px; margin: auto;">
										<div class="carousel-caption">
											<h3>Hoosfield 1920</h3>
										</div>
									</div>
									<div class="item">
										<img src="<?=$metadata?>hoosfieldplan2008.jpg"
											alt="Hoosfield 2008 plan"
											style="height: 400px; margin: auto;">
										<div class="carousel-caption">
											<h3>Hoosfield 2008 plan</h3>
										</div>
									</div>
								</div>
								<!-- Left and right controls -->
								<a class="left carousel-control" href="#experimentCarousel"
									data-slide="prev"> <span
									class="glyphicon glyphicon-chevron-left"></span> <span
									class="sr-only">Previous</span>
								</a> <a class="right carousel-control" href="#experimentCarousel"
									data-slide="next"> <span
									class="glyphicon glyphicon-chevron-right"></span> <span
									class="sr-only">Next</span>
								</a>
							</div>
						</div>

						<div class="tab-pane" id="soil" role="tabpanel"
							aria-labelledby="soil-tab">

							<h1>Soil details</h1>
							<p class="devnote">Can all this go in database? Does it
								change overtime? Keep main value and point to reference,
								summarize in quick note</p>
							<UL>
								<li>FAO Classification: Chromic Luvisol (or Alisol)</li>
								<li>U.S. Soil Taxonomy: Aquic (or Typic) Paleudalf</li>
								<li>Soil Survey of England & Wales Group: Stagnogleyic
									paleo-argillic brown earth (Avery, 1980)</li>
								<li>Soil Survey of England & Wales Series: Predominately
									Batcombe Series (Avery and Catt, 1995 � see pop-out soil map
									at top right of this page).
							</UL>
							...
						</div>

						<div class="tab-pane" id="ref" role="tabpanel"
							aria-labelledby="ref-tab">
							<div class="devnote">
								<p class="devnote">References are already in a database, and
									are collated using Keyref keyword. easy to attach the keyrefs
									to the metadata for experiment</p>
							</div>
							<div id="itemRefs">
								<?php 	if ($KeyRef) { 		GetKeyRefs ($KeyRef);	}	?>
							</div>
						</div>
						<div class="tab-pane" id="treatments" role="tabpanel"
							aria-labelledby="treatments">
							<h1>Treatments</h1>
							<div calls="devnote">
								<p class="devnote">There must be a way to represent these
									treatments</p>
							</div>
							<ul class="list-group">

								<li class="list-group-item"><a
									href="<?=$metadata?>Hoosfertilizertrt.pdf" target="_blank">Hoosfield
										fertilizer treatments (pdf)</A></li>
								<li class="list-group-item"><a
									href="<?=$metadata?>Hoosfield varieties.pdf" target="_blank">Hoosfield
										variety and cropping details (pdf)</A></li>
								<li class="list-group-item"><a
									href="<?=$metadata?>HFcropping sequence & N rates, rotation 1968-78.pdf"
									target="_blank">Hoosfield rotation 1968-1978 (pdf)</A></li>
								<li class="list-group-item"><a
									href="<?=$metadata?>Hoosfield N rate sequence.xlsx"
									target="_blank">Hoosfield N rate sequence.xlsx</A></li>
							</ul>
						</div>
						<div class="tab-pane" id="varieties" role="tabpanel"
							aria-labelledby="varieties">
							<h1>Varieties</h1>
							<div calls="devnote">
								<p class="devnote">There must be a way to represent these
									varieties</p>
							</div>
							<ul class="list-group">


								<li class="list-group-item"><a
									href="<?=$metadata?>Hoosfield varieties.pdf" target="_blank">Hoosfield
										variety and cropping details (pdf)</A></li>

							</ul>
						</div>
						<div class="tab-pane" id="plots" role="tabpanel"
							aria-labelledby="plots">
							<h1>Plot Descriptions</h1>
							<p class="devnote">This again looks like a list of plans that
								can be easily stored in a central place and listed in the
								metadata information. Will each plan receive a DOI? They could
								be an eRADOC DOI</p>
							<ul class="list-group">
								<li class="list-group-item"><a
									href="<?=$metadata?>HFplan1852-1967.pdf" target="_blank">Hoosfield
										plan 1852-1967 (pdf)</A></li>
								<li class="list-group-item"><a
									href="<?=$metadata?>HFplan1968-1978.pdf" target="_blank">Hoosfield
										plan 1968-1978 (pdf)</A></li>
								<li class="list-group-item"><a
									href="<?=$metadata?>HFplan1979-2000.pdf" target="_blank">Hoosfield
										plan 1979-2000 (pdf)</A></li>
								<li class="list-group-item"><a
									href="<?=$metadata?>hoosfieldtoday.pdf" target="_blank">Hoosfield
										plan 2001 onwards (pdf)</A></li>
								<li class="list-group-item"><a
									href="http://www.era.rothamsted.ac.uk/eradoc/article/PS-Hoos-Barley-1-20"
									target="_blank">Collection of Plans for the Hoos Barley
										Experiment (eRAdoc)</A></li>

							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

