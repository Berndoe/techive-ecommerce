<?php include "./admin_nav.php"; ?>

<?php
include "../controllers/general_controller.php";


session_start();

//   if (!isset($_SESSION['customer_email']) || !isset($_SESSION['user_role'])) {
//     header("Location: ../index.php");
//     exit();
// }
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
  <title>Home</title>
</head>
<style>
  /* header styling */
  .nav-item {
    margin-left: 200px;
    padding-left: 50%;
    font-size: 18px;
  }

  .card {
    margin-top: 13%;
    display: flex;

  }

  .card-deck {
    padding-left: 120px;
    padding-right: 120px;
  }

  .number {
    font-size: 400%;
    font-weight: bolder;
  }
</style>

<body>
  <!-- cards -->
  <?php

  // // Number of employees display
  //  $customer_sql = "SELECT * FROM customers where user_role = '1'";
  //  if($result = mysqli_query($conn, $customer_sql)) { $number_of_customers = mysqli_num_rows($result); }

  // //  Number of paid salaries
  // $salary_sql = "SELECT * FROM Employee WHERE payment_status ='Paid'";
  // if($result = mysqli_query($conn, $salary_sql)) { $number_of_paid_employees = mysqli_num_rows($result); }

  // // number of assets assigned
  // $assets_sql = "SELECT * FROM Employee, Assets WHERE Employee.asset_Id = Assets.asset_Id";
  // if($result = mysqli_query($conn, $assets_sql)) { $asset_number = mysqli_num_rows($result); }

  ?>


  <div class="card-deck">

    <!-- Number of employees -->
    <div class="card">
      <div class="card-body">
        <p class="card-title">Number of Customers</p>
        <p class="card-text number" style="color:#0298cf">
          <?php echo get_customer_count_fxn() ?>
        </p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><?php echo "Last updated 1 hour ago"; ?></small>
      </div>
    </div>

    <!-- Paid salaries -->
    <div class="card">
      <div class="card-body">
        <p class="card-title">Total Sales</p>
        <p class="card-text number" style="color:crimson">
          <?php echo 100 ?>
        </p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><?php echo "Last updated 1 hour ago"; ?></small>
      </div>
    </div>

    <!-- Number of assets -->
    <div class="card">
      <div class="card-body">
        <p class="card-title">Items rented</p>
        <p class="card-text number" style="color:green;">
          <?php echo 10 ?>
        </p>
      </div>
      <div class="card-footer">
        <small class="text-muted"><?php echo "Last updated 1 hour ago"; ?></small>
      </div>
    </div>

  </div>



</body>

</html>