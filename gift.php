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
            <img src="asset\img\logo.png" alt="Logo">
        </div>
        <div class="navbar-links">
            <a href="#">Home</a>
            <a href="#">Promotions</a>
            <a href="#">Gifts & Vouchers</a>
        </div>
    </div>
    <div class="div_body">
        <div>
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li>Gifts & Vouchers</li>
            </ul>
        </div>

        <?php
        // Include your database connection code
        include('db_connection.php');

       
        // Query the database to select the data from the 'gifts' table.
        $query = "SELECT id, name, description, image FROM gifts";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        }

        echo '<h2 class="gifts_heading">Perfect Gifts</h2>';
        echo '<h4 class="gifts_desc">The perfect gift to celebrate a special occasion or just to brighten someone’s day. Valid for purchase at Diamond Bay box office only.</h4>';

        echo '<div class="container">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card">';
            echo '<img src="asset/img/' . $row['image'] . '" alt="' . $row['image'] . '">';
            echo '<h3 class="giftName">' . $row['name'] . '</h3>';
            echo '<p class="giftDesc">' . $row['description'] . '</p>';
            echo '<br>';

            echo '<br>';

            echo '</div>';
        }
        echo '</div>';


        echo '<h2 class="gifts_heading">Corporate Vouchers</h2>';
        echo '<h4 class="gifts_desc">Celebrate savings with our one-of-a-kind online deals, available exclusively on our platform. 
        Enjoy unbeatable offers and unique products that you won\'t find elsewhere. Shop now for exclusive deals you won\'t want to miss!</h4>';


        echo '<form method="post" action="save_data.php">';
        echo '<div class="container">';
        echo '<div class="button-container">';
        echo '<button type="button" id="go-back-button">Go back to seat selection</button>';
        echo '<button type="submit" name="submit">Next</button>';
        echo '</div>';
        echo '</form>';

        // Close the database connection
        mysqli_close($connection);
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
            session_start(); // Start the session (if not already started)
            if (isset($_SESSION['cart'])) {
                unset($_SESSION['cart']); // Unset or remove the cart session
            }
            ?>
        });
    </script>



</body>

</html>