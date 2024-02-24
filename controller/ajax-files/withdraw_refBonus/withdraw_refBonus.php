<?php
session_start();
require('../../connect.php');
require('../../config/emailConfig.php');
if(!isset($_SESSION['users_id'])){
    header('location:../../login.php');
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

//Echoing the name of the user
			$query2 = "SELECT * FROM register WHERE id='$users_id' LIMIT 1";
			@$result12 = mysqli_query($connect, $query2);
			@$count22 = mysqli_num_rows($result12);
			@$row = mysqli_fetch_assoc($result12);
			$id = $row ['id'];
			$name = $row ['name'];
			$email = $row ['email'];
			$wallet_address = $row ['btc_address'];
			$wallet_type = $row ['wallet_type'];



/***********This will take effect when the user clicks withdraw referal bonus button in his dashoard************/
		if($wallet_address == ""){
			echo 2;
		}else if($wallet_type == ""){
			echo 3;
		}else{
			$querix = "SELECT * FROM referralbonus WHERE user_id = '$users_id'";
			$resultx = mysqli_query($connect, $querix);
			$asx = mysqli_fetch_assoc($resultx);
			$countMyRef = mysqli_num_rows($resultx);
			$total_ref_bonus = $asx['total_bonus'];
			if ($total_ref_bonus > 5) {
				require('mailing_RefBonusWithdraw.php');
				//echo 1;
			}else{
				echo 4;
			}
		}
		
/***********************************ENDS*************************************************/
?>