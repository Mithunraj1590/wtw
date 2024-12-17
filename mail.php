<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form inputs
    $firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : '';
    $lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : '';
    $new_email = isset($_POST['new_email']) ? trim($_POST['new_email']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Check if all required fields are filled
    if (!empty($firstname) && !empty($lastname) && !empty($new_email)) {

        // Set the recipient email address
        $to = "mithunraj1590@gmail.com";  // Replace with the email you want to send to

        // Set the subject of the email
        $subject = "New message from $firstname $lastname";

        // Set the email headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: $new_email" . "\r\n";  // Sender's email
        $headers .= "Reply-To: $new_email" . "\r\n"; // Reply-to email

        // Create the HTML email body
        $body = "
        <html>
        <head>
            <title>$subject</title>
        </head>
        <body>
            <h2>New Message from Contact Form</h2>
            <p><strong>First Name:</strong> $firstname</p>
            <p><strong>Last Name:</strong> $lastname</p>
            <p><strong>Email:</strong> $new_email</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
        </body>
        </html>
        ";

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "Thank you! Your message has been sent.";
        } else {
            echo "Sorry, there was an issue sending your message. Please try again later.";
        }

    } else {
        echo "Please fill out all required fields.";
    }

} else {
    echo "Invalid request.";
}
?>
