<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/vendor/phpmailer/phpmailer/src/Exception.php';
require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/vendor/phpmailer/phpmailer/src/SMTP.php';

require realpath($_SERVER["DOCUMENT_ROOT"]) . "/boutique/vendor/autoload.php";

$mail = new PHPMailer();

if(isset($message) && $message){
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
            //iv should be randomized and stored into db
            //$iv=openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
            $iv=1012461197022165;
            $time=time();
            //keys should be randomized and stored into db
            $key="Pas vraiment sûr que ce soit secûr.";
            $key2="Après leurs, sait plus leurre.";
            $key3="L'ipée et le bouclier, l'adresse et la dextérité.";
            $cryptmail=urlencode(openssl_encrypt($mail_adress, $cipher, $key, OPENSSL_ZERO_PADDING, $iv));
            $crypttime=urlencode(openssl_encrypt($time, $cipher, $key2, OPENSSL_ZERO_PADDING, $iv));
            $cryptip=urlencode(openssl_encrypt($ip, $cipher, $key3, 0, $iv));
            $link='localhost/boutique/pages/profil.php?m=' . $cryptmail . '&v=' . $iv . '&i=' . $cryptip . '&t=' . $crypttime;
            $content=file_get_contents('../model/mails/newip_ok.html');
            $content=str_replace('$rip', $ip, $content);
            $content=str_replace('$rdated', $dated, $content);
            $content=str_replace('$rdatet', $datet, $content);
            $content=str_replace('$rlink', $link, $content);
            break;
        case 'resetpwd':
            $title='Réinitialisation du mot de passe';
            $cipher = "AES-128-CTR";
            $dated=date('d/m/Y');
            $datet=date('H:i:s');
            //iv should be randomized and stored into db
            //$iv=openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
            $iv=7770326529905045;
            //key should be randomized and stored into db
            $key="Un de perdu, un de retrouvé, pas de quoi s'affoler.";
            $key2="L'horloge signe d'un Z du bout de son heure de pointe.";
            $time=time();
            $cryptmail=urlencode(openssl_encrypt($mail_adress, $cipher, $key, ODPENSSL_ZERO_PADING, $iv));
            $crypttime=urlencode(openssl_encrypt($time, $cipher, $key2, OPENSSL_ZERO_PADDING, $iv));
            $link='localhost/boutique/pages/resetpwd.php?m=' . $cryptmail . '&v=' . $iv . '&t=' . $crypttime;
            $content=file_get_contents('../model/mails/resetpwd_ok.html');
            $content=str_replace('$rdated', $dated, $content);
            $content=str_replace('$rdatet', $datet, $content);
            $content=str_replace('$rlink', $link, $content);
            break;
        default:
            header('Location:/boutique/index.php');
            break;
    }
}else die("Vous ne pouvez pas accéder à cette page.");

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
$mail->Password = //CENSORED;                  
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
