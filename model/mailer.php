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
        $content=file_get_contents('../model/mails/newsletter_ok.html');
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
    case 'purchase':
        $title='Votre commande est en cours de traitement';
        $content=file_get_contents('../model/mails/purchase_ok.html');
        $content=str_replace('$rnom', $lastname, $content);
        $content=str_replace('$rprenom', $firstname, $content);
        $content=str_replace('$rorder', $ordernum, $content);
        break;
    case 'subscribe':
        $title='Votre inscription a bien été enregistrée';
        $content=file_get_contents('../model/mails/subscribe_ok.html');
        $content=str_replace('$rnom', $lastname, $content);
        $content=str_replace('$rprenom', $firstname, $content);
        break;
    case 'delete':
        $title='Nous sommes désolés de vous voir partir';
        $content=file_get_contents('../model/mails/delete_ok.html');
        $content=str_replace('$rnom', $lastname, $content);
        $content=str_replace('$rprenom', $firstname, $content);
        break;
    case 'newip':
        $title='Connexion depuis un nouvel appareil';
        $ip=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set('Europe/Paris');
        $dated=date('d/m/Y');
        $datet=date('H:i:s');
        $cipher = "AES-128-CTR";
        // $iv=openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $iv=1012461197022165;
        $key='Pas vraiment sûr que ce soit secûr.';
        $key2='Là c\'est l\'adresse mail qu\'on crypte.';
        $cryptip=openssl_encrypt($ip, $cipher, $key, OPENSSL_ZERO_PADDING, $iv);
        $cryptmail=openssl_encrypt($mail_adress, $cipher, $key2, OPENSSL_ZERO_PADDING, $iv);
        $link='localhost/boutique/pages/profil.php?m=' . $cryptmail . '&v=' . $iv . '&i=' . $cryptip;
        $content=file_get_contents('../model/mails/newip_ok.html');
        $content=str_replace('$rip', $ip, $content);
        $content=str_replace('$rdated', $dated, $content);
        $content=str_replace('$rdatet', $datet, $content);
        $content=str_replace('$rlink', $link, $content);
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