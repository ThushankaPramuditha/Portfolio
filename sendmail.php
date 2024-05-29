<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'pawfectcarelk@gmail.com'; // Replace with your email address
        $mail->Password = 'zdzf kfpa mfqb tktp'; // Replace with your email password
        $mail->SMTPSecure = 'ssl'; // Adjust encryption if necessary
        $mail->Port = 465; // Standard SSL port

        // Set sender and recipient details
        $mail->setFrom('pawfectcarelk@gmail.com', 'Pawfect Care'); // Replace with your sender information
        $mail->addAddress($email);     // Add a recipient
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "Name: $name<br>Email: $email<br>Mobile: $mobile<br><br>Message:<br>$message";
        $mail->AltBody = "Name: $name\nEmail: $email\nMobile: $mobile\n\nMessage:\n$message";

        $mail->send();
        echo "<script>
                alert('Message has been sent');
                window.location.href = 'index.php';
              </script>";
    } catch (Exception $e) {
        echo "<script>
                alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
                window.location.href = 'index.php';
              </script>";
    }
}
?>
