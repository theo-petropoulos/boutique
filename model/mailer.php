<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/vendor/phpmailer/phpmailer/src/Exception.php';
require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/vendor/phpmailer/phpmailer/src/SMTP.php';

require realpath($_SERVER["DOCUMENT_ROOT"]) . "/boutique/vendor/autoload.php";

$mail = new PHPMailer();

switch($message){
    case 'newsletter':
        $title='Votre inscription à la Newsletter';
        $content=file_get_contents('../model/newsletter_ok.html');
        $content=str_replace('$rmail', $mail_adress, $content);
        $content=str_replace('$rlink', $link, $content);
        break;
    case 'contact':
        $title='Contact - ' . $subject . ' - ' . $mail_from;
        $content='<p style="border-bottom:1px solid black;font-family:\'Verdana\'"><span style="font-weight:800">Nom :</span> ' . $lastname . '<br>
        <span style="font-weight:800">Prénom :</span> ' . $firstname . '<br>
        <span style="font-weight:800">Mail :</span>  ' . $mail_from . '<br>
        <span style="font-weight:800">Sujet :</span> ' . $subject . '</p>
        <p style="font-family:\'Verdana\'"><span style="font-weight:800">Message :</span> <br>' . $inquiry . '</p>';
        break;
    default:
        header('Location:/boutique/index.php');
        break;
}

//Enable SMTP debugging. 
// $mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "contact.vonharper@gmail.com";                 
$mail->Password = "Plateforme123!";                           
//If SMTP requires TLS encryption then set it
//$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = "contact.vonharper@gmail.com";
$mail->FromName = "Von Harper";

$mail->smtpConnect(
    array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    )
);

$mail->AddAddress($mail_adress);
$mail->WordWrap = 40; // set word wrap
$mail->Encoding = 'base64';
$mail->CharSet = "UTF-8";

$mail->IsHTML(true); // send as HTML

$mail->Subject = $title;
$mail->Body = $content;
$mail->AltBody = "Plain text"; //Text Body 

if(!$mail->Send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else{

}
?>