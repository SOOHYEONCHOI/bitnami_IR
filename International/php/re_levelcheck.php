<?php
	session_start();
  $username_s = $_SESSION['username'];

	$conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
	$sql = "SELECT ulevel as level from user_account where username = '$username_s'";
	$result = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($result);
  
  if($data['level'] >= 5 AND $data['level'] <= 9){
		echo("<script>location.replace('c_manage_res.php');</script>");
	}
?>
