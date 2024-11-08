<?php
// Step 2: Load the Composer's Autoloader
require 'vendor/autoload.php';

// Step 3: Create a PHPMailer class object
$mail = new PHPMailer\PHPMailer\PHPMailer();

// Step 4: Configure Server Settings
$mail->SMTPDebug = 2; // Enable verbose debug output
$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.gfg.com'; // Specify main SMTP server
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'binodsharma420420@gmail.com'; // SMTP username
$mail->Password = 'ajlb yagz rywz ddqu'; // SMTP password
$mail->SMTPSecure = 'tls'; // Enable TLS encryption, 'ssl' also accepted
$mail->Port = 587; // TCP port to connect to

// Additional Steps for Sending an Email
$mail->setFrom('from@example.com', 'Mailer'); // Sender's email and name
$mail->addAddress('recipient@example.com', 'Recipient Name'); // Add a recipient
$mail->Subject = 'Here is the subject'; // Email subject
$mail->Body = 'This is the HTML message body <b>in bold!</b>'; // HTML message body
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // Alternative plain text message body

if ($mail->send()) {
    echo 'Message has been sent';
} else {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}
?>
