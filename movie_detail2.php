<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="asset\style\movie_details.css">
    <link rel="stylesheet" href="asset\style\navbar_footer.css">
    <script src="movie_date.js"></script> <!-- Link to the external script -->
</head>

<body>
    <div class="navbar">
        <div class="navbar-logo">
            <a href="homepage.php">
                <img src="asset\img\logo.png" alt="Logo">
            </a>
        </div>
        <div class="navbar-links">
            <a href="homepage.php">Home</a>
            <a href="promotions.php">Promotions</a>
            <a href="gift.php">Gifts & Vouchers</a>
        </div>
    </div>

    <div class="div-body">
        <?php
        session_start();

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

            $movieName = $row['name'];
            $movieImg =  $row['movie_banner'];
            $movieRating = $row['rating'];
            $movieDuration = $row['duration'];

            $_SESSION['movieId'] = $movieId;
            $_SESSION['movieName'] = $movieName;
            $_SESSION['movieImg'] = $movieImg;
            $_SESSION['movieRating'] = $movieRating;
            $_SESSION['movieDuration'] = $movieDuration;

            // Query the database to retrieve release date and language
            $releaseDateQuery = "SELECT release_date, language FROM movie WHERE id = $movieId";
            $releaseDateResult = mysqli_query($connection, $releaseDateQuery);

            if ($releaseDateRow = mysqli_fetch_assoc($releaseDateResult)) {
                $releaseDate = $releaseDateRow['release_date'];
                $language = $releaseDateRow['language'];
            }

            // Query the database to retrieve the trailer URL
            $trailerQuery = "SELECT trailer FROM movie WHERE id = $movieId";
            $trailerResult = mysqli_query($connection, $trailerQuery);

            if ($trailerRow = mysqli_fetch_assoc($trailerResult)) {
                $trailerVideo = $trailerRow['trailer'];
            }

            echo '<ul class="breadcrumb">';
            echo '<li>  <a href="homepage.php">Home</a></li>';
            echo "<li>$movieName</li>";
            echo '</ul>';

            echo "<h1 class='title-header'>$movieName</h1>";
            echo '<div class="movie-details-container">';

            echo '<div class="banner-container">';
            echo "<img src='asset/img/$movieImg ' alt='$movieImg'>";
            echo '</div>';

            echo '<div class="description-container">';
            echo '<p class="movie-dur"><strong>RUNTIME:</strong> ' . $movieDuration . '</p><br>';
            echo '<p class="movie-rate"><strong>RATING:</strong> ' . $movieRating . '</p><br>';
            echo '<p class="movie-release-date"><strong>RELEASE:</strong> ' . $releaseDate . '</p><br>';
            echo '<p class="movie-language"><strong>LANGUAGES AVAILABLE:</strong> ' . $language . '</p><br><br>';
            echo '<h3>SYNOPSIS:</h3><br>';
            echo '<p class="movie-description">' . $row['description'] . '</p>';
            echo '<div><br>';
        } else {
            echo '<p class="movie-details-error">Movie not found</p>';
        }


        $show_time_query = "SELECT DISTINCT theatre, movie_date FROM show_time WHERE movie_id = $movieId ORDER BY theatre ASC, movie_date ASC, movie_time ASC;";
        $show_time_result = mysqli_query($connection, $show_time_query);

        while ($show_time_row = mysqli_fetch_assoc($show_time_result)) {
            $theater = $show_time_row['theatre'];
            $movie_date = $show_time_row['movie_date'];

            echo '<p class="theater-button">' . $theater . '</p>';
            // Add a hidden div for each theater and show date to display start times
            echo '<div class="start-times" data-theater="' . $theater . '" data-show-date="' . $movie_date . '">';
            $formatted_date = date("d-m-Y", strtotime($movie_date));

            echo '<p class="theater-button">' . $formatted_date . '</p>';
            $show_dateTime_query = "SELECT id, movie_time, hall FROM show_time WHERE movie_id = $movieId AND theatre = '$theater' AND movie_date = '$movie_date' ORDER BY movie_time ASC;";
            $show_dateTime_result = mysqli_query($connection, $show_dateTime_query);

            while ($show_dateTime_row = mysqli_fetch_assoc($show_dateTime_result)) {
                $movie_time = substr($show_dateTime_row['movie_time'], 0, 5); // Extract only HH:MM
                $hallNumber = $show_dateTime_row['hall'];
                $show_time_ID = $show_dateTime_row['id'];

                $_SESSION['theater'] = $theater;
                $_SESSION['movie_date'] = $movie_date;
                $_SESSION['movie_time'] = $movie_time;
                $_SESSION['hallNumber'] = $hallNumber;

                // Create a button with an embedded anchor tag using the desired URL format
                $url = "seat_selection_1.php?id=" . urlencode($show_time_ID) . "&showDate=" . urlencode($movie_date) . "&showTime=" . urlencode($movie_time) . "&hallNumber=" . urlencode($hallNumber);
                echo '<button class="start-time-button"><a href="' . $url . '">' . $movie_time . '</a></button>';
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

    <?php echo "<h1 class='title-header'>Trailer:</h1>"; ?>

    <!-- Add the video above the footer -->
    <video width="1200" height="auto" controls>
        <source src="asset/video/<?php echo $trailerVideo; ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>

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