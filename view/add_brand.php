<!-- New Brand modal -->
<div class="modal fade" id="new_brand" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="new_brand" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="brandModal">New Brand</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="../actions/add_brand_proc.php" method="POST">
                <input class="form-control" type="text" name="brand_name" placeholder="Brand Name" required><br>          
                <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-primary" name="add_brand">Add Brand</button>
                </div>
        </div>
        </form>
      </div>
    </div>
  </div>
