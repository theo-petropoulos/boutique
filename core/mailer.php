<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/vendor/phpmailer/src/Exception.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/vendor/phpmailer/src/PHPMailer.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/vendor/phpmailer/src/SMTP.php';

    $mail=new PHPMailer(true);

    try {  
        $mail->isSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPauth = true;
        $mail->SMTPDebug = 2;
        $mail->SMTPsecure = 'tls';
        $mail->Host = gethostbyname("smtp.gmail.com");
        $mail->Port = 587;
        $mail->Username='contact.vonharper@gmail.com';
        $mail->Password='Plateforme123!';
        $mail->setFrom('contact.vonharper@gmail.com', 'Von Harper');
        $mail->Subject="Inscription";
        $mail->Body="Vous êtes inscris avec succès<p>Test de fou</p><strong>Wow</strong>";
        $mail->addAddress('gblfrpz@gmail.com', 'Theo');

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }