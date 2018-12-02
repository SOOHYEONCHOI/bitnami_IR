<?php
	session_start();
  $username_s = $_SESSION['username'];

	$conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
	$sql = "SELECT ulevel as level from user_account where username = '$username_s'";
	$result = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($result);

	if($data['level'] >= 0 AND $data['level'] <= 1){
		//echo "<script>alert(\"You don't have permission\");</script>";
    echo("<script>location.replace('../admin/admin_index.html');</script>");
	}
	else if($data['level'] >= 2 AND $data['level'] <= 4){
		echo("<script>location.replace('../staff/staff_index.html');</script>");
	}
	else if($data['level'] >= 5 AND $data['level'] <= 9){
		echo("<script>location.replace('../customer/customer_index.html');</script>");
	}
?>
