<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
include('db_connection.php'); // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $cardNumber = $_POST['cardNumber'];
    $expiryMonth = $_POST['expiryMonth'];
    $expiryYear = $_POST['expiryYear'];
    $nameOnCard = $_POST['nameOnCard'];
    $cvv = $_POST['cvv'];
    $email = $_POST['email'];

    // Retrieve session data
    $movieId = $_SESSION['movieId'];
    $showTimeId = $_SESSION['show_time_id'];
    $hallId = $_SESSION['hallId'];
    $selectedSeatIDArray = $_SESSION['selectedSeatIDArray'];


    // SQL statement to insert data into the 'booking' table
    $insertSql = "INSERT INTO booking (movie_id, show_time_id, hall_id, seat_id) VALUES (?, ?, ?, ?)";
    $insertStmt = $connection->prepare($insertSql);

    $success = true; // Initialize a success flag

    if ($insertStmt) {
        foreach ($selectedSeatIDArray as $selectedSeatID) {
            // Bind the parameters and execute the statement for each seat
            $insertStmt->bind_param("iiis", $movieId, $showTimeId, $hallId, $selectedSeatID);

            if (!$insertStmt->execute()) {
                // Handle insertion error for this seat
                echo "Error: " . $insertStmt->error;
                $success = false; // Set the success flag to false
                break; // Exit the loop on the first failure
            }
        }

        // Close the insert statement
        $insertStmt->close();

        if ($success) {
            // All insertions were successful
            // Now, update the records in the 'hall' table
            $updateSql = "UPDATE hall SET available = 1 WHERE id = ?";
            $updateStmt = $connection->prepare($updateSql);

            if ($updateStmt) {
                foreach ($selectedSeatIDArray as $selectedSeatID) {
                    // Bind the 'id' parameter and execute the update for each selected seat
                    $updateStmt->bind_param("i", $selectedSeatID);

                    if (!$updateStmt->execute()) {
                        // Handle update error for this seat
                        echo "Error updating record with ID $selectedSeatID: " . $updateStmt->error;
                    }
                }

                // Close the update statement
                $updateStmt->close();
            } else {
                // Handle the case where the update statement could not be prepared
                echo "Error preparing update statement: " . $connection->error;
            }

            // Close the database connection
            $connection->close();

            // To send email to user
            // Getting session
            $movieName = $_SESSION['movieName'];
            $theater = $_SESSION['theater'];
            $showDate = $_SESSION['showDate'];
            $showTime =  $_SESSION['showTime'];
            $cart = $_SESSION['cart'];
            $selectedSeatArray =  $_SESSION['selectedSeatArray'];

            // Set the SMTP server and port for Mercury Mail
            ini_set("SMTP", "localhost");  // Change this to the correct server address if needed
            ini_set("smtp_port", 25);  // The default port for SMTP

            // Set the sender email address
            $senderEmail = 'diamondbay@localhost';

            // Compose the email message...
            $message = "Thank you for choosing Diamond Bay\n";
            $message .= "Movie: $movieName\n";
            $message .= "Location:  $theater\n";
            $message .= "Hall:  $hallId\n";
            $message .= "Date:  $showDate\n";
            $message .= "Time:  $showTime\n";

            // Display the online deals
            $message .= "Online Deals:\n";
            foreach ($cart as $item) {
                $message .= "- " . $item['name'] . " x" . $item['quantity'] . "\n";
            }

            // Display the selected seats
            $message .= "Seats:\n";
            // foreach ($selectedSeatIDArray as $seat) {
            //     $message .= "- $seat\n";
            // }


            for ($i = 0; $i < count($selectedSeatArray); $i++) {
                $selectedSeat = $selectedSeatArray[$i];

                $message .= "- $selectedSeat\n";
            }

            // Set the recipient email and subject
            $recipientEmail = 'user@localhost'; // Change to your recipient's email
            $subject = 'Confirmation of Movie Booking';

            // Set additional headers including the "Return-Path" header and sender email
            $additionalHeaders = "From: $senderEmail\r\n";
            $additionalHeaders .= "Return-Path: $senderEmail\r\n";

            // Send the email
            $mailSuccess = mail($recipientEmail, $subject, $message, $additionalHeaders);

            if ($mailSuccess) {
                // Email sent successfully
                header("Location: thankyou.php");
                exit();
            } else {
                // Handle email sending failure
                echo "Error sending confirmation email.";
            }
        } else {
            // Handle the case where at least one insertion failed
            echo "Error: Not all records were inserted successfully.";
        }
    } else {
        // Handle the case where the insert statement could not be prepared
        echo "Error preparing insert statement: " . $connection->error;
    }
}
