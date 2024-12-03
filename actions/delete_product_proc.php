<?php
    include "../controllers/general_controller.php";
     
    if(isset($_POST['delete_product'])){
      $product_id = $_POST['product_id'];

      $delete_product = delete_product_fxn($product_id);

      if($delete_product) {
        header("Location: ../view/products.php");

      }
     else {
      header("Location: ../view/delete_product.php");

     }
  }
  else {
    header("Location: ../view/delete_product.php");

  }
  
  ?>