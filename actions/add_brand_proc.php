<?php
include "../controllers/general_controller.php";

if(isset($_POST['add_brand'])) {
    $brand_name = $_POST['brand_name'];

    $add_brand = add_brand_fxn($brand_name);

    if($add_brand) {
         header("Location: ../view/brands.php");
    }
    else {
        header("Location: ../view/add_brand.php");

    }
}
else {
    echo "Form submission not detected.";
    header("Location: ../view/add_brand.php"); 
}

?>


