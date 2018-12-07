<?php
	session_start();
	$digits_needed = 8;
	$random_number = '';
	$count = 0;
	
	while($count < $digits_needed) {
		$random_digit = mt_rand(0, 9);
		$random_number .= $random_digit;
		$count++;
	}
	$orderID = date("Ymd") .''. $random_number;
	
	echo $orderID;
	
	$conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
	

	echo $_SESSION['total_price'];
	#foreach($_SESSION['select_food'] as $eachfood){
	#	$u_select = "SELECT * FROM menu WHERE menuname = '$eachfood'";
	#	$u_result = mysqli_query($conn, $u_select);
	#	$u_data = mysqli_fetch_array($u_result);
	#	$u_insert = "INSERT INTO sale(order_id, username, menu_ID, amount, total_price, estimatedTime, category) VALUES($orderID, 'guest', $eachfood, $u_data['menuID'], 1, $_SESSION['total_price'], 40, 'Order: For Here')";
	#	mysqli_query($conn, $u_insert);
	#		
	#}
?>