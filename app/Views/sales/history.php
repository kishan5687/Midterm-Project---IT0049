<?= view('includes/header') ?>

<div id="sales-history-theme-override">
    <div class="history-wrapper">
        <div class="pos-card-premium mt-2">
            
            <div class="header-flex-container">
                <div>
                    <h3 class="premium-title">📜 Sales History Logs</h3>
                    <small class="premium-subtitle">Track chronological transaction invoices, cashier tracking accounts, and checkout totals.</small>
                </div>
                <a href="/sales/record" class="btn-glow-blue">+ New Sale Transaction</a>
            </div>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="neumorphic-alert-success">
                    ✓ <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <div class="grid-table-container">
                
                <div class="grid-header-strip">
                    <div>ID</div>
                    <div>Product Name</div>
                    <div>Customer</div>
                    <div>Sold By (Staff)</div>
                    <div style="text-align: center;">Qty</div>
                    <div>Total Price</div>
                    <div style="text-align: right;">Date & Time</div>
                </div>

                <div style="margin-top: 10px;">
                    <?php if(empty($sales)): ?>
                        <div class="empty-state-card">
                            <p>No sales logs discovered in the current database instance.</p>
                        </div>
                    <?php else: ?>
                        <?php foreach($sales as $sale): ?>
                            <div class="grid-data-row">
                                
                                <div class="txt-highlight-id fw-semibold">#<?= $sale['id'] ?></div>
                                
                                <div>
                                    <span class="txt-highlight-name d-block"><?= esc($sale['product_name']) ?></span>
                                </div>
                                
                                <div>
                                    <?= $sale['customer_name'] ? '<span class="txt-customer-active">' . esc($sale['customer_name']) . '</span>' : '<span class="txt-customer-walkin">Walk-in</span>' ?>
                                </div>
                                
                                <div class="txt-staff-signature">
                                    👤 <?= esc($sale['staff_name']) ?>
                                </div>

                                <div style="text-align: center;" class="fw-semibold text-light">
                                    <?= $sale['quantity'] ?>
                                </div>
                                
                                <div class="txt-monospace font-weight-bold">
                                    ₱<?= number_format($sale['total_price'], 2) ?>
                                </div>

                                <div class="txt-timestamp-matrix">
                                    <?= $sale['created_at'] ?>
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
    #sales-history-theme-override {
        background-color: #1a1d1f !important;
        width: 100% !important;
        min-height: 90vh !important;
        margin: 0 !important;
        padding: 30px !important;
        display: block !important;
        box-sizing: border-box !important;
    }

    #sales-history-theme-override * {
        box-sizing: border-box !important;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    }

    .history-wrapper {
        width: 100% !important;
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
        grid-template-columns: 60px 2.2fr 1.3fr 1.8fr 70px 1.2fr 1.5fr !important;
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
        grid-template-columns: 60px 2.2fr 1.3fr 1.8fr 70px 1.2fr 1.5fr !important;
        padding: 16px 16px !important;
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
    }

    .txt-highlight-name {
        color: #ffffff !important;
        font-weight: 600 !important;
        font-size: 14.5px !important;
    }

    .txt-monospace {
        font-family: monospace !important;
        color: #a3e635 !important; 
        font-size: 15px !important;
        text-shadow: 0 0 4px rgba(163, 230, 53, 0.1) !important;
    }

    .txt-customer-active {
        color: #ffffff !important;
        font-weight: 500 !important;
    }

    .txt-customer-walkin {
        color: #585e64 !important;
        font-style: italic !important;
        font-size: 13.5px !important;
    }

    .txt-staff-signature {
        color: #b9bbbe !important;
        font-size: 14px !important;
    }

    .txt-timestamp-matrix {
        text-align: right !important;
        color: #8e9297 !important;
        font-size: 13.5px !important;
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
