<?php
session_start(); // Start the session (if not already started)

if (isset($_SESSION['cart'])) {
    $cartItems = $_SESSION['cart'];
    
    foreach ($cartItems as $item) {
        echo 'Product Name: ' . $item['name'] . '<br>';
        echo 'Price: $' . $item['price'] . '<br>';
        echo 'Quantity: ' . $item['quantity'] . '<br>';
        echo '-------------------<br>';
    }
} else {
    echo 'Your cart is empty.';
}
?>
