<!-- add_user.php -->

<!-- Extend the layout -->
<?= $this->extend('template/dashboard') ?>

<!-- Set the page title -->
<?= $this->section('title') ?>
Add User
<?= $this->endSection() ?>

<!-- Define the content section -->
<?= $this->section('content') ?>
<div class="container">
    <h2>Add User</h2>
    <form action="<?= base_url('admin/save_user') ?>" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection() ?>