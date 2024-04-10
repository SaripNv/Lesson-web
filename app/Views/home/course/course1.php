<?= $this->extend('template/home') ?>

<?= $this->section('content') ?>
<section>
    <h1>Course 1 Video</h1>
    <div class="video-container">
        <video controls>
            <source src="course1_video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</section>

<style>
.video-container {
    max-width: 800px;
    margin: 0 auto;
}

video {
    width: 100%;
}
</style>

<?= $this->endSection() ?>