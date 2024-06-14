<?= $this->extend('template/home') ?>

<?= $this->section('content') ?>
<section class="lesson">
    <div class="container">
        <h1 class="mt-4"><?= $title ?></h1>
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <?php if (!empty($lesson['file_video'])) : ?>
                        <div class="video-container">
                            <video controls>
                                <source src="<?= base_url('uploads/' . $lesson['file_video']) ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <?php else : ?>
                        <p>No video available for this lesson.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>