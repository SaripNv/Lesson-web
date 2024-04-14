<!-- admin/course/add_course.php -->

<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p class="mb-4">Add a new course.</p>

    <!-- Form for adding a new course -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('admin/course/save') ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="judul_course">Course Title</label>
                    <input type="text" class="form-control" id="judul_course" name="judul_course"
                        placeholder="Enter course title">
                </div>
                <div class="form-group">
                    <label for="id_teacher">Teacher</label>
                    <select class="form-control" id="id_teacher" name="id_teacher">
                        <?php foreach ($teachers as $id => $nama) : ?>
                        <option value="<?= $id ?>"><?= $nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Course</button>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection() ?>