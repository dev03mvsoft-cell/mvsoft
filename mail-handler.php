<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Configuration
$gmail_user = 'dev03.mvsoft@gmail.com';
$gmail_pass = 'rhgc lslb qfxx szen'; // App Password
$recipient_email = 'admin@MVsoft Solutions .com'; // Where to receive leads
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
        $mail->setFrom($gmail_user, 'MVsoftLead Engine');
        $mail->addAddress($recipient_email);
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);

        // Common Styles & Branding
        $logo_url = "https://mvsoftsolutions.com/assets/img/logo1.png";
        $primary_blue = "#1a387f";
        $glass_bg = "rgba(255, 255, 255, 0.85)";
        $address = "No 106, 1st Floor, Shree Ambika Arcade, Plot no 300, Ward: 12/b, Gandhidham(Kutch) Gujarat, India";
        $facebook_url = "https://www.facebook.com/people/MVSoft-Solutions/61588057437483/";
        $instagram_url = "https://www.instagram.com/mvsoftsolutions?utm_source=qr&igsh=MTFoNjcxNjhhZXA2Mg%3D%3D";
        $linkedin_url = "https://www.linkedin.com/company/mvsoft-solutions/";

        $header_style = "color: $primary_blue; font-family: 'Segoe UI', Arial, sans-serif; font-size: 24px; font-weight: 700; margin-bottom: 20px;";
        $label_style = "color: $primary_blue; font-weight: 700; font-family: 'Segoe UI', Arial, sans-serif;";
        $text_style = "color: #000000; font-family: 'Segoe UI', Arial, sans-serif; line-height: 1.6;";

        // Email shell construction
        $email_start = "
        <div style=\"background: linear-gradient(135deg, #f0f4ff 0%, #d9e2ff 100%); padding: 40px 20px; font-family: 'Segoe UI', Arial, sans-serif;\">
            <div style=\"max-width: 600px; margin: 0 auto; background: $glass_bg; border: 1px solid rgba(26, 56, 127, 0.1); border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);\">
                <div style=\"padding: 40px;\">
                    <img src=\"$logo_url\" alt=\"MVsoft Logo\" style=\"width: 150px; margin-bottom: 30px;\">
        ";

        $email_end = "
                    <div style=\"margin-top: 40px; padding-top: 30px; border-top: 1px solid rgba(26, 56, 127, 0.1); text-align: center;\">
                        <p style=\"$text_style font-size: 13px; color: #666;\">$address</p>
                        <div style=\"margin-top: 20px;\">
                            <a href=\"$facebook_url\" style=\"display: inline-block; margin: 0 10px; color: $primary_blue; text-decoration: none; font-size: 20px;\">FB</a>
                            <a href=\"$instagram_url\" style=\"display: inline-block; margin: 0 10px; color: $primary_blue; text-decoration: none; font-size: 20px;\">IG</a>
                            <a href=\"$linkedin_url\" style=\"display: inline-block; margin: 0 10px; color: $primary_blue; text-decoration: none; font-size: 20px;\">LI</a>
                        </div>
                        <p style=\"$text_style font-size: 12px; margin-top: 20px; color: #999;\">&copy; " . date('Y') . " MVsoft Solutions. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
        ";

        if ($form_type === 'career') {
            $phone = strip_tags(trim($_POST['phone']));
            $position = strip_tags(trim($_POST['position']));

            $mail->Subject = "New Career Application: $position - $name";
            $mail->Body    = $email_start . "
                <h2 style=\"$header_style\">Career Application</h2>
                <p style=\"$text_style\"><span style=\"$label_style\">Position:</span> $position</p>
                <p style=\"$text_style\"><span style=\"$label_style\">Name:</span> $name</p>
                <p style=\"$text_style\"><span style=\"$label_style\">Email:</span> $email</p>
                <p style=\"$text_style\"><span style=\"$label_style\">Phone:</span> $phone</p>
                <hr style=\"border: none; border-top: 1px solid rgba(0,0,0,0.05); margin: 20px 0;\">
                <p style=\"$text_style\"><span style=\"$label_style\">Message/Superpower:</span><br>$message</p>
            " . $email_end;

            // Attach Resume without saving to server folder
            if (isset($_FILES['resume']) && $_FILES['resume']['error'] == UPLOAD_ERR_OK) {
                $mail->addAttachment($_FILES['resume']['tmp_name'], $_FILES['resume']['name']);
            }
        } else {
            $service = strip_tags(trim($_POST['service']));

            $mail->Subject = "New Project Inquiry: $service - $name";
            $mail->Body    = $email_start . "
                <h2 style=\"$header_style\">Project Inquiry</h2>
                <p style=\"$text_style\"><span style=\"$label_style\">Service:</span> $service</p>
                <p style=\"$text_style\"><span style=\"$label_style\">Name:</span> $name</p>
                <p style=\"$text_style\"><span style=\"$label_style\">Email:</span> $email</p>
                <hr style=\"border: none; border-top: 1px solid rgba(0,0,0,0.05); margin: 20px 0;\">
                <p style=\"$text_style\"><span style=\"$label_style\">Vision/Message:</span><br>$message</p>
            " . $email_end;
        }

        $mail->send();
        echo "<script>alert('Message has been sent successfully!'); window.location.href='/'</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header("Location:/");
    exit();
}
