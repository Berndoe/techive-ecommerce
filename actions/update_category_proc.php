<?php 
include "../controllers/general_controller.php";

if (isset($_POST['update_category'])) {
    $category_id = $_POST['cat_id'];
    $category_name = $_POST['cat_name'];

    $edit_category = update_category_fxn($category_id, $category_name);

    if ($edit_category) {
        header("Location: ../view/categories.php");
    }
    else {
        header("Location: ../view/update_category.php");
    }
}
else {
    echo "Form submission not detected.";
    header("Location: ../view/update_category.php");
}

?>