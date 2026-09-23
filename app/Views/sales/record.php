<?= view('includes/header') ?>

<div class="pos-card mx-auto" style="max-width: 650px; margin-top: 10px;">
    <div class="border-bottom pb-3 mb-4">
        <h3 class="fw-bold text-dark m-0">🛒 Record New Sale</h3>
        <small class="text-muted">Create immediate checkout orders and automatically update inventory stock balances.</small>
    </div>
    
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger py-2 px-3 mb-4 border-0 shadow-sm" style="background-color: #fef2f2; color: #dc2626; border-radius: 8px; font-weight: 500;">
            ⚠ <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="/sales/store" method="POST">
        <!-- Product Selector Row -->
        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary small">Select Product Item *</label>
            <select name="product_id" class="form-select py-2 shadow-sm" style="width: 100%; padding: 8px 12px; border-radius: 8px; border: 1px solid #cbd5e1; background-color: #ffffff; display: block;" required>
                <option value="">-- Choose Product Line from Inventory --</option>
                <?php foreach($products as $p): ?>
                    <option value="<?= $p['id'] ?>">
                        <?= esc($p['name']) ?> &nbsp;|&nbsp; Stock Left: <?= $p['stock_quantity'] ?> units &nbsp;|&nbsp; ₱<?= number_format($p['price'], 2) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold text-secondary small">Assign Customer Account (Optional)</label>
            <select name="customer_id" class="form-select py-2 shadow-sm" style="width: 100%; padding: 8px 12px; border-radius: 8px; border: 1px solid #cbd5e1; background-color: #ffffff; display: block;">
                <option value="">-- Anonymous Walk-in Customer checkout --</option>
                <?php foreach($customers as $c): ?>
                    <option value="<?= $c['id'] ?>"><?= esc($c['full_name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold text-secondary small">Purchase Quantity Amount *</label>
            <input type="number" name="quantity" class="form-control py-2 shadow-sm" style="width: 100%; padding: 8px 12px; border-radius: 8px; border: 1px solid #cbd5e1; display: block;" min="1" placeholder="Enter units number e.g., 2" required>
        </div>

        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
            <a href="/" class="text-decoration-none fw-semibold small text-secondary">← Back to Dashboard</a>
            <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm" style="background-color: #0284c7; border-color: #0284c7; border-radius: 8px; color: #ffffff;">Process Transaction</button>
        </div>
    </form>
</div>

<?= view('includes/footer') ?>
