<?php
include "../controllers/general_controller.php";
include "../settings/core.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cart</title>

</head>

<header class="text-white py-4" style="background-color: #0298cf;">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="#" class="h2 font-weight-bold">TecHive</a>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a href="../index.php" class="nav-link text-white">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">About Us</a></li>
                <li class="nav-item"><a href="./browse_products.php" class="nav-link text-white">Products</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Contact</a></li>
                <li class="nav-item"><a href="./login.php" class="nav-link text-white">Login</a></li>
                <li class="nav-item"><a href="./cart.php" class="nav-link text-white">Cart</a></li>
                <li class="nav-item">
                    <form method="get" action="../actions/search_proc.php">
                        <input class="form-control" type="text" name="term" placeholder="Search">
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</header>


<body>

    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row w-100">
                <div class="col-lg-12 col-md-12 col-12">
                    <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
                    <p class="mb-5 text-center">
                        <i class="text-info font-weight-bold"><?php echo get_cart_items_no_fxn($_SESSION['customer_id'])['count']; ?></i> item(s) in your cart
                    </p>
                    <table id="shoppingCart" class="table table-condensed table-responsive">
                        <thead>
                            <tr>
                                <th style="width:60%">Product</th>
                                <th style="width:12%">Price</th>
                                <th style="width:5%">Quantity</th>
                                <th style="width:5%">Duration</th>
                                <th></th>
                            </tr>
                        </thead>

                        <?php
                        if (isset($_SESSION['customer_id'])) {
                            $cart_items = view_cart_fxn($_SESSION['customer_id']);
                        } else {
                            $ip_add = get_Ip_address();
                            $cart_items = view_cart_nlog_fxn($ip_add);
                        }

                        ?>
                        <tbody>
                            <?php foreach ($cart_items as $row) : ?>
                                <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-md-3 text-left">
                                                <img src="../images/products/<?= $row['product_image'] ?>" alt="<?= $row['product_title'] ?>" class="img-fluid d-none d-md-block rounded mb-2 shadow">
                                            </div>
                                            <div class="col-md-9 text-left mt-sm-2">
                                                <h4><?= $row['product_title'] ?></h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">GHC <?= $row['product_price'] ?></td>
                                    <form action="../actions/edit_cart_item.php" method="POST">
                                        <input type="hidden" value="<?= $row['product_id'] ?>" name="product_id">
                                        <td data-th="Quantity">
                                            <input type="number" class="form-control form-control-lg text-center" value="<?= $row['qty'] ?>" name="quantity" min="1" max="<?php $row['stock_quantity'] ?>">
                                        </td>

                                        <td data-th="Days">
                                            <input type="number" class="form-control form-control-lg text-center" value="<?= $row['duration'] ?>" name="duration" min="1">
                                        </td>

                                        <td class="actions" data-th="">
                                            <div class="text-right">


                                                <button type="submit" name="edit_cart" class="btn btn-white border-secondary bg-white btn-md mb-2">
                                                    <i class="fas fa-sync"></i>
                                                </button>
                                    </form>

                                    <form action="../actions/delete_cart_item.php" method="POST">
                                        <input type="hidden" value="<?= $row['product_id'] ?>" name="product_id">
                                        <input type="hidden" value="<?= $_SESSION['customer_id'] ?>" name="customer_id">
                                        <button type="submit" name="delete_item" class="btn btn-white border-secondary bg-white btn-md mb-2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                            </div>
                        </td>
                    </tr>
            <?php endforeach; ?>
            </tbody>

            </table>
            <div class="float-right text-right">
                <h4>Subtotal:</h4>
                <h1>GHC <?= get_cart_value_fxn($_SESSION['customer_id'])['result'] ?></h1>
            </div>
            </div>
        </div>
        <div class="row mt-4 d-flex align-items-center">
            <div class="col-sm-6 order-md-2 text-right">
                <a href="../payment/payment.php" class="btn btn-primary mb-4 btn-lg pl-5 pr-5" onclick="payWithPaystack()">Checkout</a>
            </div>
            <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                <a href="./browse_products.php" class="btn btn-secondary" style="text-decoration: none;">
                    <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
            </div>
        </div>
        </div>
    </section>
    
    <!-- Footer Section -->
    <footer class="text-white py-4 text-center" style="background-color: #0298cf;">
    <div class="container">
        <div class="row justify-content-around text-left">
            <!-- Quick Links Section -->
            <div class="col">
                <h3 class="font-weight-bold">Quick Links</h3>
                <a href="./index.php">Home</a><br>
                <a href="./view/browse_products.php">Products</a><br>
                <a href="./view/login.php">Login</a>
            </div>
            <!-- Social Links Section -->
            <div class="col">
                <h3 class="font-weight-bold">Follow Us</h3>
                <div class="d-flex mt-2">
                    <a href="https://facebook.com" target="_blank" class="mr-4">
                        <i class="fab fa-facebook-f text-white"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="mr-4">
                        <i class="fab fa-instagram text-white"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank">
                        <i class="fab fa-twitter text-white"></i>
                    </a>
                </div>
            </div>
        </div>
        <p class="mt-4">&copy; 2024 TecHive. All rights reserved.</p>
    </div>
</footer>

</body>

</html>