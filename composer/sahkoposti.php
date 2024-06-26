<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.kaisanet.net';
$mail->SMTPAuth = true;
$mail->Username = '';
$mail->Password = '';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

if (!empty($_POST)) {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['text'];

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    $mail->setFrom($email, 'Yhteydenotto');
    $mail->addAddress('joni.piippo@meili.fi', 'Minä');
    $mail->Subject = $subject;
    $mail->isHTML(TRUE);
    $mail->Body = $message;

    // send the message
    if (!$mail->send()) {
        echo 'Email ei lähtenyt.';
    } else {
        echo 'Sähköpostisi on lähetetty, KIITOS!';
    }
}
?>