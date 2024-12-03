<!-- New Category modal -->
<div class="modal fade" id="new_category" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="new_category" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="categoryModal">New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="../actions/add_category_proc.php" method="POST">
                <input class="form-control" type="text" name="cat_name" placeholder="Category Name" required><br>          
                <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-primary" name="add_category">Add Category</button>
                </div>
        </div>
        </form>
      </div>
    </div>
  </div>
