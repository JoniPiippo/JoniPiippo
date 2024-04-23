<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.kaisanet.net';
$mail->SMTPAuth = true;
$mail->Username = 'JonPii06';
$mail->Password = 'Jonz15!';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

if (!empty($_POST)) {
    $asiakas = $_POST['email'];
    $otsikko = $_POST['otsikko'];
    $viesti = $_POST['text'];

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    $mail->setFrom($asiakas, 'Yhteydenotto');
    $mail->addAddress('joni.piippo@meili.fi', 'Minä');
    $mail->Subject = $otsikko;
    
    // Set HTML 
    $mail->isHTML(TRUE);
    $mail->Body = $viesti;
    $mail->AltBody = 'Hi there, we are happy to confirm your booking. Please check the document in the attachment.';

    // send the message
    if (!$mail->send()) {
        echo 'email ei lähtenyt.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'email on lähtenyt';
        header('location: ../yhteys.html');
    }
}
?>