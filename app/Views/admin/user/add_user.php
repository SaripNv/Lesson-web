<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Add New User</h2>
    <form action="<?= base_url('admin/user/save') ?>" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
            <!-- Tambahkan pesan kesalahan untuk input username jika diperlukan -->
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <!-- Tambahkan pesan kesalahan untuk input email jika diperlukan -->
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <!-- Tambahkan pesan kesalahan untuk input password jika diperlukan -->
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <select class="form-control" id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="teacher">Teacher</option>
                <option value="user">User</option>
            </select>
            <!-- Tambahkan pesan kesalahan untuk input role jika diperlukan -->
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection() ?>