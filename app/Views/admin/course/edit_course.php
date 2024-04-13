<!-- app/Views/admin/course/edit_course.php -->

<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Edit Course</h2>
    <form action="<?= base_url('admin/course/update/' . $course['id_course']); ?>" method="post">
        <div class="form-group">
            <label for="judul">Title:</label>
            <input type="text" class="form-control" id="judul" name="judul_course"
                value="<?= $course['judul_course']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?= $this->endSection() ?>