<?php
	session_start();
	if(isset($_SESSION['is_login'])){
		header('Location: ../logined/logined_index.html');
	}
?>
