<?php
  include "../controllers/general_controller.php";

  if (isset($_GET['term'])) {
    $term = $_GET['term'];
    $products = search_products_fxn($term);
  
    if (empty($products)) {
      header("Location: ../index.php");
    }
  }
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../css/custom.css">

  <title>Search Results</title>
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

  <div class="container-custom">
    <?php
    if (!empty($products)) {
      foreach ($products as $key) {
        echo "<div class='col-md-3 mb-2'>
        <div class='card'>
          <img src='../images/products/" . $key['product_image'] . "' class='card-img-top' alt='" . $key['product_title'] . "'>
          <div class='card-body'>
            <h5 class='card-title'>" . $key['product_title'] . "</h5>
            <p class='card-text'>" . $key['product_desc'] . "</p>
            
            <a href='../actions/add_cart_proc.php?id=".$key['product_id']."&qty=1' class='btn btn-primary'>Add to cart</a>
            <a href='../actions/view_product_proc.php?id= " .$key['product_id']."' class='btn btn-secondary'>View Product</a>
          </div>
        </div>
      </div>";

      }
    } else {
    ?>
      <p>No products found</p>
    <?php
    }
    ?>



  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>