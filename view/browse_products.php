<?php

include "../controllers/general_controller.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Products</title>
  <link rel="stylesheet" href="../css/browse_products.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<header class="text-white p-4" style="background-color: #0298cf;">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-2xl font-bold">TecHive</a>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="../index.php">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="./browse_products.php">Products</a></li>
                <li><a href="../index.php#contact">Contact</a></li>
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

  <div class="col-md-10">
    <div class="row">
      <?php foreach (get_products_fxn() as $row) : ?>
        <div class='col-md-3 mb-2'>
          <div class='card'>
            <a href='product_view.php?product=<?= $row['product_id'] ?>' style='text-decoration:none;'>
              <img src='../images/products/<?= $row['product_image'] ?>' class='card-img-top' alt='<?= $row['product_title'] ?>'>
            </a>
            <div class='card-body'>
              <h5 class='card-title'><?= $row['product_title'] ?></h5>
              <p class='card-text'>Price: GHC <?= $row['product_price'] ?> per day</p><br>
              <div class='text-center'>
                <a href='../actions/add_cart_proc.php?id=<?= $row['product_id'] ?>&qty=1' style='text-decoration:none;' name='add_to_cart' class='btn btn-primary'>Add to cart</a>
                <a href='../actions/view_product_proc.php?id=<?= $row['product_id'] ?>' style='text-decoration:none;' name='view_product' class='btn btn-secondary'>View Product</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

</body>

</html>