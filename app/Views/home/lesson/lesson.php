<?= $this->extend('template/home') ?>

<?= $this->section('content') ?>
<!-- Section for course lessons -->
<section class="lessons">
    <div class="container">
        <h1 class="h3 mb-2 text-gray-800"></h1>
        <p class="mb-4">Here are the lessons for this course.</p>
        <div class="row">
            <?php if (!empty($lessons)) : ?>
            <?php foreach ($lessons as $lesson) : ?>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $lesson['title'] ?></h5>
                        <p class="card-text"><?= substr($lesson['content'], 0, 100) ?>...</p>
                        <a href="<?= base_url('lesson/view/' . $lesson['id_lesson']) ?>" class="btn btn-primary">View
                            Lesson</a>
                        <?php if ($lesson['video_url']) : ?>
                        <a href="<?= $lesson['video_url'] ?>" target="_blank" class="btn btn-secondary">Watch Video</a>
                        <?php else : ?>
                        <span class="btn btn-secondary disabled">No Video</span>
                        <?php endif; ?>
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