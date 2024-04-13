<!-- app/Views/admin/teacher/teacher.php -->

<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Teacher Management</h2>
    <a href="<?= base_url('admin/teacher/add') ?>" class="btn btn-primary mb-3">Add New Teacher</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Expertise</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teachers as $teacher) : ?>
            <tr>
                <td><?= $teacher['id_teacher'] ?></td>
                <td><?= $teacher['nama'] ?></td>
                <td><?= $teacher['email'] ?></td>
                <td><?= $teacher['bidang_keahlian'] ?></td>
                <td><?= $teacher['deskripsi'] ?></td>
                <td>
                    <?php if (!empty($teacher['foto_guru'])) : ?>
                    <img src="<?= base_url('assets/img/' . $teacher['foto_guru']) ?>" alt="<?= $teacher['nama'] ?>"
                        class="img-thumbnail">
                    <?php else : ?>
                    No Photo
                    <?php endif; ?>
                </td>
                <td>
                    <!-- Tambahkan tombol-tombol aksi sesuai kebutuhan -->
                    <a href="<?= base_url('admin/teacher/edit/' . $teacher['id_teacher']) ?>"
                        class="btn btn-info btn-sm mr-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="<?= base_url('admin/teacher/delete/' . $teacher['id_teacher']) ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this teacher?')">
                        <i class="fas fa-trash-alt"></i> Delete
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>