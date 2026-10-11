<?= view('includes/header') ?>

<div id="create-product-theme-override">
    <div class="form-wrapper-center">
        <div class="pos-card-premium">
            
            <div class="header-container">
                <h4 class="premium-title">📦 Add New Product</h4>
                <small class="premium-subtitle">Register a new retail inventory listing into the stock management logs.</small>
            </div>

            <?php if(session()->getFlashdata('errors')): ?>
                <div class="neumorphic-alert-danger">
                    <p class="fw-bold m-0 mb-2">⚠️ Registration Blocked:</p>
                    <ul>
                        <?php foreach(session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/products/store" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="custom-form-group">
                    <label for="name">Product Name <span class="required-star">*</span></label>
                    <input type="text" name="name" id="name" class="neumorphic-input" value="<?= old('name') ?>" required autocomplete="off">
                </div>

                <div class="custom-form-group">
                    <label for="price">Price (₱) <span class="required-star">*</span></label>
                    <input type="number" name="price" id="price" step="0.01" class="neumorphic-input" value="<?= old('price') ?>" required autocomplete="off">
                </div>

                <div class="custom-form-group">
                    <label for="stock_quantity">Initial Stock Quantity <span class="required-star">*</span></label>
                    <input type="number" name="stock_quantity" id="stock_quantity" class="neumorphic-input" value="<?= old('stock_quantity') ?>" required autocomplete="off">
                </div>

                <div class="custom-form-group">
                    <label for="image">Product Image <span class="required-star">*</span></label>
                    <input type="file" name="image" id="image" class="neumorphic-file-input" required>
                </div>

                <div class="form-actions-flex">
                    <a href="/products" class="btn-row-back">Back to List</a>
                    <button type="submit" class="btn-glow-orange">Save Product</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<style>
    #create-product-theme-override {
        background-color: #1a1d1f !important;
        width: 100% !important;
        min-height: 90vh !important;
        margin: 0 !important;
        padding: 40px 20px !important;
        display: block !important;
        box-sizing: border-box !important;
    }

    #create-product-theme-override * {
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
        max-width: 550px !important;
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

    /* NEUMORPHIC COMPONENT ELEMENTS */
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

    input.neumorphic-file-input {
        width: 100% !important;
        padding: 10px !important;
        background: #23272a !important;
        border: 1px solid transparent !important;
        outline: none !important;
        border-radius: 12px !important;
        color: #8e9297 !important;
        font-size: 14px !important;
        box-shadow: inset 4px 4px 8px #1a1d1f, inset -4px -4px 8px #2c3135 !important;
    }

    input.neumorphic-file-input::-webkit-file-upload-button {
        background: #2e3338 !important;
        border: 1px solid #3f444a !important;
        color: #ffffff !important;
        padding: 8px 16px !important;
        border-radius: 8px !important;
        cursor: pointer !important;
        font-weight: 600 !important;
        margin-right: 12px !important;
        transition: background-color 0.2s ease !important;
    }

    input.neumorphic-file-input::-webkit-file-upload-button:hover {
        background: #3a3f45 !important;
    }

    .form-actions-flex {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        margin-top: 35px !important;
        padding-top: 15px !important;
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
        background-color: #2e3338 !important;
        border: 1px solid #3f444a !important;
        color: #dcddde !important;
        border-radius: 10px !important;
        padding: 12px 24px !important;
        font-size: 15px !important;
        text-decoration: none !important;
        font-weight: 600 !important;
        transition: all 0.2s ease !important;
        text-align: center !important;
    }

    .btn-row-back:hover {
        background-color: #3a3f45 !important;
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

    .neumorphic-alert-danger ul {
        margin: 0 !important;
        padding-left: 20px !important;
    }
</style>

<?= view('includes/footer') ?>
