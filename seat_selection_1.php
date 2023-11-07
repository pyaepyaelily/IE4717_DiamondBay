<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seat Selection</title>
    <link rel="stylesheet" href="asset\style\navbar_footer.css">
    <link rel="stylesheet" href="asset\style\seat_selection_1.css">
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



    <?php
    session_start();
    include('db_connection.php');

    $show_time_id = $_GET['id'];
    $showDate = $_GET['showDate'];
    $showTime = $_GET['showTime'];
    $hallId = $_GET['hallNumber'];

    $movieId = $_SESSION['movieId'];

    $seat_query = "SELECT * FROM hall WHERE hall_num = $hallId AND show_time_id =  $show_time_id;";
    $seat_result = mysqli_query($connection, $seat_query);
    echo '<div class="div_body">';
    echo '<ul class="breadcrumb">';
    echo '<li><a href="homepage.php">Home</a></li>';
    echo "<li><a href='movie_detail_1.php?id=$movieId'>" . $_SESSION['movieName'] . "</a></li>";
    echo '<li>Seat Selection</li>';
    echo '</ul>';

    if ($seat_result) {
        echo '<h2 class="title-header">Seat Selection</h2>';
        echo '<div id="seat-container" style="text-align: center;">';

        // Create an array to group seat buttons by row
        $seatRows = [];
        echo '<form id="seat-selection-form">';

        while ($seat_row = mysqli_fetch_assoc($seat_result)) {
            $seatID = $seat_row['id'];
            $seatNumber = $seat_row['seat_num'];
            $isAvailable = $seat_row['available'];
            $seatType = $seat_row['type'];
            $seatPrice = $seat_row['price'];

            // Extract the row and seat number
            $row = preg_replace('/[0-9]/', '', $seatNumber); // Extract alphabetic characters (the row)
            $seatNum = preg_replace('/[A-Z]/', '', $seatNumber); // Extract numeric characters (the seat number)

            // Initialize the row array if it doesn't exist
            if (!isset($seatRows[$row])) {
                $seatRows[$row] = [];
            }

            // Add the seat button to the appropriate row
            $buttonClass = ($isAvailable == 0) ? 'available-seat' : 'unavailable-seat';
            $buttonOnClick = ($isAvailable == 0) ? 'toggleSeatSelection(this);' : '';
            $buttonDisabled = ($isAvailable == 1) ? 'disabled' : '';
            $buttonId = 'seat-' . str_replace(array(' ', '/'), '-', $seatNumber);

            // $seatRows[$row][] = '<button class="' . $buttonClass . '" onclick="' . $buttonOnClick . '" ' . $buttonDisabled . ' id="' . $buttonId . '" style="margin: 5px; padding: 10px;">' . $seatNumber . '</button>';
            $seatRows[$row][] = '<button class="' . $buttonClass . '" onclick="' . $buttonOnClick . '" ' . $buttonDisabled . ' id="' . $buttonId . '" style="margin: 5px; padding: 10px;" data-seat-id="' . $seatID . '" data-seat-type="' . $seatType . '" data-seat-price="' . $seatPrice . '">' . $seatNumber . '</button>';
        }

        echo '</form>';
        // Display seat buttons grouped by row
        ksort($seatRows); // Sort the rows alphabetically
        foreach ($seatRows as $row => $seatButtons) {
            echo '<div class="seat-row">';
            echo implode(' ', $seatButtons); // Display the seat buttons for the row
            echo '</div>';
        }


        echo '</div>';
    } else {
        // Handle the case where the query failed
        echo 'Error: Unable to retrieve seat data.';
    }

    mysqli_close($connection);
    ?>
    <!-- Add the "Go to Online Deals" button with JavaScript for dynamically generating the URL -->
    <div class="button-container">
        <button class="link-button" id="go-back-button" onclick="goBack()">Go Back</button>
        <button class="link-button" id="go-to-online-deals-button">Go to Online Deals</button>

    </div>
    </div>
    <script>
        function toggleSeatSelection(button) {
            button.classList.toggle("selected-seat");
        };


        document.getElementById('go-to-online-deals-button').onclick = function() {

            // Collect the selected seats
            var selectedSeats = document.querySelectorAll('.selected-seat');

            // Check if at least one seat is selected
            if (selectedSeats.length > 0) {
                // Create arrays to store the selected seat numbers, types, and prices
                var selectedSeatID = [];
                var selectedSeatNumbers = [];
                var selectedSeatTypes = [];
                var selectedSeatPrices = [];

                selectedSeats.forEach(function(seat) {
                    selectedSeatNumbers.push(seat.textContent);
                    selectedSeatID.push(seat.getAttribute('data-seat-id'));
                    selectedSeatTypes.push(seat.getAttribute('data-seat-type'));
                    selectedSeatPrices.push(seat.getAttribute('data-seat-price'));
                });

                // Create the URL with selected seats, types, and prices
                var url = "onlineDeals.php?showTimeID=<?php echo $show_time_id; ?>" +
                    "&showDate=" + encodeURIComponent('<?php echo $showDate; ?>') +
                    "&showTime=" + encodeURIComponent('<?php echo $showTime; ?>') +
                    "&hallNumber=" + encodeURIComponent('<?php echo $hallId; ?>') +
                    "&selectedSeatID=" + encodeURIComponent(selectedSeatID.join(',')) +
                    "&selectedSeat=" + encodeURIComponent(selectedSeatNumbers.join(',')) +
                    "&selectedSeatType=" + encodeURIComponent(selectedSeatTypes.join(',')) +
                    "&selectedSeatPrice=" + encodeURIComponent(selectedSeatPrices.join(','));

                window.location.href = url;


            } else {
                // Alert the user if no seats are selected
                alert('Please select at least one seat before proceeding.');
            }
        };

        // JavaScript function to go back to the previous page
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