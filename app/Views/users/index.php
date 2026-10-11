<?= view('includes/header') ?>

<div id="staff-management-theme-override">
    <div class="management-wrapper">
        <div class="pos-card-premium mt-2">
            
            <div class="header-flex-container">
                <div>
                    <h3 class="premium-title">👔 Staff System Management</h3>
                    <small class="premium-subtitle">Manage active user credential tokens, update profile names, and assign system access avatars.</small>
                </div>
                <a href="/users/create" class="btn-glow-blue">+ Register New Staff</a>
            </div>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="neumorphic-alert-success">
                    ✓ <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('error')): ?>
                <div class="neumorphic-alert-danger">
                    ⚠️ <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <div class="grid-table-container">
                
                <div class="grid-header-strip">
                    <div>ID</div>
                    <div>Avatar</div>
                    <div>Username</div>
                    <div>Full Name</div>
                    <div style="text-align: right;">Actions</div>
                </div>

                <div style="margin-top: 10px;">
                    <?php if(empty($users)): ?>
                        <div class="empty-state-card">
                            <p>No staff profile entries discovered in the current database instance.</p>
                        </div>
                    <?php else: ?>
                        <?php foreach($users as $u): ?>
                            <div class="grid-data-row">
                                
                                <div class="txt-highlight-id fw-semibold">#<?= $u['id'] ?></div>
                                
                                <div class="avatar-frame-cell">
                                    <?php if(!empty($u['avatar'])): ?>
                                        <img src="/uploads/avatars/<?= $u['avatar'] ?>" alt="Staff Avatar" class="staff-avatar-img">
                                    <?php else: ?>
                                        <div class="no-avatar-silhouette">?</div>
                                    <?php endif; ?>
                                </div>
                                
                                <div>
                                    <span class="txt-monospace-badge"><?= esc($u['username']) ?></span>
                                </div>
                                
                                <div>
                                    <span class="txt-highlight-name d-block"><?= esc($u['full_name']) ?></span>
                                </div>
                                
                                <div class="action-buttons-cell" style="text-align: right !important; display: flex !important; flex-direction: row !important; flex-wrap: nowrap !important; gap: 8px !important; justify-content: flex-end !important; align-items: center !important;">
                                    
                                    <a href="/users/edit/<?= $u['id'] ?>" class="btn-row-edit-glow" style="background-color: #2b3035 !important; border: 1.5px solid #3e444b !important; color: #ffffff !important; border-radius: 10px !important; padding: 6px 16px !important; font-size: 13px !important; text-decoration: none !important; font-weight: 600 !important; display: inline-block !important; letter-spacing: 0.3px !important; box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3) !important; white-space: nowrap !important;">Edit</a>
                                    
                                    <a href="/users/delete/<?= $u['id'] ?>" class="btn-row-delete-glow" style="background-color: #ff4500 !important; border: none !important; color: #ffffff !important; border-radius: 10px !important; padding: 7px 16px !important; font-size: 13px !important; text-decoration: none !important; font-weight: 600 !important; display: inline-block !important; letter-spacing: 0.3px !important; box-shadow: 0 3px 10px rgba(255, 69, 0, 0.3) !important; white-space: nowrap !important;" onclick="return confirm('Deregister this staff profile instance? Access tokens will instantly expire.')">Delete</a>
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
    #staff-management-theme-override {
        background-color: #1a1d1f !important;
        width: 100% !important;
        min-height: 90vh !important;
        margin: 0 !important;
        padding: 30px !important;
        display: block !important;
        box-sizing: border-box !important;
    }

    #staff-management-theme-override * {
        box-sizing: border-box !important;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    }

    .management-wrapper {
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
        grid-template-columns: 60px 100px 1.5fr 2fr 140px !important;
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
        grid-template-columns: 60px 100px 1.5fr 2fr 140px !important;
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
    }

    .txt-highlight-name {
        color: #ffffff !important;
        font-weight: 600 !important;
        font-size: 15px !important;
    }

    .txt-monospace-badge {
        font-family: monospace !important;
        font-size: 14px !important;
        color: #00bcd4 !important;
        background-color: #1a1d1f !important;
        padding: 5px 12px !important;
        border-radius: 6px !important;
        font-weight: 600 !important;
        border: 1px solid #2d3236 !important;
        display: inline-block !important;
    }

    .avatar-frame-cell {
        display: flex !important;
        align-items: center !important;
    }

    .staff-avatar-img {
        width: 44px !important;
        height: 44px !important;
        object-fit: cover !important;
        border-radius: 50% !important;
        border: 2px solid #3a3f45 !important;
        box-shadow: 2px 2px 6px rgba(0,0,0,0.4) !important;
    }

    .no-avatar-silhouette {
        width: 44px !important;
        height: 44px !important;
        background: linear-gradient(135deg, #2b3035 0%, #1a1d1f 100%) !important;
        border-radius: 50% !important;
        border: 2px solid #3a3f45 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
