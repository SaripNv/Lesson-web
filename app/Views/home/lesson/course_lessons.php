<?= $this->extend('template/home') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <p class="mb-4"></p>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <?php if (!empty($lessons)) : ?>
                <?php foreach ($lessons as $lesson) : ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $lesson['title'] ?></h5>
                            <p class="card-text"><?= $lesson['content'] ?></p>
                            <a href="<?= base_url('lesson/view/' . $lesson['id_lesson']) ?>"
                                class="btn btn-primary">View Video</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else : ?>
                <div class="col-12">
                    <p>No lessons found for this course.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>