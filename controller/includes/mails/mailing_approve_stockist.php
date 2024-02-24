<?php
/*****************PHP mailer calls must be up******************/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
date_default_timezone_set('Etc/UTC');
/*****************PHP mailer calls Ends******************/

//Recievers email is gotten from the index page cus this file is included//$ToEmail = test_input($_POST ['email']);
$today = date("d-m-Y H:i:s");
$sub = 'Stockist Request Approved';
$message = 'Hello '.$n.', your request to join the '.$siteLink.' Stockist pool was successful and has been aprroved on  '.$today. '.  Happy Trading!';

require '../includes/phpmailer/src/PHPMailer.php';
require '../includes/phpmailer/src/SMTP.php';
require '../includes/phpmailer/src/Exception.php';
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
    $mail->setFrom($supportEmail, 'Stockist Confirmed | '.$siteAcronoym);
    $mail->addAddress($ToEmail, 'Stockist Request Approved');     // Add a recipient
    $mail->addReplyTo($supportEmail, 'Stockist Request Approved');

    $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
    $mail->isHTML(true);  // Set email format to HTML
    //$mail->AddAttachment($path);     //Adds an attachment from a path on the filesystem
    $mail->Subject = $sub; //Here is the subject
    $mail->Body = '<div style="width: 100%;border:1px solid whitesmoke">
							<img style="width:100%;" src="'.$imageLink.'"/>
							<br>'.$message.'<br>
							<p>'.$siteName.'</p>
							<p>
								<p>We have taken pride in our responsiveness and genuine 
								interest in the success of our investors.</p>
								
								<b>Got any questions on our terms of service?</b>
							</p>
							<ul>
								<li>Send a message to our support team @ <a href="mailto:'.$supportEmail.'">'.$supportEmail.'</a></li>
								<li>Fill our Contact form.</li>
								<li>We are here for you Mon-Fri.</li>
							</ul>
							<p>
								<a href="'.$siteLink.'">Click here to go back '.$siteName.' official website</a>
							</p>
						</div>';
    if($mail->Send())        //Send an Email. Return true on success or false on error
    {
        $delete_callback = '<script>
                                 setTimeout(function() {
                                     swal({
                                         title: "Successful!!!",
                                         text: "User added to stockist pool!!",
                                         type: "success"
                                     }, function() {
                                         window.location.href=\'stockist.php\';
                                     });
                                 }, 1000);
                             </script>';
    }
} catch (Exception $e) {
    //echo "<script>alert('Deposit Approved for user: $n but auto email could not be sent to the user');window.location.href='approve.php';</script>";
}
?>