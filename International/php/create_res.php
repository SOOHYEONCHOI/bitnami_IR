<?php
  session_start();

  $username_d = $_SESSION["username"];
  $restaurant_d = $_POST["restaurant"];
  $date_d = $_POST["date"];
  $time_d = $_POST["time"];
  $seat_d = $_POST["seat"];
  $adults_d = $_POST["adults"];
  $child_D = $_POST["child"];
  $conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
  echo "$username_d, $restaurant_d,  $date_d,$time_d,$seat_d,$adults_d,$child_D";

  $sql = "SELECT COUNT(location) as Flag1 FROM reservation WHERE location ='$restaurant_d' and res_date = '$date_d' and res_time = '$time_d' and seat = '$seat_d'";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);

  
  if($data['Flag1'] == 1){
    echo "<script>alert(\"The seat is already reserved, please select another seat! \");</script>";
    echo "<script>
  　　　　　　history.back()
  　　　　　</script>
  　　　　";
  }
  else if($data['Flag1'] == 0) {
    $sql = "INSERT INTO reservation (location, res_date, res_time, seat, adults, child, username) VALUES ('$restaurant_d','$date_d', '$time_d', '$seat_d', '$adults_d','$child_D', '$username_d')";
    mysqli_query($conn, $sql);

    echo "<script>alert(\"Your request is reserved successfuly! \");</script>";
    echo("<script>location.replace('manage_res.php');</script>");

  }

?>
