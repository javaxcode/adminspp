<?php
require_once "../../vendor/autoload.php";

//use PHPMailer\PHPMailer\PHPMailer;
include "../../classes/class.phpmailer.php";


// $token = MD5($email . $this->secret);
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPKeepAlive = true;
$mail->Mailer = 'smtp'; // don't change the quotes!
$mail->Host = "$mailhost1";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "$username1";
$mail->Password = "$password1";
$mail->SetFrom($username1, $setfrom1);
$mail->addAddress($email); // email tujuan
$mail->Subject = "$subject";
$mail->isHTML(true);
if (isset($bccAddress)) {
    $mail->addBCC($bccAddress, "Notif '.$setfrom1.'");
} else {
    $mail->addBCC($username1, "Notif '.$setfrom1.'");
}
$mail->Body = "$pesan";