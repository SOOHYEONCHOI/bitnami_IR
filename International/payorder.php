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
	
	$conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
	
	if(!empty($_SESSION['select_food'])) {
		echo "not empty";
		foreach($_SESSION['select_food'] as $eachfood) {
			$u_select = "SELECT menuname, menu_ID FROM menu WHERE menuname = '$eachfood'";
			$u_result = mysqli_query($conn, $u_select);
			$u_data = mysqli_fetch_array($u_result);
			echo $u_data['menu_ID'];
		}
	}

?>