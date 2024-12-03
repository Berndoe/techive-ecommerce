<?php
include "../controllers/general_controller.php";

if (isset($_GET['product'])) {
    $product_id = $_GET['product'];
    $product = get_product($product_id);

    $product_title = $product['product_title'];
    $product_cat = $product['cat_name'];
    $product_brand = $product['brand_name'];
    $product_price = $product['product_price'];
    $stock_quantity = $product['stock_quantity'];
    $product_desc = $product['product_desc'];
    $product_image = $product['product_image'];
    $product_keywords = $product['product_keywords'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $product_title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/product_view.css">
</head>

<header class="text-white p-4" style="background-color: #0298cf;">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-2xl font-bold">TecHive</a>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="../index.php">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="./browse_products.php">Products</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="./login.php">Login</a></li>
                <li><a href="./cart.php">Cart</a></li>
                <li>
                    <form method="get" action="../actions/search_proc.php">
                        <input class="form-control" type="text" name="term" placeholder='Search'>
                    </form>
                <li>

            </ul>

        </nav>
    </div>
</header>

<body>


    <div class="small-container single-product">
        <div class="row-custom">
            <div class="col-2-custom"><img src="../images/products/<?= $product_image ?>" width="80%"></div>
            <div class="col-2-custom">
                <p><?= $product_cat ?></p>
                <h3 style="margin-bottom: 10px"><?= $product_title ?></h3>
                <p>GHc <?= $product_price ?></p>
                <h3 style="margin-bottom: 10px"><?= $stock_quantity  . ' Available ' ?></h3>
                <form method="get" action="../actions/add_cart_proc.php">
                    <input type="number" name="qty" value="1" max=<?= $stock_quantity ?>>
                    <input type="hidden" name="id" value="<?= $product_id ?>">
                    <button class="btn btn-primary"> Add To Cart</button>
                </form>

                <h4 style="margin: 15px 0">Product Description:</h4>
                <p><?= $product_desc ?></p>
            </div>
        </div>
    </div>

    <!-- Featured Products -->

    <div class="small-container" style="margin-top: 50px">
        <h2 class="title">Related Products</h2>
        <div class="row-custom">
            <?php
            $products_arr = get_products_by_category_fxn($product['cat_id']);
            $counter = 0;
            foreach ($products_arr as $key => $value) {
            ?>
                <div class='col-md-3 mb-2'>
                    <div class='card'>
                        <a href='product_view.php?product=<?= $product_id ?>' style='text-decoration:none;'>
                            <img src='../images/products/<?= $product_image ?>' class='card-img-top' alt='<?= $product_title ?>'>
                            <div class='card-body'>
                                <h5 class='card-title'><?= $product_title ?></h5>
                                <p class='card-text'><?= $product_desc ?></p>
                                <p class='card-text'>Price: $<?= $product_price ?> per hour</p><br>
                                <div class='text-center'>
                                    <a href='../actions/add_cart_proc.php?product=<?= $row['product_id'] ?>&qty=1' style='text-decoration:none;' name='add_to_cart' class='btn btn-primary'>Add to cart</a>
                                    <a href='product_view.php?product=<?= $product_id ?>' style='text-decoration:none;' name='view_product' class='btn btn-secondary'>View Product</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


            <?php
                $counter++;
                if ($counter == 4) {
                    break;
                }
            }
            ?>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpgT6w60I3JG0Z0ixH8Eqv5Bqb/t5Ip2h" crossorigin="anonymous"></script>

    <!-- Footer Section -->
    <footer class="text-white p-4 text-center" style="background-color: #0298cf;">
        <p>&copy; 2024 Techive. All rights reserved.</p>
    </footer>
</body>

</html>