<?php
include "../controllers/general_controller.php";

if (isset($_POST['add_product'])) {
    $product_cat = $_POST['cat_id'];
    $product_brand = $_POST['brand_id'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_image = $_POST['product_image'];
    $product_keywords = $_POST['product_keywords'];

    $add_brand = add_product_fxn($product_cat, $product_brand, $product_title, 
    $product_price, $product_desc, $product_image, $product_keywords);

    if ($add_brand) {
        header("Location: ../view/products.php");
    } else {
        header("Location: ../view/add_brand.php");
    }
} else {
    echo "Form submission not detected.";
    header("Location: ../view/add_brand.php");
}
