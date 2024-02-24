<?php
	session_start();
	
	if (isset($_SESSION['v_admin_id'])){
		$_SESSION = array();
		session_destroy();
		header('location:../login.php');
	}
	die();
?>