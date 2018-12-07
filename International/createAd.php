<?php
	session_start();
	$title = $_POST['title'];
	$duration = (string)$_POST['duration'];
	$lasts = $duration;
	$description = $_POST['description'];
	$_SESSION['title'] = $title;
	$_SESSION['duration'] = $duration;
	$_SESSION['description'] = $description;
	$startD = date("Y-m-d");	
	$digits_needed = 2;
	$random_number = '';
	$count = 0;
	$status = "In Action";
		
	while($count < $digits_needed) {
		$random_digit = mt_rand(0, 9);
		$random_number .= $random_digit;
		$count++;
	}
	$ad_ID = date("Ymd") .''. $random_number;
	if(empty($title) or empty($duration) or empty($description)) {
		echo "<script>window.location.href='advertisement.html';alert(\"Please fill all needed information\");</script>";
	}else {
		if(strlen($title) > 40) {
			echo "<script>window.location.href='advertisement.html';alert(\"ERROR - The title is too long\");</script>";
		}else {
			if(strlen($description) > 255) {
				echo "<script>window.location.href='advertisement.html';alert(\"ERROR - The Ad content is too long\");</script>";
			}else {
				if(!is_numeric($duration)) {
					echo "<script>window.location.href='advertisement.html';alert(\"ERROR - Invalid date duration\");</script>";
				}else {
					$duration .= ' day';
					$duration = " +".$duration;
					$endD = date("Y-m-d");
					$endD = strtotime(date("Y-m-d", strtotime($endD)) . $duration);
					$endD = date("Y-m-d", $endD);
					
					$conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
					$u_insert = "INSERT INTO advertisement (ad_ID, ad_Title, ad_contents, duration, start_date, end_date, ADstatus) VALUES('$ad_ID', '$title', '$description', '$lasts', '$startD', '$endD', 'In Action')";
					if(mysqli_query($conn, $u_insert)) {
						echo "<script>window.location.href='advertisement_display.html';alert(\"Advertisement Create Success!\");</script>";
					}else {
						echo "<script>window.location.href='advertisement.html';alert(\"ERROR - Advertisement Create Fail\");</script>";
					}
					
				}
			}
		}
	}
?>
