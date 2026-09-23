<?= view('includes/header') ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark"><h4>Edit Staff Account #<?= $user['id'] ?></h4></div>
            <div class="card-body">
                
                <?php if(session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach(session()->getFlashdata('errors') as $e): ?>
                                <li><?= esc($e) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="/users/update/<?= $user['id'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" value="<?= esc($user['username']) ?>" disabled>
                        <small class="text-muted">Usernames cannot be modified.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Full Name *</label>
                        <input type="text" name="full_name" class="form-control" value="<?= esc($user['full_name']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Password (Leave blank to keep current)</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Update Avatar Profile Picture</label>
                        <input type="file" name="avatar" class="form-control">
                        <?php if(!empty($user['avatar'])): ?>
                            <div class="mt-2">
                                <small class="text-muted">Current profile picture:</small><br>
                                <img src="/uploads/avatars/<?= $user['avatar'] ?>" style="width: 60px; height: 60px; object-fit: cover;" class="rounded border">
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/users" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-warning">Update Staff Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('includes/footer') ?>
