<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form data
    $cardNumber = $_POST['cardNumber'];
    $expiryMonth = $_POST['expiryMonth'];
    $expiryYear = $_POST['expiryYear'];
    $nameOnCard = $_POST['nameOnCard'];
    $cvv = $_POST['cvv'];
    $email = $_POST['email'];

    // Session data
    $movieId = $_SESSION['movieId'];
    $showTimeId = $_SESSION['show_time_id'];
    $hallId = $_SESSION['hallId'];
    $selectedSeatIDArray = $_SESSION['selectedSeatIDArray'];

    $insertSql = "INSERT INTO booking (movie_id, show_time_id, hall_id, seat_id) VALUES (?, ?, ?, ?)";
    $insertStmt = $connection->prepare($insertSql);

    $success = true; 

    if ($insertStmt) {
        foreach ($selectedSeatIDArray as $selectedSeatID) {
            $insertStmt->bind_param("iiis", $movieId, $showTimeId, $hallId, $selectedSeatID);

            if (!$insertStmt->execute()) {
                // Handle insertion error for this seat
                echo "Error: " . $insertStmt->error;
                $success = false;
                break;
            }
        }

        $insertStmt->close();

        if ($success) {
            $updateSql = "UPDATE hall SET available = 1 WHERE id = ?";
            $updateStmt = $connection->prepare($updateSql);

            if ($updateStmt) {
                foreach ($selectedSeatIDArray as $selectedSeatID) {
                    $updateStmt->bind_param("i", $selectedSeatID);

                    if (!$updateStmt->execute()) {
                        echo "Error updating record with ID $selectedSeatID: " . $updateStmt->error;
                    }
                }

                $updateStmt->close();
            } else {
                echo "Error preparing update statement: " . $connection->error;
            }

            $connection->close();

            // To send email to user
            // Getting session
            $movieName = $_SESSION['movieName'];
            $theater = $_SESSION['theater'];
            $showDate = $_SESSION['showDate'];
            $showTime =  $_SESSION['showTime'];
            $cart = $_SESSION['cart'];
            $selectedSeatArray =  $_SESSION['selectedSeatArray'];

            ini_set("SMTP", "localhost"); 
            ini_set("smtp_port", 25);

            // Set the sender email address
            $senderEmail = 'diamondbay@localhost';

            $message = "Thank you for choosing Diamond Bay\n";
            $message .= "Movie: $movieName\n";
            $message .= "Location:  $theater\n";
            $message .= "Hall:  $hallId\n";
            $message .= "Date:  $showDate\n";
            $message .= "Time:  $showTime\n";

            $message .= "Online Deals:\n";
            foreach ($cart as $item) {
                $message .= "- " . $item['name'] . " x" . $item['quantity'] . "\n";
            }

            $message .= "Seats:\n";
            for ($i = 0; $i < count($selectedSeatArray); $i++) {
                $selectedSeat = $selectedSeatArray[$i];

                $message .= "- $selectedSeat\n";
            }

            $recipientEmail = 'user@localhost';
            $subject = 'Confirmation of Movie Booking';

            $additionalHeaders = "From: $senderEmail\r\n";
            $additionalHeaders .= "Return-Path: $senderEmail\r\n";

            $mailSuccess = mail($recipientEmail, $subject, $message, $additionalHeaders);

            if ($mailSuccess) {
                header("Location: thankyou.php");
                exit();
            } else {
                echo "Error sending confirmation email.";
            }
        } else {
            echo "Error: Not all records were inserted successfully.";
        }
    } else {
        echo "Error preparing insert statement: " . $connection->error;
    }
}
