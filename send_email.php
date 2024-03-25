<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST["email"];
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "" ;
    $messageSubject = isset($_POST["subject"]) ? $_POST["subject"] : "New user Subscribed"; // Check if subject is provided
    $message = isset($_POST["message"]) ? $_POST["message"] : "";
     // Check if message is provided

    if (!empty($email) && empty($message)) {
        // If only email is provided
        $userInfo = "Email: " . $email;
        $message = $email . " " . "has successfully subscribed to our mailing services";
    } else {
        $userInfo = "Message Subject: " . $messageSubject . "<br>Name:" . $_POST["name"] . "<br>" . "Email: " . $email . "<br>Phone: " . $phone;
        $message = "Message: " . $message . "<br>" . $userInfo;
    }

    // Set email parameters
    $to = "itssarwar11@gmail.com";
    $subject = $messageSubject;
    $headers = "From: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $SMTPSecure = "tls";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Email sending failed.";
    }
} else {
    echo "Form submission method not allowed.";
}
?>
