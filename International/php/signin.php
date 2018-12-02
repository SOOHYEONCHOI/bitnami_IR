<?php
  session_start();
  $username_d = $_POST["username"];
  $fpassword_d = $_POST["fpassword"];

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
  $u_sql = "SELECT COUNT(username) as flag1 from user_account where username = '$username_d'";
  $u_result = mysqli_query($conn, $u_sql);
  $u_data = mysqli_fetch_assoc($u_result);

  $p_sql = "SELECT COUNT(fpassword) as flag2 from user_account where username = '$username_d' and fpassword = '$fpassword_d'";
  $p_result = mysqli_query($conn, $p_sql);
  $p_data = mysqli_fetch_assoc($p_result);

  if($u_data['flag1'] == 1 AND $p_data['flag2'] == 1){
    $_SESSION['is_login'] = true;
    $_SESSION['username'] = $username_d;

    echo "<script>alert(\"Welcome\");</script>";
    echo("<script>location.replace('../index.html');</script>");
  }
  else{
    echo "<script>alert(\"Invalid Username or Password. Please check your Username or Password\");</script>";
    echo "<script>
  　　　　　　history.back()
  　　　　　</script>
  　　　　";
  }
?>
