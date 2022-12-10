<?php
	include_once("connect.php");
	$receivedId = $_GET['id'];
	$querySelected = "SELECT * FROM `events`, `category`, `artists` WHERE `events`.`category_id` = `category`.`id` AND `events`.`singer` = `artists`.`id` AND `events`.`id` = $receivedId";
	$resultSelected = mysqli_query($connect, $querySelected);
	$rowSelected = mysqli_fetch_assoc($resultSelected);
	$total = "SELECT COUNT(id) AS 'total' FROM `artists`";
	$totalconnect = mysqli_query($connect, $total);
	$rowtotal = mysqli_fetch_assoc($totalconnect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>VHype Virtual Concerts</title>
	<meta charset="UTF-8">
	<meta name="description" content="Tulen Photography HTML Template">
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

	<!-- Blog Section end -->
	<section class="blog-details">
		<div class="container">
			<div class="single-blog-page">
				<div class="blog-metas">
					<div class="blog-meta">Upcoming concert</div>
					<div class="blog-meta"><?=$rowSelected['date']?></div>
				</div>
				<h2><?=$rowSelected['artist']?></h2>
				<div class="blog-thumb">
					<div class="thumb-cata"><?=$rowSelected['artist']?></div>
					<img src="img/<?=$rowSelected['img']?>" alt="">
				</div>
				<p><?=$rowSelected['about'];?>
				<div class="row pt-5">
					<div class="col-lg-6 mb-4">
					</div>
					<div class="col-lg-6 mb-5 text-left text-md-right">
						<div class="post-share">
							<span>Share:</span>
							<a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
							<a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
							<a href="https://www.snapchat.com/"><i class="fa fa-snapchat"></i></a>
							<a href="https://instagram.com/"><i class="fa fa-instagram"></i></a>
							<a href="https://www.google.com/gmail/about/"><i class="fa fa-envelope"></i></a>
							<!-- <a href="#"><i class="fa fa-google-plus"></i></a> -->
						</div>
					</div>
				</div>
				<div class="blog-navigation">
					<div class="row m-0">
						<?php
							if($receivedId == 1) {
								$random2 = $receivedId +2;
							} else {
								$random2 = $receivedId -1;
							}
							if ($receivedId == $rowtotal['total']) {
								$random1 = $receivedId -2;
							} else {
								$random1 = $receivedId +1;
							}
							
							
							$queryRand1 = "SELECT  `events`.`id` AS `id`, `img`, `artist`, `name` FROM `events`, `category`, `artists` WHERE `events`.`category_id` = `category`.`id` AND `events`.`singer` = `artists`.`id` AND `events`.`id` = $random1";
							$resultRand1 = mysqli_query($connect, $queryRand1);
							$rowRand1 = mysqli_fetch_assoc($resultRand1);
							$queryRand2 = "SELECT  `events`.`id` AS `id`, `img`, `artist` FROM `events`, `category`, `artists` WHERE `events`.`category_id` = `category`.`id` AND `events`.`singer` = `artists`.`id` AND `events`.`id` = $random2";
							$resultRand2 = mysqli_query($connect, $queryRand2);
							$rowRand2 = mysqli_fetch_assoc($resultRand2);
						
							
						?>
						<div class="col-lg-6 p-0">
							<a href="details.php?id=<?=$rowRand1['id']?>" class="bn-item set-bg" data-setbg="img/<?=$rowRand1['img']?>">
								<h4><i class="ti-arrow-left"></i><?=$rowRand1['artist']?></h4>
							</a>
						</div>
						<div class="col-lg-6 p-0">
							<a href="details.php?id=<?=$rowRand2['id']?>" class="bn-item bn-next set-bg" data-setbg="img/<?=$rowRand2['img']?>">
								<h4><i class="ti-arrow-right"></i><?=$rowRand2['artist']?></h4>
							</a>
						</div>
					</div>
				</div>
				<div class="recent-blog">
					<h3 class="mb-4 pb-2">About Other Artists</h3>
					<div class="row">
						<?php
							$queryRecommended = "SELECT `events`.`id` AS `othersid`, `img`, `artist`, `name` FROM `events`, `category`, `artists` WHERE `events`.`singer` = `artists`.`id` AND `events`.`category_id` = `category`.`id` AND `events`.`id` != $receivedId LIMIT 0,3";
							$resultRecommended = mysqli_query($connect, $queryRecommended);
							while($rowRecommended = mysqli_fetch_assoc($resultRecommended)){
						?>
						<div class="col-lg-4">
							<div class="blog-item rp-item set-bg" data-setbg="img/<?=$rowRecommended['img']?>">
								<div class="bi-tag"><?=$rowRecommended['name']?></div>
								<div class="bi-text">
									<h3><a href="details.php?id=<?=$rowRecommended['othersid']?>"><?=$rowRecommended['artist']?></a></h3>
								</div>
							</div>
						</div>
						<?php
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog Section end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/pana-accordion.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
