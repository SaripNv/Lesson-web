<?= $this->extend('template/home') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="d-flex justify-content-center align-items-center">
                    <?php if (!empty($teacher['foto_guru'])) : ?>
                    <img src="<?= base_url('assets/img/' . $teacher['foto_guru']) ?>" class="card-img-top img-thumbnail"
                        alt="<?= $teacher['nama'] ?>">
                    <?php else : ?>
                    <img src="<?= base_url('path_to_your_default_image') ?>" class="card-img-top img-thumbnail"
                        alt="No Photo">
                    <?php endif; ?>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $teacher['nama'] ?></h5>
                    <p class="card-text"><strong>Expertise:</strong> <?= $teacher['bidang_keahlian'] ?></p>
                    <p class="card-text"><?= $teacher['deskripsi'] ?></p>
                    <p class="card-text"><strong>Email:</strong> <?= $teacher['email'] ?></p>
                    <a href="<?= base_url('/') ?>" class="btn btn-primary">back to home</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>