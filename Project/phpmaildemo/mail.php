<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 $to=$_REQUEST['email'];
require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';
//include 'cn.php';
// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);
ob_start();
try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = 'bgr98796@gmail.com'; // YOUR gmail email
    $mail->Password = 'zaup wjtk ylca swcc'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('bgr98796@gmail.com', 'Bhakti');
    $mail->addAddress($to, 'receiver name');
    $mail->addReplyTo('bgr98796@gmail.com', 'Bhakti'); // to set the reply to

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "Send email By Zoofari Park Booking...";
    $mail->Body = "
<body  style='background-color: #D2D9D9;'>
<h1>Your Package is booked</h1>
</body> ";
   // $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

    $mail->send();
    echo "Email message sent.";
    header("Location: index2.php");
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
ob_end_flush();
?>
