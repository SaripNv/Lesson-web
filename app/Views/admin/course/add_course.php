<!-- app/Views/admin/course/add_course.php -->

<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Add New Course</h2>
    <form action="<?= base_url('admin/course/save'); ?>" method="post">
        <div class="form-group">
            <label for="judul">Title:</label>
            <input type="text" class="form-control" id="judul" name="judul_course">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection() ?>