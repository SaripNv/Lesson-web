<?=$this->extend('template/home')?>

<!-- Define the content section -->
<?=$this->section('content')?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: black;
        /* Mengubah warna ikon panah menjadi hitam */
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>


</head>

<body>
    <!-- example -->
    <main>
        <!-- example -->
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">ENGLISH SKILL LESSON</h1>
                    <p class="lead text-body-secondary">Unlock Your Full Potential with English Skill Lesson – Where
                        Learning is an Adventure!</p>
                    <p>
                        <a href="<?=base_url('course')?>" class="btn btn-primary my-2">Course</a>

                    </p>
                </div>
            </div>
        </section>
    </main>
    <!-- teacher -->
    <main>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($teachers as $teacher): ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php if (!empty($teacher['foto_guru'])): ?>
                            <img src="<?=base_url('assets/img/' . $teacher['foto_guru'])?>"
                                class="bd-placeholder-img card-img-top" width="100%" height="225"
                                alt="<?=$teacher['nama']?>">
                            <?php else: ?>
                            <img src="<?=base_url('path_to_your_default_image')?>"
                                class="bd-placeholder-img card-img-top" width="100%" height="225" alt="No Photo">
                            <?php endif;?>
                            <div class="card-body">
                                <!-- Menempatkan judul kartu di tengah -->
                                <h5 class="card-title text-center"><?=$teacher['nama']?></h5>
                                <p class="card-text">
                                    <?php
// Batasi deskripsi menjadi maksimal 100 karakter
$deskripsi = $teacher['deskripsi'];
if (strlen($deskripsi) > 100) {
    $deskripsi = substr($deskripsi, 0, 100) . "...";
    echo $deskripsi;
} else {
    echo $deskripsi;
}
?>
                                </p>
                                <div class="text-center">
                                    <!-- Link View diarahkan ke halaman detail guru -->
                                    <a href="<?=base_url('detail_teacher/' . $teacher['id_teacher'])?>"
                                        class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </main>
    <!--About-->
    <div class="container">
        <div class="d-flex">
            <div class="col-3 d-flex justify-content-center">
                <h1>Our Journey:English Skill Lesson</h1>
            </div>
            <div class="col-8">
                <div class="contact-info">
                    English Skill Lesson was born from a shared vision among a group of passionate educators and
                    language enthusiasts, specifically a dedicated team of students from the University of Subang.
                    Recognizing the growing need for accessible, high-quality English education, we aimed to create a
                    platform that transcends traditional classrooms.
                    Our journey began in a small café where we brainstormed the possibilities of using technology to
                    revolutionize English learning. With backgrounds in teaching, linguistics, and digital innovation,
                    we crafted a curriculum combining interactive lessons, real-life scenarios, and personalized
                    feedback.
                    Despite challenges in technology integration and design, our dedication kept us moving forward.
                    After a year of hard work, we launched English Skill Lesson, starting with a small group of beta
                    users. Their feedback helped us refine the platform.
                    Today, English Skill Lesson is a thriving community of global learners. We continue to innovate and
                    adapt, inspired by our students' success stories. Join us as we unlock the full potential of English
                    language learners everywhere.</p>
                </div>
            </div>
        </div>
        <!-- Slider Section -->
        <main>
            <!-- Slider Section -->
            <section class="py-5 album bg-body-tertiary text-center container ">
                <div id="slider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($gallery as $key => $photo): ?>
                        <div class="carousel-item <?=$key === 0 ? 'active' : ''?>">
                            <img src="<?=base_url('assets/gallery/' . $photo['foto'])?>" class="d-block w-100"
                                style="object-fit: cover; height: 400px;" alt="Slider Image <?=$key + 1?>">
                        </div>
                        <?php endforeach;?>
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


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>
<?=$this->endSection()?>