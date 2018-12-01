<?php
  $username_d = $_POST["username"];

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
  $u_sql = "SELECT COUNT(username) as flag1 from user_account where username = '$username_d'";
  $u_result = mysqli_query($conn, $u_sql);
  $u_data = mysqli_fetch_assoc($u_result);

  if($u_data['flag1'] == 1){
    $s_sql = ""

    echo "<script>alert(\"Welcome\");</script>";
    echo("<script>location.replace('../index.html');</script>");
  }
  else{
    echo "<script>alert(\"Invalid username, please check staff's user name\");</script>";
    echo "<script>
  　　　　　　history.back()
  　　　　　</script>
  　　　　";
  }
?>
