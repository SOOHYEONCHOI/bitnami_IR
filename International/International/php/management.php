<?php
	include 'php/levelcheck.php';

	$conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
	$sql = "SELECT username, email, firstname, lastname, phoneNum, ulevel, staffNum from user_account";
	$result = mysqli_query($conn, $sql);

	$numrow = mysqli_num_rows($result);
	$Username = array();
	$Email = array();
	$Firstname = array();
	$Lastname = array();
	$Phonenum = array();
	$Ulevel = array();
	$Staffnum = array();
	$i = 0;


	while($data = mysqli_fetch_array($result)){
		$Username[$i] = $data[username];
		$Email[$i] = $data[email];
		$Firstname[$i] = $data[firstname];
		$Lastname[$i] = $data[lastname];
		$Phonenum[$i] = $data[phoneNum];
		$Ulevel[$i] = $data[ulevel];
		$Staffnum[$i] = $data[staffNum];
	  $i++;
	}

//	$item	= array();
//	while($rs = mysqli_fetch_assoc($result)) {
//	array_push($item, $rs);
//}
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
	<style>
	.table_layout {
		width: 100%;
	}
	table {
		width: 100%;
		border: 3px solid #bcbcbc;
		text-align: center;
	}
	th, td{
		border: 3px solid #bcbcbc;
		text-align: center;
	}
	.text-center { text-align: center; }
	.text-right { text-align: right; }
	</style>

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
								<li><a href="../reservation.html">Reservation</a></li>
								<li class="has-dropdown">
									<a href="../advertisement.html">Advertisement</a>
									<ul class="dropdown">
										<li><a href="#">Event</a></li>
										<li><a href="#">Survey</a></li>
									</ul>
								</li>
								<li><a href="../Inventory.html">Inventory</a></li>
								<li class="has-dropdown">
									<a href="../account.html">Account</a>
									<ul class="dropdown">
										<li><a href="staffnum.php">Staff Num</a></li>
										<li><a href="management.php">Management</a></li>
									</ul>
								</li>
								<li class="btn-cta"><a href="logout.php"><span>Sign out</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	<div>

	</div>

	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-35 animate-box">
					<h2>Account Management System</h2>
					<div class ="table_layout">
						<table>
							<colgroup class = "text-center">
								<col width="3%" />
            		<col width="10%" />
            		<col width="15%" />
            		<col width="10%" />
            		<col width="10%" />
								<col width="10%" />
								<col width="10%" />
								<col width="18%" />
								<col width="7%" />
								<col width="10%" />
							</colgroup>
							<b>Account List</b>
							<thead>
								<tr>
									<th></th>
									<th>Username</th>
									<th>Email</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Phone Number</th>
									<th>User Name</th>
									<th>Staff Number</th>
									<th> </th>
									<th> </th>
								</tr>
							</thead>
							<tbody>
								<?php
								for($j=1; $j<=$numrow; $j++){
										 echo '<tr><td class = "text-center">' . $j . '</td>' .
												 '<td>' . $Username[$j-1] . '</td>' .
												 '<td>' . $Email[$j-1] . '</td>' .
												 '<td>' . $Firstname[$j-1] . '</td>' .
												 '<td>' . $Lastname[$j-1] . '</td>' .
												 '<td>' . $Phonenum[$j-1] . '</td>' .
												 '<td>' . $Ulevel[$j-1] . '</td>' .
												 '<td>' . $Staffnum[$j-1] . '</td>'.
												 '<td> <a href="edit_account.php?username='.$Username[$j-1].'"> Edit </a> </td>'.
												 '<td> <a href="delete_account.php?username='.$Username[$j-1].'" onclick="return confirm(\'do you want to delete Y/N\')"> Delete</a> </td></tr>';
								 }
								 ?>
							</tbody>
						</table>
					</div>
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
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="../js/google_map.js"></script>
	<!-- Main -->
	<script src="../js/main.js"></script>

	</body>
</html>
