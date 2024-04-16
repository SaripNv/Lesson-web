<?= $this->extend('template/home') ?>

<!-- Define the content section -->
<?= $this->section('content') ?>
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
                    <h1 class="fw-light">Album example</h1>
                    <p class="lead text-body-secondary">Something short and leading about the collection below—its
                        contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply
                        skip over it entirely.</p>
                    <p>
                        <a href="<?= base_url('course')?>" class="btn btn-primary my-2">Main call to action</a>
                        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                    </p>
                </div>
            </div>
        </section>
    </main>
    <!-- Slider Section -->
    <main>
        <!-- Slider Section -->
        <section class="py-5 text-center container">
            <div id="slider" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <img src="<?= base_url('assets/img/ENGLISH.jpeg')?>" class="d-block w-100"
                            style="object-fit: cover; height: 400px;" alt="Slider Image 1">
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/img/course.jpg')?>" class="d-block w-100"
                            style="object-fit: cover; height: 400px;" alt="Slider Image 2">
                    </div>
                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <img src="<?= base_url('assets/img/images.jpeg')?>" class="d-block w-100"
                            style="object-fit: cover; height: 400px;" alt="Slider Image 3">
                    </div>
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
    <!-- teacher -->
    <main>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($teachers as $teacher) : ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php if (!empty($teacher['foto_guru'])) : ?>
                            <img src="<?= base_url('assets/img/' . $teacher['foto_guru']) ?>"
                                class="bd-placeholder-img card-img-top" width="100%" height="225"
                                alt="<?= $teacher['nama'] ?>">
                            <?php else : ?>
                            <img src="<?= base_url('path_to_your_default_image') ?>"
                                class="bd-placeholder-img card-img-top" width="100%" height="225" alt="No Photo">
                            <?php endif; ?>
                            <div class="card-body">
                                <!-- Menempatkan judul kartu di tengah -->
                                <h5 class="card-title text-center"><?= $teacher['nama'] ?></h5>
                                <p class="card-text"><?= $teacher['deskripsi'] ?></p>
                                <div class="text-center">
                                    <!-- Link View diarahkan ke halaman detail guru -->
                                    <a href="<?= base_url('detail_teacher/' . $teacher['id_teacher']) ?>"
                                        class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>



    <main>
        <section class="py-5 bg-primary text-white">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Menyelaraskan teks dan tombol ke tengah secara vertikal -->
                    <div class="col-md-6">
                        <h2>Background Menarik</h2>
                        <p>Ini adalah teks yang berada di sisi kiri dari background menarik.</p>
                        <!-- Mengubah tombol menjadi tautan (link) -->
                        <a href="<?= base_url('course') ?>" class="btn btn-light">Get Started</a>
                    </div>
                </div>
            </div>
        </section>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
<?= $this->endSection() ?>