<?php
  session_start();
  $username_d = $_SESSION['username_d'];
  $ulevel_d = $_POST["ulevel"];
  $fpassword_d = $_POST["fpassword"];
  $rpassword_d = $_POST["rpassword"];
  $phone_d = $_POST["phonenumber"];
  $street = $_POST["street"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $zipcode = $_POST["zipcode"];

  $p_flag = strcasecmp($fpassword_d, $rpassword_d); # correct = 0, incorrect = 1;
  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");

  if($p_flag < 0 OR $p_flag > 0){
    echo "<script>alert(\"Please make sure your passwords match.\");</script>";
    echo "<script>
  　　　　　　history.back()
  　　　　　</script>
  　　　　";
  }
  else if(strlen($fpassword_d)> 0  AND strlen($fpassword_d)< 6){
    echo "<script>alert(\"Passwords should be longer than 6\");</script>";
    echo "<script>
  　　　　　　history.back()
  　　　　　</script>
  　　　　";
  }
  else{
    if(strlen($fpassword_d)> 6){
      $sql = "UPDATE user_account SET fpassword = '$fpassword_d', rpassword = '$rpassword_d' where username ='$username_d'";
      mysqli_query($conn, $sql);
    }
    if(strlen($ulevel_d)>0){
      $sql = "UPDATE user_account SET ulevel = '$ulevel_d' where username ='$username_d'";
      mysqli_query($conn, $sql);
    }
    if(strlen($phone_d)>0){
      $sql = "UPDATE user_account SET phoneNum = '$phone_d' where username ='$username_d'";
      mysqli_query($conn, $sql);
    }
    if(strlen($street)>0){
      $sql = "UPDATE user_account SET street = '$street' where username ='$username_d'";
      mysqli_query($conn, $sql);
    }
    if(strlen($city)>0){
      $sql = "UPDATE user_account SET city = '$city' where username ='$username_d'";
      mysqli_query($conn, $sql);
    }
    if(strlen($state)>0){
      $sql = "UPDATE user_account SET state = '$state' where username ='$username_d'";
      mysqli_query($conn, $sql);
    }
    if(strlen($zipcode)>0){
      $sql = "UPDATE user_account SET zipcode = '$zipcode' where username ='$username_d'";
      mysqli_query($conn, $sql);
    }
    echo "<script>alert(\"Edit account information success!\");</script>";
    echo("<script>location.replace('management.php');</script>");
  }


?>
