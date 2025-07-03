<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "connect@incomeinnovate.in, diksha.kashyap@incomeinnovate.in, shivkumar@incomeinnovate.in";
    $subject = "📩 New Contact Form Submission from Income Innovate Website";

    // Get POST data
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $phone   = htmlspecialchars($_POST['phone']);
    $state   = htmlspecialchars($_POST['state']);
    $loan    = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Compose email body for team
    $body = "You have received a new message from the Income Innovate website:\n\n";
    $body .= "Name       : $name\n";
    $body .= "Email      : $email\n";
    $body .= "Phone      : $phone\n";
    $body .= "State      : $state\n";
    $body .= "Loan Type  : $loan\n";
    $body .= "Message    :\n$message\n";

    $headers = "From: $email";

    // Send to team
    if (mail($to, $subject, $body, $headers)) {

        // Auto-reply to sender
        $user_subject = "✅ Thank you for contacting Income Innovate!";
        $user_message = "Hi $name,\n\n";
        $user_message .= "Thank you for reaching out to Income Innovate. We've received your message and our team will get back to you shortly.\n\n";
        $user_message .= "Warm regards,\nTeam Income Innovate";

        mail($email, $user_subject, $user_message, "From: connect@incomeinnovate.com");

        echo "Your message has been sent successfully.";
    } else {
        echo "There was an error sending your message. Please try again.";
    }
}
?>
