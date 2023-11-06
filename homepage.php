<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="asset\style\movies.css">
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
        $query = "SELECT * FROM movie WHERE tag = 'Now Showing' ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        }
    
        echo '<h2 class="title-header">Now Showing</h2>';
        echo '<br>';
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="custom-right-shift">';
            echo '<div class="card" style=“height: 50%”/>';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<br>';
            // echo '<a href="movie_detail.php?id=' . $row['id'] . '">';
            echo '<a href="movie_detail_1.php?id=' . $row['id'] . '">';
            echo '<div class="image-container">
            <img src="asset/img/' . $row['movie_banner'] . '" alt="' . $row['movie_banner'] . '" style="width: 10% height: 50%; object-fit=contain;"></a>
            <br>
            <p class="movie-dur">' . $row['duration'] . '</p>
            <p class="movie-rate">' . $row['rating'] . '</p>
            <br>
            </div>';
            // echo '<a class="more-details-button" href="movie_detail.php?id=' . $row['id'] . '">More Details</a>';
            echo '<a class="more-details-button" href="movie_detail_1.php?id=' . $row['id'] . '">More Details</a>';
            echo '</div>';
            echo '</div>';
        }
        // The below code includes the description, but doesn't look very neat.
        // while ($row = mysqli_fetch_assoc($result)) {
        //     echo '<div class="custom-right-shift">';
        //     echo '<div class=‘card’ style=“height: 50%”/>';
        //     echo '<h3>' . $row['name'] . '</h3>';
        //     echo '<a href="movie_detail.php?id=' . $row['id'] . '">';
        //     echo '<div class="image-container">
        //     <img src="asset/img/' . $row['movie_banner'] . '" alt="' . $row['movie_banner'] . '" style="width: 10% height: 50%; object-fit=contain;"></a>
        //     <br>
        //     <p class="movie-desc2">' . $row['duration'] . '</p>
        //     <p class="movie-desc2">' . $row['rating'] . '</p>
        //     <br>
        //     <p class="movie-desc">' . $row['description'] . '</p>
        //     </div>';
        //     echo '</div>';
        //     echo '</div>';
        // }
        
        echo '</div>';
    ?>
    </div>

    

    <div class="div-body">
    <?php
        // Include your database connection code
        include('db_connection.php');


        // Query the database to select the data from the 'movie' table.
        $query = "SELECT * FROM movie WHERE tag = 'Advance Sales' ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        }
    
        echo '<br>';
        echo '<br>';
        echo '<h2 class="title-header">Advance Sales</h2>';
        echo '<br>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="custom-right-shift">';
            echo '<div class="card">';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<br>';
            // echo '<a href="movie_detail.php?id=' . $row['id'] . '">';
            echo '<a href="movie_detail_1.php?id=' . $row['id'] . '">';
            echo '<div class="image-container">
            <img src="asset/img/' . $row['movie_banner'] . '" alt="' . $row['movie_banner'] . '" style="width: 10% height: 50%; object-fit=contain;"></a>
            <br>
            <p class="movie-dur">' . $row['duration'] . '</p>
            <p class="movie-rate">' . $row['rating'] . '</p>
            <br>
            </div>';
            // echo '<a class="more-details-button" href="movie_detail.php?id=' . $row['id'] . '">More Details</a>';
            echo '<a class="more-details-button" href="movie_detail_1.php?id=' . $row['id'] . '">More Details</a>';
            echo '</div>';
            echo '</div>';
        }
       
        // The code below has description, but not very neat on screen
        //while ($row = mysqli_fetch_assoc($result)) {
        //     echo '<div class="custom-right-shift">';
        //     echo '<div class="card">';
        //     echo '<h3>' . $row['name'] . '</h3>';
        //     echo '<a href="movie_detail.php?id=' . $row['id'] . '">';
        //     echo '<div class="image-container">
        //     <img src="asset/img/' . $row['movie_banner'] . '" alt="' . $row['movie_banner'] . '" style="width: 10% height: 50%; object-fit=contain;"></a>
        //     <br>
        //     <p class="movie-desc2">' . $row['duration'] . '</p>
        //     <p class="movie-desc2">' . $row['rating'] . '</p>
        //     <br>
        //     <p class="movie-desc">' . $row['description'] . '</p>
        //     </div>';
        //     echo '</div>';
        //     echo '</div>';
        // }
        echo '</div>';
        echo '<br>';
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
