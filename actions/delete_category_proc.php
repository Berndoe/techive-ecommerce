<?php
    include "../controllers/general_controller.php";
     
    if(isset($_POST['delete_category'])){
      $category_id = $_POST['cat_id'];

      $delete_category = delete_category_fxn($category_id);

      if($delete_category) {
        header("Location: ../view/categories.php");

      }
     else {
      header("Location: ../view/delete_category.php");

     }
  }
  else {
    header("Location: ../view/delete_category.php");

  }
  
  ?>