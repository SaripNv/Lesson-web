<!-- edit_user.php -->

<!-- Extend the layout -->
<?= $this->extend('layouts/main') ?>

<!-- Set the page title -->
<?= $this->section('title') ?>
Edit User
<?= $this->endSection() ?>

<!-- Define the content section -->
<?= $this->section('content') ?>
<div class="container">
    <h2>Edit User</h2>
    <form action="<?= base_url('admin/update_user/' . $user['id']) ?>" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?= $this->endSection() ?>