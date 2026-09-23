<?= view('includes/header') ?>

<div class="pos-card mt-2">
    <div class="py-3">
        <h1 class="fw-bold tracking-tight text-dark mb-2">Welcome to the POS System</h1>
        <p class="fs-5 text-muted mb-4">Use the navigation menu panel on the left to handle items management, view customer logs, or execute cash sales records.</p>
        <hr class="my-4" style="border-color: #e2e8f0;">
        
        <div class="d-flex gap-3">
            <a href="/sales/record" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm" style="background-color: #0284c7; border-color: #0284c7; border-radius: 8px;">🛒 Record a New Sale</a>
            <a href="/sales/history" class="btn btn-outline-secondary px-4 py-2 fw-semibold" style="border-radius: 8px; color: #475569; border-color: #cbd5e1;">📜 View Transaction Logs</a>
        </div>
    </div>
</div>

<?= view('includes/footer') ?>
