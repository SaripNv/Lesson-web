<!-- app/Views/admin/teacher/teacher.php -->

<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Teacher Management</h1>
    <p class="mb-4">Here you can manage teachers.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Teacher List</h6>
            <a href="<?= base_url('admin/teacher/add') ?>" class="btn btn-primary">Add New Teacher</a>
        </div>
        <div class="card-body">
            <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php elseif(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                <img src="<?= base_url('assets/img/' . $teacher['foto_guru']) ?>"
                                    alt="<?= $teacher['nama'] ?>" class="img-fluid img-thumbnail">
                                <?php else : ?>
                                No Photo
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/teacher/edit/' . $teacher['id_teacher']) ?>"
                                    class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('admin/teacher/delete/' . $teacher['id_teacher']) ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this teacher?')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>