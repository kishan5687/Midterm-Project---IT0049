<?= view('includes/header') ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white"><h4>Register Staff Profile</h4></div>
            <div class="card-body">
                <?php if(session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach(session()->getFlashdata('errors') as $e): ?><li><?= esc($e) ?></li><?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="/users/store" method="POST" enctype="multipart/form-data">
                    <div class="mb-3"><label>System Username *</label><input type="text" name="username" class="form-control" value="<?= old('username') ?>" required></div>
                    <div class="mb-3"><label>Full Name *</label><input type="text" name="full_name" class="form-control" value="<?= old('full_name') ?>" required></div>
                    <div class="mb-3"><label>Account Password *</label><input type="password" name="password" class="form-control" required></div>
                    <div class="mb-3"><label>Avatar Profile Picture</label><input type="file" name="avatar" class="form-control"></div>
                    <div class="d-flex justify-content-between"><a href="/users" class="btn btn-secondary">Back</a><button type="submit" class="btn btn-dark">Register Staff</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= view('includes/footer') ?>
