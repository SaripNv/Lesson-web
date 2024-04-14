<!-- admin/course/edit_course.php -->

<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p class="mb-4">Edit course details.</p>

    <!-- Form for editing course details -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('admin/course/update/' . $course['id_course']) ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT"> <!-- Method override -->
                <div class="form-group">
                    <label for="judul_course">Course Title</label>
                    <input type="text" class="form-control" id="judul_course" name="judul_course"
                        value="<?= $course['judul_course'] ?>">
                </div>
                <div class="form-group">
                    <label for="id_teacher">Teacher</label>
                    <select class="form-control" id="id_teacher" name="id_teacher">
                        <?php foreach ($teachers as $id => $nama) : ?>
                        <option value="<?= $id ?>" <?= $id == $course['id_teacher'] ? 'selected' : '' ?>><?= $nama ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Course</button>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection() ?>