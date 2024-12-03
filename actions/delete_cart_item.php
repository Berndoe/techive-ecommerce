<?php
include "../controllers/general_controller.php";
include "../settings/core.php";


if (isset($_POST['delete_item'])) {
    if(isset($_SESSION['customer_id'])){
    $product_id = $_POST['product_id'];
    $customer_id = $_SESSION['customer_id'];

    $delete_cart_item = delete_cart_item_fxn($product_id, $customer_id);

    if ($delete_cart_item) {
        header("Location: ../view/cart.php");
    } else {
        header("Location: ../view/cart.php");
    }
}
else {
    $ip_add = get_Ip_address();
    $delete = delete_cart_item_nlog_fxn($product_id, $ip_add);

    if($delete){
        header("location: ../view/cart.php");
    }else{
        echo "failed";
    }
}

}
else {
   echo "An error ocurred";
}
