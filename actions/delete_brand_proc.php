<?php
include "../controllers/general_controller.php";

if(isset($_POST['delete_brand'])){
      $brand_id = $_POST['brand_id'];

      $delete_brand = delete_brand_fxn($brand_id);


      if($delete_brand) {
          header("Location: ../view/brands.php");
      }
     else {
      header("Location: ../view/delete_brand.php");

     }
}
else {
  header("Location: ../view/delete_brand.php");

}
  
  ?>
  