<?= $this->extend('template/home') ?>

<?= $this->section('content') ?>
<!-- Bagian dengan empat gambar kursus -->
<section class="course">
    <div class="course-images">
        <div class="course-row">
            <div class="course-item">
                <img src="course1.jpg" alt="Course 1">
                <p>Course 1 Description</p>
                <a href="<?= base_url('course1') ?>" class="button">Enroll Now</a>
            </div>
            <div class="course-item">
                <img src="course2.jpg" alt="Course 2">
                <p>Course 2 Description</p>
                <a href="#" class="button">Enroll Now</a>
            </div>
        </div>
        <div class="course-row">
            <div class="course-item">
                <img src="course3.jpg" alt="Course 3">
                <p>Course 3 Description</p>
                <a href="#" class="button">Enroll Now</a>
            </div>
            <div class="course-item">
                <img src="course4.jpg" alt="Course 4">
                <p>Course 4 Description</p>
                <a href="#" class="button">Enroll Now</a>
            </div>
        </div>
    </div>
</section>
<style>
.course {
    margin-top: 75px;
}

.course-images {
    display: flex;
    flex-direction: column;
}

.course-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    /* untuk memberikan jarak antara elemen */
    margin-bottom: 20px;
    /* memberikan jarak antara baris */
}

.course-item {
    flex: 1;
    text-align: center;
    width: 48%;
    /* lebar setiap item agar dua gambar bisa muat dalam satu baris */
}
</style>

<!-- Tambahkan konten sesuai kebutuhan -->
<?= $this->endSection() ?>