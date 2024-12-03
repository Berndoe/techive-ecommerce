<?php 
include "../controllers/general_controller.php";

if (isset($_POST['update_product'])) {
    $product_id = $_POST['product_id'];
    $product_cat = $_POST['cat_id'];
    $product_brand = $_POST['brand_id'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $stock_quantity = $_POST['stock_quantity'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];

    $update_product = update_product_fxn($product_id, $product_cat, 
    $product_brand, $product_title, $product_price, $stock_quantity,
    $product_desc, $product_keywords);


    if ($update_product) {
        header("Location: ../view/products.php");
    }
    else {
        echo "Update product: ". $update_product. "<br>";
    
    }
}
else {
    echo "Form submission not detected.";
    header("Location: ../view/update_brand2.php");
}

?>