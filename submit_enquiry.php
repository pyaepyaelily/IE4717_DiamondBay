<?php
if (isset($_POST['submit'])) {
    // Collect and validate form data
    $voucherType = isset($_POST['voucherType']) ? $_POST['voucherType'] : '';
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $contactNumber = isset($_POST['contactNumber']) ? $_POST['contactNumber'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $company = isset($_POST['company']) ? $_POST['company'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $postalCode = isset($_POST['postalCode']) ? $_POST['postalCode'] : '';

    // Check if any required fields are empty
    if (empty($voucherType) || empty($quantity) || empty($title) || empty($name) || empty($contactNumber) || empty($email)) {
        echo 'Please fill in all mandatory fields.';
    } else {

    // Set the SMTP server and port for Mercury Mail
    ini_set("SMTP", "localhost");  // Change this to the correct server address if needed
    ini_set("smtp_port", 25);  // The default port for SMTP

    // Set the sender email address
    $senderEmail = 'user@localhost';

    // Compose the email message...
    $message = "Voucher Type: $voucherType\n";
    $message .= "Quantity: $quantity\n";
    $message .= "Comment: $comment\n";
    $message .= "Title: $title\n";
    $message .= "Name: $name\n";
    $message .= "Contact Number: $contactNumber\n";
    $message .= "Email: $email\n";
    $message .= "Company: $company\n";
    $message .= "Address: $address\n";
    $message .= "Postal Code: $postalCode\n";

    // Set the recipient email and subject
    $recipientEmail = 'diamondbay@localhost'; // Change to your recipient's email
    $subject = 'New Corporate Voucher Enquiry';

    // Set additional headers including the "Return-Path" header and sender email
    $additionalHeaders = "From: $senderEmail\r\n";
    $additionalHeaders .= "Return-Path: $senderEmail\r\n";

    // Send the email with the additional headers
    if (mail($recipientEmail, $subject, $message, $additionalHeaders)) {
        echo 'Email sent successfully!';
    } else {
        echo 'Email delivery failed.';
    }
}
}
?>