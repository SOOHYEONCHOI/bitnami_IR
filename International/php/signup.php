<?php
  $username_d = $_POST["username"];
  $email_d = $_POST["email"];
  $phone_d = $_POST["phonenumber1"]."-".$_POST["phonenumber2"]."-".$_POST["phonenumber3"];
  $fname_d = $_POST["fname"];
  $lname_d = $_POST["lname"];
  $fpassword_d = $_POST["fpassword"];
  $rpassword_d = $_POST["rpassword"];

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
  $sql = "SELECT COUNT(username) as flag from user_account where username = '$username_d'";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);

  $sql = "SELECT COUNT(email) as flag from user_account where email = '$email_d'";
  $result = mysqli_query($conn, $sql);
  $data2 = mysqli_fetch_assoc($result);

  $p_flag = strcasecmp($fpassword_d, $rpassword_d); # correct = 0, incorrect = 1;
  if($data['flag'] == 1){
    echo "<script>alert(\"The usename is already exist. Please use another username\");</script>";
    echo "<script>
  　　　　　　history.back()
  　　　　　</script>
  　　　　";
  }
  else if($data2['flag'] == 1){
    echo "<script>alert(\"Your email is already exist. Please use another email address\");</script>";
    echo "<script>
  　　　　　　history.back()
  　　　　　</script>
  　　　　";
  }
  else if(strlen($fpassword_d)< 6  OR strlen($rpassword_d)< 6 ){
    echo "<script>alert(\"Passwords should be longer than 6\");</script>";
    echo "<script>
  　　　　　　history.back()
  　　　　　</script>
  　　　　";
  }
  else if($p_flag < 0 OR $p_flag > 0){
    echo "<script>alert(\"Please make sure your passwords match.\");</script>";
    echo "<script>
  　　　　　　history.back()
  　　　　　</script>
  　　　　";
  }
  else if($data['flag'] == 0 AND $p_flag == 0){
    $sql = "INSERT INTO user_account (username, email, firstname, lastname, fpassword, rpassword, phoneNum) VALUES ('$username_d','$email_d', '$fname_d', '$lname_d', '$fpassword_d','$rpassword_d', '$phone_d')";
    mysqli_query($conn, $sql);
    echo "<script>alert(\"$fname_d! Welcome To Join Us\");</script>";
    echo("<script>location.replace('../signin.html');</script>");
  }
?>
