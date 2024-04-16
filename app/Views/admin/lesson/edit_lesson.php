<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Lesson</h1>
    <p class="mb-4">Here you can edit the lesson.</p>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('admin/lesson/update/' . $lesson['id_lesson']) ?>" method="post"
                enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="judul">Title</label>
                    <input type="text" name="judul" class="form-control" value="<?= $lesson['judul'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="id_course">Course</label>
                    <select name="id_course" class="form-control" required>
                        <option value="">Select Course</option>
                        <?php foreach ($courses as $course) : ?>
                        <option value="<?= $course['id_course'] ?>"
                            <?php if ($course['id_course'] == $lesson['id_course']) echo 'selected'; ?>>
                            <?= $course['judul_course'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Description</label>
                    <textarea name="deskripsi" class="form-control"><?= $lesson['deskripsi'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="urutan">Order</label>
                    <input type="number" name="urutan" class="form-control" value="<?= $lesson['urutan'] ?>">
                </div>
                <div class="form-group">
                    <label for="file_video">Video</label>
                    <input type="file" name="file_video" class="form-control-file" accept="video/*">
                </div>
                <button type="submit" class="btn btn-primary">Update Lesson</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>