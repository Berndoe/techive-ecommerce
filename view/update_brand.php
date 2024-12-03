 <!-- Update Brand modal -->
 <div class="modal fade" id="updateBrand<?php echo $row['brand_id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="update_brand" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="brandModal">Update Brand</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="../actions/update_brand_proc.php" method="POST">
                <input class="form-control" type="hidden" placeholder="Brand" name="brand_id" value="<?php echo $row['brand_id'];?>" id="brand_id">
                <input class="form-control" type="text" placeholder="Brand Name" id="brand_name" name="brand_name" value="<?php echo $row['brand_name'];?>" ><br>        
                <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-primary" name="update_brand">Update Brand</button>
                </div>
              </form>
        </div>
      </div>
      </div>
    </div>

