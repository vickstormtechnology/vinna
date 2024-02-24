<?php
    /*****************PHP mailer calls must be up******************/
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    date_default_timezone_set('Etc/UTC');
    /*****************PHP mailer calls Ends******************/

	$query = "SELECT * FROM paid WHERE paid != 1 && applied = 1 && user_id = '$users_id'";
	$result = mysqli_query($connect, $query);
	$count = mysqli_num_rows($result);
	$amount_paid = '';
	$plan = '';
	$profit = '';
	$check = '';
	while($row1= mysqli_fetch_array($result)){
		$plan .='<td >'.$row1['plan'].'</td>';
		$profit .='<td>'.$row1['amount_paid_increment'].'</td>';
	}

  $check .= '<table border="px">
			<tr>
				<th class="info">Name</th>
				<td colspan="10">'.$name.'</td>
			</tr>
			<tr>
				<th class="info">Plan</th>
				<td >'.$plan.'</td>
			</tr>
			<tr>
				<th class="info">Profits</th>
				<td >'.$profit.'</td>
			</tr>
		</table>';
	
    //Receivers email is gotten from the index page cus this file is included//$ToEmail = test_input($_POST ['email']);
    $sub = 'Withdrawal Request';
    $message = 'Hello dear admin of '.$siteName.', '.$name.' has requested to make a withdrawal on '.$today. '. Below are the details of request!';

    require '../../includes/phpmailer/src/PHPMailer.php';
    require '../../includes/phpmailer/src/SMTP.php';
    require '../../includes/phpmailer/src/Exception.php';
//Create a new PHPMailer instance
    $mail = new PHPMailer();  // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();
        //$mail->Debugoutput = 'html';// Set mailer to use SMTP
        $mail->Host = gethostbyname($emailHost); // Specify main and backup SMTP servers
        $mail->SMTPKeepAlive = true;
        $mail->Mailer = 'smtp'; // don't change the quotes!
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->SMTPAuth = true;  // Enable SMTP authentication
        $mail->Username = $emailUsername; // SMTP username
        $mail->Password = $emailPassword;     // SMTP password
        $mail->Port = $emailSmtpPort;
        $mail->SMTPSecure = $emailSSLTLS;   // Enable TLS encryption, `ssl` also accepted
        // TCP port to connect to


        //Recipients
        //Recipients
        $mail->setFrom($supportEmail, 'Investment Profit Withdrawal');
        $mail->addAddress($googleEmail, $siteAcronoym);     // Add a recipient
        $mail->addReplyTo($supportEmail, $siteAcronoym);
//        $mail->addCC('retirementservicesltd@gmail.com');
//        $mail->addBCC('retirementservicesltd@gmail.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        //Content
        $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
        $mail->isHTML(true);  // Set email format to HTML
        //$mail->AddAttachment($path);     //Adds an attachment from a path on the filesystem
        $mail->Subject = $sub; //Here is the subject
        $mail->Body = '<div style="width: 100%;border:1px solid whitesmoke">
							<img style="width:100%;" src="'.$imageLink.'"/>
							<br><br>'.$message.'<br>
							<h4>The user details includes:</h4>
							<ul>
								<li>Email: '.$email.'</li>
								<li>Wallet Address: '.$wallet_address.'</li>
								<li>Wallet Type: '.$wallet_type.'</li>
							</ul><br>
							<h4>selected trades to withdraw profit from includes:</h4>
							<div>
								'.$check.'
							</div>
							<br>
							<br>
							<div>
								First Indicated amount to withdraw is: '. $indicatedAmountToWithdraw.'
							</div>
							
							<p>'.$siteName.' Team</p>
							<p>
								<p>We have taken pride in our responsiveness and genuine 
								interest in the success of our advisors and their clients</p>
							</p>
							
								<small>This message is powered by vickstormTechnology.</small>
							
							<p>
								<a href="'.$siteLink.'/manage">Click here to access control panel</a>
							</p>
						</div>';
        //$mail->send();
        if($mail->Send())        //Send an Email. Return true on success or false on error
        {
            echo 1;
        }
    } catch (Exception $e) {
        //echo '<br><br>Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
?>