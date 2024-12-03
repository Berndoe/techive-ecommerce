<?php
include "../controllers/general_controller.php";
include "../settings/core.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../css/login_signup.css">

</head>
<!-- <header class="text-white p-4" style="background-color: #0298cf;">
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
</header> -->

<?php
$customer = get_customer_fxn($_SESSION['customer_id']);
$amount = get_cart_value_fxn($_SESSION['customer_id'])['result'];

?>

<body>
  <form id="paymentForm">
    <div class="container">
      <h3 style="text-align: center;">Payment</h2>
        <label for="email">Email Address</label>
        <input type="email" class="form-control md-4" placeholder="Email Address" value="<?php echo $customer['customer_email'] ?>" id="email-address" required />

        <label for="amount">Amount</label>
        <input type="tel" class="form-control" placeholder="Amount" id="amount" value="<?= $amount ?>" required />

        <label for="first-name">First Name</label>
        <input type="text" class="form-control" placeholder="First Name" id="first-name" value="<?php echo explode(' ', $customer['customer_name'])[0] ?>" />

        <label for="last-name">Last Name</label>
        <input type="text" class="form-control" placeholder="Last Name" id="last-name" value="<?php echo explode(' ', $customer['customer_name'])[1] ?>" /><br>

        <div class="form-submit text-center d-flex justify-content-between">
          <a href="../view/cart.php" class="btn btn-secondary form-control" style="margin-right: 5px;">Back</a>
          <button type="submit" class="btn btn-primary form-control" onclick="payWithPaystack()"> Pay </button>
        </div>

    </div>
  </form>


  <script src="https://js.paystack.co/v1/inline.js"></script>
  <!-- <script src="payment.js"></script> -->
  <script>
    var paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener('submit', payWithPaystack, false);

    function payWithPaystack(e) {
      e.preventDefault();

      var handler = PaystackPop.setup({
        key: 'pk_test_8f6d9624b448d4697de02bd3ec577d42698ad56d', // Replace with your public key
        email: document.getElementById('email-address').value,
        amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
        currency: 'GHS', // Use GHS for Ghana Cedis or USD for US Dollars
        ref: '',
        callback: function(response) {

          var reference = response.reference;
          window.location.href = "../actions/process_payment.php?status=completed";

        },
        onClose: function() {
          alert('Transaction was not completed, window closed.');
        },
      });
      handler.openIframe();
    }
  </script>

  <!-- Footer Section -->
  <!-- <footer class="text-white p-4 text-center" style="background-color: #0298cf;">
    <div class="container mx-auto">
      <div class="flex flex-wrap justify-around">
        <div>
          <h3 class="font-bold">Quick Links</h3>
          <a href="./index.php">Home</a><br>
          <a href="./view/browse_products.php">Products</a><br>
          <a href="./view/login.php">Login</a>

        </div>
        <div>
          <h3 class="font-bold">Follow Us</h3> -->
  <!-- Social Links -->
  <!-- <div class="flex mt-2">
            <a href="https://facebook.com" target="_blank" class="mr-4">
              <i class="fab fa-facebook-f text-white text-xl"></i>
            </a>
            <a href="https://instagram.com" target="_blank" class="mr-4">
              <i class="fab fa-instagram text-white text-xl"></i>
            </a>
            <a href="https://twitter.com" target="_blank">
              <i class="fab fa-twitter text-white text-xl"></i>
            </a>
          </div>
        </div>
      </div>
      <p class="mt-4">&copy; 2024 TecHive. All rights reserved.</p>
    </div>
  </footer> -->
</body>

</html>