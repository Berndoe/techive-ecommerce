 <!-- Update Category modal -->
 <div class="modal fade" id="updateCategory<?php echo $row['cat_id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="update_category" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="assetModal">Update Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="../actions/update_category_proc.php" method="POST">
                <input class="form-control" type="hidden" placeholder="Category" name="cat_id" value="<?php echo $row['cat_id'];?>" id="category_id">
                <input class="form-control" type="text" placeholder="Category Name" id="cat_name" name="cat_name" value="<?php echo $row['cat_name'];?>" ><br>        
                <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-primary" name="update_category">Update Category</button>
                </div>
              </form>
        </div>
      </div>
      </div>
    </div>

