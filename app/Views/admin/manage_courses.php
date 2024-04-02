<!-- Extend the layout -->
<?= $this->extend('layouts/main') ?>

<!-- Define the content section -->
<?= $this->section('content') ?>
<div class="container">
    <h2>Manage Courses</h2>
    <a href="<?= base_url('admin/add_course') ?>" class="btn btn-primary mb-3">Add New Course</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($courses)) : ?>
            <?php foreach ($courses as $course) : ?>
            <tr>
                <td><?= $course['id'] ?></td>
                <td><?= $course['title'] ?></td>
                <td><?= $course['description'] ?></td>
                <td>
                    <a href="<?= base_url('admin/edit_course/' . $course['id']) ?>"
                        class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('admin/delete_course/' . $course['id']) ?>" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure you want to delete this course?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
            <tr>
                <td colspan="4">No courses found</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>