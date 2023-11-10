<?php
session_start();

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $selectedQuantities = $_POST['quantity'];
    $productNames = $_POST['product_name'];
    $prices = $_POST['price']; 

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

    header('Location: payment.php');
    exit();
}

?>

