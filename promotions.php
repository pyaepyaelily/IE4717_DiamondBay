<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="asset\style\promotions.css">
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
    
    
            // Query the database to select the data from the 'movie' table.
            $query = "SELECT * FROM promotions";
            $result = mysqli_query($connection, $query);
    
            if (!$result) {
                die("Query failed: " . mysqli_error($connection));
            }
        
            echo '<h1 class="promo-header">Promotions!</h1>';
            echo '<br>';
            
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="custom-right-shift">';
                echo '<div class="card" style="height: 50%"></div>';
                echo '<h3>' . $row['promo_name'] . '</h3>';
                echo '<br>';
                echo '<a href="promo_details.php?id=' . $row['id'] . '"></a>';
                echo '<div class="poster-container">';
                echo '<img src="asset/img/' . $row['promo_image'] . '" alt="' . $row['promo_image'] . '">';
                echo '</div>';
                echo '<a class="grab-deal-button" href="promo_details.php?id=' . $row['id'] . '">Grab this deal!</a>';
                echo '</div>';
                echo '</div>';
                echo '<br>';
                echo '<br>';
            }
            
        echo '</div>';
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