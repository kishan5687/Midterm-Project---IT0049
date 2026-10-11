<?= view('includes/header') ?>

<!-- We use an ID with !important overrides to force-break out of any light themes -->
<div id="premium-dark-theme-override">
    <div class="directory-wrapper">
        <div class="pos-card-premium">
            
            <div class="header-flex-container">
                <div>
                    <h3 class="premium-title">👥 Customer Directory</h3>
                    <small class="premium-subtitle">Manage client database records, account contact info, and registration details.</small>
                </div>
                <a href="/customers/create" class="btn-glow-blue">+ Add New Customer</a>
            </div>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="neumorphic-alert-success">
                    ✓ <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <div class="grid-table-container">
                
                <div class="grid-header-strip">
                    <div>ID</div>
                    <div>Full Name</div>
                    <div>Email Address</div>
                    <div>Phone Number</div>
                    <div style="text-align: right;">Actions</div>
                </div>

                <div style="margin-top: 10px;">
                    <?php if(empty($customers)): ?>
                        <div class="empty-state-card">
                            <p>No customer profiles discovered in the current database instance.</p>
                        </div>
                    <?php else: ?>
                        <?php foreach($customers as $c): ?>
                            <div class="grid-data-row">
                                
                                <div class="txt-highlight-id">#<?= $c['id'] ?></div>
                                
                                <div>
                                    <span class="txt-highlight-name"><?= esc($c['full_name']) ?></span>
                                </div>
                                
                                <div class="txt-monospace">
                                    <?= esc($c['email']) ?>
                                </div>
                                
                                <div class="txt-phone">
                                    <?= !empty($c['phone']) ? esc($c['phone']) : '<span>None</span>' ?>
                                </div>
                                
                                <div class="action-buttons-cell">
                                    <a href="/customers/edit/<?= $c['id'] ?>" class="btn-row-edit">Edit</a>
                                    <a href="/customers/delete/<?= $c['id'] ?>" class="btn-row-delete" onclick="return confirm('Wipe out entry?')">Delete</a>
                                </div>
                                
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #premium-dark-theme-override {
        background-color: #1a1d1f !important;
        width: 100% !important;
        min-height: 90vh !important;
        margin: 0 !important;
        padding: 30px !important;
        display: block !important;
        box-sizing: border-box !important;
    }

    #premium-dark-theme-override * {
        box-sizing: border-box !important;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    }

    .pos-card-premium {
        background: #23272a !important;
        padding: 35px !important;
        border-radius: 20px !important;
        box-shadow: 10px 10px 20px #111314, -10px -10px 20px #2a2f33 !important;
        border: 1px solid rgba(255, 255, 255, 0.02) !important;
        width: 100% !important;
    }

    .header-flex-container {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        border-bottom: 1px solid #2d3236 !important;
        padding-bottom: 20px !important;
        margin-bottom: 25px !important;
    }

    .premium-title {
        color: #ffffff !important;
        font-weight: 700 !important;
        font-size: 24px !important;
        margin: 0 0 5px 0 !important;
    }

    .premium-subtitle {
        color: #8e9297 !important;
        font-size: 14px !important;
        display: block !important;
    }

    .btn-glow-blue {
        background-color: #00bcd4 !important;
        border: none !important;
        color: #ffffff !important;
        font-weight: 600 !important;
        border-radius: 10px !important;
        padding: 10px 20px !important;
        text-decoration: none !important;
        font-size: 14px !important;
        box-shadow: 0 4px 15px rgba(0, 188, 212, 0.3) !important;
        transition: all 0.3s ease !important;
    }

    .btn-glow-blue:hover {
        background-color: #00d2eb !important;
        box-shadow: 0 0 20px rgba(0, 188, 212, 0.6) !important;
    }

    .grid-table-container {
        width: 100% !important;
        font-size: 15px !important;
        margin-top: 20px !important;
    }

    .grid-header-strip {
        display: grid !important;
        grid-template-columns: 70px 1.2fr 1.5fr 1.2fr 140px !important;
        padding: 14px 16px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        font-size: 13px !important;
        letter-spacing: 0.5px !important;
        background-color: #1a1d1f !important;
        border-radius: 12px !important;
        box-shadow: inset 3px 3px 6px #111314, inset -3px -3px 6px #24292c !important;
        color: #8e9297 !important;
    }

    .grid-data-row {
        display: grid !important;
        grid-template-columns: 70px 1.2fr 1.5fr 1.2fr 140px !important;
        padding: 16px !important;
        align-items: center !important;
        background-color: #23272a !important;
        border-bottom: 1px solid #2d3236 !important;
        color: #dcddde !important;
    }

    .grid-data-row:hover {
        background-color: #282d31 !important;
    }

    .txt-highlight-id {
        color: #ff4500 !important;
        font-weight: 600 !important;
    }

    .txt-highlight-name {
        color: #ffffff !important;
        font-weight: 600 !important;
    }

    .txt-monospace {
        font-family: monospace !important;
        color: #00bcd4 !important;
    }

    .txt-phone {
        color: #ffffff !important;
    }

    .txt-phone span {
        color: #585e64 !important;
        font-style: italic !important;
    }

    .action-buttons-cell {
        text-align: right !important;
        display: flex !important;
        gap: 8px !important;
        justify-content: flex-end !important;
    }

    .btn-row-edit {
        background-color: #2e3338 !important;
        border: 1px solid #3f444a !important;
        color: #dcddde !important;
        border-radius: 8px !important;
        padding: 6px 14px !important;
        font-size: 13px !important;
        text-decoration: none !important;
        font-weight: 600 !important;
    }

    .btn-row-edit:hover {
        background-color: #3a3f45 !important;
        color: #ffffff !important;
    }

    .btn-row-delete {
        background-color: #ff4500 !important;
        color: #ffffff !important;
        border-radius: 8px !important;
        padding: 6px 14px !important;
        font-size: 13px !important;
        text-decoration: none !important;
        font-weight: 600 !important;
        box-shadow: 0 4px 10px rgba(255, 69, 0, 0.2) !important;
    }

    .btn-row-delete:hover {
        background-color: #ff5714 !important;
        box-shadow: 0 0 15px rgba(255, 69, 0, 0.5) !important;
    }

    .neumorphic-alert-success {
        background: #192e22 !important;
        border: 1px solid #1e4620 !important;
        color: #a3e635 !important;
        padding: 14px 20px !important;
        border-radius: 12px !important;
        font-weight: 500 !important;
        margin-bottom: 20px !important;
    }

    .empty-state-card {
        background-color: #1a1d1f !important;
        border: 2px dashed #2d3236 !important;
        border-radius: 16px !important;
        padding: 50px 20px !important;
        text-align: center !important;
        color: #8e9297 !important;
    }
</style>

<?= view('includes/footer') ?>
