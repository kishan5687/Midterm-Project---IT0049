<?= view('includes/header') ?>

<div class="pos-card mt-2">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
        <div>
            <h3 class="fw-bold text-dark m-0">👔 Staff System Management</h3>
            <small class="text-muted">Manage active user credential tokens, update profile names, and assign system access avatars.</small>
        </div>
        <a href="/users/create" class="btn btn-dark px-4 py-2 fw-semibold shadow-sm" style="background-color: #D3D3D3; border-color: #0f172a; border-radius: 8px;">+ Register New Staff</a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success py-2 px-3 mb-4 border-0 shadow-sm" style="background-color: #f0fdf4; color: #16a34a; border-radius: 8px; font-weight: 500;">
            ✓ <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger py-2 px-3 mb-4 border-0 shadow-sm" style="background-color: #fef2f2; color: #dc2626; border-radius: 8px; font-weight: 500;">
            ⚠ <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <div style="width: 100%; font-size: 0.95rem;">
        <!-- Table Column Headers Header Matrix -->
        <div style="display: grid; grid-template-columns: 60px 100px 1.5fr 2fr 140px; padding: 12px 16px; background-color: #f8fafc; border-radius: 8px; font-weight: 600; color: #475569; border-bottom: 2px solid #e2e8f0; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px;">
            <div>ID</div>
            <div>Avatar</div>
            <div>Username</div>
            <div>Full Name</div>
            <div style="text-align: right;">Actions</div>
        </div>

        <div class="mt-1">
            <?php foreach($users as $u): ?>
                <div style="display: grid; grid-template-columns: 60px 100px 1.5fr 2fr 140px; padding: 16px; align-items: center; border-bottom: 1px solid #f1f5f9; background-color: #ffffff; transition: background-color 0.15s ease;">
                    
                    <div class="text-secondary fw-semibold">#<?= $u['id'] ?></div>
                    
                    <div>
                        <?php if(!empty($u['avatar'])): ?>
                            <img src="/uploads/avatars/<?= $u['avatar'] ?>" alt="Staff Avatar" style="width: 48px; height: 48px; object-fit: cover; border-radius: 50%; border: 2px solid #e2e8f0; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                        <?php else: ?>
                            <!-- Clean local circle replacement silhouette for blank databases -->
                            <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #cbd5e1 0%, #94a3b8 100%); border-radius: 50%; border: 2px solid #e2e8f0; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; color: #ffffff; font-weight: 600; text-shadow: 0 1px 1px rgba(0,0,0,0.1);">
                                ?
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div>
                        <code style="font-size: 0.95rem; color: #0284c7; background-color: #f0f9ff; padding: 4px 10px; border-radius: 6px; font-weight: 600; border: 1px solid #e0f2fe;"><?= esc($u['username']) ?></code>
                    </div>
                    
                    <!-- Full Legal Staff Identification Name -->
                    <div>
                        <span class="fw-semibold text-dark d-block" style="font-size: 0.95rem;"><?= esc($u['full_name']) ?></span>
                    </div>
                    
                    <div style="text-align: right; display: flex; gap: 8px; justify-content: flex-end;">
                        <a href="/users/edit/<?= $u['id'] ?>" class="btn btn-sm btn-light fw-semibold" style="border: 1px solid #cbd5e1; color: #475569; background-color: #ffffff; border-radius: 6px; font-size: 0.85rem; padding: 6px 12px;">Edit</a>
                        <a href="/users/delete/<?= $u['id'] ?>" class="btn btn-sm btn-danger fw-semibold" style="background-color: #ef4444; border-color: #ef4444; border-radius: 6px; font-size: 0.85rem; padding: 6px 12px; color: #ffffff;" onclick="return confirm('Deregister this staff profile instance? Access tokens will instantly expire.')">Delete</a>
                    </div>
                    
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= view('includes/footer') ?>
