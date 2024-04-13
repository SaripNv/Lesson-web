<!-- app/Views/admin/teacher/edit_teacher.php -->

<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Edit Teacher</h2>
    <form action="<?= base_url('admin/teacher/update/' . $teacher['id_teacher']) ?>" method="post"
        enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Name:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama', $teacher['nama']) ?>"
                required>
            <!-- Tambahkan pesan kesalahan untuk input nama -->
            <div class="invalid-feedback">Name is required.</div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email"
                value="<?= old('email', $teacher['email']) ?>" required>
            <!-- Tambahkan pesan kesalahan untuk input email -->
            <div class="invalid-feedback">Valid email is required.</div>
        </div>
        <div class="form-group">
            <label for="bidang_keahlian">Expertise:</label>
            <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian"
                value="<?= old('bidang_keahlian', $teacher['bidang_keahlian']) ?>" required>
            <!-- Tambahkan pesan kesalahan untuk input bidang keahlian -->
            <div class="invalid-feedback">Expertise is required.</div>
        </div>
        <div class="form-group">
            <label for="deskripsi">Description:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"
                required><?= old('deskripsi', $teacher['deskripsi']) ?></textarea>
            <!-- Tambahkan pesan kesalahan untuk input deskripsi -->
            <div class="invalid-feedback">Description is required.</div>
        </div>
        <div class="form-group">
            <label for="foto_guru">Photo:</label>
            <input type="file" class="form-control-file" id="foto_guru" name="foto_guru">
            <?php if (!empty($teacher['foto_guru'])) : ?>
            <img src="<?= base_url('assets/img/' . $teacher['foto_guru']) ?>" alt="<?= $teacher['nama'] ?>"
                class="img-thumbnail mt-2">
            <?php else : ?>
            <p>No Photo</p>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?= $this->endSection() ?>