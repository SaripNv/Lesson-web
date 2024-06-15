<?=$this->extend('template/home')?>

<?=$this->section('content')?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?= base_url('/assets/gallery/LOGO-1.png') ?>" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: black;
    }

    .card img {
        object-fit: cover;
        height: 225px;
    }

    .about-section {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        align-items: center;
        margin: 2rem 0;
    }

    .about-section h1 {
        flex: 1;
        text-align: center;
    }

    .about-section .contact-info {
        flex: 2;
    }

    .carousel img {
        height: 400px;
    }
    </style>
</head>

<body>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">ENGLISH SKILL LESSON</h1>
                    <p class="lead text-body-secondary">Unlock Your Full Potential with English Skill Lesson – Where
                        Learning is an Adventure!</p>
                    <p>
                        <a href="<?= base_url('course') ?>" class="btn btn-primary my-2">Course</a>
                    </p>
                </div>
            </div>
        </section>

        <!-- Teachers Section -->
        <section class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($teachers as $teacher): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="<?= !empty($teacher['foto_guru']) ? base_url('assets/img/' . $teacher['foto_guru']) : base_url('path_to_your_default_image') ?>"
                                class="card-img-top" alt="<?= $teacher['nama'] ?>">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?= $teacher['nama'] ?></h5>
                                <p class="card-text">
                                    <?= strlen($teacher['deskripsi']) > 100 ? substr($teacher['deskripsi'], 0, 100) . "..." : $teacher['deskripsi'] ?>
                                </p>
                                <div class="text-center">
                                    <a href="<?= base_url('detail_teacher/' . $teacher['id_teacher']) ?>"
                                        class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about-section container">
            <div class="col-md-3 text-center">
                <h1>Our Journey: English Skill Lesson</h1>
            </div>
            <div class="col-md-9">
                <p>English Skill Lesson was born from a shared vision among a group of passionate educators and language
                    enthusiasts, specifically a dedicated team of students from the University of Subang. Recognizing
                    the growing need for accessible, high-quality English education, we aimed to create a platform that
                    transcends traditional classrooms. Our journey began in a small café where we brainstormed the
                    possibilities of using technology to revolutionize English learning. With backgrounds in teaching,
                    linguistics, and digital innovation, we crafted a curriculum combining interactive lessons,
                    real-life scenarios, and personalized feedback. Despite challenges in technology integration and
                    design, our dedication kept us moving forward. After a year of hard work, we launched English Skill
                    Lesson, starting with a small group of beta users. Their feedback helped us refine the platform.
                    Today, English Skill Lesson is a thriving community of global learners. We continue to innovate and
                    adapt, inspired by our students' success stories. Join us as we unlock the full potential of English
                    language learners everywhere.</p>
            </div>
        </section>

        <!-- Gallery Slider Section -->
        <section class="py-5 album bg-body-tertiary text-center container">
            <div id="slider" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($gallery as $key => $photo): ?>
                    <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                        <img src="<?= base_url('assets/gallery/' . $photo['foto']) ?>" class="d-block w-100"
                            alt="Slider Image <?= $key + 1 ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    </main>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

<?=$this->endSection()?>