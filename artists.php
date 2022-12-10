<?php
	include_once("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>VHype Virtual Concerts</title>
	<meta charset="UTF-8">
	<meta name="description" content="Tulen Photography HTML Template"">
	<meta name="keywords" content="photo, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/themify-icons.css"/>
	<link rel="stylesheet" href="css/accordion.css"/>
	<link rel="stylesheet" href="css/fresco.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>
	<!-- <link rel="stylesheet" href="css/button.css"/> -->


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Offcanvas Menu Section -->
	<?php
        include_once("block/offcanvasmenu.php");
    ?>
	<!-- Offcanvas Menu Section end -->

	<!-- Gallery Section end -->
	<section class="gallery-section">
		<div class="gallery-header">
			<h4>Artists</h4>
			<ul class="gallery-filter">
				<li class="filter all active" data-filter="*">All</li>
				<?php
					$query = "SELECT * FROM `category`";
					$result = mysqli_query($connect, $query);
					while($row = mysqli_fetch_assoc($result)) {
				?> 
					<li class="filter capitalize" data-filter=".<?=$row['name']?>"><?=$row['name']?></li>
				<?php
					}
				?>
			</ul>
		</div>
		<div class="nice-scroll">
			<div class="gallery-warp">
				<div class="grid-sizer"></div>
				
				<?php
					$querysmall = "SELECT `category`.`id` AS 'displayid', `events`.`id` AS `orgid`,`img`,`singer`, `name`, `artist` FROM `category`, `events`, `artists` WHERE `events`.`category_id` = `category`.`id` AND `artists`.`id` = `events`.`singer`";
					$resultsmall = mysqli_query($connect, $querysmall);
					while($rowsmall = mysqli_fetch_assoc($resultsmall)) {
				?>
					<div class="gallery-item <?=$rowsmall['name']?>">
						<a class="fresco" href="img/<?=$rowsmall['img']?>" data-fresco-group="projects">
							<img src="img/<?=$rowsmall['img']?>" alt="">
						</a>
						<div class="gi-hover">
							<h6><?=$rowsmall['artist']?></h6><br>
							<a href="details.php?id=<?=$rowsmall['orgid']?>"><button class="btn btn-dark"><span class="text-light">Read More</span></button></a>
						</div>
					</div>
				<?php
					}
				?>
				</div>
			</div>
		</div>
	</section>
	<!-- Gallery Section end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/pana-accordion.js"></script>
	<script src="js/fresco.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
