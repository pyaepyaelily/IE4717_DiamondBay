<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="asset\style\promo_details.css">
</head>
<body>
    <div class="navbar">
        <div class="navbar-logo">
            <img src="asset\img\logo.png" alt="Logo">
        </div>
        <div class="navbar-links">
            <a href="homepage.php">Home</a>
            <a href="promotions.php">Promotions</a>
            <a href="gift.php">Gifts & Vouchers</a>
        </div>
    </div>

    <div class="div-body">
        <?php
            // Include your database connection code
            include('db_connection.php');

            // Get the promotion ID from the URL
            $promoId = $_GET['id'];

            // Query the database to retrieve promotion details based on the ID
            $query = "SELECT * FROM promotions WHERE id = $promoId";
            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed: " . mysqli_error($connection));
            }

            if ($row = mysqli_fetch_assoc($result)) {
                echo '<h1 class="promo-header">' . $row['promo_name'] . '</h1>';
                echo '<div class="movie-details-container">';
                echo '<div class="banner-container">';
                echo '<img src="asset/img/' . $row['promo_image'] . '" alt="' . $row['promo_image'] . '">';
                echo '</div>';
                echo '<div class="description-container">';
                echo '<p class="promo-description"><b>Details:</b></p>';
                echo '<br>';
                echo '<p class="promo-description">' . $row['promo_info'] . '</p>';
                echo '<br>';
                echo '<br>';
                echo '<p class="promo-description"><b>Terms and Conditions:</b></p>';
                echo '<br>';
                echo '<p class="promo-description">' . $row['terms_conditions'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<br>';
                echo '<div class="back-button">';
                echo '<a href="promotions.php" class="back-link">Back To Promotions</a>';
                echo '<br>';
                echo '<br>';
                echo '<br>';
            } else {
                echo '<p class="movie-details-error">Movie not found</p>';
            }

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
