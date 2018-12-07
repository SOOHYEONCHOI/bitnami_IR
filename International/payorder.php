<?php
	session_start();
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['pEmail'];
	$phoneNum = $_POST['phonenumber'];
	$nameOcard = $_POST['nameoncard'];
	$cardnum = $_POST['cardnum'];
	$csv = $_POST['csv'];
	$expireM = $_POST['expireMM'];
	$expireD = $_POST['expireDD'];
	
	$digits_needed = 8;
	$random_number = '';
	$count = 0;
	
	#check bank information
	
	
	
	if(empty($fname) or empty($lname) or empty($email) or empty($phoneNum) or empty($nameOcard) or empty($cardnum) or empty($csv) or empty($expireM) or empty($expireD)) {
		echo "<script>window.location.href='payorder.html';alert(\"Please fill all information\");</script>";
	}else {
		if(!ctype_alpha($fname) or !ctype_alpha($lname)) {
			echo "<script>window.location.href='payorder.html';alert(\"Error - first name or last name is invalid\");</script>";
		}else {
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "<script>window.location.href='payorder.html';alert(\"Error - Invalid email\");</script>";
			}else {
				if(!is_numeric($phoneNum)) {
					echo "<script>window.location.href='payorder.html';alert(\"Error - Invalid phone number\");</script>";
				}else {
					if(is_numeric($nameOcard)) {
						echo "<script>window.location.href='payorder.html';alert(\"Error - Invalid Card Holder's Name\");</script>";
					}else {
						if(strlen($cardnum) < 10 || !is_numeric($cardnum)) {
							echo "<script>window.location.href='payorder.html';alert(\"Error - Invalid card number. Please check size and format\");</script>";
						}else {
							if(strlen($csv) < 3 || !is_numeric($csv)) {
								echo "<script>window.location.href='payorder.html';alert(\"Error - Invalid CSV number\");</script>";
							}else {
								if((int)$expireD < 18) {
									echo "<script>window.location.href='payorder.html';alert(\"Error - The card has been expired\");</script>";
								}else if((int)$expireD == 18 and (int)$expireM <= 12) {
									echo "<script>window.location.href='payorder.html';alert(\"Error - The card has been expired\");</script>";
								}else {
									while($count < $digits_needed) {
										$random_digit = mt_rand(0, 9);
										$random_number .= $random_digit;
										$count++;
									}
									$orderID = date("Ymd") .''. $random_number;
									$_SESSION['orderID'] = $orderID;
									
									$conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
									$total_price = $_SESSION['total_price'];
									
									if(!empty($_SESSION['select_food'])) {
										foreach($_SESSION['select_food'] as $eachfood) {
											$u_select = "SELECT menuname, menu_ID FROM menu WHERE menuname = '$eachfood'";
											$u_result = mysqli_query($conn, $u_select);
											$u_data = mysqli_fetch_array($u_result);
											$foodID = $u_data['menu_ID'];
											$u_insert = "INSERT INTO sale (order_ID, username, menu_ID, amount, total_price, estimatedTime, category) VALUES('$orderID', 'guest', '$foodID', 1, '$total_price', 25, 'Order: For Here')";
											$u_result = mysqli_query($conn, $u_insert);
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
	
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
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]-->
	<script src="js/respond.min.js"></script>
	<!-- [endif]-->
	
	<!--menu-->
	<link rel="stylesheet" href="css/menubox.css">

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
							<b href="index.html">Home</b>
							<li class="has-dropdown">
								<a href="order_menu.html">Order</a>
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
							<li><a href="Inventory.html">Inventory</a></li>
							<li><a href="contact.html">Contact</a></li>
							<li class="btn-cta"><a href="signin.html"><span>Sign in</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>

<!-- new one -->
	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				
				<h2>Order Review</h2>

				<div class="row form-group">
					<div class="col-md-12">
						<p>
							<?php
								echo "Order ID:  {$orderID}";
							?>
						</p>
						
						<label for="email">Price for each food</label>
						<p align="right">
							<?php
								foreach($_SESSION['select_food'] as $check){
									$u_sql = "SELECT menuname, price FROM menu WHERE menuname = '$check'";
									$u_result = mysqli_query($conn, $u_sql);
									$u_data = mysqli_fetch_array($u_result);
									echo $check . '    ' . $u_data['price'];
									echo "<br>";
								} 
							?>
						</p>
						<br/>
						
						<p align="right"><?php echo "<label for='email'>Total Price: </label>". $_SESSION['total_price']; ?></p>
					</div>
				</div>
			</div>
		</div>
		
		<form action="delete_order.php">
			<input type="submit" value="Delete Order" class="btn btn-primary">
		</form>
		<button><a href="customer/customer_index.html">Back</a></button>
		
	</div>

	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-3 fh5co-widget">
					<h4>Attorney's Law</h4>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
				</div>
				<div class="col-md-3 col-md-push-1">
					<h4>Navigation</h4>
					<ul class="fh5co-footer-links">
						<li><a href="#">Home</a></li>
						<li><a href="#">Practice Areas</a></li>
						<li><a href="#">Won Cases</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">About us</a></li>
					</ul>
				</div>

				<div class="col-md-3 col-md-push-1">
					<h4>Contact Information</h4>
					<ul class="fh5co-footer-links">
						<li>198 West 21th Street, <br> Suite 721 New York NY 10016</li>
						<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
						<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
						<li><a href="http://gettemplates.co">gettemplates.co</a></li>
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
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
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
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Accordion Menu -->
	<script src="js/accordion_menu.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

