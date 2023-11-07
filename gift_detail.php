<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gifts & Vouchers</title>
    <link rel="stylesheet" href="asset/style/gift_detail.css">
    <link rel="stylesheet" href="asset/style/navbar_footer.css">
</head>

<body>
    <div class="navbar">
        <div class="navbar-logo">
            <img src="asset/img/logo.png" alt="Logo">
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
        // Retrieve the item ID from the URL
        $item_id = $_GET['id'];

        // Query to retrieve item details
        $query = "SELECT * FROM gifts WHERE id = $item_id";

        // Execute the query
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        }

        if ($result->num_rows > 0) {
            // Fetch and display item details
            $row = $result->fetch_assoc();
            $item_name = $row['name'];
            $item_description = $row['description'];
            $item_photo = $row['image'];
            $item_term = $row['terms'];
            $term_lines = explode(',', $item_term);

            echo '<ul class="breadcrumb">';
            echo '<li><a href="homepage.php">Home</a></li>';
            echo '<li><a href="gift.php">Gifts & Vouchers</a></li>';
            echo "<li>$item_name</li>"; // This is the dynamic part for the current page
            echo '</ul>';


            echo "<h1>$item_name</h1>";
            echo '<div class="detail-container">';

            echo '<div class="left-column">';
            echo "<br>";
            echo '<img src="asset/img/' . $item_photo . '" alt="' . $item_name . '">';
            echo "<br>";
            echo '</div>';
            echo '<div class="right-column">';

            // Add your terms content here in the right column
            echo "<br>";
            echo "<ul>";
            foreach ($term_lines as $term) {
                echo "<li>$term</li>";
            }
            echo "</ul>";
            echo "<br>";
            echo "<h3>TERMS AND CONDITIONS</h3>";
            echo "<br>";
            echo "<ul>";
            echo "<li>This movie voucher does not guarantee seating and can be exchanged for one (1) movie ticket at any of Diamond Bay’ Box Office in Singapore only.</li>";
            echo "<li>This movie voucher is valid for any movie (unless indicated otherwise) on all days and for any sessions at Diamond Bay in Singapore during the validity period only.</li>";
            echo "<li>Not valid for online, kiosk, and corporate bookings.</li>";
            echo "<li>Not more than 20 vouchers can be exchanged at the box office at any one time. </li>";
            echo "<li>This movie voucher is strictly not for resale.</li>";
            echo "<li>No refund will be given and this movie voucher cannot be exchanged for cash.</li>";
            echo "<li> This movie voucher is void upon expiry or when stated movie title ends its run.</li>";
            echo "<li> Diamond Bay does not accept any damaged or defaced movie vouchers and no compensation, replacement or refund will be given. </li>";
            echo "<li> Diamond Bay reserves the right to add, delete and/or vary any of these terms and conditions, at any time, at its absolute discretion.</li>";
            echo "<li> In the event of dispute, Diamond Bay’s decision shall be final, conclusive and binding.</li>";




            echo "</ul>";
            echo '</div>';
            echo '</div>';

            echo '<div class="button-container">';
            echo '<a href="gift.php" class="button-link"><button type="button" id="backButton">Go Back</button></a>';
            echo '</div>';
            
            
        } else {
            echo "Item not found";
        }

        mysqli_close($connection);
        ?>
    </div>
    <footer>
        <div class="footer-row">
            <p>Supported Payment</p>
        </div>
        <div class="footer-row">
            <img src="asset/img/visa-mastercard-logos.jpg" alt="Supported Payment">
        </div>
        <div class="footer-row">
            <p>&copy; 2023 Diamond Bay</p>
        </div>
    </footer>

</body>

</html>