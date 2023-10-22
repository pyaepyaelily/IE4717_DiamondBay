<?php
session_start(); // Start the session (if not already started)

if (isset($_POST['submit'])) {
    // Retrieve the selected quantity, product names, and prices
    $id = $_POST['id'];
    $selectedQuantities = $_POST['quantity']; // An array of quantities
    $productNames = $_POST['product_name']; // An array of product names
    $prices = $_POST['price']; // An array of prices

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Loop through the selected items and add them to the cart session only if the quantity is more than 0
    for ($i = 0; $i < count($selectedQuantities); $i++) {
        $quantity = $selectedQuantities[$i];

        if ($quantity > 0) {
            $cartItem = array(
                'id' => $id[$i],
                'name' => $productNames[$i],
                'price' => $prices[$i],
                'quantity' => $quantity
            );
            $_SESSION['cart'][] = $cartItem;
        }
    }

    // You can redirect the user to a cart or continue shopping page
    header('Location: payment.php');
    exit();
}

?>

