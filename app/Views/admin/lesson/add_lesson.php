<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p class="mb-4">Add a new lesson.</p>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('admin/lesson/save') ?>" method="post">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="title">Lesson Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter lesson title">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content"
                        placeholder="Enter lesson content"></textarea>
                </div>
                <div class="form-group">
                    <label for="id_course">Course</label>
                    <select class="form-control" id="id_course" name="id_course">
                        <?php foreach ($courses as $course) : ?>
                        <option value="<?= $course['id_course'] ?>"><?= $course['judul_course'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="order">Order</label>
                    <input type="number" class="form-control" id="order" name="order" placeholder="Enter lesson order">
                </div>
                <div class="form-group">
                    <label for="video_url">Video URL</label>
                    <input type="url" class="form-control" id="video_url" name="video_url"
                        placeholder="Enter video URL">
                </div>
                <button type="submit" class="btn btn-primary">Add Lesson</button>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection() ?>