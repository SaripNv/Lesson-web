<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Manage Users</h1>
    <a href="<?= base_url('add_user'); ?>" class="btn btn-primary mb-2">Add New User</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['id_user']; ?></td>
                <td><?= $user['username']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['role']; ?></td>
                <td>
                    <a href="<?= base_url('admin/users/edit/' . $user['id_user']); ?>" class="btn btn-info btn-sm mr-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="<?= base_url('admin/users/delete/' . $user['id_user']); ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this user?')">
                        <i class="fas fa-trash-alt"></i> Delete
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>