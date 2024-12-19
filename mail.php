<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task']) && $_POST['task'] === 'request') {
    // Sanitize and validate input
    $firstname = htmlspecialchars(trim($_POST['firstname']), ENT_QUOTES, 'UTF-8');
    $lastname = htmlspecialchars(trim($_POST['lastname']), ENT_QUOTES, 'UTF-8');
    $new_email = filter_var(trim($_POST['new_email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']), ENT_QUOTES, 'UTF-8');

    // Validate email
    if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email address. Please try again.');</script>";
        exit;
    }

    // Construct email content
    $content = '
        <table width="80%" border="0" cellpadding="3" cellspacing="3" 
               style="border:1px solid #d3d3d3; font-size:12px; font-family:Verdana,Arial,Helvetica,sans-serif;">
            <tr>
                <td colspan="3" align="left"><strong>Travel & Tour Booking</strong></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td>:</td>
                <td>' . $firstname . '</td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>:</td>
                <td>' . $lastname . '</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>' . $new_email . '</td>
            </tr>
            <tr>
                <td>Message</td>
                <td>:</td>
                <td>' . nl2br($message) . '</td>
            </tr>
        </table>';

    // Email headers
    $from_email = 'mithunraj1590@gmail.com';
    $admin_name = "Travel & Tour Booking";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
    $headers .= "From: $admin_name <$from_email>" . "\r\n";
    $headers .= "Reply-To: $new_email" . "\r\n";

    // Send email
    $mail_success = mail($from_email, "From Travel & Tour Booking", $content, $headers);

    // Handle response
    if ($mail_success) {
        echo "<script>alert('Email has been sent successfully!');</script>";
    } else {
        echo "<script>alert('Failed to send the email. Please try again later.');</script>";
    }

    // Redirect to the same page
    header("Location: " . htmlspecialchars($_SERVER['PHP_SELF']));
    exit;
} else {
    // If accessed directly, redirect to the home page
    header("Location: /");
    exit;
}