<?= view('includes/header') ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white"><h4>Add New Product</h4></div>
            <div class="card-body">
                
                <!-- Display Form Validation Errors -->
                <?php if(session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                        <?php foreach(session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="/products/store" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Product Name *</label>
                        <input type="text" name="name" class="form-control" value="<?= old('name') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price ($) *</label>
                        <input type="number" name="price" step="0.01" class="form-control" value="<?= old('price') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Initial Stock Quantity *</label>
                        <input type="number" name="stock_quantity" class="form-control" value="<?= old('stock_quantity') ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Image *</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/products" class="btn btn-secondary">Back to List</a>
                        <button type="submit" class="btn btn-success">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('includes/footer') ?>
