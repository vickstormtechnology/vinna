<?php
session_start();
require('../../connect.php');
require('../../config/emailConfig.php');
if(!isset($_SESSION['users_id'])){
    header('location:../../login.php');
}
	$users_id = $_SESSION['users_id'];
	$today = date("Y-m-d H:i:s");
	//pliz dont write anyting at the top here
	date_default_timezone_set('Africa/Lagos');

    //$w_amount = test_input($_POST ['w_amount']);
    $w_id = test_input($_POST ['w_id']);
    $applied = test_input($_POST ['applied']);
    $wallet_type = test_input($_POST ['wallet_type']);
    $wallet_address = test_input($_POST ['wallet_address']);
    $indicatedAmountToWithdraw = test_input($_POST ['w_amount']);


//			if($wallet_address == ""){
//				echo 3;
//            }
            if(!is_numeric($indicatedAmountToWithdraw)){
				echo 4;
            }else {


                //Echoing the name of the user in the nav bar top
                $query2 = "SELECT * FROM register WHERE id='$users_id' LIMIT 1";
                @$result12 = mysqli_query($connect, $query2);
                @$count22 = mysqli_num_rows($result12);
                @$row = mysqli_fetch_assoc($result12);
                $id = $row ['id'];
                $name = $row ['name'];
                $email = $row ['email'];


                $query_paid5 = "SELECT * FROM paid WHERE paid != 1 && due_for_payment = 1 && user_id = '$users_id'";
                $result_paid5 = mysqli_query($connect, $query_paid5);
                $row_paid5 = mysqli_fetch_assoc($result_paid5);
                $num_paid214 = mysqli_num_rows($result_paid5);
                $due_for_pay5 = $row_paid5['due_for_payment'];
                $transaction_id = $row_paid5['id'];
                $paid5 = $row_paid5['paid'];
                $profit = $row_paid5['amount_paid_increment'];
                $amount_invstd = $row_paid5['amount_paid'];

                if ($indicatedAmountToWithdraw < 10) {
                    echo 6;
                } elseif ($indicatedAmountToWithdraw > $profit) {
                    echo 5;
                } else {
                    if ($num_paid214 >= 1 && $due_for_pay5 == 1) {
                        if ($paid5 != 1) {
                            $sql = "UPDATE paid SET applied = 1, last_withdrawal_date = NOW() WHERE user_id = '$users_id' && applied = '2'";
                            $sql_result = mysqli_query($connect, $sql);
                            if ($sql_result) {
                                require('mailing_withdrawal.php');
                            }
                        }
                    } else {
                        echo 2;
                    }
                }
            }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>