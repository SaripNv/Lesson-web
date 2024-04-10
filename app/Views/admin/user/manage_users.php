<!-- manage_users.php -->

<!-- Extend the layout -->
<?= $this->extend('template/dashboard') ?>

<!-- Define the content section -->
<?= $this->section('content') ?>
<div class="container">
    <h2>Manage Users</h2>
    <div class="mb-3">
        <a href="<?= base_url('admin/add_user') ?>" class="btn btn-sm btn-primary">Add User</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)) : ?>
            <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['id_user'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['role'] ?></td>
                <td>
                    <a href="<?= base_url('admin/edit_user/' . $user['id_user']) ?>"
                        class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('admin/delete_user/' . $user['id_user']) ?>"
                        class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
            <tr>
                <td colspan="4">No users found</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>