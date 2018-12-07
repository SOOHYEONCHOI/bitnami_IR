<?php
  session_start();
  $username_d = $_SESSION["username"];

  $date_d = $_POST["date"];
  $time_d = $_POST["time"];

  $restaurant_d;
  $seat_d;
  $adults_d;
  $child_d;

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
  $sql = "SELECT location, COUNT(location) as loc from res_history group by location order by loc desc ";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);
  $restaurant_d = $data['location'];

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
  $sql = "SELECT seat, COUNT(seat) as s from res_history group by seat order by s desc ";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);
  $seat_d =  $data['seat'];

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
  $sql = "SELECT adults, COUNT(adults) as a from res_history group by adults order by a desc ";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);
  $adults_d =  $data['adults'];

  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
  $sql = "SELECT child, COUNT(child) as c from res_history group by child order by c desc ";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);
  $child_d =  $data['child'];


  $sql = "SELECT COUNT(location) as Flag1 FROM reservation WHERE location ='$restaurant_d' and res_date = '$date_d' and res_time = '$time_d' and seat = '$seat_d'";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);

  if($data['Flag1'] == 1){

    $sql = "INSERT INTO reservation (location, res_date, res_time, seat, adults, child, username) VALUES ('$restaurant_d','$date_d', '$time_d', '$seat_d+1', '$adults_d','$child_d', '$username_d')";
    mysqli_query($conn, $sql);
    $sql = "INSERT INTO res_history (location, res_date, res_time, seat, adults, child, username) VALUES ('$restaurant_d','$date_d', '$time_d', '$seat_d+1', '$adults_d','$child_d', '$username_d')";
    mysqli_query($conn, $sql);
    echo "<script>alert(\"Your request is reserved successfuly! \");</script>";
    echo("<script>location.replace('manage_res.php');</script>");

  }
  else if($data['Flag1'] == 0) {
    $sql = "INSERT INTO reservation (location, res_date, res_time, seat, adults, child, username) VALUES ('$restaurant_d','$date_d', '$time_d', '$seat_d', '$adults_d','$child_d', '$username_d')";
    mysqli_query($conn, $sql);
    $sql = "INSERT INTO res_history (location, res_date, res_time, seat, adults, child, username) VALUES ('$restaurant_d','$date_d', '$time_d', '$seat_d', '$adults_d','$child_d', '$username_d')";
    mysqli_query($conn, $sql);
    echo "<script>alert(\"Your request is reserved successfuly! \");</script>";
    echo("<script>location.replace('manage_res.php');</script>");
  }

?>
