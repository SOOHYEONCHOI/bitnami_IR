<?php
	session_start();
	if(isset($_SESSION['is_login'])){
		include 'levelcheck.php';
		//header('Location: ../admin/logined_index.html');
	}
?>
