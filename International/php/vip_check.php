<?php
  session_start();
  $username_s = $_SESSION['username'];

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
  $sql = "SELECT COUNT(res_ID) as flag from reservation where username = '$username_s'";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
  $usql = "SELECT ulevel  from user_account where username = '$username_s'";
  $uresult = mysqli_query($conn, $usql);
  $udata = mysqli_fetch_assoc($uresult);

	if($data["flag"] >= 10 OR $udata["ulevel"] <= 6){
    echo("<script>location.replace('../vip_res.html');</script>");
	}
?>
