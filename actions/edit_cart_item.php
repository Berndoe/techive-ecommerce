<?php
include "../controllers/general_controller.php";
include "../settings/core.php";


if (isset($_POST['edit_cart'])) {
    if (isset($_SESSION['customer_id'])) {
    $product_id = $_POST['product_id'];
    $customer_id = $_SESSION['customer_id'];
    $quantity = $_POST['quantity'];
    $duration = $_POST['duration'];

    $edit_cart = update_cart_fxn($product_id, $customer_id, $quantity, $duration);

    if ($edit_cart) {
        header("Location: ../view/cart.php");

    } else {
        header("Location: ../view/cart.php");
    }
}
    else {
        $product_id = $_POST['product_id'];
        $ip_add = get_Ip_address();
        $quantity = $_POST['quantity'];
        $duration = $_POST['duration'];

        $edit_cart = update_cart_nlog_fxn($product_id, $ip_add, $quantity, $duration);

        if ($edit_cart) {
            header("Location: ../view/cart.php");

        } else {
            header("Location: ../view/cart.php");
        }
    }
} else {
    echo "Form submission not detected.";
    header("Location: ../view/cart.php");
}
