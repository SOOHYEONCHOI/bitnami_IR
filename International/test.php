<?php
$conn = mysqli_connect('localhost', 'root', 'asd123', 'drunkencode') or die("Failed");
$checklist = array();
$checklist = $_POST['check_list'];

if(!empty($checklist)) {
	foreach($checklist as $check) {
		$u_sql = "SELECT menuname, price FROM menu WHERE menuname = '$check'";
		$u_result = mysqli_query($conn, $u_sql);
		$u_data = mysqli_fetch_array($u_result);
		$total_price += (float) $u_data['price'];
	}
}
echo $total_price;
echo "<br>";
?>
