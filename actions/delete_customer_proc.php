<?php
    include "../controllers/general_controller.php";
     
    if(isset($_POST['delete_customer'])){
      $customer_id = $_POST['customer_id'];

      $delete_customer = delete_customer_fxn($customer_id);

      if($delete_customer) {
        header("Location: ./index.php");

      }
     else {
      header("Location: ./index.php");

     }
  }
  else {
    header("Location: ./index.php");

  }
  
  ?>