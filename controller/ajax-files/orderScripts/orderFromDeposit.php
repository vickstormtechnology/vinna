<?php
    $today = date("Y-m-d H:i:s");
    $b = strtotime($today);

    //this will make the investor delay for 7 days in other to b able to invest again
    $aTIme = strtotime($date_of_paymentBD);
    $haltTimeForNextInvst = date("Y-m-d H:i:s", strtotime("+".$waitTimeForNextInvestment." days",$aTIme));
    $calcAmountPaidDB = $amount_paidDB + $investmentAmount;


    if($investmentAmount <= $depoAmount){
        if($dashRCount < 1){
            echo 3; //Invalid investment package, contact support.
        }elseif ($depoAmountApproved == 0){
            echo 2; //say the same thing as the other argument
        }elseif ($haltTimeForNextInvst > $today){
            echo 9; //Your previous investment must be 1 day(s) old before you can invest again
        }elseif ($maxAmountDB <= $amount_paidDB || $calcAmountPaidDB > $maxAmountDB){
            echo 10; //You cannot invest with this package any longer, upgrade to a higher package.
        }elseif (!is_numeric($investmentAmount)){
            echo 4; //Only numeric value is allowed
        }elseif ($investmentAmount < $minAmountDB){
            echo 5; //Investment Amount too low for this package.
        }elseif ($investmentAmount > $maxAmountDB){
            echo 6; //Investment amount too high for this package, consider investing with a higher package
        }else {
            /**Debiting the deposit amount**/
            $depositBalanceDebit = $depoAmount - @$investmentAmount;
            $increaseAmountInvested = $amount_paidDB + $investmentAmount;//add amount paid in database  to investment amount

            /**Calculating investment percentage**/
            @$amt_paid_percentage1 = ($increaseAmountInvested / 100) * $dailyReturnPercentage; //25 percent of your investment adding 0.83% daily


            if ($paidBefore < 1) {

                $paid_dep = "UPDATE deposits SET amount = '$depositBalanceDebit' WHERE user_id = '$users_id'";
                $paid_dep = mysqli_query($connect, $paid_dep);

                $paid_query1 = "INSERT INTO paid (user_id, plan, approved, fund_method, amount_paid, amount_paid_increment, amt_percentage, date_of_payment, last_withdrawal_date, date_increment) VALUES ('$users_id','$cPackage','1','$fromAccount','$investmentAmount','0','$amt_paid_percentage1', NOW(), NOW(), NOW())";
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
                    include('user_referral_logic.php');
                }
                if ($paid_result1) {
//                    echo 1;
                include('mailingSuccessfulInvestment.php');
                }
            } else {
                //if a user have clicked invest button before
                $paid_dep = "UPDATE deposits SET amount = '$depositBalanceDebit' WHERE user_id = '$users_id'";
                $paid_dep = mysqli_query($connect, $paid_dep);

                $paid_query1 = "UPDATE paid SET plan = '$cPackage', approved = '1', fund_method = '$fromAccount', amount_paid = '$increaseAmountInvested', amt_percentage = '$amt_paid_percentage1', date_of_payment = NOW(), last_withdrawal_date = NOW(), date_increment = NOW() WHERE user_id='$users_id'";
                $paid_result1 = mysqli_query($connect, $paid_query1);

                $paid_query1wApp11 = "INSERT INTO history (user_id, approved, name, type, plan, amount, date_of_cashout) VALUES ('$users_id','1','$n','Investment Deposit','$cPackage','$investmentAmount', NOW())";
                $paid_result1wApp11 = mysqli_query($connect, $paid_query1wApp11);

                $paid_reg1 = "UPDATE register SET plan = '$cPackage' WHERE id ='$users_id'";
                $paid_reg1 = mysqli_query($connect, $paid_reg1);

                /**Home History**/
                if ($send_to_home == 'on') {
                    $paid_query1wApp = "INSERT INTO home_transaction_history (name, time, amount, type, flag, deposit_medium) VALUES ('$n', NOW(),'$investmentAmount','deposit','$userCountry.png','Deposit Account')";
                    $paid_result1wApp = mysqli_query($connect, $paid_query1wApp);
                }

                /***Including referral logic if the person has any referrer in his register database****/
                if ($whoReferredMeId != 0) {
                    include('user_referral_logic.php');
                }
                if ($paid_result1) {
//                    echo 1;
                include('mailingSuccessfulInvestment.php');
                }
            }
        }
    }else{
        echo 2;
    }

?>