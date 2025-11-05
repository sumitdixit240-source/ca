<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['client_name']);
    $email   = htmlspecialchars($_POST['client_email']);
    $phone   = htmlspecialchars($_POST['client_phone']);
    $service = htmlspecialchars($_POST['interested_service']);
    $message = htmlspecialchars($_POST['query_details']);

    // ✅ Change this to your own email
    $to = "sumitdixit240.com";  // <-- REPLACE with CA Mohit Dixit’s real email

    $subject = "New Inquiry from $name";
    $body = "
    <h2>New Client Inquiry</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Phone:</strong> $phone</p>
    <p><strong>Service Interested:</strong> $service</p>
    <p><strong>Message:</strong><br>$message</p>
    ";

    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<div class='success'>✅ Your inquiry has been sent successfully. We’ll contact you soon!</div>";
    } else {
        echo "<div class='error'>❌ There was an error sending your message. Please try again later.</div>";
    }
} else {
    header("Location: inquire.html");
    exit;
}
?>
