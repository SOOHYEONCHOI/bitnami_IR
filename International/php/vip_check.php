<?php
  session_start();
  $username_s = $_SESSION['username'];

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
  $sql = "SELECT COUNT(res_ID) as flag from res_history where username = '$username_s'";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);

	if($data["flag"] >= 10){
    echo("<script>location.replace('../vip_res.html');</script>");
	}
?>
