<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You</title>
    <link rel="stylesheet" href="asset\style\thankyou.css">
    <link rel="stylesheet" href="asset\style\navbar_footer.css">
    <link rel="stylesheet" href="asset\style\payment.css">
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

    <div class="div_body">
        <div class="thank-you-container">
            <h1>Thank You for Your Purchase</h1>
            <br>
            <p>Your payment was successful, and your order has been placed. An order confirmation email has been sent to your email address.</p>
            <p>Please check your email for important information regarding your order.</p>
            <p>If you don't see the email in your inbox, please check your spam folder.</p>
        </div>


        <?php

        // session_start();
        include('db_connection.php');

        // Include the save_data.php script for processing the form submission
        include('save_data.php');

        $movieId =  $_SESSION['movieId'];
        $movieName = $_SESSION['movieName'];
        $movieImg =  $_SESSION['movieImg'];
        $movieRating =  $_SESSION['movieRating'];
        $movieDuration = $_SESSION['movieDuration'];
        $theater = $_SESSION['theater'];

        $show_time_id =  $_SESSION['show_time_id'];
        $showDate = $_SESSION['showDate'];
        $showTime =  $_SESSION['showTime'];
        $hallId =  $_SESSION['hallId'];
        $selectedSeat = $_SESSION['selectedSeat'];
        // $selectedSeatsData = $_SESSION['selectedSeatsData'];



        $selectedSeatArray =  $_SESSION['selectedSeatArray'];
        $selectedSeatTypeArray = $_SESSION['selectedSeatTypeArray'];
        $selectedSeatPriceArray = $_SESSION['selectedSeatPriceArray'];
        $selectedSeatIDArray = $_SESSION['selectedSeatIDArray'];
        // var_dump($selectedSeatIDArray);

        $selectedSeatsTotalPrice = 0;
        $cartTotalPrice = 0;
        echo '<br>';

        echo '<div class="grid-container-item">';
        echo ' <div class="item1"></div>';
        echo ' <div class="item2" id="movieDetails" style="color:black;">';
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];

            echo ' <table style="width:100%">';
            echo ' <tr>';
            echo '<td><img style="width: 150px;" src="asset/img/' . $movieImg . '" alt="' . $movieImg . '"></td>';
            echo ' <td>';
            echo ' <table>';
            echo ' <tr>';
            echo " <td>$movieName, $movieRating</td>";
            echo ' </tr>';
            echo ' <tr>';
            echo " <td>$theater, Hall: $hallId</td>";
            echo ' </tr>';
            echo ' <tr>';
            echo ' <td>' . date('D j M Y', strtotime($showDate)) . '</td>';
            echo ' </tr>';
            echo ' <tr>';
            echo " <td>$showTime</td>";
            echo ' </tr>';
            echo ' </table>';
            echo ' </td>';
            echo ' </tr>';
            echo ' <tr>';
            echo ' <td>Seats</td>';
            echo ' <td></td>';
            echo ' <td></td>';
            echo ' <td></td>';
            echo ' </tr>';
            echo ' <tr> ';

            for ($i = 0; $i < count($selectedSeatArray); $i++) {
                $selectedSeat = $selectedSeatArray[$i];
                $selectedSeatType = $selectedSeatTypeArray[$i];
                $selectedSeatPrice = $selectedSeatPriceArray[$i];

                echo '<tr>';
                echo '<td></td>'; // An empty cell for alignment with "Online Deals"
                echo '<td>' . $selectedSeat . '</td>';
                echo '<td></td>'; // An empty cell for alignment with "Online Deals"
                echo '<td></td>'; // An empty cell for alignment with "Online Deals"
                echo '<td>$' . $selectedSeatPrice . '</td>';
                echo '</tr>';

                $selectedSeatsTotalPrice += $selectedSeatPrice;
            }

            echo ' <td> Online Deals</td> ';
            echo ' <td></td> ';
            echo ' <td></td> ';
            echo ' <td></td> ';
            echo ' </tr> ';
            foreach ($cart as $item) {
                echo '<tr>';
                echo '<td></td>'; // An empty cell for alignment with "Online Deals"
                echo '<td>
                    <p>' . $item['name'] . '</p>
                </td>';
                echo '<td>$' . $item['price'] . '</td>';
                echo '<td>x' . $item['quantity'] . '</td>';
                echo '<td>$' . number_format($item['price'] * $item['quantity'], 2) . '</td>';
                echo '</tr>';

                $cartTotalPrice += $item['price'] * $item['quantity'];
            }
            $totalPrice = $selectedSeatsTotalPrice + $cartTotalPrice;


            echo ' <tr>';
            echo ' <td>Payment</td>';
            echo ' <td></td>';
            echo ' <td></td>';
            echo '<td></td>'; // An empty cell for alignment with "Online Deals"
            echo '<td><b>$' . number_format($totalPrice, 2) . '</b></td>';

            echo ' </tr>';
            echo '
        </table>';
            echo ' </div>';
        } else {
            $cart = $_SESSION['cart'];

            echo ' <table style="width:100%">';
            echo ' <tr>';
            echo '<td><img style="width: 150px;" src="asset/img/' . $movieImg . '" alt="' . $movieImg . '"></td>';
            echo ' <td>';
            echo ' <table>';
            echo ' <tr>';
            echo " <td>$movieName, $movieRating</td>";
            echo ' </tr>';
            echo ' <tr>';
            echo " <td>$theater, Hall: $hallId</td>";
            echo ' </tr>';
            echo ' <tr>';
            echo ' <td>' . date('D j M Y', strtotime($showDate)) . '</td>';
            echo ' </tr>';
            echo ' <tr>';
            echo " <td>$showTime</td>";
            echo ' </tr>';
            echo ' </table>';
            echo ' </td>';
            echo ' </tr>';
            echo ' <tr>';
            echo ' <td>Seats</td>';
            echo ' <td></td>';
            echo ' <td></td>';
            echo ' <td></td>';
            echo ' </tr>';
            echo ' <tr> ';

            for ($i = 0; $i < count($selectedSeatArray); $i++) {
                $selectedSeat = $selectedSeatArray[$i];
                $selectedSeatType = $selectedSeatTypeArray[$i];
                $selectedSeatPrice = $selectedSeatPriceArray[$i];

                echo '<tr>';
                echo '<td></td>'; // An empty cell for alignment with "Online Deals"
                echo '<td>' . $selectedSeat . '</td>';
                echo '<td></td>'; // An empty cell for alignment with "Online Deals"
                echo '<td></td>'; // An empty cell for alignment with "Online Deals"
                echo '<td>$' . $selectedSeatPrice . '</td>';
                echo '</tr>';

                $selectedSeatsTotalPrice += $selectedSeatPrice;
            }

            echo ' <td> Online Deals</td> ';
            echo ' <td></td> ';
            echo ' <td></td> ';
            echo ' <td></td> ';
            echo ' </tr> ';
            foreach ($cart as $item) {
                echo '<tr>';
                echo '<td></td>'; // An empty cell for alignment with "Online Deals"
                echo '<td>
                    <p>' . $item['name'] . '</p>
                </td>';
                echo '<td>$' . $item['price'] . '</td>';
                echo '<td>x' . $item['quantity'] . '</td>';
                echo '<td>$' . number_format($item['price'] * $item['quantity'], 2) . '</td>';
                echo '</tr>';

                $cartTotalPrice += $item['price'] * $item['quantity'];
            }
            $totalPrice = $selectedSeatsTotalPrice + $cartTotalPrice;


            echo ' <tr>';
            echo ' <td>Payment</td>';
            echo ' <td></td>';
            echo ' <td></td>';
            echo '<td></td>'; // An empty cell for alignment with "Online Deals"
            echo '<td><b>$' . number_format($totalPrice, 2) . '</b></td>';

            echo ' </tr>';
            echo '
        </table>';
            echo ' </div>';
        }
        echo ' <div class="item3"></div>';
        echo '</div>';
        echo '
</div>';

        // Close the database connection
        mysqli_close($connection);
        ?>


        <div class="centered-button">
            <a href="reset_sessions.php" class="back-to-home-button">See More Movies</a>
        </div>
    </div>

    <br>
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