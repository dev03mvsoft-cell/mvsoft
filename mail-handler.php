<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Configuration
$gmail_user = 'dev03.mvsoft@gmail.com';
$gmail_pass = 'rhgc lslb qfxx szen'; // App Password
$recipient_email = 'dev03.mvsoft@gmail.com'; // Where to receive leads
$recaptcha_secret = '6LcNmGUsAAAAABUftYHIQlClEizCHBWugOV0elkq';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Honeypot check
    if (!empty($_POST['honeypot'])) {
        die("Bot detected.");
    }

    // 2. reCAPTCHA check
    $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';
    $verify_url = "https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response";
    $response = file_get_contents($verify_url);
    $response_keys = json_decode($response, true);

    if (!$response_keys["success"] || $response_keys["score"] < 0.5) {
        die("Verification failed. Please try again.");
    }

    // 3. Process Form Data
    $form_type = $_POST['form_type'] ?? 'general';
    $name = strip_tags(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST['message']));

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $gmail_user;
        $mail->Password   = $gmail_pass;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($gmail_user, 'Mvsoft Lead Engine');
        $mail->addAddress($recipient_email);
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);

        if ($form_type === 'career') {
            $phone = strip_tags(trim($_POST['phone']));
            $position = strip_tags(trim($_POST['position']));

            $mail->Subject = "New Career Application: $position - $name";
            $mail->Body    = "
                <h3>New Job Application</h3>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Applying For:</strong> $position</p>
                <p><strong>Message/Superpower:</strong><br>$message</p>
            ";

            // Attach Resume without saving to server folder
            if (isset($_FILES['resume']) && $_FILES['resume']['error'] == UPLOAD_ERR_OK) {
                $mail->addAttachment($_FILES['resume']['tmp_name'], $_FILES['resume']['name']);
            }
        } else {
            $service = strip_tags(trim($_POST['service']));

            $mail->Subject = "New Project Inquiry: $service - $name";
            $mail->Body    = "
                <h3>New Contact Inquiry</h3>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Service Interested:</strong> $service</p>
                <p><strong>Vision/Message:</strong><br>$message</p>
            ";
        }

        $mail->send();
        echo "<script>alert('Message has been sent successfully!'); window.location.href='index.php';</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header("Location: index.php");
    exit();
}
