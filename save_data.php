<?php
session_start(); // Start the session (if not already started)

if (isset($_POST['submit'])) {
    // Retrieve the selected quantity and other data
    $selectedQuantities = $_POST['quantity']; // An array of quantities
    $productNames = $_POST['product_name']; // An array of product names
    $prices = $_POST['price']; // An array of prices

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Loop through the selected items and add them to the cart session
    for ($i = 0; $i < count($selectedQuantities); $i++) {
        $cartItem = array(
            'name' => $productNames[$i],
            'price' => $prices[$i],
            'quantity' => $selectedQuantities[$i]
        );
        $_SESSION['cart'][] = $cartItem;
    }

    // You can redirect the user to a cart or continue shopping page
    header('Location: check_session.php');
    exit();
}
?>

