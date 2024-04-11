<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Edit User</h1>
    <form action="<?= base_url('admin/users/update/' . $user['id_user']); ?>" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $user['username']; ?>"
                required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $user['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
            <small class="form-text text-muted">Leave blank if you don't want to change the password.</small>
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <select name="role" id="role" class="form-control" required>
                <option value="user" <?= ($user['role'] == 'user') ? 'selected' : ''; ?>>User</option>
                <option value="teacher" <?= ($user['role'] == 'teacher') ? 'selected' : ''; ?>>Teacher</option>
                <option value="admin" <?= ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
<?= $this->endSection() ?>