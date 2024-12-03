<!-- Delete product -->
<div class="modal fade" id="del_product<?php echo $row['product_id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="del_product" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productModal">Delete Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="text-align: center;">
        <form action="../actions/delete_product_proc.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $row['product_id']?>">
            Are you sure you want to delete this product?  
            <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
                <button type="submit" class="btn btn-primary delBtn" id="delete_product" name="delete_product">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left: -2;">No</button>
            </div>
        </form>
        </div>
      </div>
    </div>
</div>
