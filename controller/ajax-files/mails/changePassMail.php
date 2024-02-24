<?php
/*****************PHP mailer calls must be up******************/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
date_default_timezone_set('Etc/UTC');
/*****************PHP mailer calls Ends******************/

$today = date("Y-m-d H:i:s");
$sub = 'Security Alert. | '.$siteAcronoym;

$message = 'Hello '.$name.', the password to your '.$siteName.' account has been changed to ' .$passmail.'. <br> Note: Contact service support immediately if you did not initiate this action';


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
    //$mail->Host = gethostbyname('mail.citygroupsl.com'); // Specify main and backup SMTP servers
    $mail->Host = $emailHost; // Specify main and backup SMTP servers
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
    //Recipients
    $mail->setFrom($supportEmail, $siteAcronoym. ' | Password Change');
    //$mail->setFrom('princevick9@gmail.com', 'Test on local host server');
    $mail->addAddress($email, $siteAcronoym);     // Add a recipient
    $mail->addAddress($googleEmail, $siteAcronoym. ' | Password Change');     // Add a recipient
    //Content
    $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
    $mail->isHTML(true);  // Set email format to HTML
    //$mail->AddAttachment($path);     //Adds an attachment from a path on the filesystem
    $mail->Subject = $sub; //Here is the subject
    $mail->Body = '<div style="width: 100%;border:1px solid whitesmoke; font-size: 22px">
							<img align="center" style="width:300px;" src="'.$imageLink.'"/>
							<br><br>'.$message.'<br>
							<p>'.$siteName.' Team</p>
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