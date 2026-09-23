<?= view('includes/header') ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h4>Edit Customer Profile #<?= $customer['id'] ?></h4>
            </div>
            <div class="card-body">
                
                <!-- Display Form Validation Errors -->
                <?php if(session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach(session()->getFlashdata('errors') as $e): ?>
                                <li><?= esc($e) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- The action points to your update function with the customer's ID -->
                <form action="/customers/update/<?= $customer['id'] ?>" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label">Full Name *</label>
                        <!-- value="..." automatically pre-fills the input box -->
                        <input type="text" name="full_name" class="form-control" value="<?= esc($customer['full_name']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email Address *</label>
                        <input type="email" name="email" class="form-control" value="<?= esc($customer['email']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="<?= esc($customer['phone']) ?>">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="/customers" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-warning">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view('includes/footer') ?>
