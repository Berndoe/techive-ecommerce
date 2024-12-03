<?php
include "../controllers/general_controller.php";

if (isset($_POST['update_customer'])) {
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_pass = $_POST['customer_pass'];
    $customer_city = $_POST['customer_city'];
    $customer_contact = $_POST['customer_contact'];
    $customer_image = $_POST['customer_image'];

    $update_customer = update_customer_fxn($customer_id, $customer_name, 
    $customer_email, $customer_pass, $customer_city, 
    $customer_contact, $customer_image);

    if ($update_customer) {
        header("Location: ../view/brands.php");
    } else {
        header("Location: ../view/update_customer.php");
    }
} else {
    echo "Form submission not detected.";
    header("Location: ../view/update_customer.php");
}
