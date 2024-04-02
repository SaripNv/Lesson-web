<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>
<!-- Jumbotron -->
<div class="jumbotron">
    <div class="container">
        <h1>Welcome to Our Website</h1>
        <p>This is a beautiful website created with Bootstrap</p>
    </div>
</div>

<div class="container">
    <!-- New Section -->
    <div class="new-section">
        <div class="container">
            <h2>New Section Title</h2>
            <p>This is the content of the new section. You can add any content here.</p>
        </div>
    </div>
</div>
<!-- Another Section with Background Color and Images -->
<div class="container-fluid bg-primary py-5">
    <div class="container">
        <h3 class="text-center text-white">Our Gallery</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="image-with-text">
                    <img src="image1.jpg" alt="Image 1">
                    <a href="<?= base_url('course') ?>">
                        <p>Text for Image 1</p>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="image-with-text">
                    <img src="image2.jpg" alt="Image 2">
                    <p>Text for Image 2</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="image-with-text">
                    <img src="image3.jpg" alt="Image 3">
                    <p>Text for Image 3</p>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>