<?php
$today = date("Y-m-d H:i:s");
$b = strtotime($today);
//this will make the investor delay for 7 days in other to b able to invest again
$aTIme = strtotime($date_of_paymentBD);
$haltTimeForNextInvst = date("Y-m-d H:i:s", strtotime("+".$waitTimeForNextInvestment." days",$aTIme));
$calcAmountPaidDB = $amount_paidDB + $investmentAmount;

    if($dashRCount < 1){
        echo 3; //Invalid investment package, contact support.
    }elseif ($depoAmountApproved == 0){
        echo 2; //say the same thing as the other argument
    }elseif ($haltTimeForNextInvst > $today){
        echo 9; //Your previous investment must be 1 day(s) old before you can invest again
    } elseif ($maxAmountDB <= $amount_paidDB || $calcAmountPaidDB > $maxAmountDB){
        echo 10; //You cannot invest with this package any longer, upgrade to a higher package.
    }elseif ($lockInvestingViaCompounding == 1){
        echo 8; //You cannot invest using this medium at this moment, contact support.
    }elseif (!is_numeric($investmentAmount)){
        echo 4; //Only numeric value is allowed
    }elseif ($investmentAmount < $minAmountDB){
        echo 5; //Investment Amount too low for this package.
    }elseif ($investmentAmount > $maxAmountDB){
        echo 6; //Investment amount too high for this package, consider investing with a higher package
    }else {
        /**Debiting the profit account**/
        $profitBalanceDebit = $dailyIncome - @$investmentAmount;
        $increaseAmountInvested = $amount_paidDB + $investmentAmount;//add amount paid in database  to investment amount

        /**Calculating investment percentage**/
        @$amt_paid_percentage1 = ($increaseAmountInvested / 100) * $dailyReturnPercentage; //25 percent of your investment adding 0.83% daily


        if($totalAsset <= $investmentAmount){
            echo 11; //Compounding failed due to insufficient balance in both accounts.
        }else{
            if ($paidBefore > 0) {

                if($investmentAmount >= $dailyIncome){
                    $subtractInvstAmountFromProfit = $investmentAmount - $dailyIncome;
                    $debitDepositAcc = $depoAmount - $subtractInvstAmountFromProfit;//result will be remaining deposit balance

                    $paid_dep = "UPDATE deposits SET amount = '$debitDepositAcc' WHERE user_id = '$users_id'";
                    $paid_dep = mysqli_query($connect, $paid_dep);

                    $paid_query1 = "UPDATE paid SET approved = '1', fund_method = '$fromAccount', amount_paid = '$increaseAmountInvested', amount_paid_increment = '0', amt_percentage = '$amt_paid_percentage1', date_of_payment = NOW(), last_withdrawal_date = NOW(), date_increment = NOW() WHERE user_id='$users_id'";
                    $paid_result1 = mysqli_query($connect, $paid_query1);


                    $paid_query1wApp11 = "INSERT INTO history (user_id, name, type, plan, amount, date_of_cashout) VALUES ('$users_id','$n','Investment Deposit','$cPackage','$investmentAmount', NOW())";
                    $paid_result1wApp11 = mysqli_query($connect, $paid_query1wApp11);

                    $paid_reg1 = "UPDATE register SET plan = '$cPackage' WHERE id ='$users_id'";
                    $paid_reg1 = mysqli_query($connect, $paid_reg1);

                    /**Home History**/
                    if ($send_to_home == 'on') {
                        $paid_query1wApp = "INSERT INTO home_transaction_history (name, time, amount, type, flag, deposit_medium) VALUES ('$n', NOW(),'$investmentAmount','deposit','$userCountry.png','$fromAccount')";
                        $paid_result1wApp = mysqli_query($connect, $paid_query1wApp);
                    }

                    /***Including referral logic if the person has any referrer in his register database****/
                    if ($whoReferredMeId != 0) {
                        //include('../includes/user_referral_logic.php');
                    }
                    if ($paid_result1) {
                        echo 1;
//                include('mailingSuccessfulInvestment.php');
                    }






                }else if($investmentAmount >= $depoAmount){
                    $subtractInvstAmountFromDeposit = $investmentAmount - $depoAmount;
                    $debitProfitAcc = $dailyIncome - $subtractInvstAmountFromDeposit;//result will be remaining deposit balance

                    $paid_dep = "UPDATE deposits SET amount = '0' WHERE user_id = '$users_id'";
                    $paid_dep = mysqli_query($connect, $paid_dep);

                    $paid_query1 = "UPDATE paid SET approved = '1', fund_method = '$fromAccount', amount_paid = '$debitProfitAcc', amount_paid_increment = '0', amt_percentage = '$amt_paid_percentage1', date_of_payment = NOW(), last_withdrawal_date = NOW(), date_increment = NOW() WHERE user_id='$users_id'";
                    $paid_result1 = mysqli_query($connect, $paid_query1);


                    $paid_query1wApp11 = "INSERT INTO history (user_id, approved, name, type, plan, amount, date_of_cashout) VALUES ('$users_id','1','$n','Investment Deposit','$cPackage','$investmentAmount', NOW())";
                    $paid_result1wApp11 = mysqli_query($connect, $paid_query1wApp11);

                    $paid_reg1 = "UPDATE register SET plan = '$cPackage' WHERE id ='$users_id'";
                    $paid_reg1 = mysqli_query($connect, $paid_reg1);

                    /**Home History**/
                    if ($send_to_home == 'on') {
                        $paid_query1wApp = "INSERT INTO home_transaction_history (name, time, amount, type, flag, deposit_medium) VALUES ('$n', NOW(),'$investmentAmount','deposit','$userCountry.png','$fromAccount')";
                        $paid_result1wApp = mysqli_query($connect, $paid_query1wApp);
                    }

                    /***Including referral logic if the person has any referrer in his register database****/
                    if ($whoReferredMeId != 0) {
                        //include('../includes/user_referral_logic.php');
                    }
                    if ($paid_result1) {
                        echo 1;
//                include('mailingSuccessfulInvestment.php');
                    }
                }else{
                    echo 13; //Error: Compounding is valid only when the balance in you deposit account or profit account is not enough to purchase a package.
                }
            }else{
                echo 7;
            }
        }
    }


?>