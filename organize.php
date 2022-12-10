<?php
	include_once("connect.php");
	session_start();
	if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
		header("Location: login.php");
	}
	$query = "SELECT `events`.`id` AS 'getid',`title`,`artist`,`img`,`category_id`,`poster`, `date`, `price`, `places`, `category`.`id` AS 'catid', `name` FROM `events`, `category`, `artists` WHERE `category`.`id` = `events`.`category_id` AND `events`.`singer` = `artists`.`id` ORDER BY `events`.`id`";
	$result = mysqli_query($connect, $query);
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
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/table.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<!-- <div id="preloder">
		<div class="loader"></div>
	</div> -->

	<!-- Offcanvas Menu Section -->
	<?php
        include_once("block/offcanvasmenu.php");
    ?>
	<!-- Offcanvas Menu Section end -->
    <section class="blog-details">
		<div class="container">
			<div class="single-blog-page">
				<div class="comment-form">
					<h3>Details about the events</h3>
					
					<div class="card">
						<div class="table-title">
							<h2 class="text-light">All the events</h2>
						</div>
						<div class="button-container"><span>Organize an event ></span>
							</button>
							<a href="create.php">
								<button class="primary" title="Add New Data">
									<svg viewBox="0 0 512 512" width="16" title="plus-circle">
										<path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"></path>
									</svg>
								</button>
							</a>
						</div>
						<div class="table-concept">
							<input class="table-radio" type="radio" name="table_radio" id="table_radio_0" checked="checked"/>
							<div class="table-display">
							</div>
							<table>
								<thead>
									<tr>
										<th>No</th>
										<th>Title</th>
										<th>Artist</th>
										<th>Category</th>
										<th>Date</th>
										<th>Price</th>
										<th>Number of places</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
										while($row = mysqli_fetch_assoc($result)) {
									?>
									<tr>
										<td><?=$row['getid']?></td>
										<td><?=$row['title']?></td>
										<td><?=$row['artist']?></td>
										<td><?=$row['name']?></td>
										<td><?=$row['date']?></td>
										<td><?=$row['price']?></td>
										<td><?=$row['places']?></td>
										<td>
											<a href="delete.php?id=<?=$row['getid']?>">
												<button class="btn btn-danger" title="Delete Selected">
												<svg viewBox="0 0 448 512" width="16" title="trash-alt">
													<path d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path>
												</svg>
											</a>
										</td>
										<td>
											<a href="edit.php?id=<?=$row['getid']?>">
												<button class="btn btn-success" title="Edit Selected">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil text-light" viewBox="0 0 16 16"> 
													<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
												</svg>
											</a>
										</td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

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