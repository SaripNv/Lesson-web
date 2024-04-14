<!-- app/Views/admin/course/course.php -->

<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Course Management</h1>
    <p class="mb-4">Here you can manage courses.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Course List</h6>
            <a href="<?= base_url('admin/course/add') ?>" class="btn btn-primary">Add New Course</a>
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
                            <th>No</th>
                            <th>Title</th>
                            <th>Teacher</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($courses)) : ?>
                        <?php foreach ($courses as $key => $course) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $course['judul_course'] ?></td>
                            <td><?= $course['teacher_name'] ?></td>
                            <td><?= $course['created_at'] ?></td>
                            <td>
                                <a href="<?= base_url('/admin/course/edit/' . $course['id_course']) ?>"
                                    class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('/admin/course/delete/' . $course['id_course']) ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this course?')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <tr>
                            <td colspan="5">No courses found</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>