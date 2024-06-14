<!-- app/Views/home/course/course.php -->
<?= $this->extend('template/home') ?>

<?= $this->section('content') ?>
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
                        <a href="<?= base_url('course/' . $course['id_course'] . '/lessons') ?>"
                            class="btn btn-primary">View Lessons</a>
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