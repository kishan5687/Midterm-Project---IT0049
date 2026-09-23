<?= view('includes/header') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Sales History Logs</h2>
    <a href="/sales/record" class="btn btn-primary">New Sale Transaction</a>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<div class="table-responsive bg-white p-3 rounded shadow-sm">
    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Customer</th>
                <th>Sold By (Staff)</th>
                <th>Qty</th>
                <th>Total Price</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($sales)): ?>
                <tr><td colspan="7" class="text-center text-muted">No sales logs discovered.</td></tr>
            <?php else: ?>
                <?php foreach($sales as $sale): ?>
                <tr>
                    <td><?= $sale['id'] ?></td>
                    <td><strong><?= esc($sale['product_name']) ?></strong></td>
                    <td><?= $sale['customer_name'] ? esc($sale['customer_name']) : '<span class="text-muted">Walk-in</span>' ?></td>
                    <td><?= esc($sale['staff_name']) ?></td>
                    <td><?= $sale['quantity'] ?></td>
                    <td>$<?= number_format($sale['total_price'], 2) ?></td>
                    <td><?= $sale['created_at'] ?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= view('includes/footer') ?>
