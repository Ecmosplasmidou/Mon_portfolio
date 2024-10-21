<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Adresse email de destination
    $to = 'ecmosdev@gmail.com'; 

    // Sujet de l'email
    $subject = 'Contact De Ecmosdev-Portfolio';

    // Corps de l'email
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // Créer une instance de PHPMailer
    $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ecmosdev@gmail.com';                     //SMTP username
    $mail->Password   = 'ltxk hiqf rjrq pjgt ';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;


        // Destinataires
        $mail->setFrom($email, $name);
        $mail->addAddress($to);

        // Contenu de l'email
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        // Envoyer l'email
        $mail->send();

    header('Location: contact_success.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}