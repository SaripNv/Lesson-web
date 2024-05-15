<?= $this->extend('template/home') ?>

<?= $this->section('content') ?>
<!-- Bagian dengan daftar kursus -->
<section class="course">
    <div class="container">
        <div class="row">
            <?php if (!empty($courses)) : ?>
            <?php foreach ($courses as $course) : ?>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $course['judul_course'] ?></h5>
                        <p class="card-text"><?= $course['teacher_name'] ?></p>
                        <a href="<?= base_url('lesson') ?>" class="btn btn-primary">Enroll Now</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else : ?>
            <div class="col-12">
                <p>No courses found.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>