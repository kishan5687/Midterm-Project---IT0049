<?= view('includes/header') ?>

<div class="pos-card mt-2">
    <!-- Header Interface Title Section -->
    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
        <div>
            <h3 class="fw-bold text-dark m-0">📦 Product Inventory</h3>
            <small class="text-muted">Monitor available stock levels, unit pricing structures, and manage active listings.</small>
        </div>
        <a href="/products/create" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm" style="background-color: #0284c7; border-color: #0284c7; border-radius: 8px;">+ Add New Product</a>
    </div>

    <!-- Operation Status Alert Notification Box -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success py-2 px-3 mb-4 border-0 shadow-sm" style="background-color: #f0fdf4; color: #16a34a; border-radius: 8px; font-weight: 500;">
            ✓ <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- Custom Hand-Coded Modern Grid Layout (Works perfectly without internet or Bootstrap) -->
    <div style="width: 100%; font-size: 0.95rem;">
        <!-- Table Column Headers Header Matrix -->
        <div style="display: grid; grid-template-columns: 60px 100px 1fr 140px 140px 140px; padding: 12px 16px; background-color: #f8fafc; border-radius: 8px; font-weight: 600; color: #475569; border-bottom: 2px solid #e2e8f0; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px;">
            <div>ID</div>
            <div>Image</div>
            <div>Product Name</div>
            <div>Unit Price</div>
            <div>Stock Balance</div>
            <div style="text-align: right;">Actions</div>
        </div>

        <!-- Table Data Rows Container -->
        <div class="mt-1">
            <?php if(empty($products)): ?>
                <div class="text-center text-muted py-5 border rounded-3 bg-white mt-2">
                    <p class="m-0">No product items discovered in the current database instance.</p>
                </div>
            <?php else: ?>
                <?php foreach($products as $p): ?>
                    <div style="display: grid; grid-template-columns: 60px 100px 1fr 140px 140px 140px; padding: 16px; align-items: center; border-bottom: 1px solid #f1f5f9; background-color: #ffffff; transition: background-color 0.15s ease;">
                        
                        <!-- Product ID -->
                        <div class="text-secondary fw-semibold">#<?= $p['id'] ?></div>
                        
                        <!-- Thumbnail Image Frame Container -->
                        <div>
                            <?php if(!empty($p['image'])): ?>
                                <img src="/uploads/products/<?= $p['image'] ?>" alt="Item Image" style="width: 56px; height: 56px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                            <?php else: ?>
                                <div style="width: 56px; height: 56px; background-color: #f1f5f9; border-radius: 8px; border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; color: #94a3b8; font-weight: 500;">No Image</div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Identification String Parameter Name -->
                        <div>
                            <span class="fw-semibold text-dark d-block" style="font-size: 1rem;"><?= esc($p['name']) ?></span>
                        </div>
                        
                        <div class="fw-semibold text-slate-700">
                            ₱<?= number_format($p['price'], 2) ?>
                        </div>

                        <!-- Inventory Quantity Conditional Execution Logic Tags -->
                        <div>
                            <?php if($p['stock_quantity'] <= 0): ?>
                                <span style="background-color: #fef2f2; color: #dc2626; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; border: 1px solid #fee2e2;">Out of Stock</span>
                            <?php elseif($p['stock_quantity'] <= 5): ?>
                                <span style="background-color: #fff7ed; color: #ea580c; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; border: 1px solid #ffedd5;"><?= $p['stock_quantity'] ?> Low Stock</span>
                            <?php else: ?>
                                <span style="background-color: #f0fdf4; color: #16a34a; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; border: 1px solid #dcfce7;"><?= $p['stock_quantity'] ?> units</span>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Context Control Action Triggers Block Links -->
                        <div style="text-align: right; display: flex; gap: 8px; justify-content: flex-end;">
                            <a href="/products/edit/<?= $p['id'] ?>" class="btn btn-sm btn-light fw-semibold" style="border: 1px solid #cbd5e1; color: #475569; background-color: #ffffff; border-radius: 6px; font-size: 0.85rem; padding: 6px 12px;">Edit</a>
                            <a href="/products/delete/<?= $p['id'] ?>" class="btn btn-sm btn-danger fw-semibold" style="background-color: #ef4444; border-color: #ef4444; border-radius: 6px; font-size: 0.85rem; padding: 6px 12px; color: #ffffff;" onclick="return confirm('Wipe this product entry configuration out of the master database ledger?')">Delete</a>
                        </div>
                        
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= view('includes/footer') ?>
