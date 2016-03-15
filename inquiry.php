<?php
require_once('PHPMailer/class.phpmailer.php');
$email = $_POST['email'];
$name=$_POST['nama'];			
$subject = 'Magazine Inquiry';	
$message1=$_POST['pesan'];
$to1="info@globetrotter.com";
$to="dantemustday19@gmail.com";

$mail = new PHPMailer(); // defaults to using php "mail()"
$mail->IsSendmail(); // telling the class to use SendMail transport
$mail->SetFrom($email, $name);
$mail->AddReplyTo($to,"First Last");
$address = "whoto@otherdomain.com";
$mail->AddAddress($to,"John Doe");
$mail->Subject    = $subject;
$mail->MsgHTML($message1);
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  header("Location: ".$_SESSION['lasturl']);
}

?>