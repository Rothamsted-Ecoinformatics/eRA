<!DOCTYPE html>
<html>
<head>
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>e-RA:</title>
<base href="http://local-info.rothamsted.ac.uk/eRA/era2018-new/" />

<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description"
	content="e-RA provides a permanent managed database for secure storage of data from Rothamsted's Long-term Experiments, the oldest, continuous agronomic experiments in the world. Together with the accompanying meteorological records, associated documentation and sample archive, it is a unique historical record of experiments that have been measured continuously for over 170 years.">
<meta name="keywords"
	content="experiments, long term experiments, agriculture, datasets, research, fields, yields, weather">
<meta name="robots" content="index, follow, noodp, noydir">
<meta name="googlebot" content="index, follow, noodp">
<meta name="bingbot" content="index, follow, noodp">
<meta name="Slurp" content="index, follow, noodp, noydir">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="revisit-after" content="7 days">
<meta name="author" content="Rothamsted Research">
<!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Raleway:400,800">
<!-- link rel='stylesheet'
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.15.1/css/v4-shims.css">
<link rel="stylesheet"
	href="https://cdn.knightlab.com/libs/timeline3/latest/css/timeline.css"
	title="timeline-styles">

<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
<!--  for the image gallery in images2.php 15/10/2018 -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style-cg.css">
<link rel="stylesheet" href="css/style-map.css">
<!-- Stylesheet for the countries select  -->
<link rel="stylesheet" href="css/bootstrap-select-country.min.css" />
<script src='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css'
	rel='stylesheet' />



<style>
/*
Make bootstrap-select work with bootstrap 4 see:
https://github.com/silviomoreto/bootstrap-select/issues/1135
*/
.dropdown-toggle.btn-default {
	color: #292b2c;
	background-color: #fff;
	border-color: #ccc;
}

.bootstrap-select.show>.dropdown-menu>.dropdown-menu {
	display: block;
}

.bootstrap-select>.dropdown-menu>.dropdown-menu li.hidden {
	display: none;
}

.bootstrap-select>.dropdown-menu>.dropdown-menu li a {
	display: block;
	width: 100%;
	padding: 3px 1.5rem;
	clear: both;
	font-weight: 400;
	color: #292b2c;
	text-align: inherit;
	white-space: nowrap;
	background: 0 0;
	border: 0;
	text-decoration: none;
}

.bootstrap-select>.dropdown-menu>.dropdown-menu li a:hover {
	background-color: #f4f4f4;
}

.bootstrap-select>.dropdown-toggle {
	width: 100%;
}

.dropdown-menu>li.active>a {
	color: #fff !important;
	background-color: #337ab7 !important;
}

.bootstrap-select .check-mark {
	line-height: 14px;
}

.bootstrap-select .check-mark::after {
	font-family: "FontAwesome";
	content: "\f00c";
}

.bootstrap-select button {
	overflow: hidden;
	text-overflow: ellipsis;
}

/* Make filled out selects be the same size as empty selects */
.bootstrap-select.btn-group .dropdown-toggle .filter-option {
	display: inline !important;
}
</style>

</head>
<body>

	<script>
$(document).ready(function(){
	$(".datasetsList").hide();
     $("#RGEXPTrbk1").click(function(){
       if ($("#RGEXPTrbk1").is( ":checked" )) {
            $("#dsrbk1").show();
            } else {
             $("#dsrbk1").hide();
             }
	} );
$("#RGEXPTrpg5").click(function(){
       if ($("#RGEXPTrpg5").is( ":checked" )) {
            $("#dsrpg5").show();
            } else {
             $("#dsrpg5").hide();
             }
	} );


$("#RGEXPTrhb2").click(function(){
       if ($("#RGEXPTrhb2").is( ":checked" )) {
            $("#dsrhb2").show();
            } else {
             $("#dsrhb2").hide();
             }
	} );

$("#RGEXPTrfw3").click(function(){
       if ($("#RGEXPTrfw3").is( ":checked" )) {
            $("#dsrfw3").show();
            } else {
             $("#dsrfw3").hide();
             }
	} );



}


    	);

</script>
	<div class="form-group m-3">
		<label for="RGLTE"><h5>Experiments and/or Met station data required</h5>
		</label>
		<div class="row">
			<div class="col-6">
				<div class="form-check">
					<label class="form-check-label"><input type="checkbox"
						class="form-check-input" id="RGEXPTrbk1" name="RGLTE" value="rbk1">
						Broadbalk </label>
				</div>
				<div class="datasetsList " id="dsrbk1">

					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKYIELD"> <label class="form-check-label" for="RGDS">
							BKYIELD (Broadbalk wheat yields 1844-1925)</label>
					</div>

					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKYIELD"> <label class="form-check-label" for="RGDS">BKYIELD_F
							(Broadbalk wheat yields 1926-1953)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKYIELD_F85"> <label class="form-check-label" for="RGDS">BKYIELD_F85
							(Broadbalk wheat yields 1954-1967)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKYIELD_R85"> <label class="form-check-label" for="RGDS">BKYIELD_R85
							(Broadbalk wheat yields 1968-2017)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKBEANS"> <label class="form-check-label" for="RGDS">BKBEANS
							(Broadbalk beans yields 1968-1978)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKFMAIZE"> <label class="form-check-label" for="RGDS">BKFMAIZE
							(Broadbalk maize yields 1997-2017)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKOATS"> <label class="form-check-label" for="RGDS">BKOATS
							(Broadbalk oats yields 1996-2017)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKPOTATO"> <label class="form-check-label" for="RGDS">BKPOTATO
							(Broadbalk potato yields 1968-1996)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKWHNUTRI"> <label class="form-check-label" for="RGDS">BKWHNUTRI
							(Broadbalk wheat crop nutrient data 1968-2013)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKOATNUTRI"> <label class="form-check-label" for="RGDS">BKOATNUTRI
							(Broadbalk oat crop nutrient data 1996-2013)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKBEANNUTRI"> <label class="form-check-label" for="RGDS">BKBEANNUTRI
							(Broadbalk beans crop nutrient data 1968-1978)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKMAIZNUTRI"> <label class="form-check-label" for="RGDS">BKMAIZNUTRI
							(Broadbalk maize crop nutrient data 1997-2013)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKPOTSNUTRI"> <label class="form-check-label" for="RGDS">BKPOTSNUTRI
							(Broadbalk potato crop nutrient data 1968-96)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKWEEDS_FAL"> <label class="form-check-label" for="RGDS">BKWEEDS_FAL
							(Broadbalk weed surveys 1933-1967)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKWEEDS_ROT"> <label class="form-check-label" for="RGDS">BKWEEDS_ROT
							(Broadbalk weed surveys 1968-1979)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKWEEDS_SUM"> <label class="form-check-label" for="RGDS">
							BKWEEDS_SUM (Broadbalk weed surveys summary 1991-2014)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKWEEDS_PLOT"> <label class="form-check-label" for="RGDS">BKWEEDS_PLOT
							(Broadbalk weed surveys by plot 1991-2014)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKDISEASE"> <label class="form-check-label" for="RGDS">BKDISEASE
							(Broadbalk disease data 1968-2009)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="BKGR_QUALITY"> <label class="form-check-label" for="RGDS">BKGR_QUALITY
							(Broadbalk Grain Quality for 1974-2016)</label>
					</div>
				</div>
				<div class="form-check">
					<label class="form-check-label"><input type="checkbox"
						class="form-check-input" id="RGEXPTrpg5" name="RGLTE" value="rpg5">
						Park Grass </label>
				</div>
				<div class="datasetsList" id="dsrpg5">

					<div class="form-check  ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="PARKYIELD"> <label class="form-check-label" for="RGDS">PARKYIELD
							(Park Grass yields 1856-1959)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="PGHAYEQUIV"> <label class="form-check-label" for="RGDS">PGHAYEQUIV
							(Park Grass yields 1960-2017)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="PARKCOMP"> <label class="form-check-label" for="RGDS">PARKCOMP
							(Park Grass botanical surveys-complete separations of hay
							samples, selected years 1862-1976)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="PARKPARTCOMP"> <label class="form-check-label" for="RGDS">PARKPARTCOMP
							(Park Grass botanical surveys-partial separations of hay samples,
							selected years 1862-1976)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="PARKCOMPIC"> <label class="form-check-label" for="RGDS">PARKCOMPIC
							(Park Grass botanical surveys carried out by Imperial College
							1991-2000)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="PARKINSECTS"> <label class="form-check-label" for="RGDS">PARKINSECTS
							(Park Grass insect surveys 1977-1978)</label>
					</div>

				</div>

				<div class="form-check">
					<label class="form-check-label"><input type="checkbox"
						class="form-check-input" id="RGEXPTrhb2" name="RGLTE" value="rhb2">
						Hoosfield Spring Barley Experiment </label>
				</div>
				<div class="datasetsList" id="dsrhb2">

					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="HOOSYIELD"> <label class="form-check-label" for="RGDS">HOOSYIELD
							(Hoosfield barley yields 1852-1952 (fallow 1953))</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="HOOSYIELD1"> <label class="form-check-label" for="RGDS">HOOSYIELD1
							(Hoosfield barley yields 1954-1957)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="HOOSYIELD2"> <label class="form-check-label" for="RGDS">HOOSYIELD2
							(Hoosfield barley yields 1958-1966 (fallow 1967))</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="HOOSYIELD3"> <label class="form-check-label" for="RGDS">HOOSYIELD3
							(Hoosfield barley yields 1968-1993)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="HOOSYIELD4"> <label class="form-check-label" for="RGDS">HOOSYIELD4
							(Hoosfield barley yields 1994-2002)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="HOOSYIELD5"> <label class="form-check-label" for="RGDS">HOOSYIELD5
							(Hoosfield barley yields 2003-2016)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="HFBNUTRI"> <label class="form-check-label" for="RGDS">HFBNUTRI
							(Hoosfield barley crop nutrient data, 1964 and 1966)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="HFNUTRIMAIN"> <label class="form-check-label" for="RGDS">HFNUTRIMAIN
							(Hoosfield barley crop nutrient data MAIN PLOTS, 1970 - 2010)</label>
					</div>

				</div>
				<div class="form-check">
					<label class="form-check-label"><input type="checkbox"
						class="form-check-input" id="RGEXPTrfw3" name="RGLTE" value="rwf3">
						Alternate Wheat and Fallow </label>
				</div>
				<div class="datasetsList" id="dsrfw3">

					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="WHEATFAL"> <label class="form-check-label" for="RGDS">WHEATFAL
							(Yields from the alternate wheat/fallow experiment 1856-1956)</label>
					</div>
					<div class="form-check ml-5">
						<input type="checkbox" class="form-check-input" name="RGDS"
							value="FALWHEAT"> <label class="form-check-label" for="RGDS">FALWHEAT
							(Yields from the alternate wheat/fallow experiment 1957-2015)</label>
					</div>

				</div>
			</div>
			<div class="col-6">
				<div class="form-check">
					<label class="form-check-label"><input type="checkbox"
						class="form-check-input" id="RGEXPTrms" name="RGLTE"
						value="rothmet">ROTHMET (Rothamsted Met Station) </label>
				</div>
				<div class="form-check">
					<label class="form-check-label"><input type="checkbox"
						class="form-check-input" id="RGEXPTbms" name="RGLTE"
						value="bromet">BROMET (Brooms Barn Met Station) </label>
				</div>
				<div class="form-check">
					<label class="form-check-label"><input type="checkbox"
						class="form-check-input" id="RGEXPTwms" name="RGLTE"
						value="wobmet">WOBMET (Woburn Met Station) </label>
				</div>

			</div>
		</div>
		<small id="infoHelp" class="form-text text-muted">Check all the
			relevant Experiments and datasets</small>

</body>
</html>
