<?php
session_start();
require('../connect.php');
require('../config/emailConfig.php');

if(!isset($_SESSION['users_id'])){
    header('location:../../login.php');
}


$users_id = $_SESSION['users_id'];
//pliz don't write anything at the top here
date_default_timezone_set('Africa/Lagos');


//Echoing the name of the user in the nav bar top
$query = "SELECT * FROM register WHERE id='$users_id' LIMIT 1";
@$result12 = mysqli_query($connect, $query);
@$count22 = mysqli_num_rows($result12);
@$row = mysqli_fetch_assoc($result12);
$id = $row ['id'];
$name = $row ['name'];
$email = $row ['email'];
$btc_address = $row['btc_address'];
$whoReferredMe = $row['referrer'];
//$country = $row['country'];
$plan = $row['plan'];
//$p_pix = $row['profile_picture'];
$hashed_id = $row['hashed_id'];


/*******SELECT ALL PLAN FROM THE DATABASE******/
$queDash = "SELECT * FROM plan_setup WHERE planName = '$plan'";
$resulDash = mysqli_query($connect, $queDash);
$dash = mysqli_fetch_assoc($resulDash);
$currentPlan = $dash['planName'];
$minInvstAmt = $dash['minInvstAmt'];
$maxInvstAmt = $dash['maxInvstAmt'];
$dailyReturnPercentage = $dash['dailyReturnPercentage'];
$refBonusReturn = $dash['refBonusReturn'];
$profitMaturityDay = $dash['profitMaturityDay'];
$planContractTerm = $dash['planContractTerm'];
//echo "<script> alert('Your plan is  $minInvstAmt');</script>";



/****************************DEPOSIT***I HAVE PAID STARTS HERE*********************************************/
    $amt = test_input($_POST['amount_paid']);
    $fund_methood = test_input($_POST['fund_methood']);

    $query_p = "SELECT * FROM deposits WHERE user_id = '$users_id' LIMIT 1";
    @$result_p = mysqli_query($connect, $query_p);
    @$count_p = mysqli_num_rows($result_p);
    $depAssoc = mysqli_fetch_assoc($result_p);
        $depApprove = $depAssoc['approved'];
        $unapprovedAmount = $depAssoc['unapprovedAmount'];
        $dpAmount = $depAssoc['amount'];

        if ($amt != "" && is_numeric($amt)) {
                if ($amt >= 100) {
                    if($count_p < 1){
                        $firstTimeDeposit = 1;

                        $paid_query1 = "INSERT INTO deposits (user_id, fund_method, unapprovedAmount, date) VALUES ('$users_id','$fund_methood','$amt', NOW())";
                        $paid_result1 = mysqli_query($connect, $paid_query1);
                        /*******Including referral logic*******/

                        if ($paid_result1) {
                            //echo 1;
                            include ('mailing_deposit.php');
                        }
                    }else{
                        if($unapprovedAmount == 0){

                            $upq1A2 = "UPDATE deposits SET fund_method = '$fund_methood', unapprovedAmount = '$amt' WHERE user_id = '$users_id'";
                            $Ruq1A2 = mysqli_query($connect, $upq1A2);
                            /*******Including referral logic*******/

                            if ($Ruq1A2) {
                                //echo 1;
                                include ('mailing_deposit.php');
                            }
                        }else{
                            echo 7;
                        }

                    }

                } else {
                    echo 11;
                }
        } else {
            echo 4;
        }

/*******************************************DEPOSIT ENDS*******************************************************/






//password function
function test_input_pass($data) {
    $data = md5($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>