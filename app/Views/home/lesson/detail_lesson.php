<?= $this->extend('template/home') ?>

<?= $this->section('content') ?>
<!-- Section for course lessons -->
<section class="lessons">
    <div class="container">
        <h1 class="h3 mb-2 text-gray-800"></h1>
        <div class="row justify-content-center">
            <!-- Video player -->
            <div class="col-10 col-md-10 col-lg-6 mb-4">
                <div class="embed-responsive embed-responsive-16by9 mx-auto">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/k2_2H3qT9q0?si=7ZBCtgnCHum_12kW"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>