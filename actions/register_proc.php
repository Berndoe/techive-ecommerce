<?php
include "../controllers/general_controller.php";
if(isset($_POST['register_customer'])) {

    $name = $_POST['customer_name'];
    $email = $_POST['customer_email'];
    $password = $_POST['customer_pass'];
    $country = $_POST['customer_country'];
    $city = $_POST['customer_city'];
    $contact = $_POST['customer_contact'];
    $image = $_POST['customer_image'];
  


    $existing_customer = get_customer_fxn($email);
   
    if ($existing_customer != false) {
        
        header("Location: ../view/register.php");
      
    }
    else {
        $register_customer = register_customer_fxn(
            $name, $email, $password, $country, $city, $contact, 
            $image
        );
        
        if($register_customer) {
            header("Location: ../view/login.php");
        }
        else {
            header("Location: ../view/register.php");

        }

    }


}







?>