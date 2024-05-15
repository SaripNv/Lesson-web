<!-- app/Views/admin/gallery/add_gallery.php -->

<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Add New Photo</h2>
    <form action="<?= base_url('admin/gallery/save') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_foto">Photo Name:</label>
            <input type="text" class="form-control" id="nama_foto" name="nama_foto" required>
            <div class="invalid-feedback">Photo name is required.</div>
        </div>
        <div class="form-group">
            <label for="deskripsi">Description:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
            <div class="invalid-feedback">Description is required.</div>
        </div>
        <div class="form-group">
            <label for="foto">Photo:</label>
            <input type="file" class="form-control-file" id="foto" name="foto" required>
            <div class="invalid-feedback">Photo is required.</div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection() ?>