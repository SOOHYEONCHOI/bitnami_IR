<?php
  session_start();
  $username_d = $_SESSION["username"];
  $res_ID_d = $_GET["res_ID"];

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");

  $sql = "DELETE From reservation where username = '$username_d' and res_ID ='$res_ID_d'";
  $result = mysqli_query($conn, $sql);

  $data = mysqli_fetch_assoc($result);


  echo "<script>alert(\"Delete Complete\");</script>";
  echo("<script>location.replace('manage_res.php');</script>");

 ?>
