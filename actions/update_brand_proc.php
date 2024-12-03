<?php 
include "../controllers/general_controller.php";

if (isset($_POST['update_brand'])) {
    $brand_id = $_POST['brand_id'];
    $brand_name = $_POST['brand_name'];

    $edit_brand = update_brand_fxn($brand_id, $brand_name);

    if ($edit_brand) {
        header("Location: ../view/brands.php");
    }
    else {
        header("Location: ../view/update_brand.php");
    }
}
else {
    echo "Form submission not detected.";
    header("Location: ../view/update_brand.php");
}

?>