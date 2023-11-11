<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Deals</title>
    <link rel="stylesheet" href="asset\style\payment.css">
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
            <a href="homepage.php">Home</a>
            <a href="promotions.php">Promotions</a>
            <a href="gift.php">Gifts & Vouchers</a>
        </div>
    </div>
    <div class="div_body">
        <?php
        include('db_connection.php');
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

        $selectedSeatArray =  $_SESSION['selectedSeatArray'];
        $selectedSeatTypeArray = $_SESSION['selectedSeatTypeArray'];
        $selectedSeatPriceArray = $_SESSION['selectedSeatPriceArray'];
        $selectedSeatIDArray = $_SESSION['selectedSeatIDArray'];
        // var_dump($selectedSeatIDArray);

        $selectedSeatsTotalPrice = 0;
        $cartTotalPrice = 0;

        echo '<ul class="breadcrumb">';
        echo '<li><a href="#">Home</a></li>';
        echo "<li>$movieName</li>";
        echo "<li>Seat Selection</li>";
        echo "<li>Online Deals</li>";
        echo '</ul>';

        echo '<h2 class="payment_heading">Payment</h2>';
        echo '<h4 class="payment_desc">At Diamond Bay, we are committed to providing you with the best online shopping experience. Our secure payment process ensures that your personal and financial information is kept safe and confidential.</h4>';

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
                echo '<td></td>';
                echo '<td>' . $selectedSeat . '</td>';
                echo '<td></td>';
                echo '<td></td>';
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
                echo '<td></td>';
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
            echo '<td></td>';
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
                echo '<td></td>';
                echo '<td>' . $selectedSeat . '</td>';
                echo '<td></td>';
                echo '<td></td>';
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
                echo '<td></td>';
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
            echo '<td></td>';
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

        echo ' <br>';
        mysqli_close($connection);
        ?>

        <!-- Payment form -->
        <div class="grid-container">
            <div class="item1"></div>
            <div class="item2_payment">
                <form id="paymentForm" action="process_payment.php" method="post">
                    <label for="cardNumber">Card Number *</label>
                    <br>
                    <input type="text" id="cardNumber" name="cardNumber" required>
                    <br>
                    <span class="error" id="error-card-number">Invalid card number. Please enter a 16-digit number.</span>
                    <br>
                    <img id="creditcard-img" src="asset\img\visa-mastercard-logos.jpg" alt="Credit Card Image">
                    <p style="font-size: 10px">Accepted card types</p>
                    <br>

                    <label for="expiryDate">Expiry Date *</label>
                    <div class="expiry-container">
                        <input type="text" id="expiryMonth" name="expiryMonth" placeholder="MM" required>
                        <span class="expiry-separator">/</span>
                        <input type="text" id="expiryYear" name="expiryYear" placeholder="YY" required>
                    </div>
                    <br>
                    <span class="error" id="error-expiry-month">Invalid expiry month. Please enter a valid 2-digit month (01-12).</span>
                    <span class="error" id="error-expiry-year">Invalid expiry year. Please enter a valid 2-digit year.</span>
                    <span class="error" id="error-expiry-past">Expiry date cannot be in the past.</span>
                    <br>

                    <label for="nameOnCard">Name on Card *</label>
                    <input type="text" id="nameOnCard" name="nameOnCard" required>
                    <br>
                    <span class="error" id="error-name">Name should contain only letters and spaces.</span>
                    <br>
                    <br>

                    <label for="cvv">Card Security Code (CVV) *</label>
                    <input type="text" id="cvv" name="cvv" required>
                    <br>
                    <span class="error" id="error-cvv">Invalid CVV. Please enter a 3-digit number.</span>
                    <br>
                    <br>

                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                    <br>
                    <span class="error" id="error-email">Invalid email address. Please enter a valid email address in the format example@example.com.</span>
                    <br>

                    <p>* Denotes mandatory fields</p>
                    <br>
                    <div class="button-container">
                        <button type="button" id="backButton"><a href="homepage.php">Cancel</a></button>
                        <button type="submit" id="submitButton">Submit</button>
                    </div>
                </form>
                <script>
                    // Function to validate the form fields
                    function validateForm() {
                        let isValid = true;

                        // Card Number validation
                        const cardNumber = document.getElementById("cardNumber").value;
                        if (!/^\d{16}$/.test(cardNumber)) {
                            document.getElementById("error-card-number").style.display = "block";
                            isValid = false;
                        } else {
                            document.getElementById("error-card-number").style.display = "none";
                        }

                        // Expiry Month and Year validation
                        const expiryMonth = document.getElementById("expiryMonth").value;
                        const expiryYear = document.getElementById("expiryYear").value;

                        const currentDate = new Date();
                        const currentYear = currentDate.getFullYear() % 100;
                        const currentMonth = currentDate.getMonth() + 1;

                        if (!/^(0[1-9]|1[0-2])$/.test(expiryMonth) || !/^\d{2}$/.test(expiryYear)) {
                            document.getElementById("error-expiry-month").style.display = "block";
                            document.getElementById("error-expiry-year").style.display = "block";
                            isValid = false;
                        } else {
                            document.getElementById("error-expiry-month").style.display = "none";
                            document.getElementById("error-expiry-year").style.display = "none";

                            const expiryYearInt = parseInt(expiryYear, 10);
                            const expiryMonthInt = parseInt(expiryMonth, 10);

                            if (expiryYearInt < currentYear || (expiryYearInt === currentYear && expiryMonthInt < currentMonth)) {
                                document.getElementById("error-expiry-past").style.display = "block";
                                isValid = false;
                            } else {
                                document.getElementById("error-expiry-past").style.display = "none";
                            }
                        }

                        // Name on Card validation
                        const nameOnCard = document.getElementById("nameOnCard").value;
                        if (!/^[A-Za-z\s]+$/.test(nameOnCard)) {
                            document.getElementById("error-name").style.display = "block";
                            isValid = false;
                        } else {
                            document.getElementById("error-name").style.display = "none";
                        }

                        // CVV validation
                        const cvv = document.getElementById("cvv").value;
                        if (!/^\d{3}$/.test(cvv)) {
                            document.getElementById("error-cvv").style.display = "block";
                            isValid = false;
                        } else {
                            document.getElementById("error-cvv").style.display = "none";
                        }

                        // Email validation
                        const email = document.getElementById("email").value;
                        if (!/^\S+@\S+\.\S+$/.test(email)) {
                            document.getElementById("error-email").style.display = "block";
                            isValid = false;
                        } else {
                            document.getElementById("error-email").style.display = "none";
                        }

                        return isValid;
                    }

                    const submitButton = document.getElementById("submitButton");
                    submitButton.addEventListener("click", function(e) {
                        if (!validateForm()) {
                            e.preventDefault();
                        }
                    });
                </script>
            </div>
            <div class="item3"></div>
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