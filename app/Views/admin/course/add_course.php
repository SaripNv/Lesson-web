<!-- add_course.php -->

<!-- Extend the layout -->
<?= $this->extend('template/dashboard') ?>

<!-- Set the page title -->
<?= $this->section('title') ?>
Add New Course
<?= $this->endSection() ?>

<!-- Define the content section -->
<?= $this->section('content') ?>
<div class="container">
    <h2>Add New Course</h2>
    <form action="<?= base_url('admin/save_course') ?>" method="post">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection() ?>