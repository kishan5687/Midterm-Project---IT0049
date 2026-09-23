<?= view('includes/header') ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white"><h4>Create Customer Profile</h4></div>
            <div class="card-body">
                <?php if(session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach(session()->getFlashdata('errors') as $e): ?><li><?= esc($e) ?></li><?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="/customers/store" method="POST">
                    <div class="mb-3"><label>Full Name *</label><input type="text" name="full_name" class="form-control" value="<?= old('full_name') ?>" required></div>
                    <div class="mb-3"><label>Email Address *</label><input type="email" name="email" class="form-control" value="<?= old('email') ?>" required></div>
                    <div class="mb-3"><label>Phone Number</label><input type="text" name="phone" class="form-control" value="<?= old('phone') ?>"></div>
                    <div class="d-flex justify-content-between"><a href="/customers" class="btn btn-secondary">Back</a><button type="submit" class="btn btn-primary">Save Profile</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= view('includes/footer') ?>
