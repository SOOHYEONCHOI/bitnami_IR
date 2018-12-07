<?php
  session_start();
  $username_d = $_SESSION["username"];
  $res_id = $_SESSION["res_id"];
  $location_d = $_POST["location"];
  $date_d = $_POST["date"];
  $time_d = $_POST["time"];
  $seat_d = $_POST["seat"];
  $adults_d = $_POST["adults"];
  $child_d = $_POST["child"];

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
  $usql = "SELECT username FROM reservation WHERE location ='$location_d' and res_date = '$date_d' and res_time = '$time_d' and seat = '$seat_d' and adults = '$adults_d' and child ='$child_d'";
  $uresult = mysqli_query($conn, $usql);
  $udata = mysqli_fetch_assoc($uresult);

  $u_flag = strcmp($udata['username'], $username_d);  # correct = 0, incorrect = 1;

  if($u_flag == 0){
    echo "<script>alert(\"You didn't change anything! \");</script>";
    echo "<script>
  　　　　　　history.back()
  　　　　　</script>
  　　　　";
  }
  else if($u_flag != 1){
    $sql = "SELECT COUNT(location) as Flag1 FROM reservation WHERE username <> '$username_d' and location ='$location_d' and res_date = '$date_d' and res_time = '$time_d' and seat = '$seat_d'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    $f = $data['Flag1'];
    //echo $f;

    if($data['Flag1'] == 1){
      echo "<script>alert(\"The seat is already reserved, please select another seat! \");</script>";
      echo "<script>
    　　　　　　history.back()
    　　　　　</script>
    　　　　";
    }
    else if($data['Flag1'] == 0) {
      $sql = "UPDATE reservation SET location ='$location_d', res_date = '$date_d', res_time ='$time_d', seat = '$seat_d', adults = '$adults_d', child='$child_d' where res_ID = '$res_id'";
      mysqli_query($conn, $sql);
      $sql = "UPDATE res_history SET location ='$location_d', res_date = '$date_d', res_time ='$time_d', seat = '$seat_d', adults = '$adults_d', child='$child_d' where res_ID = '$res_id'";
      mysqli_query($conn, $sql);
      echo "<script>alert(\"Your reservation is edited successfuly! \");</script>";
      echo("<script>location.replace('manage_res.php');</script>");
    }
  }
