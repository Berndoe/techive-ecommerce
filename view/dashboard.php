<?php
// Include database connection file
include_once '../controllers/general_controller.php';

// Fetch data from the database for the stats and graph
$totalUsers = 100;
// $totalOrders = ...;
// $totalSales = ...;
// $totalPending = ...;
// $salesDetails = ...;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Head content, including Bootstrap CSS -->
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <!-- Sidebar content -->
    </nav>

    <!-- Main content -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <!-- Top bar content -->

      <!-- Statistics Cards -->
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total User</h5>
              <p class="card-text"><?php echo $totalUsers; ?></p>
            </div>
          </div>
        </div>
        <!-- Repeat for other stats -->
      </div>

      <!-- Sales Details Chart -->
      <canvas id="salesChart" width="400" height="150"></canvas>
      
      <!-- Additional dashboard content -->
      
    </main>
  </div>
</div>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<!-- Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // JavaScript to initialize the sales chart using Chart.js
  // Fetch sales details data from PHP to use in the chart
</script>

</body>
</html>
