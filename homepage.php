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
            <a href="#">Promotions</a>
            <a href="gift.php">Gifts & Vouchers</a>
        </div>
    </div>

    <div class="div-body">
    </div>

    

    <!-- <section class="mt-5">
        <h5 class="title-header">Now Showing: </p>
        <br>
        <div class="container">
            <h6 class="info-movies">Avatar: The Way of Water</h6>
            <img src="asset\img\avatar.png" width="200" alt="Avatar">
            <p class="info-movies">Duration:</p>
            <p class="info-movies">Rating:</p>
            <p class="info-movies">Description:</p>
             
        </div>

    </section> -->

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

        echo '<div class="container custom-right-shift">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card">';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<a href="movie_detail.php?id=' . $row['id'] . '">';
            echo '<div class="image-container" style="max-width: 200px;">
            <img src="asset/img/' . $row['movie_banner'] . '" alt="' . $row['movie_banner'] . '" style="width: 100%;"></a>
            <br>
            <p class="movie-desc2">' . $row['duration'] . '</p>
            <p class="movie-desc2">' . $row['rating'] . '</p>
            <br>
            <p class="movie-desc">' . $row['description'] . '</p>
        </div>';
            echo '<br>';
        }
        echo '</div>';
    ?>
    

    


    <!-- <section class="mt-5">
        <h5 class="title-header">Advance Sales:</p>
        <br>
        <div class="container">
            <h6 class="info-movies">Talk to me</h6>
            <img src="asset\img\talktome.png" width="200" alt="Avatar">
            <p class="info-movies">Duration:</p>
            <p class="info-movies">Rating:</p>
            <p class="info-movies">Description:</p>
             
        </div>

    </section> -->


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
        echo '<h2>Advance Sales</h2>';
        echo '<br>';

        echo '<div class="container custom-right-shift">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div>';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<a href="movie_detail.php?id=' . $row['id'] . '">';
            echo '<div style="max-width: 200px;">
            <img src="asset/img/' . $row['movie_banner'] . '" alt="' . $row['movie_banner'] . '" style="width: 100%;"></a>
            <br>
            <p>' . $row['duration'] . '</p>
            <p>' . $row['rating'] . '</p>
            <br>
            <p>' . $row['description'] . '</p>
        </div>';
            echo '<br>';
        }
    ?> 
  
    <div class="div-body">
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