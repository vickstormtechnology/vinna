<?php
/*****************PHP mailer calls must be up******************/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set('Etc/UTC');
/*****************PHP mailer calls Ends******************/

$sub = 'Password Recovery | '.$siteAcronoym;


require '../wp-includes/phpmailer/src/PHPMailer.php';
require '../wp-includes/phpmailer/src/SMTP.php';
require '../wp-includes/phpmailer/src/Exception.php';
//Create a new PHPMailer instance
$mail = new PHPMailer();  // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;   // Enable error verbose debug output
    $mail->isSMTP();
    //$mail->Debugoutput = 'html';// Set mailer to use SMTP
    //$mail->Host = gethostbyname('smtp.gmail.com'); // Test on gmail Specify main and backup SMTP servers
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
    ///TEST oN HoST SERVER///
    $mail->Username = $emailUsername; // SMTP username
    $mail->Password = $emailPassword;     // SMTP password
    /********Test on local host********/
    //$mail->Username = 'princevick9@gmail.com';                 // SMTP username
    //$mail->Password = '4151342234';
    /*******Test on local host ends*****/
    //$mail->Port = 587;       //Test port gmail
    $mail->Port = $emailSmtpPort;
    $mail->SMTPSecure = $emailSSLTLS;   // Enable TLS encryption, `ssl` also accepted
    //Recipients
    $mail->setFrom($supportEmail, 'Forgot Password | '.$siteAcronoym);
    //$mail->setFrom('princevick9@gmail.com', 'Test on local host server');
    $mail->addAddress($email, $siteAcronoym);     // Add a recipient
    if(@$sendToAdmin == true){
        $mail->addAddress($googleEmail, 'Investor Password Changed' . $siteAcronoym);     // Add a recipient    //$mail->addAddress('ellen@example.com');               // Name is optional
    }
    $mail->addReplyTo($supportEmail, $siteAcronoym);
    $mail->WordWrap = 50;  //Sets word wrapping on the body of the message to a given number of characters
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = $sub; //Here is the subject
    $mail->Body = '<div style="width: 100%;border:1px solid whitesmoke">
							<img style="width:100%;" src="'.$imageLink.'"/>
							<br><br><b><h2>Password Recovery</h2></b></br>
							<br><b><h3>Hello '.$name.'</h3></b></br>
							<br>'.$message.'<br>
							<br>Contact support immediately if you did not initiate this action.<br>
							
							<p>'.$siteName.' Team</p>
						
							<ul>
								<li>Send a message to our support team @ <a href="mailto:'.$supportEmail.'">'.$supportEmail.'</a></li>
								<li>Fill our Contact form.</li>
								<li>We are here for you Mon-Fri.</li>
							</ul>
							<p>
								<a href="'.$siteLink.'">Click here to go back '.$siteName.' official website</a>
							</p>
						</div>';
    $mail->send();
    if($mail->Send())        //Send an Email. Return true on success or false on error
    {
        $emailSentSuccess = '<script>
            setTimeout(function() {
                swal({
                    title: "Email Sent!!!",
                    text: "We have sent an email to the email address you provided, login to your email to continue.",
                    type: "success"
                }, function() {
                    window.location.href="reset-password.php";
                });
           }, 500);
        </script>';
        echo "<script> alert('Done! An email has been sent to you, login to your email to reset your password. ');</script>";
    }
} catch (Exception $e) {
    //echo '<br><br>Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>