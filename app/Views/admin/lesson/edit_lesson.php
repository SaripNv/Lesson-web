<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p class="mb-4">Edit detail pelajaran.</p>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('admin/lesson/update/' . $lesson['id_lesson']) ?>" method="post"
                enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="form-group">
                    <label for="title">Judul Pelajaran</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $lesson['title'] ?>"
                        placeholder="Masukkan judul pelajaran" required>
                </div>
                <div class="form-group">
                    <label for="content">Konten</label>
                    <textarea class="form-control" id="content" name="content" placeholder="Masukkan konten pelajaran"
                        required><?= $lesson['content'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="id_course">Kursus</label>
                    <select class="form-control" id="id_course" name="id_course" required>
                        <?php foreach ($courses as $course) : ?>
                        <option value="<?= $course['id_course'] ?>"
                            <?= $lesson['id_course'] == $course['id_course'] ? 'selected' : '' ?>>
                            <?= $course['judul_course'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="file_video">File Video</label>
                    <input type="file" class="form-control" id="file_video" name="file_video">
                </div>
                <button type="submit" class="btn btn-primary">Perbarui Pelajaran</button>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection() ?>