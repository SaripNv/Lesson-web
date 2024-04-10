<!-- edit_course.php -->

<!-- Extend the layout -->
<?= $this->extend('template/dashboard') ?>

<!-- Set the page title -->
<?= $this->section('title') ?>
Edit Course
<?= $this->endSection() ?>

<!-- Define the content section -->
<?= $this->section('content') ?>
<div class="container">
    <h2>Edit Course</h2>
    <form action="<?= base_url('admin/update_course/' . $course['id']) ?>" method="post">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $course['title'] ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3"
                required><?= $course['description'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?= $this->endSection() ?>