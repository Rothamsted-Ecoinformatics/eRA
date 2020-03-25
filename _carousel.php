<?php
/**
 * @file _carousel.php
 * @brief module that displays the home page carousel of banners.
 *
 * @author Nathalie Castells-Brooke
 * @date 9/27/2018
 */
?>
<div id="carouselIndexIndicators" class="carousel slide mx-0 px-0"
	data-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item  active">
			<a href="updates.php"> <img class="d-block w-100"
				src="images/banners/overview.jpg" alt="latest"></a>
			<div class="carousel-caption d-none d-md-block">
				<h2>News and Updates</h2>
				<p>The latest in eRA and the Long Term experiments</p>
			</div>
		</div>
		<div class="carousel-item">
			<a href="expt.php?expt=rbk1"> <img class="d-block w-100"
				src="images/banners/Broadbalk-02.jpg" alt="Second slide"></a>
			<div class="carousel-caption d-none d-md-block">
				<h2>Broadbalk</h2>
				<p>More than 175 years of data on 
			</div>
		</div>
		<div class="carousel-item">
		<a href="expt.php?expt=rpg5"> 
			<img class="d-block w-100" src="images/banners/Park-Grass.jpg"
				alt="All about Park Grass">
			<div class="carousel-caption d-none d-md-block">
				<h2>Park Grass</h2>
				<p>150 years of ecological studies</p>
			</div>
		</div>
		<div class="carousel-item">
			<a href="expt.php?expt=rhb2"><img class="d-block w-100" src="images/banners/hoosfield.jpg"
				alt="Hoosfield"></a>
			<div class="carousel-caption d-none d-md-block">
				<h2>Hoosfield</h2>
				<p>Experiments on Barley</p>
			</div>
		</div>
		<div class="carousel-item">
			<a href="expt.php?expt=rgc8">
			<img class="d-block w-100" src="images/banners/Gees-Croft.jpg"
				alt="Gees-Croft"></a>
			<div class="carousel-caption d-none d-md-block">
				<h2>Gees-Croft</h2>
			</div>
		</div>

	</div>
	<a class="carousel-control-prev" href="#carouselIndexIndicators"
		role="button" data-slide="prev"> <span
		class="carousel-control-prev-icon" aria-hidden="true"></span> <span
		class="sr-only">Previous</span>
	</a> <a class="carousel-control-next" href="#carouselIndexIndicators"
		role="button" data-slide="next"> <span
		class="carousel-control-next-icon" aria-hidden="true"></span> <span
		class="sr-only">Next</span>
	</a>
</div>