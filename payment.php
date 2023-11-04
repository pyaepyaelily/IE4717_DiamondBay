<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Deals</title>
    <link rel="stylesheet" href="asset\style\payment.css">
    <link rel="stylesheet" href="asset\style\navbar_footer.css">
    <script src="asset\js\card_validation.js"></script>

</head>

<body>
    <div class="navbar">
        <div class="navbar-logo">
            <img src="asset\img\logo.png" alt="Logo">
        </div>
        <div class="navbar-links">
            <a href="#">Home</a>
            <a href="#">Promotions</a>
            <a href="gift.php">Gifts & Vouchers</a>
        </div>
    </div>
    <div class="div_body">
        <div>
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Movie Details</a></li>
                <li><a href="#">Seat Selection</a></li>
                <li><a href="onlineDeals.php">Online Deals</a></li>
                <li>Payment</li>
            </ul>
        </div>

        <?php
        // Include your database connection code
        include('db_connection.php');

        // Include the save_data.php script for processing the form submission
        include('save_data.php');

        // session_start();

        echo '<h2 class="payment_heading">Payment</h2>';
        echo '<h4 class="payment_desc">At Diamond Bay, we are committed to providing you with the best online shopping experience. Our secure payment process ensures that your personal and financial information is kept safe and confidential.</h4>';

        echo '<br>';

        echo '<div class="grid-container-item" >';
        echo '  <div class="item1"></div>';
        echo '  <div class="item2" id="movieDetails" style="color:black;">';
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];

            echo '      <table style="width:100%">';
            echo '          <tr>';
            echo '              <td>Image</td>';
            echo '              <td>';
            echo '                  <table>';
            echo '                      <tr>';
            echo '                          <td>Movie Title</td>';
            echo '                      </tr>';
            echo '                      <tr>';
            echo '                          <td>Hall</td>';
            echo '                      </tr>';
            echo '                      <tr>';
            echo '                          <td>Date</td>';
            echo '                      </tr>';
            echo '                      <tr>';
            echo '                          <td>Time</td>';
            echo '                      </tr>';
            echo '                   </table>';
            echo '              </td>';
            echo '          </tr>';
            echo '          <tr>';
            echo '              <td>Seats</td>';
            echo '              <td>Tobias</td>';
            echo '              <td>Tobias</td>';
            echo '              <td>Tobias</td>';
            echo '          </tr>';
            echo '   <tr> ';
            echo '      <td> Online Deals</td> ';
            echo '      <td></td> ';
            echo '      <td></td> ';
            echo '      <td></td> ';
            echo '   </tr> ';
            foreach ($cart as $item) {
                echo '<tr>';
                echo '<td></td>'; // An empty cell for alignment with "Online Deals"
                echo '<td><p>' . $item['name'] . '</p></td>';
                echo '<td>' . $item['quantity'] . '</td>';
                echo '<td>$' . $item['price'] . '</td>';
                echo '</tr>';
            }
            echo '          <tr>';
            echo '              <td>Payment</td>';
            echo '              <td></td>';
            echo '              <td></td>';
            echo '              <td>Linus</td>';
            echo '          </tr>';
            echo '      </table>';
            echo '  </div>';
        } else {
            echo '      <table style="width:100%">';
            echo '          <tr>';
            echo '              <td>Image</td>';
            echo '              <td>';
            echo '                  <table>';
            echo '                      <tr>';
            echo '                          <td>Movie Title</td>';
            echo '                      </tr>';
            echo '                      <tr>';
            echo '                          <td>Hall</td>';
            echo '                      </tr>';
            echo '                      <tr>';
            echo '                          <td>Date</td>';
            echo '                      </tr>';
            echo '                      <tr>';
            echo '                          <td>Time</td>';
            echo '                      </tr>';
            echo '                   </table>';
            echo '              </td>';
            echo '          </tr>';
            echo '          <tr>';
            echo '              <td>Seats</td>';
            echo '              <td>Tobias</td>';
            echo '              <td>Tobias</td>';
            echo '              <td>Tobias</td>';
            echo '          </tr>';
            echo '   <tr> ';
            echo '      <td> Online Deals</td> ';
            echo '      <td></td> ';
            echo '      <td></td> ';
            echo '      <td></td> ';
            echo '   </tr> ';

            echo '<tr>';
            echo '<td></td>'; // An empty cell for alignment with "Online Deals"
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '</tr>';

            echo '          <tr>';
            echo '              <td>Payment</td>';
            echo '              <td></td>';
            echo '              <td></td>';
            echo '              <td>Linus</td>';
            echo '          </tr>';
            echo '      </table>';
        }
        echo '  <div class="item3"></div>';
        echo '</div>';
        echo '</div>';

        echo '    <br>';

        // Payment form
        echo '<div class="grid-container">';
        echo '  <div class="item1"></div>';
        echo '  <div class="item2_payment">';

        echo '  <form id="paymentForm" action="thankyou.php" method="post" >';
        echo '    <label for="cardNumber">Card Number *</label>';
        echo '    <br>';
        echo '   <input type="text" id="cardNumber" name="cardNumber" required pattern="\d{16}"> ';
        echo '    <br>';
        // echo ' <span class="error" id="error-card-number">Invalid card number. Please enter a 16-digit number.</span> ';
        echo '    <br>';
        echo '    <img id="creditcard-img" src="asset\img\visa-mastercard-logos.jpg" alt="Credit Card Image">';
        echo '    <p style="font-size: 10px" >Accepted card types</p>';
        echo '    <br>';

        echo '    <label for="expiryDate">Expiry Date *</label>';
        echo '      <div class="expiry-container">';
        echo '          <input type="text" id="expiryMonth" name="expiryMonth" required>';
        echo '          <span class="expiry-separator">/</span>';
        echo '          <input type="text" id="expiryYear" name="expiryYear" required>';
        echo '       </div>';
        echo '    <br>';

        echo '    <label for="nameOnCard">Name on Card *</label>';
        echo '    <input type="text" id="nameOnCard" name="nameOnCard" required> ';
        echo '    <br>';
        // echo '    <span class="error-name">Name should contain only letters and spaces.</span>';
        echo '    <br>';
        echo '    <br>';

        echo '    <label for="cvv">Card Security Code (CVV) *</label>';
        echo '    <input type="text" id="cvv" name="cvv" required>';
        echo '    <br>';
        // echo ' <span class="error-cvv">Invalid CVV. Please enter a 3-digit number.</span> ';
        echo '    <br>';
        echo '    <br>';

        echo '    <label for="email">Email *</label>';
        echo '    <input type="email" id="email" name="email" required>';
        echo '    <br>';

        echo '    <p>* Denotes mandatory fields</p>';
        echo '    <br>';
        echo '    <div class="button-container">';
        echo '      <button type="button" id="backButton">Cancel</button>';
        echo '      <button type="submit">Submit</button>';
        echo '    </div>';
        echo '  </form>';

        echo '  </div>';
        echo '  <div class="item3"></div>';
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

</body>

</html>