<?php
include "../settings/core.php";
include "../controllers/general_controller.php";

if (isset($_POST['loginBtn'])) {
    $email = $_POST['customer_email'];
    $password = $_POST['customer_pass'];

    $customer_details = get_customer_email_fxn($email);

    if (!empty($customer_details)) {
        $queried_password = $customer_details['customer_pass'];


        if (password_verify($password, $queried_password)) {
            session_start();
            $_SESSION['customer_id'] = $customer_details['customer_id'];
            $_SESSION['user_role'] = $customer_details['user_role'];

            if($_SESSION['user_role'] == '2'){
                header("Location: ../view/admin.php");
            }

            else {
                header("Location: ../index.php");
            }
            
        } else {
            header("Location: ../view/login.php");
        }
    } else {
        echo "User does not exist";
        header("Location: ../view/login.php");
    }
} else {
    echo "Form submission not detected.";
    header("Location: ../view/login.php");
}
