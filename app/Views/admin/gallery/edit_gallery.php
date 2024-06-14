<!-- app/Views/admin/gallery/edit_gallery.php -->

<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Edit Photo</h2>
    <form action="<?= base_url('admin/gallery/update/' . $photo['id_gallery']) ?>" method="post"
        enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_foto">Photo Name:</label>
            <input type="text" class="form-control" id="nama_foto" name="nama_foto" value="<?= $photo['nama_foto'] ?>"
                required>
            <div class="invalid-feedback">Photo name is required.</div>
        </div>
        <div class="form-group">
            <label for="deskripsi">Description:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"
                required><?= $photo['deskripsi'] ?></textarea>
            <div class="invalid-feedback">Description is required.</div>
        </div>
        <div class="form-group">
            <label for="foto">Current Photo:</label>
            <img src="<?= base_url('assets/gallery/' . $photo['foto']) ?>" class="img-thumbnail" width="100"
                height="100">
            <br>
            <label for="new_foto">New Photo:</label>
            <input type="file" class="form-control-file" id="new_foto" name="new_foto">
            <div class="invalid-feedback">Photo is required.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection() ?>