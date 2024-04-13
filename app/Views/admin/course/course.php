<!-- app/Views/admin/course/course.php -->

<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2><?= $title ?></h2>
    <a href="<?= base_url('admin/course/add') ?>" class="btn btn-primary mb-3">Add New Course</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course) : ?>
            <tr>
                <td><?= $course['id_course'] ?></td>
                <td><?= $course['judul_course'] ?></td>
                <td>
                    <!-- Tambahkan tombol-tombol aksi sesuai kebutuhan -->
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