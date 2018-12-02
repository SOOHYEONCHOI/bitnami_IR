<?php
  session_start();
  $username_d = $_POST["username"];

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
  $u_sql = "SELECT COUNT(username) as flag1 from user_account where username = '$username_d'";
  $u_result = mysqli_query($conn, $u_sql);
  $u_data = mysqli_fetch_assoc($u_result);

  if($u_data['flag1'] == 1){
    $rand_number = rand(1111,9999);
    $temp_staffNum = "ST"."-".$rand_number."-".$username_d;

    $sql = "UPDATE user_account SET staffNum = '$temp_staffNum' where username ='$username_d'";
    mysqli_query($conn, $sql);
    echo "<script>alert(\"$username_d's staff number is $temp_staffNum\");</script>";
    echo("<script>location.replace('../created_staffnum.html');</script>");
  }
  else{
    echo "<script>alert(\"Invalid username, please check staff's user name\");</script>";
    echo "<script>
  　　　　　　history.back()
  　　　　　</script>
  　　　　";
  }
?>
