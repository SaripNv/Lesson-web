<?= $this->extend('template/home') ?>

<?= $this->section('content') ?>
<!-- Section for course lessons -->
<section class="lessons">
    <div class="container">
        <h1 class="h3 mb-2 text-gray-800"></h1>
        <div class="row">
            <?php if (!empty($lessons)) : ?>
            <?php foreach ($lessons as $lesson) : ?>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $lesson['title'] ?></h5>
                        <a href="<?= base_url('detail_lesson')?>" class="btn btn-primary">Watch Video</a>
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
</section>
<?= $this->endSection() ?>