<div class="modal fade" id="updateProduct<?php echo $row['product_id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="update_product" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModal">Update Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../actions/update_product_proc.php" method="POST">
                    <input class="form-control" type="hidden" name="product_id" value="<?php echo $row['product_id'];?>" id="product_id">
                    <input class="form-control" type="text" name="product_title" value="<?php echo $row['product_title'];?>"><br>
                    <input class="form-control" type="number" name="product_price" value="<?php echo $row['product_price'];?>"><br>
                    <input class="form-control" type="number" name="stock_quantity" value="<?php echo $row['stock_quantity'];?>"><br>

                    <?php require_once "../controllers/general_controller.php"; ?>
                    <!-- Categories dropdown -->
                    <select name="cat_id" class="custom-select form-control" id="category" required>
                        <?php foreach (get_categories_fxn() as $category): ?>
                            <option value="<?= $category['cat_id'] ?>"><?= $category['cat_name'] ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <!-- Brands dropdown -->
                    <select name="brand_id" class="custom-select form-control" id="brand" required>
                        <?php foreach (get_brands_fxn() as $brand): ?>
                            <option value="<?= $brand['brand_id'] ?>"><?= $brand['brand_name'] ?></option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <input class="form-control" type="text" name="product_desc" value="<?php echo $row['product_desc'];?>"><br>
                    <input class="form-control" type="text" name="product_keywords" value="<?php echo $row['product_keywords'];?>"><br>
                
                
                    <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-primary" name="update_product">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
