<!-- New Product modal -->
<div class="modal fade" id="new_product" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="new_product" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModal">New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../actions/add_product_proc.php" method="POST">
                    <input class="form-control" type="text" name="product_title" placeholder="Product Name" required><br>
                    <input class="form-control" type="number" name="product_price" placeholder="Price per hour" required><br>
                    <?php require_once "../controllers/general_controller.php"; ?>

                    <!-- Categories dropdown -->
                    <select name="cat_id" class="custom-select form-control" id="category" required>
                        <option disabled selected hidden>Category</option>
                        <?php foreach (get_categories_fxn() as $row): ?>
                            <option value="<?= $row['cat_id'] ?>"><?= $row['cat_name'] ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <!-- Brands dropdown -->
                    <select name="brand_id" class="custom-select form-control" id="brand" required>
                        <option disabled selected hidden>Brand</option>
                        <?php foreach (get_brands_fxn() as $row): ?>
                            <option value="<?= $row['brand_id'] ?>"><?= $row['brand_name'] ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <input class="form-control" type="text" name="product_desc" placeholder="Product Description" required><br>
                    <input class="form-control" type="file" name="product_image" placeholder="Product Image"><br>
                    <input class="form-control" type="text" name="product_keywords" placeholder="Product Keywords" required><br>
                    <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10px;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
