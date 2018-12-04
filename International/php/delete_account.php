<?php
  $username_d = $_GET["username"];

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");

  $sql = "DELETE From user_account where username = '$username_d'";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);

  echo "<script>alert(\"Delete Complete\");</script>";
  echo("<script>location.replace('management.php');</script>");

 ?>
