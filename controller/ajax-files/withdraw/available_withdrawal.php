<?php
session_start();
require('../../connect.php');
if(!isset($_SESSION['users_id'])){
    header('location:../../../login');
}
$users_id = $_SESSION['users_id'];
//pliz dont write anyting at the top here

date_default_timezone_set('Africa/Lagos');

    //Selecting all my available withdrawal
    $query = "SELECT * FROM paid WHERE user_id = '$users_id' && due_for_payment ='1' && amount_paid_increment > '0' && paid = 0 && applied = 0 && approved = 1";
    @$result = mysqli_query($connect, $query);
    @$count = mysqli_num_rows($result);
		
	$data = array();   // result array
	while ($row1 = mysqli_fetch_array($result)) {
		$data[] = array( 
		"w_id" => $row1['id'],
		"applied"    => $row1['applied'],
		"w_profit"  => $row1['amount_paid_increment'],
		"w_plan"  => $row1['plan'],
		"count"  => $count
	  );  

	}
echo json_encode($data);
?>