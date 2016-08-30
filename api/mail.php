<?php
require '../PHPMailer/PHPMailerAutoload.php';

$post = file_get_contents('php://input');  
$post = json_decode($post);

$name  =$post->name;
$email =$post->email;
$phone =$post->phone;

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'riteshanhad@gmail.com';          // SMTP username
$mail->Password = 'papa9415683561';                 // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('riteshanhad@gmail.com', 'support');
//$mail->addReplyTo('riteshanhad@gmail.com', 'CodexWorld');
$mail->addAddress($email);   // Add a recipient
//$mail->addCC('ravianhad1@gmail.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>Welcome to Edoofa Thanks for register</h1><br><p>Name is:' .$name. '<br>Email is:' .$email.'<br>Mobile no. is:' 
.$phone. '<br><br>Thanks & Regards.<br>
Edoofa Team.</p>';


$mail->Subject = 'Thanks For register Edoofa';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
	echo json_encode('Message could not be sent'.$mail->ErrorInfo);
} else {
    echo json_encode('mail sent.');
}
?>
