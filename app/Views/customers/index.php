<?= view('includes/header') ?>

<div class="pos-card mt-2">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
        <div>
            <h3 class="fw-bold text-dark m-0">👥 Customer Directory</h3>
            <small class="text-muted">Manage client database records, account contact info, and registration details.</small>
        </div>
        <a href="/customers/create" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm" style="background-color: #0284c7; border-color: #0284c7; border-radius: 8px;">+ Add New Customer</a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success py-2 px-3 mb-4 border-0 shadow-sm" style="background-color: #f0fdf4; color: #16a34a; border-radius: 8px; font-weight: 500;">
            ✓ <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div style="width: 100%; font-size: 0.95rem;">
        <div style="display: grid; grid-template-columns: 60px 1.2fr 1.5fr 1.2fr 140px; padding: 12px 16px; background-color: #f8fafc; border-radius: 8px; font-weight: 600; color: #475569; border-bottom: 2px solid #e2e8f0; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px;">
            <div>ID</div>
            <div>Full Name</div>
            <div>Email Address</div>
            <div>Phone Number</div>
            <div style="text-align: right;">Actions</div>
        </div>

        <div class="mt-1">
            <?php if(empty($customers)): ?>
                <div class="text-center text-muted py-5 border rounded-3 bg-white mt-2">
                    <p class="m-0">No customer profiles discovered in the current database instance.</p>
                </div>
            <?php else: ?>
                <?php foreach($customers as $c): ?>
                    <div style="display: grid; grid-template-columns: 60px 1.2fr 1.5fr 1.2fr 140px; padding: 16px; align-items: center; border-bottom: 1px solid #f1f5f9; background-color: #ffffff; transition: background-color 0.15s ease;">
                        
                        <div class="text-secondary fw-semibold">#<?= $c['id'] ?></div>
                        
                        <div>
                            <span class="fw-semibold text-dark d-block" style="font-size: 0.95rem;"><?= esc($c['full_name']) ?></span>
                        </div>
                        
                        <div class="text-secondary" style="font-family: monospace; font-size: 0.9rem;">
                            <?= esc($c['email']) ?>
                        </div>
                        
                        <div class="fw-medium text-dark">
                            <?= !empty($c['phone']) ? esc($c['phone']) : '<span class="text-muted italic small">None</span>' ?>
                        </div>
                        
                        <div style="text-align: right; display: flex; gap: 8px; justify-content: flex-end;">
                            <a href="/customers/edit/<?= $c['id'] ?>" class="btn btn-sm btn-light fw-semibold" style="border: 1px solid #cbd5e1; color: #475569; background-color: #ffffff; border-radius: 6px; font-size: 0.85rem; padding: 6px 12px;">Edit</a>
                            <a href="/customers/delete/<?= $c['id'] ?>" class="btn btn-sm btn-danger fw-semibold" style="background-color: #ef4444; border-color: #ef4444; border-radius: 6px; font-size: 0.85rem; padding: 6px 12px; color: #ffffff;" onclick="return confirm('Wipe this customer profile entry completely out of the system ledger?')">Delete</a>
                        </div>
                        
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= view('includes/footer') ?>
