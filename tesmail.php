<?php
include 'include/fungsi.php';
include "classes/class.phpmailer.php";

$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPSecure = 'tls';
$mail->Host = $mailhost1; //host masing2 provider email
$mail->SMTPDebug = 3;
$mail->Debugoutput = 'html';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = $username1; //user email
$mail->Password = $password1; //password email 
$mail->SetFrom($username1, $setform1); //set email pengirim
$mail->Subject = "Test mail"; //subyek email
$mail->AddAddress("sgendenk@gmail.com");  //tujuan email
$mail->AddBCC($username1, $setform1);
$mail->MsgHTML(" Tes email");
//$mail->IsHTML(true);
//$mail->Body    = "pusinngggg.....";
if ($mail->Send()) echo "Message has been sent";
else echo "Failed to sending message";
