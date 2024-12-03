 <!-- Update Customer modal -->
 <div class="modal fade" id="updateCustomer<?php echo $row['customer_id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="update_customer" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="customerModal">Update User Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="../actions/update_customer_details.php" method="POST">
                <input class="form-control" type="hidden" placeholder="Customer" name="customer_id" value="<?php echo $row['customer_id'];?>" id="customer_id">
                <select class="form-control" name="user_role" id="user_role">
                    <option selected disabled hidden>User Role</option>
                    <option value="1">Customer</option>
                    <option value="2">Administrator</option>
                </select>     
                <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-primary" name="update_customer">Update Customer</button>
                </div>
              </form>
        </div>
      </div>
      </div>
    </div>

