<?php		
/**************FOR ADMIN REFERRAL CONFIRMATION********************/

        /**checking if the referrer has gotten ref bonus before with this user**/
        //$qApp = "SELECT * FROM referrals WHERE my_id = '$user_id' && whoReferredMe = '$whoReferredMeId'";
        $qApp = "SELECT * FROM referrals WHERE my_id = '$user_id' && whoReferredMe = '$whoReferredMeId'";
        $rApp = mysqli_query($connect, $qApp);
        $selApp = mysqli_fetch_assoc($rApp);
        $countPayer = mysqli_num_rows($rApp);
            $refApproved = $selApp['approved'];
            $refMyID = $selApp['my_id'];
            $paid_transaction_idDB = $selApp['paid_transaction_id'];
            $refBonusWithdrawn = $selApp['withdrawn'];
            $refwhoReferredMe1 = $selApp['whoReferredMe'];

        /***if the referrer has not gotten bonus move to the next action***/
        if($countPayer < 1){
           // echo "<script>alert('Reached here 1');</script>";
            $queriREF = "SELECT * FROM referralbonus WHERE user_id = '$whoReferredMeId'";
            $resultuREF = mysqli_query($connect, $queriREF);
            $countREFbonus = mysqli_num_rows($resultuREF);
            $rowRef = mysqli_fetch_assoc($resultuREF);
            $totalBonusIdInRefBonusDB = $rowRef['total_bonus'];


            /***Sending the referral Bonus to the necessary user**/
            if($countREFbonus > 0){

                @$ref_bonusApp = ($nw_amts / 100) * $refBonusReturn; //Referral bonus calculation daily
                $refBonusCalculation = $ref_bonusApp +  $totalBonusIdInRefBonusDB;//referral bonus calculation for already existing user

                $query2_ref = "INSERT INTO referrals (paid_transaction_id, approved, my_id, my_name, whoReferredMe, five_percent, date) VALUES('$pay_ids','1','$user_id','$n','$whoReferredMeId','$refBonusCalculation', NOW())";
                $result2_ref = mysqli_query($connect, $query2_ref);

                $update_upApp = "UPDATE referralbonus  SET total_bonus = '$refBonusCalculation' WHERE user_id = '$whoReferredMeId'";
                $update_resultApp = mysqli_query($connect, $update_upApp);

                /**Transaction history**/
                $paid_query1wApp = "INSERT INTO history (user_id, transaction_id, name, type, plan, amount, date_of_cashout) VALUES ('$whoReferredMeId','$pay_ids','$n','Bonus','Referrer-Bonus','$ref_bonusApp', NOW())";
                $paid_result1wApp = mysqli_query($connect, $paid_query1wApp);

            }else{

                @$ref_bonusApp = ($nw_amts / 100) * $refBonusReturn; //Referral bonus calculation daily
                $refBonusCalculation = $ref_bonusApp +  $totalBonusIdInRefBonusDB;//referral bonus calculation for already existing user

                $query2_ref = "INSERT INTO referrals (paid_transaction_id, approved, my_id, my_name, whoReferredMe, five_percent, date) VALUES('$pay_ids','1','$user_id','$n','$whoReferredMeId','$refBonusCalculation', NOW())";
                $result2_ref = mysqli_query($connect, $query2_ref);


                $refBone = "INSERT INTO referralbonus (user_id, total_bonus) VALUES('$whoReferredMeId','$ref_bonusApp')";
                $resultRefBone = mysqli_query($connect, $refBone);

                /**Transaction history**/
                $paid_query1wApp = "INSERT INTO history (user_id, transaction_id, name, type, plan, amount, date_of_cashout) VALUES ('$whoReferredMeId','$pay_ids','$n','Bonus','Referrer-Bonus','$ref_bonusApp', NOW())";
                $paid_result1wApp = mysqli_query($connect, $paid_query1wApp);
            }
        }else if($countPayer > 0 && $refApproved == 0 ){
            @$ref_bonusApp2 = ($nw_amts / 100) * $refBonusReturn; //Referral bonus calculation daily

            /****Resetting the referral approve state***/
            $upq1A2 = "UPDATE referrals SET approved = 1, paid_transaction_id = '$pay_ids', five_percent = '$ref_bonusApp2' WHERE my_id = '$user_id'";
            $Ruq1A2 = mysqli_query($connect, $upq1A2);

            if($refMyID == $user_id && $refwhoReferredMe1 == $whoReferredMeId && $refBonusWithdrawn != 1){
//                echo "<script>alert('Reached here 2 $pay_ids');</script>";
                $queriREF = "SELECT * FROM referralbonus WHERE user_id = '$whoReferredMeId'";
                $resultuREF = mysqli_query($connect, $queriREF);
                $countREFbonus = mysqli_num_rows($resultuREF);
                $rowRef = mysqli_fetch_assoc($resultuREF);
                $totalBonusIdInRefBonusDB = $rowRef['total_bonus'];

                @$ref_bonusApp = ($nw_amts / 100) * $refBonusReturn; //Referral bonus calculation daily
                $refBonusCalculation = $ref_bonusApp +  $totalBonusIdInRefBonusDB;//referral bonus calculation for already existing user

                /***Sending the referral Bonus to the necessary user**/
                if($countREFbonus > 0){

                    $update_upApp = "UPDATE referralbonus  SET total_bonus = '$refBonusCalculation' WHERE user_id = '$whoReferredMeId'";
                    $update_resultApp = mysqli_query($connect, $update_upApp);

                    /**Transaction history**/
                    $paid_query1wApp = "INSERT INTO history (user_id, transaction_id, name, type, plan, amount, date_of_cashout) VALUES ('$whoReferredMeId','$pay_ids','$n','Bonus','Referrer-Bonus','$ref_bonusApp', NOW())";
                    $paid_result1wApp = mysqli_query($connect, $paid_query1wApp);

                }else{
                    $refBone = "INSERT INTO referralbonus (user_id, total_bonus) VALUES('$whoReferredMeId','$ref_bonusApp')";
                    $resultRefBone = mysqli_query($connect, $refBone);

                    /**Transaction history**/
                    $paid_query1wApp = "INSERT INTO history (user_id, transaction_id, name, type, plan, amount, date_of_cashout) VALUES ('$whoReferredMeId','$pay_ids','$n','Bonus','Referrer-Bonus','$ref_bonusApp', NOW())";
                    $paid_result1wApp = mysqli_query($connect, $paid_query1wApp);
                }
            }
        }
/***********************************ENDS*************************************************/
?>