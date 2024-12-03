<?php 
    include_once "../controllers/general_controller.php";

    const RECORDS_PER_PAGE = 3;

    $recordsPerPage = RECORDS_PER_PAGE;

    if (isset($_GET['page'])) {
      $currentPage = $_GET['page'];
    }
    else {
      $currentPage = 1;
    }

    $start = ($currentPage - 1) * $recordsPerPage;

    $brands_page = ceil(get_brands_count_fxn() / $recordsPerPage);
    $categories_page = ceil(get_categories_count_fxn() / $recordsPerPage);
    $products_page = ceil(get_products_count_fxn() / $recordsPerPage);
    $users_page = ceil(get_user_count_fxn() / $recordsPerPage);

?>

