<?php
if (isset($_POST['submit'])) {
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

    if (empty($voucherType) || empty($quantity) || empty($title) || empty($name) || empty($contactNumber) || empty($email)) {
        echo 'Please fill in all mandatory fields.';
    } else {

    ini_set("SMTP", "localhost");
    ini_set("smtp_port", 25);

    $senderEmail = 'user@localhost';

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

    $recipientEmail = 'diamondbay@localhost';
    $subject = 'New Corporate Voucher Enquiry';

    $additionalHeaders = "From: $senderEmail\r\n";
    $additionalHeaders .= "Return-Path: $senderEmail\r\n";

    if (mail($recipientEmail, $subject, $message, $additionalHeaders)) {
        header('Location: gift.php?success=1');
        exit();
    } else {
        header('Location: gift.php?error=1');
        exit();
    }
}
}
