<?php
	include_once("connect.php");
	session_start();
    if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
		header("Location: login.php");
	}
	$id = $_GET['id'];
	if (isset($_GET['id'])) {
		$queryedit = "SELECT * FROM `events`, `category`, `artists` WHERE `category`.`id` = `events`.`category_id` AND `artists`.`id` = `events`.`singer` AND `events`.`id` = $id";
		$resultedit = mysqli_query($connect, $queryedit);
		$rowedit = mysqli_fetch_assoc($resultedit);
		if (isset($_POST['publish']) && $_FILES['poster']['error'] == 0) {
			$title = addslashes($_POST['title']);        
			$category_id = $_POST['category'];        
			$date = $_POST['date'];
			$artist = $_POST['artist'];
			$price = $_POST['price'];
			$places = $_POST['places'];	
			$link = addslashes($_POST['link']);	
			$description = addslashes($_POST['description']);	
			if(empty($_FILES['poster']['tmp_name'])) {
				$posterName = $_POST['poster'];
				$queryImgEdited = "UPDATE `events` SET `title` = '$title', `singer` = '$artist', `category_id` = '$category_id', 
				`poster` = '$posterName', `date` = '$date', `price` = '$price', `places` = '$places', `description` = '$description', `link` = '$link' WHERE `id` = $id";
				$resultImgEdited = mysqli_query($connect, $queryImgEdited);
				if ($resultImgEdited == true) {
					header("Location: organize.php");
				} else { 
					echo "Error with the query";
				}
			} else {
				$posterName = rand(1, 99).$_FILES['poster']['name'];
				$queryImgEdited = "UPDATE `events` SET `title` = '$title', `singer` = '$artist', `category_id` = '$category_id', 
				`poster` = '$posterName', `date` = '$date', `price` = '$price', `places` = '$places', `description` = '$description', `link` = '$link' WHERE `id` = $id";
				$resultImgEdited = mysqli_query($connect, $queryImgEdited);
				$poster_tmp_place = $_FILES['poster']['tmp_name'];
				$poster_place = $_SERVER['DOCUMENT_ROOT'].'/img/'.$posterName;
				move_uploaded_file($poster_tmp_place, $poster_place);
				if ($resultImgEdited == true) {
					header("Location: organize.php");
				} else "Error with the query";
			}
		}
	}
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
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Offcanvas Menu Section -->
	<?php
        include_once("block/offcanvasmenu.php");
    ?>
	<!-- Offcanvas Menu Section end -->
    <section class="blog-details">
		<div class="container">
			<div class="single-blog-page">
				<div class="comment-form">
					<h3>Change the details of the event</h3>
					<form action="" method="POST">
						<div class="row">
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Title of the event:</label>
								<input type="text" placeholder="Title" name="title" value="<?=$rowedit['title']?>">
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Artist:</label>
                                <select class="custom-select my-1" id="inputGroupSelect01" name="artist">
									<option value="<?=$rowedit['singer']?>"><?=$rowedit['artist']?></option>
								<?php
                                   $queryartist = "SELECT * FROM `artists` WHERE `artists`.`id` != $id AND `artist` != 'admin'";
                                   $resultartist = mysqli_query($connect, $queryartist);
                                   while($rowartist = mysqli_fetch_assoc($resultartist)) {
                                ?>
                                    <option value="<?=$rowartist['id']?>"><?=$rowartist['artist']?></option>
                                <?php
                                    }
                                ?>
                                </select>
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Category:</label>
                                <select class="custom-select my-1" id="inputGroupSelect01" name="category">
									<option value="<?=$rowedit['category_id']?>"><?=$rowedit['name']?></option>
								<?php
                                   $querycat = "SELECT * FROM `category` WHERE `category`.`id` != $id";
                                   $resultcat = mysqli_query($connect, $querycat);
								   print_r($resultcat);
                                   while($rowcat = mysqli_fetch_assoc($resultcat)) {
                                ?>
                                    <option value="<?=$rowcat['id']?>"><?=$rowcat['name']?></option>
                                <?php
                                    }
                                ?>
                                </select>
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Poster:</label>
								<input type="file" class="p-2" placeholder="Poster" name="poster" value="<?=$rowedit['poster']?>">
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Date:</label>
								<input type="date" placeholder="Date" name="date" value="<?=$rowedit['date']?>">
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Price of the ticket($):</label>
								<input type="number" placeholder="Price" min="0" max="1000" name="price" value="<?=$rowedit['price']?>">
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Number of places:</label>
								<input type="number" placeholder="Places" min="0" max="10000" name="places" value="<?=$rowedit['places']?>">
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Link:</label>
								<input type="text" placeholder="Link" name="link" value="<?=$rowedit['link']?>">
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1" class="form-label">Description of the event:</label>
								<textarea placeholder="Description" name="description"><?=$rowedit['description']?></textarea>
								<button type="submit" name="Done">Done</button>
							</div>
						</div>
					</form>
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