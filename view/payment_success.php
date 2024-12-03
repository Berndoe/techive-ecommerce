<?php
include "../controllers/general_controller.php";
include "../settings/core.php";
if (isset($_GET['ord_id'])) {
    $cart_items = get_order_details_fxn($_GET['ord_id']);
    $payment = get_payment_fxn($_GET['ord_id']);
}
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
        <a href="#" class="h4 font-weight-bold" style="color: white; text-decoration:none;">TecHive</a>
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

<h1 style="text-align: center;">Thank you for choosing Techive!</h1>


<body>

    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row w-100">
                <div class="col-lg-12 col-md-12 col-12">
                    <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>

                    <table id="shoppingCart" class="table table-condensed table-responsive">
                        <thead>
                            <tr>
                                <th style="width:55%">Product</th>
                                <th style="width:35%">Price</th>
                                <th style="width:5%">Quantity</th>
                                <th></th>
                            </tr>
                        </thead>


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
                                    <td data-th="Quantity">
                                        <input type="number" class="form-control form-control-lg text-center" value="<?= $row['qty'] ?>">
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                    <div class="float-right text-right">
                        <h4>Subtotal:</h4>
                        <h1>GHC <?= $payment['amt'] ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-white py-4 text-center" style="background-color: #0298cf;">
        <div class="container">
            <div class="row justify-content-around text-left">
                <!-- Quick Links Section -->
                <div class="col">
                    <h3 class="h4 font-weight-bold">Quick Links</h3>
                    <a href="./index.php" style="color: white; text-decoration:none;">Home</a><br>
                    <a href="./view/browse_products.php" style="color: white; text-decoration:none;">Products</a><br>
                    <a href="./view/login.php" style="color: white; text-decoration:none;">Login</a>
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