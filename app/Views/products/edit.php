<?= view('includes/header') ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark"><h4>Edit Product #<?= $product['id'] ?></h4></div>
            <div class="card-body">
                
                <?php if(session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                        <?php foreach(session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="/products/update/<?= $product['id'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Product Name *</label>
                        <input type="text" name="name" class="form-control" value="<?= esc($product['name']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price ($) *</label>
                        <input type="number" name="price" step="0.01" class="form-control" value="<?= esc($product['price']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stock Quantity *</label>
                        <input type="number" name="stock_quantity" class="form-control" value="<?= esc($product['stock_quantity']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Update Product Image (Leave blank to keep current)</label>
                        <input type="file" name="image" class="form-control">
                        <?php if(!empty($product['image'])): ?>
                            <div class="mt-2">
                                <small class="text-muted">Current file:</small><br>
                                <img src="/uploads/products/<?= $product['image'] ?>" style="width: 80px; height: 80px; object-fit: cover;" class="rounded border">
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/products" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-warning">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('includes/footer') ?>
