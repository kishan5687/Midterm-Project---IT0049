<?= view('includes/header') ?>

<div id="edit-staff-theme-override">
    <div class="form-wrapper-center">
        <div class="pos-card-premium">
            
            <div class="header-container">
                <h4 class="premium-title">👔 Edit Staff Account #<?= $user['id'] ?></h4>
                <small class="premium-subtitle">Modify profile names, adjust credential tokens, or assign access avatars.</small>
            </div>

            <?php if(session()->getFlashdata('errors')): ?>
                <div class="neumorphic-alert-danger">
                    <p class="fw-bold m-0 mb-2">⚠️ Modification Prevented:</p>
                    <ul>
                        <?php foreach(session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/users/update/<?= $user['id'] ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="custom-form-group">
                    <label for="username">Username <span class="label-hint">(Usernames cannot be modified)</span></label>
                    <input type="text" id="username" class="neumorphic-input locked-input" value="<?= esc($user['username']) ?>" readonly>
                </div>

                <div class="custom-form-group">
                    <label for="full_name">Full Name <span class="required-star">*</span></label>
                    <input type="text" name="full_name" id="full_name" class="neumorphic-input" value="<?= esc($user['full_name']) ?>" required autocomplete="off">
                </div>

                <div class="custom-form-group">
                    <label for="password">New Password <span class="label-hint">(Leave blank to keep current)</span></label>
                    <input type="password" name="password" id="password" class="neumorphic-input" autocomplete="new-password">
                </div>

                <div class="custom-form-group">
                    <label for="avatar">Update Avatar Profile Picture</label>
                    <input type="file" name="avatar" id="avatar" class="neumorphic-file-input">
                    
                    <?php if(!empty($user['avatar'])): ?>
                        <div class="current-avatar-preview">
                            <small class="preview-label">Current profile file:</small>
                            <div class="avatar-circle-wrapper">
                                <img src="/uploads/avatars/<?= $user['avatar'] ?>" alt="Staff Avatar">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-actions-flex">
                    <a href="/users" class="btn-row-back">Cancel</a>
                    <button type="submit" class="btn-glow-orange">Update Staff Profile</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<style>
    #edit-staff-theme-override {
        background-color: #1a1d1f !important;
        width: 100% !important;
        min-height: 90vh !important;
        margin: 0 !important;
        padding: 40px 20px !important;
        display: block !important;
        box-sizing: border-box !important;
    }

    #edit-staff-theme-override * {
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

    .locked-input {
        background-color: #1c1f22 !important;
        color: #585e64 !important;
        box-shadow: inset 2px 2px 5px #111314 !important;
        cursor: not-allowed !important;
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

    .current-avatar-preview {
        background-color: #1a1d1f !important;
        border-radius: 12px !important;
        padding: 15px !important;
        margin-top: 15px !important;
        box-shadow: inset 2px 2px 5px #111314 !important;
        display: inline-flex !important;
        flex-direction: column !important;
        gap: 10px !important;
    }

    .preview-label {
        font-size: 12px !important;
        color: #8e9297 !important;
    }

    .avatar-circle-wrapper {
        border-radius: 50% !important;
        overflow: hidden !important;
        border: 2px solid #3a3f45 !important;
        width: 80px !important;
        height: 80px !important;
        box-shadow: 2px 2px 8px rgba(0,0,0,0.4) !important;
    }

    .avatar-circle-wrapper img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
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

