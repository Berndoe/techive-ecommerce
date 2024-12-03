<?php
require_once "../controllers/general_controller.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $product = get_product($product_id);

    $product_title = $product['product_title'];
    $product_cat = $product['cat_name'];
    $product_brand = $product['brand_name'];
    $product_price = $product['product_price'];
    $stock_quantity = $product['stock_quantity'];
    $product_desc = $product['product_desc'];
    $product_image = $product['product_image'];
    $product_keywords = $product['product_keywords'];

    header("Location: ../view/product_view.php?product=$product_id");
}
else {
    echo "Product not found";
}


?>
?>