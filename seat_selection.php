<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="asset\style\seat_selection.css">
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


    <h2 class="title-header">Seat Selection</h2>
    <div id="seat-container">
        <!-- Generate 16 seats -->
        <div class="seat-grid">
        <?php
        $numRows = 4;
        $numCols = 4;
        for ($row = 1; $row <= $numRows; $row++) {
            echo '<div class="seat-row">';
            for ($col = 1; $col <= $numCols; $col++) {
                echo '<div class="seat" id="seat-' . $row . '-' . $col . '">' . $row . '-' . $col . '</div>';
            }
            echo '</div>'; // Close the seat-row div
        }
        ?>
    </div>

    <p>Selected Seats: <span id="selected-seats"></span></p>
    <button id="proceedToPayment">Proceed to Payment</button>

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
    
    <script>
        const seats = document.querySelectorAll('.seat');
        const selectedSeats = [];

        seats.forEach(seat => {
            seat.addEventListener('click', () => {
                if (seat.classList.contains('selected')) {
                    // Deselect seat
                    seat.classList.remove('selected');
                    const index = selectedSeats.indexOf(seat.id);
                    if (index !== -1) {
                        selectedSeats.splice(index, 1);
                    }
                } else {
                    // Select seat
                    seat.classList.add('selected');
                    selectedSeats.push(seat.id);
                }
                updateSelectedSeats();
            });
        });

        function updateSelectedSeats() {
            const selectedSeatsElement = document.getElementById('selected-seats');
            selectedSeatsElement.textContent = selectedSeats.join(', ');
        }

        const proceedToPaymentButton = document.getElementById('proceedToPayment');
        proceedToPaymentButton.addEventListener('click', () => {
            // Handle the payment process here with the selected seats
            alert('Proceeding to payment for seats: ' + selectedSeats.join(', '));
        });
    </script>

</body>
</html>