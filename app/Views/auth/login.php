<?= view('includes/header') ?>

<style>
    .login-wrapper {
        background-color: #23272a;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 70vh; 
        padding: 20px 0;
    }

    .neumorphic-login-container {
        background: #23272a;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 10px 10px 20px #1a1d1f, -10px -10px 20px #2c3135;
        width: 100%;
        max-width: 420px;
        text-align: center;
    }

    .neumorphic-login-container h4 {
        color: #ffffff;
        margin-bottom: 30px;
        font-size: 24px;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .custom-form-group {
        margin-bottom: 25px;
        text-align: left;
    }

    .custom-form-group label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        color: #8e9297;
        padding-left: 5px;
    }

    .custom-form-group input.neumorphic-input {
        width: 100%;
        padding: 14px 20px;
        background: #23272a;
        border: none;
        outline: none;
        border-radius: 12px;
        color: #ffffff;
        font-size: 16px;
        box-shadow: inset 4px 4px 8px #1a1d1f, inset -4px -4px 8px #2c3135;
        transition: all 0.3s ease;
    }

    .custom-form-group input.neumorphic-input:focus {
        box-shadow: inset 2px 2px 4px #1a1d1f, inset -2px -2px 4px #2c3135, 0 0 12px rgba(255, 69, 0, 0.5);
        border: 1px solid rgba(255, 69, 0, 0.6) !important;
        background: #23272a;
        color: #ffffff;
    }

    .btn-neumorphic-orange {
        width: 100%;
        padding: 14px;
        background: #ff4500;
        border: none;
        border-radius: 12px;
        color: #ffffff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(255, 69, 0, 0.4);
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .btn-neumorphic-orange:hover {
        background: #ff5714;
        box-shadow: 0 0 25px rgba(255, 69, 0, 0.7);
        color: #ffffff;
        transform: translateY(-2px);
    }

    .btn-neumorphic-orange:active {
        transform: translateY(0);
        box-shadow: 0 4px 10px rgba(255, 69, 0, 0.4);
    }

    .neumorphic-alert {
        background: #2c1a1d;
        border: 1px solid #721c24;
        color: #f8d7da;
        padding: 12px;
        border-radius: 12px;
        margin-bottom: 25px;
        font-size: 14px;
        text-align: left;
        box-shadow: inset 2px 2px 5px #1a1d1f;
    }
</style>

<div class="login-wrapper">
    <div class="neumorphic-login-container">
        <h4>POS System Login</h4>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="neumorphic-alert">
                ⚠️ <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="/loginProcess" method="POST">
    
            <?= csrf_field() ?>

            <div class="custom-form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="neumorphic-input" required value="<?= old('username') ?>" autocomplete="off">
            </div>
            
            <div class="custom-form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="neumorphic-input" required>
            </div>
            
            <button type="submit" class="btn-neumorphic-orange">Login</button>
        </form>
    </div>
</div>

<?= view('includes/footer') ?>
