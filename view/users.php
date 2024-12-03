<?php
include "../controllers/general_controller.php";
include "./pagination.php"
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Brand Details</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="../js/search.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="../css/Tables.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">
    <script>
        search('#user_table')
    </script>
</head>

<?php include "./admin_nav.php"; ?>


<body>
    <!-- Table details -->
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-users" style="font-size: 25;font-family:Arial, Helvetica, sans-serif;">Users</a>
    </nav>


    <table class="table table-hover" id="user_table" style="margin-top: -7px;">
        <thead class="thead-light" style="text-align:center;">
            <tr>
                <th scope="col" style="text-align: center;">#</th>
                <th scope="col" style="text-align: center;">User ID</th>
                <th scope="col" style="text-align: center;">Name</th>
                <th scope="col" style="text-align: center;">Email</th>
                <th scope="col" style="text-align: center;">Country</th>
                <th scope="col" style="text-align: center;">City</th>
                <th scope="col" style="text-align: center;">Contact</th>
                <th scope="col" style="text-align: center;">User Role</th>
                <th scope="col" style="text-align: center;">Actions</th>
            </tr>
        </thead>

        <?php
        $user = get_all_users_fxn($start, RECORDS_PER_PAGE);
        ?>
        <tbody>
            <?php $i = $start + 1;
            foreach ($user as $row) : ?>
                <tr>
                    <td scope="row"><?php echo $i++; ?></td>
                    <td><?php echo $row['customer_id']; ?></td>
                    <td><?php echo $row['customer_name']; ?></td>
                    <td><?php echo $row['customer_email']; ?></td>
                    <td><?php echo $row['customer_country']; ?></td>
                    <td><?php echo $row['customer_city']; ?></td>
                    <td><?php echo $row['customer_contact']; ?></td>
                    <td><?php
                        if ($row['user_role'] == 1) {
                            echo "Customer";
                        } else {
                            echo "Administrator";
                        } ?>
                    </td>
                    <td>
                        <button class="btn btn-sm text-light primary edit" data-toggle="modal" data-target="#updateCustomer<?php echo $row['customer_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-sm text-light delete" data-toggle="modal" data-target="#del_customer<?php echo $row['customer_id'] ?>"><i class="fas fa-trash"></i></button>
                    </td>

                </tr>

                <?php
                include 'update_user.php';
                include "delete_user.php";
                ?>

            <?php
            endforeach;
            ?>

        </tbody>
    </table>

    <nav style="margin-top:6px; margin-right:4px;">
        <ul class="pagination justify-content-end">
            <li class="page-item">
                <!-- Previous page -->
                <?php if ($currentPage > 1) {
                    $prevPage = $currentPage - 1;
                } ?>

                <a class="page-link" href="./users.php?page=<?php echo $prevPage; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>

            </li>
            <?php
            for ($i = 1; $i <= $users_page; $i++) :
            ?>
                <li class="page-item">
                    <a class="page-link" href="./users.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <!-- Next Page -->
            <?php if ($currentPage < $users_page) {
                $nextPage = $currentPage + 1;
            } ?>
            <li class="page-item">
                <a class="page-link" href="./users.php?page=<?php echo $nextPage; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>

</body>

</html>