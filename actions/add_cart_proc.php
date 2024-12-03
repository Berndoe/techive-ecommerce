<?php
include "../controllers/general_controller.php";
include "../settings/core.php";

// Get the product ID and quantity from the URL parameters
$product_id = $_GET['id'];
$quantity = $_GET['qty'];
$ip_address = get_Ip_address();
$stock = get_stock_fxn($product_id);


if ($stock['stock'] > 0) {
    if (isset($_SESSION['customer_id'])) {
        $customer_id = $_SESSION['customer_id'];

        $is_duplicate = check_duplicate_cart_fxn($product_id, $customer_id);


        if (empty($is_duplicate)) {
            add_to_cart_fxn($product_id, get_Ip_address(), $_SESSION['customer_id'], $quantity);
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                Swal.fire(
                  'Good job!',
                  'Product added to cart',
                  'success'
                ).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = '../view/browse_products.php';
                  }
                });
                </script>";
          
            // echo "<script>
            //     alert('Product added to cart');
            //     window.location.href = '../view/browse_products.php'; // Close the script tag
            //     </script>";
        } else {
            echo "<script>
            alert('Product already in cart. Consider increasing the quantity in the cart.');
            window.location.href = '../view/browse_products.php'; // Close the script tag
            </script>";
        }
    } else {
        $is_duplicate = check_duplicate_cart_nlog_fxn($product_id, $ip_address);
        if (empty($is_duplicate)) {
            add_to_cart_nlog_fxn($product_id, get_Ip_address(), $quantity);
          
            echo "<script>
                alert('Product added to cart');
                window.location.href = '../view/browse_products.php'; // Close the script tag
                </script>";
        } else {
            echo "<script>
            alert('Product already in cart. Consider increasing the quantity in the cart.');
            window.location.href = '../view/browse_products.php'; // Close the script tag
            </script>";
        }
    }
} else {
    echo "Failed";
}
