<?php
  session_start();
  /* to be stored
  $purchase_Date_d;						//from html
  $item_name_d;							//from html
  $item_type_d;							//select from struct table
  $item_unit_d;							//select from struct table
  $purchase_amount_d = $_POST["select_purchace_amount"];// from html
  $current_price_d;						//select from struct table
  $status;								// generate from purchased date and struct table
  $expire_date;							// generate from purchased date and struct table
  */
  $purchase_Date_d = $_POST["select_purchase_date"]; // from html
  $item_name_d = $_POST["select_item_name"];		 //	from html
  $purchase_amount_d = $_POST["select_purchace_amount"];// from html
  $current_price_d;						// select from struct table
  $status = "valid";					// generate from purchased date and struct table
  $expire_date;							// generate from purchased date and struct table
  $item_type_d;							// gather the selected item information from inven_struct table

  $duration;							// get the duration from the struct table
  $total_cost;							// calculate the total cost to pay

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");

  $item_type_sql = "SELECT item_type FROM inventory_struct_table WHERE item_name='$item_name_d'";
  $result = mysqli_query($conn, $item_type_sql);
  $_POST = mysqli_fetch_assoc($result);
  $item_type_d = $_POST['item_type'];

  $item_unit_sql = "SELECT item_unit FROM inventory_struct_table WHERE item_name='$item_name_d'";
  $result = mysqli_query($conn, $item_unit_sql);
  $_POST = mysqli_fetch_assoc($result);
  $item_unit_d = $_POST['item_unit'];

  $current_price_sql = "SELECT current_price FROM inventory_struct_table WHERE item_name='$item_name_d'";
  $result = mysqli_query($conn, $current_price_sql);
  $_POST = mysqli_fetch_assoc($result);
  $current_price_d = $_POST['current_price'];

  $duration_date_sql = "SELECT duration_date FROM inventory_struct_table WHERE item_name='$item_name_d'";
  $result = mysqli_query($conn, $duration_date_sql);
  $_POST = mysqli_fetch_assoc($result);
  $duration = $_POST['duration_date'];
  $adddays = "SELECT date_add('$purchase_Date_d', INTERVAL $duration DAY) as required_date;";
  $result = mysqli_query($conn, $adddays);
  $_POST = mysqli_fetch_assoc($result);
  $expire_date = $_POST['required_date'];

  $total_cost = $purchase_amount_d * $current_price_d;

?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>International Restaurant &mdash; Welcome to Our Restaurant</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">

  <!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="../css/flexslider.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<div class="fh5co-loader"></div>
	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.html">International Restaurant<span>.</span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li class="has-dropdown">
								<a href="order.html">Order</a>
								<ul class="dropdown">
									<li><a href="#">For Here</a></li>
									<li><a href="#">To Go</a></li>
								</ul>
							</li>
							<li><a href="reservation.html">Reservation</a></li>
							<li class="has-dropdown">
								<a href="advertisement.html">Advertisement</a>
								<ul class="dropdown">
									<li><a href="#">Event</a></li>
									<li><a href="#">Survey</a></li>
								</ul>
							</li>
							<li><b href="Inventory.html">Inventory</b></li>
							<li><a href="contact.html">Contact</a></li>
							<li class="btn-cta"><a href="../php/logout.php"><span>Sign out</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div id="fh5co-blog" class="fh5co-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<div class="fh5co-blog animate-box">
						<a href="#"><img class="img-responsive" src="images/project-4.jpg" alt=""></a>
						<div class="blog-text">
							<span class="posted_on">display summary order</span>
							<span class="comment"><a href=""><i class="icon-speech-bubble"></i></a></span>
								<?php

									echo "<td> item purchased date : </td>";
									echo "<td> $purchase_Date_d <br/></td>";

									echo "<td> amount bought:	<td>";
									echo "<td> $purchase_amount_d <br/><td>";

									echo "<td> item name : </td>";
									echo "<td> $item_name_d <br/></td>";

									echo "<td> item type : </td>";
									echo "<td> $item_type_d <br/></td>";

									echo "<td> total cost : </td>";
									echo "<td> $total_cost dollars <br/></td>";

									echo "<td> item expires : </td>";
									echo "<td> $expire_date <br/></td>";
									$insert_sql = "INSERT INTO inventory_table( purchase_Date, item_name, item_type, item_unit, amount, current_price, status, expire_date) VALUES( '$purchase_Date_d', '$item_name_d', '$item_type_d', '$item_unit_d', '$purchase_amount_d', '$current_price_d', '$status', '$expire_date')";
									mysqli_query($conn, $insert_sql);

								?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-9 animate-box">
					<form action="../inventory.html" method="POST">
						<div class="form-group">
							<p align = "center">
								<input type="submit" value=" go back to inventory" class="btn btn-primary">
							</p>
						 </div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-3 fh5co-widget">
					<h4>International Restaurant</h4>
					<p>Explain about Restaurant</p>
				</div>
				<div class="col-md-3 col-md-push-1">
					<h4>Navigation</h4>
					<ul class="fh5co-footer-links">
						<li><a href="index.html">Home</a></li>
						<li><a href="order.html">Order</a></li>
						<li><a href="reservation.html">Reservation</a></li>
						<li><a href="advertisement.html">Advertisement</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>

				<div class="col-md-3 col-md-push-1">
					<h4>Contact Information</h4>
					<ul class="fh5co-footer-links">
						<li>1217 8th St, Brookings, SD</li>
						<li><a href="tel://1234567920">+1 6056912499</a></li>
						<li><a href="mailto:drunkencodeinc@gmail.com">drunkencodeinc@gmail.com</a></li>
						<li><a href="http://localhost/index.html">InternationalRestaurant.com</a></li>
					</ul>
				</div>

				<div class="col-md-3 col-md-push-1">
					<h4>Opening Hours</h4>
					<ul class="fh5co-footer-links">
						<li>Mon - Thu: 9:00 - 21 00</li>
						<li>Fri 8:00 - 21 00</li>
						<li>Sat 9:30 - 15: 00</li>
					</ul>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2016 International Restaurant. All Rights Reserved.</small>
						<small class="block">Designed by <a href="#" target="_blank">DrunkencodeInc.</a> </small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

  <!-- jQuery -->
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="../js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="../js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="../js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="../js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/magnific-popup-options.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="../js/google_map.js"></script>
	<!-- Main -->
	<script src="../js/main.js"></script>

	</body>
</html>
