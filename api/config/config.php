<?php
if(isset($_GET['token'])){
    $token = md5(uniqid(1234567890, true));
    header('Content-type: application/json');
    $data = array(
        'API_TOKEN' => $token,
        'botName' => "Vinna (BOT)",
        'siteLink' => "http://localhost/vinna",
        'API_URL' => "http://localhost/vinna/api/",
        'emailHost' => "mail.trustfinanciers.com",
        'emailSmtpPort' => "587",
        'emailSSLTLS' => "TLS",
        'emailUsername' => "mailing@trustfinanciers.com",
        'emailPassword' => "/*4151342234*/",
        'googleEmail' => "vinnabot@gmail.com",
    );
    echo json_encode($data);
}