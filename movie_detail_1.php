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

            // echo '</div>';
            // echo '</div>';
            // echo '</div>';
            echo '<br>';
        } else {
            echo '<p class="movie-details-error">Movie not found</p>';
        }



        $show_time_query = "SELECT DISTINCT theatre, DATE(start_time) AS show_date FROM show_time WHERE movie_id = $movieId ORDER BY theatre ASC, show_date ASC;";
        $show_time_result = mysqli_query($connection, $show_time_query);

        while ($show_time_row = mysqli_fetch_assoc($show_time_result)) {
            $theater = $show_time_row['theatre'];
            $show_date = $show_time_row['show_date'];
            echo '<p class="theater-button">' . $theater . '</p>';

            // Add a hidden div for each theater and show date to display start times
            echo '<div class="start-times" data-theater="' . $theater . '" data-show-date="' . $show_date . '">';
            $start_times_query = "SELECT * FROM show_time WHERE movie_id = $movieId AND theatre = '$theater' AND DATE(start_time) = '$show_date' ORDER BY start_time ASC;";
            $start_times_result = mysqli_query($connection, $start_times_query);

            while ($start_time_row = mysqli_fetch_assoc($start_times_result)) {
                $start_time = date('His', strtotime($start_time_row['start_time'])); // Extract the time portion without colons
                $start_time = substr($start_time, 0, 4); // Get the first four characters (HHMM)
                $hallNumber = $start_time_row['hall'];
                $show_time_ID = $start_time_row['id'];

                // Create a button with an embedded anchor tag using the desired URL format
                $url = "seat_selection_1.php?id=" .urlencode($show_time_ID) . "&showDate=" . urlencode(date('d-m-Y', strtotime($show_date))) . "&showTime=" . urlencode($start_time) . "&hallNumber=" . urlencode($hallNumber);
                echo '<button class="start-time-button"><a href="' . $url . '">' . $start_time . '</a></button>';
            }

            echo '</div>';

            // Add a <br> element to create space after each theater section
            echo '<br>';
        }




        echo '</div>';
        echo '</div>';


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

    <style>
        .start-time-button {
            background-color: #007BFF;
            color: #fff;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            margin: 4px;
            border-radius: 4px;
        }

        .start-time-button:hover {
            background-color: #0056b3;
        }
    </style>

</body>

</html>