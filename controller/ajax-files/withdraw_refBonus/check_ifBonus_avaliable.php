<?php
session_start();
require('../../connect.php');
if(!isset($_SESSION['users_id'])){
    header('location:../../../');
}


/****Denying an unauthorized access*****/
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
    echo "";
} else {
    die('Direct access not permitted');
}
/****Denying an unauthorized access*****/


$users_id = $_SESSION['users_id'];
//pliz dont write anyting at the top here
/***********This will take effect when the user clicks withdraw referal bonus button in his dashoard************/
			$querix = "SELECT * FROM referralbonus WHERE user_id = '$users_id' ";
			$resultx = mysqli_query($connect, $querix);
			$asx = mysqli_fetch_assoc($resultx);
			$countMyRef = mysqli_num_rows($resultx);
			$my_id_inREF_db = $asx['user_id'];
			$total_ref_bonus = $asx['total_bonus'];
			
			if ($total_ref_bonus > 50) {
				echo 1;
			}else{
			    echo 2;
            }
		
/***********************************ENDS*************************************************/
?>