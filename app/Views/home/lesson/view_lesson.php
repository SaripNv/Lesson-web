<?= $this->extend('template/home') ?>

<?= $this->section('content') ?>
<section class="lesson">
    <div class="container">
        <h1 class="mt-4"><?= $title ?></h1>
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <?php if (!empty($lesson['file_video'])) : ?>
                        <div class="video-container mb-4">
                            <video class="video-player" controls>
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

<style>
.lesson {
    padding: 20px 0;
    background-color: #f8f9fa;
}

.card {
    border-radius: 10px;
}

.video-container {
    position: relative;
    padding-bottom: 56.25%;
    /* 16:9 aspect ratio */
    height: 0;
    overflow: hidden;
    max-width: 100%;
    background: #000;
}

.video-container .video-player {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.card-body {
    padding: 2rem;
}

.card-body p {
    font-size: 1.2rem;
    color: #555;
}

h1 {
    font-size: 2.5rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 1.5rem;
    text-align: center;
}
</style>

<?= $this->endSection() ?>