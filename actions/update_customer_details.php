<?php 
include "../controllers/general_controller.php";

if (isset($_POST['update_customer'])) {
    $customer_id = $_POST['customer_id'];
    $user_role = $_POST['user_role'];

    $edit_category = update_customer_role_fxn($customer_id, $user_role);

    if ($edit_category) {
        header("Location: ../view/users.php");
    }
    else {
        header("Location: ../view/update_user.php");
    }
}
else {
    echo "Form submission not detected.";
    header("Location: ../view/update_user.php");
}

?>