<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Deals</title>
    <link rel="stylesheet" href="asset\style\onlineDeals.css">
    <link rel="stylesheet" href="asset\style\navbar_footer.css">
</head>

<body>
    <div class="navbar">
        <div class="navbar-logo">
            <a href="homepage.php">
                <img src="asset\img\logo.png" alt="Logo">
            </a>
        </div>
        <div class="navbar-links">
            <a href="#">Home</a>
            <a href="#">Promotions</a>
            <a href="gift.php">Gifts & Vouchers</a>
        </div>
    </div>
    <div class="div_body">
        <?php

        include('db_connection.php');
        include('save_data.php');

        $show_time_id = $_GET['showTimeID'];
        $showDate = $_GET['showDate'];
        $showTime = $_GET['showTime'];
        $hallId = $_GET['hallNumber'];
        $selectedSeat = urldecode($_GET['selectedSeat']);
        $selectedSeatArray = explode(',', $selectedSeat);
        $selectedSeatTypeArray = explode(',', $_GET['selectedSeatType']);
        $selectedSeatPriceArray = explode(',', $_GET['selectedSeatPrice']);
        $selectedSeatIDArray = explode(',', $_GET['selectedSeatID']);


        $_SESSION['show_time_id'] = $show_time_id;
        $_SESSION['showDate'] =  $showDate;
        $_SESSION['showTime'] = $showTime;
        $_SESSION['hallId'] =  $hallId;
        $_SESSION['selectedSeat'] = $selectedSeat;
        $_SESSION['selectedSeatArray'] = $selectedSeatArray;
        $_SESSION['selectedSeatTypeArray'] = $selectedSeatTypeArray;
        $_SESSION['selectedSeatPriceArray'] = $selectedSeatPriceArray;
        $_SESSION['selectedSeatIDArray'] = $selectedSeatIDArray;

        $query = "SELECT id, name, price, description, image FROM online_deals";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        }


        echo '<ul class="breadcrumb">';
        echo '<li><a href="homepage.php">Home</a></li>';
        echo "<li><a href='movie_detail_1.php?id={$_SESSION['movieId']}'>" . $_SESSION['movieName'] . "</a></li>";
        echo "<li><a href='seat_selection_1.php?id=$show_time_id&showDate=$showDate&showTime=$showTime&hallNumber=$hallId'>Seat Selection</a></li>";
        echo '<li>Online Deals</li>';
        echo '</ul>';


        echo '<h2 class="onlineDeals_heading">Online Deals</h2>';
        echo '<h4 class="onlineDeals_desc">Celebrate savings with our one-of-a-kind online deals, available exclusively on our platform. 
        Enjoy unbeatable offers and unique products that you won\'t find elsewhere. Shop now for exclusive deals you won\'t want to miss!</h4>';

        echo '<form method="post" action="save_data.php">';
        echo '<div class="container">';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card">';
            echo '<img src="asset/img/' . $row['image'] . '" alt="' . $row['name'] . '">';
            echo '<h3 class="comboName">' . $row['name'] . ' - $' . $row['price'] . '</h3>';
            echo '<p class="comboDesc">' . $row['description'] . '</p>';
            echo '<input type="hidden" name="id[]" value="' . $row['id'] . '">';
            echo '<input type="hidden" name="product_name[]" value="' . $row['name'] . '">';
            echo '<input type="hidden" name="price[]" value="' . $row['price'] . '">';
            echo '<br>';

            echo '<select name="quantity[]" class="styled-select">';
            echo '<option value="0">0</option>';
            echo '<option value="1">1</option>';
            echo '<option value="2">2</option>';
            echo '<option value="3">3</option>';
            echo '</select>';

            echo '<br>';

            echo '</div>';
        }
        echo '</div>';

        mysqli_close($connection);

        echo '<div class="button-container">';
        echo '<button type="button" id="go-back-button" onclick="goBack()">Go back to seat selection</button>';
        echo '<button type="submit" name="submit">Next</button>';
        echo '</div>';
        echo '</form>';


        ?>
    </div>

    <script>
        // JavaScript to clear the selected options and cart session when the "Go back" button is clicked
        document.getElementById('go-back-button').addEventListener('click', function() {
            const selects = document.querySelectorAll('select[name="quantity[]"]');
            selects.forEach(select => {
                select.selectedIndex = 0; // Reset the selected index to 0 (the first option)
            });

            // Clear the cart session
            <?php
            session_start();
            if (isset($_SESSION['cart'])) {
                unset($_SESSION['cart']);
            }
            ?>
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

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