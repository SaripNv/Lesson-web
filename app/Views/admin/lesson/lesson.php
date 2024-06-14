<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Lesson Management</h1>
    <p class="mb-4">Here you can manage lessons.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Lesson List</h6>
            <a href="<?= base_url('admin/lesson/add') ?>" class="btn btn-primary">Add New Lesson</a>
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
                            <th>Course</th>
                            <th>Video</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($lessons)) : ?>
                        <?php foreach ($lessons as $key => $lesson) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $lesson['title'] ?></td>
                            <td><?= $lesson['course_title'] ?></td>
                            <td>
                                <?php if($lesson['file_video']): ?>
                                <video width="200" controls>
                                    <source src="<?= base_url('public/uploads/' . $lesson['file_video']) ?>"
                                        type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <?php else: ?>
                                No Video
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('/admin/lesson/edit/' . $lesson['id_lesson']) ?>"
                                    class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('/admin/lesson/delete/' . $lesson['id_lesson']) ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this lesson?')"><i
                                        class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <tr>
                            <td colspan="6">No lessons found</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>