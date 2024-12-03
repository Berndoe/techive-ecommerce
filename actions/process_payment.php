<?php
require_once("../controllers/general_controller.php");

session_start();
if(isset($_GET['status'])){
    $status = $_GET['status'];

    if($status == 'completed'){
        //if payment is confirmed record the order

        $customer_id = $_SESSION['customer_id'];
        $inv_no = mt_rand(10,5000);
        $ord_date = date("Y/m/d");
        $ord_status = 'unfulfilled';

        $add_order = add_order_fxn($customer_id, $inv_no, $ord_date, $ord_status);

        if($add_order){
            $recent = get_recent_order_fxn();
            
            $cart = view_cart_fxn($customer_id);
            foreach($cart as $key => $value){
                //record order details
                $add_details = add_order_details_fxn($recent['recent'], $value['product_id'], $value['qty']);
                $stock = get_stock_fxn($value['product_id']);
                $r_qty = $stock['stock'] - $value['qty'];
                $update = update_stock_fxn($value['product_id'], $r_qty);
            }

            //record payment
            $amt = get_cart_value_fxn($customer_id);
            $currency = "GHC";
            $add_payment = add_payment_fxn($amt['result'], $customer_id, $recent['recent'],$currency, $ord_date);

            //clear cart
            if($add_payment){
                $clear_cart = clear_cart_fxn($customer_id);
                if($clear_cart){
                    header("location: ../view/payment_success.php?ord_id=".$recent['recent']);
                }else{
                    echo "cart delete failed";
                }
            }else{
                echo "payment failed";
            }
        }else{
            echo "order failed";
        }

    }
}
?>
