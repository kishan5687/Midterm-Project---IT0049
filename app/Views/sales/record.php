<?= view('includes/header') ?>

<div id="record-sale-theme-override">
    <div class="form-wrapper-center">
        <div class="pos-card-premium">
            
            <div class="header-container">
                <h4 class="premium-title">🛒 Record New Sale</h4>
                <small class="premium-subtitle">Create immediate checkout orders and automatically update inventory stock balances.</small>
            </div>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="neumorphic-alert-danger">
                    ⚠️ <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="/sales/store" method="POST">
                <?= csrf_field() ?>

                <div class="custom-form-group">
                    <label for="product_id">Select Product Item <span class="required-star">*</span></label>
                    <div class="select-dropdown-wrapper">
                        <select name="product_id" id="product_id" class="neumorphic-select" required>
                            <option value="" class="dark-option">-- Choose Product Line from Inventory --</option>
                            <?php foreach($products as $p): ?>
                                <option value="<?= $p['id'] ?>" class="dark-option">
                                    <?= esc($p['name']) ?> &nbsp;|&nbsp; Stock Left: <?= $p['stock_quantity'] ?> units &nbsp;|&nbsp; ₱<?= number_format($p['price'], 2) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="custom-form-group">
                    <label for="customer_id">Assign Customer Account <span class="label-hint">(Optional)</span></label>
                    <div class="select-dropdown-wrapper">
                        <select name="customer_id" id="customer_id" class="neumorphic-select">
                            <option value="" class="dark-option">-- Anonymous Walk-In Customer checkout --</option>
                            <?php foreach($customers as $c): ?>
                                <option value="<?= $c['id'] ?>" class="dark-option"><?= esc($c['full_name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="custom-form-group">
                    <label for="quantity">Purchase Quantity Amount <span class="required-star">*</span></label>
                    <input type="number" name="quantity" id="quantity" class="neumorphic-input" min="1" placeholder="Enter units number e.g., 2" required autocomplete="off">
                </div>

                <div class="form-actions-flex">
                    <a href="/" class="btn-row-back">← Back to Dashboard</a>
                    <button type="submit" class="btn-glow-orange">Process Transaction</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<style>
    #record-sale-theme-override {
        background-color: #1a1d1f !important;
        width: 100% !important;
        min-height: 90vh !important;
        margin: 0 !important;
        padding: 40px 20px !important;
        display: block !important;
        box-sizing: border-box !important;
    }

    #record-sale-theme-override * {
        box-sizing: border-box !important;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    }

    .form-wrapper-center {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        width: 100% !important;
    }

    .pos-card-premium {
        background: #23272a !important;
        padding: 40px !important;
        border-radius: 20px !important;
        box-shadow: 10px 10px 20px #111314, -10px -10px 20px #2a2f33 !important;
        border: 1px solid rgba(255, 255, 255, 0.02) !important;
        width: 100% !important;
        max-width: 650px !important; 
    }

    .header-container {
        border-bottom: 1px solid #2d3236 !important;
        padding-bottom: 18px !important;
        margin-bottom: 30px !important;
    }

    .premium-title {
        color: #ffffff !important;
        font-weight: 700 !important;
        font-size: 22px !important;
        margin: 0 0 6px 0 !important;
    }

    .premium-subtitle {
        color: #8e9297 !important;
        font-size: 14px !important;
        display: block !important;
    }

    .custom-form-group {
        margin-bottom: 24px !important;
        text-align: left !important;
    }

    .custom-form-group label {
        display: block !important;
        margin-bottom: 10px !important;
        font-size: 14px !important;
        color: #8e9297 !important;
        font-weight: 500 !important;
        padding-left: 2px !important;
    }

    .required-star {
        color: #ff4500 !important;
        font-weight: bold !important;
    }

    .label-hint {
        font-size: 12.5px !important;
        color: #585e64 !important;
        font-style: italic !important;
        font-weight: normal !important;
    }

    input.neumorphic-input {
        width: 100% !important;
        padding: 14px 18px !important;
        background: #23272a !important;
        border: 1px solid transparent !important;
        outline: none !important;
        border-radius: 12px !important;
        color: #ffffff !important;
        font-size: 15px !important;
        box-shadow: inset 4px 4px 8px #1a1d1f, inset -4px -4px 8px #2c3135 !important;
        transition: all 0.3s ease !important;
    }

    input.neumorphic-input:focus {
        box-shadow: inset 2px 2px 4px #1a1d1f, inset -2px -2px 4px #2c3135, 0 0 12px rgba(255, 69, 0, 0.4) !important;
        border: 1px solid rgba(255, 69, 0, 0.5) !important;
    }

    .select-dropdown-wrapper {
        position: relative !important;
        width: 100% !important;
    }

    select.neumorphic-select {
        width: 100% !important;
        padding: 14px 18px !important;
        background: #23272a !important;
        border: 1px solid transparent !important;
        outline: none !important;
        border-radius: 12px !important;
        color: #ffffff !important;
        font-size: 15px !important;
        box-shadow: inset 4px 4px 8px #1a1d1f, inset -4px -4px 8px #2c3135 !important;
        appearance: none !important; /* Erase native browser select button styling profiles */
        -webkit-appearance: none !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
    }

    select.neumorphic-select:focus {
        box-shadow: inset 2px 2px 4px #1a1d1f, inset -2px -2px 4px #2c3135, 0 0 12px rgba(255, 69, 0, 0.4) !important;
        border: 1px solid rgba(255, 69, 0, 0.5) !important;
    }

    .select-dropdown-wrapper::after {
        content: '▼' !important;
        font-size: 10px !important;
        color: #8e9297 !important;
        position: absolute !important;
        right: 18px !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        pointer-events: none !important;
    }

    .dark-option {
        background-color: #23272a !important;
        color: #ffffff !important;
    }

    .form-actions-flex {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        margin-top: 35px !important;
        padding-top: 15px !important;
        border-top: 1px solid #2d3236 !important;
    }

    .btn-glow-orange {
        background-color: #ff4500 !important;
        border: none !important;
        color: #ffffff !important;
        font-weight: 600 !important;
        border-radius: 10px !important;
        padding: 12px 28px !important;
        font-size: 15px !important;
        cursor: pointer !important;
        box-shadow: 0 4px 15px rgba(255, 69, 0, 0.3) !important;
        transition: all 0.3s ease !important;
    }

    .btn-glow-orange:hover {
        background-color: #ff5714 !important;
        box-shadow: 0 0 22px rgba(255, 69, 0, 0.6) !important;
        transform: translateY(-1px) !important;
    }

    .btn-row-back {
        color: #8e9297 !important;
        font-size: 14.5px !important;
        text-decoration: none !important;
        font-weight: 600 !important;
        transition: color 0.2s ease !important;
    }

    .btn-row-back:hover {
        color: #ffffff !important;
    }

    .neumorphic-alert-danger {
        background: #2c1a1d !important;
        border: 1px solid #721c24 !important;
        color: #f8d7da !important;
        padding: 15px 20px !important;
        border-radius: 12px !important;
        font-size: 14px !important;
        margin-bottom: 25px !important;
        box-shadow: inset 2px 2px 5px #111314 !important;
    }
</style>
