<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gifts & Vouchers</title>
    <link rel="stylesheet" href="asset\style\gifts.css">
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
            <a href="gift.php">Gifts & Vouchers</a>
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
        $query = "SELECT * FROM gifts WHERE type = 'gift' ";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        }

        echo '<h2 class="gifts_heading">Perfect Gifts</h2>';
        echo '<h4 class="gifts_desc">The perfect gift to celebrate a special occasion or just to brighten someone’s day. Valid for purchase at Diamond Bay box office only.</h4>';

        echo '<div class="container">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card">';
            echo '<a class="custom-link" href="gift_detail.php?id=' . $row['id'] . '">';
            echo '<img src="asset/img/' . $row['image'] . '" alt="' . $row['image'] . '">';
            echo '<h3 class="giftName">' . $row['name'] . '</h3>';
            echo '<p class="giftDesc">' . $row['description'] . '</p>';
            echo '</a>';
            echo '<br>';
            echo '<br>';
            echo '</div>';
        }
        echo '</div>';


        echo '<br>';
        // Query the database to select the data from the 'corporate' table.
        // $query1 = "SELECT * FROM corporate";
        $query1 = "SELECT * FROM gifts WHERE type = 'corporate' ";
        $result1 = mysqli_query($connection, $query1); // Use $result1 for the second query

        if (!$result1) {
            die("Query failed: " . mysqli_error($connection));
        }

        echo '<h2 class="gifts_heading">Corporate Vouchers</h2>';
        echo '<h4 class="gifts_desc">The ideal gift for marking special occasions or brightening someone’s day, these corporate vouchers are exclusively redeemable at Diamond Bay’s box office.</h4>';

        echo '<div class="container">';
        while ($row1 = mysqli_fetch_assoc($result1)) {
            echo '<div class="card">';
            echo '<a class="custom-link" href="gift_detail.php?id=' . $row1['id'] . '">';
            echo '<img src="asset/img/' . $row1['image'] . '" alt="' . $row1['image'] . '">';
            echo '<h3 class="giftName">' . $row1['name'] . '</h3>';
            echo '<p class="giftName">' . $row1['description'] . '</p>';
            echo '</a>';
            echo '<br>';
            echo '<br>';
            echo '</div>';
        }
        mysqli_data_seek($result1, 0);

        // Fetch the "Voucher Type" data using a new array
        $voucherTypes = array();
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $voucherTypes[] = $row1['name'];
        }
        echo '</div>';



        echo '<br>';
        echo '<h2 class="gifts_heading">Corporate Vouchers Enquiry</h2>';
        echo '<h4 class="gifts_desc">Celebrate savings with our one-of-a-kind online deals, available exclusively on our platform. 
        Enjoy unbeatable offers and unique products that you won\'t find elsewhere. Shop now for exclusive deals you won\'t want to miss!</h4>';

        echo '<br>';

        echo '<form id="enquiryForm" method="post" action="submit_enquiry.php">';
        echo '<div class="form-group">';
        echo '    <label for="voucherType">Voucher Type*</label>';
        echo '    <select id="voucherType" name="voucherType" required>';
        foreach ($voucherTypes as $type) {
            echo '        <option value="' . $type . '">' . $type . '</option>';
        }
        echo '    </select>';
        echo '    <br>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '    <label for="quantity">Quantity*</label>';
        echo '    <input type="number" id="quantity" name="quantity" required min="10" max="1000" value="10">';
        echo '    <br>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '    <label for="comment">Additonal Requirement / Comment</label>';
        echo '    <textarea id="comment" name="comment" rows="4" cols="50"></textarea>';
        echo '    <br>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '    <label for="title">Title*</label>';
        echo '    <select id="title" name="title" required>';
        echo '        <option value="Mr">Mr</option>';
        echo '        <option value="Mrs">Mrs</option>';
        echo '        <option value="Miss">Miss</option>';
        echo '        <option value="Ms">Ms</option>';
        echo '    </select>';
        echo '    <br>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '    <label for="name">Name*</label>';
        echo '    <input type="text" id="name" name="name">';
        echo '    <br>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '    <label for="contactNumber">Contact Number*</label>';
        echo '    <input type="tel" id="contactNumber" name="contactNumber">';
        echo '    <br>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '    <label for="email">Email*</label>';
        echo '    <input type="email" id="email" name="email" required>';
        echo '    <br>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '    <label for="name">Company</label>';
        echo '    <input type="text" id="company" name="company">';
        echo '    <br>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '    <label for="name">Address</label>';
        echo '    <input type="text" id="address" name="address">';
        echo '    <br>';
        echo '</div>';

        echo '<div class="form-group">';
        echo '    <label for="name">Postal Code</label>';
        echo '    <input type="text" id="postalCode" name="postalCode">';
        echo '    <br>';
        echo '</div>';

        echo '    <p>* Denotes mandatory fields</p>';
        echo '    <br>';

        echo '<div class="button-container">';
        echo '<button type="button" id="clear-button">Clear</button>';
        echo '<button type="submit" name="submit">Submit</button>';
        echo '</div>';
        echo '</form>';


        echo '<br>';

        // Close the database connection
        mysqli_close($connection);
        ?>

        <!-- <div id="popup" style="display: none;">
            <p id="popup-message" style="color: black;">Thank you for your submission! Your enquiry has been sent successfully.</p>
            <button id="close-popup">Close</button>
        </div> -->

        <div id="popup" style="display: none;">
            <p id="popup-message" style="color: black;"></p>
            <button id="close-popup">Close</button>
        </div>



    </div>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successParam = new URLSearchParams(window.location.search).get('success');
            const popup = document.getElementById('popup');
            const closePopup = document.getElementById('close-popup');
            const form = document.getElementById('enquiryForm');

            if (successParam === '1') {
                // Display the popup if the success query parameter is present
                popup.style.display = 'block';
                form.reset();
            }

            closePopup.addEventListener('click', function() {
                // Close the popup when the close button is clicked
                popup.style.display = 'none';
            });
        });
    </script> -->
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successParam = new URLSearchParams(window.location.search).get('success');
            const errorParam = new URLSearchParams(window.location.search).get('error');
            const popup = document.getElementById('popup');
            const closePopup = document.getElementById('close-popup');
            const form = document.getElementById('enquiryForm');
            const popupMessage = document.getElementById('popup-message');

            if (successParam === '1') {
                // Display the success message if the success query parameter is present
                popupMessage.textContent = 'Thank you for your submission! Your enquiry has been sent successfully.';
                popup.style.display = 'block';
                form.reset();
            } else if (errorParam === '1') {
                // Display the error message if the error query parameter is present
                popupMessage.textContent = 'Sorry, there was an error processing your enquiry. Please check your inputs and try again.';
                popup.style.display = 'block';
            }

            closePopup.addEventListener('click', function() {
                // Close the popup when the close button is clicked
                popup.style.display = 'none';
            });
        });
    </script> -->


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successParam = new URLSearchParams(window.location.search).get('success');
            const errorParam = new URLSearchParams(window.location.search).get('error');
            const popup = document.getElementById('popup');
            const closePopup = document.getElementById('close-popup');
            const form = document.getElementById('enquiryForm');
            const popupMessage = document.getElementById('popup-message');

            form.addEventListener("submit", function(event) {
                // Validate the name field
                const nameInput = document.getElementById("name");
                const nameValue = nameInput.value;
                const namePattern = /^[A-Za-z\s]+$/;

                if (!namePattern.test(nameValue)) {
                    alert("Invalid name format. Please use only alphabet characters and spaces.");
                    event.preventDefault();
                }

                // Validate the email field
                const emailInput = document.getElementById("email");
                const emailValue = emailInput.value;
                const emailPattern = /^\w+([\.-]?\w+)*@(\w+(\.\w{2,3}){1,3})$/;

                if (!emailPattern.test(emailValue)) {
                    alert("Invalid email address. Please enter a valid email address with a maximum of three domain parts, each having a valid top-level domain (e.g., example.com). Ensure that there are no extra dots (.) or invalid characters in the address.");
                    event.preventDefault();
                }

                //Validate the contact number field
                const phoneInput = document.getElementById("contactNumber");
                const phoneValue = phoneInput.value;
                const phonePattern = /[0-9]{8}/;
                if (!phonePattern.test(phoneValue)) {
                    alert("Invalid phone number. Please enter a valid 8-digit phone number without spaces, dashes, or special characters.");
                    event.preventDefault();
                }


            });


            if (successParam === '1') {
                // Display the success message if the success query parameter is present
                popupMessage.textContent = 'Thank you for your submission! Your enquiry has been sent successfully.';
                popup.style.display = 'block';
                form.reset();
            } else if (errorParam === '1') {
                // Display the error message if the error query parameter is present
                popupMessage.textContent = 'Sorry, there was an error processing your enquiry. Please check your inputs and try again.';
                popup.style.display = 'block';
            }

            closePopup.addEventListener('click', function() {
                // Close the popup when the close button is clicked
                popup.style.display = 'none';
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // JavaScript to clear the form fields when the "Clear" button is clicked
            document.getElementById('clear-button').addEventListener('click', function() {
                // Get the form element
                const form = document.getElementById('enquiryForm');

                // Reset the form to its initial state (clear all input values and selections)
                form.reset();
            });
        });
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