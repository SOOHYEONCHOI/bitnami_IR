<?php
  session_start();
  $username_d = $_SESSION["username"];
  $res_ID = $_GET["res_id"];

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
  $sql = "SELECT res_ID, location, res_date, res_time, seat, adults, child from reservation where res_ID = '$res_ID'";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);

  $res_ID = $data["res_ID"];
  $location = $data["location"];
  $res_date = $data["res_date"];
  $res_time = $data["res_time"];
  $seat = $data["seat"];
  $adults = $data["adults"];
  $child = $data["child"];



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
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link rel="stylesheet" href="../css/bootstrap.min.css">

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
		<link rel="stylesheet" href="../css/style_min.css">

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
						<div id="fh5co-logo"><a href="../index.html">International Restaurant<span>.</span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<a href="../index.html">Home</a>
							<li class="has-dropdown">
								<a href="../order.html">Order</a>
								<ul class="dropdown">
									<li><a href="#">For Here</a></li>
									<li><a href="#">To Go</a></li>
								</ul>
							</li>
							<li class="has-dropdown">
								<a href="r../eservation.html">Reservation</a>
								<ul class="dropdown">
									<li><a href="../reservation.html">Create</a></li>
									<li><a href="manage_res.php">Manage</a></li>
								</ul>
							</li>
							<li class="has-dropdown">
								<a href="../advertisement.html">Advertisement</a>
								<ul class="dropdown">
									<li><a href="#">Event</a></li>
									<li><a href="#">Survey</a></li>
								</ul>
							</li>
							<li><a href="../about.html">About</a></li>
							<li><a href="../contact.html">Contact</a></li>
							<li class="btn-cta"><a href="logout.php"><span>Sign out</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<div>

	</div>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="booking-form">
							<form>
								<div class="form-group">
									<span class="form-label">Location of Restaurant</span>
									<select class="form-control" value="<?php echo $location ?>">
										<option>Brookings</option>
										<option>New York</option>
										<option>San Francisco</option>
										<option>Minneapolis</option>
									</select>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Date</span>
											<input class="form-control" type="date" value=" <?php echo $res_date ?>" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Time</span>
											<input class="form-control" type="time" value=" <?php echo $res_time ?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Seat</span>
											<select class="form-control" value="<?php echo $seat ?>">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
												<option>7</option>
												<option>8</option>
												<option>9</option>
												<option>10</option>
												<option>11</option>
												<option>12</option>
												<option>13</option>
												<option>14</option>
												<option>15</option>
												<option>16</option>
												<option>17</option>
												<option>18</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Adults</span>
											<select class="form-control" value="<?php echo $adults ?>">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5+</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Children</span>
											<select class="form-control" value="<?php echo $child ?>">
												<option>0</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>
								<div class="form-btn">
									<p align = "center">
										<button class="btn btn-primary">Comfirm</button>
									</p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div>
   <a> </a>
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
						<li><a href="../index.html">Home</a></li>
						<li><a href="../order.html">Order</a></li>
						<li><a href="../reservation.html">Reservation</a></li>
						<li><a href="../advertisement.html">Advertisement</a></li>
						<li><a href="../contact.html">Contact</a></li>
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
	<!-- Main -->
	<script src="../js/main.js"></script>

	</body>
</html>
