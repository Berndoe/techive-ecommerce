<div class="modal fade" id="updateCustomer<?php echo $row['customer_id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="update_customer" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerModal">Update Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../actions/update_customer_proc.php" method="POST">
                    <input class="form-control" type="hidden" name="customer_id" value="<?php echo $row['customer_id'];?>" id="customer_id">
                    <input class="form-control" type="text" name="customer_name" value="<?php echo $row['customer_name'];?>"><br>
                    <input class="form-control" type="number" name="customer_email" value="<?php echo $row['customer_email'];?>"><br>
                    <input class="form-control" type="number" name="customer_city" value="<?php echo $row['customer_city'];?>"><br>
                    <input class="form-control" type="number" name="customer_contact" value="<?php echo $row['customer_contact'];?>"><br>
                
                    <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-primary" name="update_customer">Update Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
