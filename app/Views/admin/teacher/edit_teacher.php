<!-- app/Views/admin/teacher/edit_teacher.php -->

<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Edit Teacher</h2>
    <form action="<?= base_url('admin/teacher/update/' . $teacher['id_teacher']) ?>" method="post"
        enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Name:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $teacher['nama'] ?>" required>
            <div class="invalid-feedback">Name is required.</div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $teacher['email'] ?>" required>
            <div class="invalid-feedback">Valid email is required.</div>
        </div>
        <div class="form-group">
            <label for="bidang_keahlian">Expertise:</label>
            <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian"
                value="<?= $teacher['bidang_keahlian'] ?>" required>
            <div class="invalid-feedback">Expertise is required.</div>
        </div>
        <div class="form-group">
            <label for="deskripsi">Description:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"
                required><?= $teacher['deskripsi'] ?></textarea>
            <div class="invalid-feedback">Description is required.</div>
        </div>
        <div class="form-group">
            <label for="foto_guru">Current Photo:</label><br>
            <?php if (!empty($teacher['foto_guru'])) : ?>
            <img src="<?= base_url('assets/img/' . $teacher['foto_guru']) ?>" class="img-thumbnail"
                alt="<?= $teacher['nama'] ?>">
            <?php else : ?>
            No Photo
            <?php endif; ?>
            <input type="file" class="form-control-file mt-2" id="foto_guru" name="foto_guru">
            <div class="invalid-feedback">Photo is required.</div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?= $this->endSection() ?>