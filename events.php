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
	<link rel="stylesheet" href="css/style.css">


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
	<section class="blog-section">
		<div class="nice-scroll">
			<div class="blog-grid-warp">
				<div class="blog-grid-sizer"></div>
				<?php
                    include_once("connect.php");
                    $query = "SELECT `price`, `name`, `poster`, `places`, `title`, `date`, `events`.`id` AS `getid` FROM `events`, `category` WHERE `events`.`category_id` = `category`.`id` ORDER BY `date`";
                    $result = mysqli_query($connect, $query);
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="blog-grid">
					<div class="blog-item">
						<img src="img/<?=$row["poster"]?>">
						<div class="bi-tag"><?=$row["name"]?></div>
						<div class="bi-text">
							<div class="bi-date"><?=$row["date"]?> | <?=$row['places']?> Places</div>
							<h3><a href="reg.php?id=<?=$row['getid']?>"><?=$row["title"]?> | Get tickets</a></h3>
                        </div>
					</div>
				</div>
                <?php
                    }
                ?>
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
