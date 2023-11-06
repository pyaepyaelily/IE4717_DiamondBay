<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="asset\style\movie_details.css">
    <script src="movie_date.js"></script> <!-- Link to the external script -->
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
            $movieId = $_GET['id'];

            // Query the database to retrieve promotion details based on the ID
            $query = "SELECT * FROM movie WHERE id = $movieId";
            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed: " . mysqli_error($connection));
            }

            if ($row = mysqli_fetch_assoc($result)) {
                echo '<h1 class="title-header">' . $row['name'] . '</h1>';
                echo '<div class="movie-details-container">';
                echo '<div class="banner-container">';
                echo '<img src="asset/img/' . $row['movie_banner'] . '" alt="' . $row['movie_banner'] . '">';
                echo '</div>';
                echo '<div class="description-container">';
                echo '<p class="movie-description">' . $row['description'] . '</p>';
                echo '<div><br>';
                echo '<p class="movie-dur">' . $row['duration'] . '</p><br>';
                echo '<p class="movie-rate">' . $row['rating'] . '</p>';
                echo '<br>';
            

                
                // Add the date choosing button here
                echo '<label for="datePicker">Select a Date:<br></label>';
                echo '<br>';
                echo '<input type="date" id="datePicker" name="selectedDate">';
                echo '<br>';
                echo '<button id="selectButton" onclick="selectDate()">Select</button>';
                echo '<br>';
                echo '<br>';

                 // Add the timing selection buttons here
                echo '<div class="location-buttons">';
                echo '<p>Choose a Location:</p>';
                echo '<br>';
                echo '<button class="location-button" onclick="selectTime(\'CompassOne\')">CompassOne</button>';
                echo '<button class="location-button" onclick="selectTime(\'Jurong Point\')">Jurong Point</button>';
                echo '<button class="location-button" onclick="selectTime(\'North Point\')">North Point</button>';
                echo '<button class="location-button" onclick="selectTime(\'JEM\')">JEM</button>';
                echo '<button class="location-button" onclick="selectTime(\'Funan Mall\')">Funan Mall</button>';
                echo '</div>';

                //The below codes are for a location selector
                // Add the timing selection buttons here
                echo '<div class="location-buttons">';
                echo '<p>Choose a Timing:</p>';
                echo '<br>';
                echo '<button class="location-button" onclick="selectLocation(\'12.00pm\')">12.00pm</button>';
                echo '<button class="location-button" onclick="selectLocation(\'2.00pm\')">2.00pm</button>';
                echo '<button class="location-button" onclick="selectLocation(\'3.00pm\')">3.00pm</button>';
                echo '<button class="location-button" onclick="selectLocation(\'4.00pm\')">4.00pm</button>';
                echo '<button class="location-button" onclick="selectLocation(\'6.00pm\')">6.00pm</button>';
                echo '</div>';
                echo '<br>';
                echo '<br>';


                
                

                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<br>';
                echo '<br>';
                echo '<h1 class="trailer-header">Trailer:</h1>';
                echo '<video width="80%" controls>';
                echo '<source src="asset/mp4/' . $row['trailer'] . '" type="video/mp4">';
                echo 'Your browser does not support the video tag.';
                echo '</video>';
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
<script>
    function selectLocation(locationId) {
        // Handle the selected location here
        // You can use the 'locationId' parameter to identify the chosen location
        alert('You selected Location ' + locationId);
        // You can also perform additional actions, such as updating the UI or sending data to the server.
    }
</script>

<script>
    function selectTime(timeId) {
        // Handle the selected location here
        // You can use the 'locationId' parameter to identify the chosen location
        alert('You selected Location ' + timeId);
        // You can also perform additional actions, such as updating the UI or sending data to the server.
    }
</script>

</body>
</html>
