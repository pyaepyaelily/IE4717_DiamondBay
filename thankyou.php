<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Deals</title>
    <link rel="stylesheet" href="asset\style\thankyou.css">
    <link rel="stylesheet" href="asset\style\navbar_footer.css">
</head>

<body>
    <div class="navbar">
        <div class="navbar-logo">
            <img src="asset\img\logo.png" alt="Logo">
        </div>
        <div class="navbar-links">
            <a href="#">Home</a>
            <a href="#">Promotions</a>
            <a href="gift.php">Gifts & Vouchers</a>
        </div>
    </div>

    <div class="div_body">
        <div class="thank-you-container">
            <h1>Thank You for Your Purchase</h1>
            <p>Your payment was successful, and your order has been placed. An order confirmation email has been sent to your email address.</p>
            <p>Please check your email for important information regarding your order.</p>
            <p>If you don't see the email in your inbox, please check your spam folder.</p>
        </div>

        <div class="centered-button">
            <a href="home.html" class="back-to-home-button">Return to Home</a>
        </div>

        <?php
        // Include your database connection code
        include('db_connection.php');

        // Close the database connection
        mysqli_close($connection);
        ?>
    </div>


    <footer>
        <div class="footer-row">
            <p>Supported Payment</p>
        </div>
        <div class="footer-row">
            <img src="asset\img\visa-mastercard-logos.jpg" alt="Supported Payment">
        </div>
        <div class="footer-row">
            <p>&copy; 2023 Diamond Bay</p>
        </div>
    </footer>


</body>

</html>