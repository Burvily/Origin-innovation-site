<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = strip_tags(trim($_POST["fullname"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Set recipient email address
    $recipient = "info@origininnovationltd.com"; // Replace with your desired email address

    // Set email subject
    $subject = "New Contact from Origin Innovation Website by: $name";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers
    $email_headers = "From: $name <$email>";

    // Send the email
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Redirect to a success page or display a success message
        http_response_code(200);
        echo "Thank You! Your message has been sent.";
    } else {
        // Display an error message
        http_response_code(500);
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }

} else {
    // Not a POST request, display an error
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>