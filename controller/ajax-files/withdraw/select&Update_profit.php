<?php
session_start();
require('../../connect.php');
if(!isset($_SESSION['users_id'])){
    header('location:../../login.php');
}
	$users_id = $_SESSION['users_id'];
	$today = date("Y-m-d H:i:s");
	//pliz dont write anyting at the top here
	date_default_timezone_set('Africa/Lagos');
	
	
    $w_id = test_input($_POST ['withdraw_id']);
    $checked = test_input($_POST ['checked']);

        $query_paid5 = "SELECT * FROM paid WHERE id = '$w_id' ";
        $result_paid5 = mysqli_query($connect, $query_paid5);
        $row= mysqli_fetch_assoc($result_paid5);
        $num_paid = mysqli_num_rows($result_paid5);
			$due_for_pay = $row['due_for_payment'];
			$applied = $row['applied'];
			if($num_paid != 0 && $due_for_pay == 1) {
					$sql = "UPDATE paid SET applied = '$checked' WHERE id = '$w_id' ";
					$sql_result = mysqli_query($connect, $sql);
					if($sql_result){echo 1;}else{ echo 2;}
			}else{
				echo 3;
			}
		
		
	function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>