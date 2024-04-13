<!-- app/Views/admin/teacher/add_teacher.php -->

<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Add New Teacher</h2>
    <form action="<?= base_url('admin/teacher/save') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Name:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
            <!-- Tambahkan pesan kesalahan untuk input nama -->
            <div class="invalid-feedback">Name is required.</div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <!-- Tambahkan pesan kesalahan untuk input email -->
            <div class="invalid-feedback">Valid email is required.</div>
        </div>
        <div class="form-group">
            <label for="bidang_keahlian">Expertise:</label>
            <input type="text" class="form-control" id="bidang_keahlian" name="bidang_keahlian" required>
            <!-- Tambahkan pesan kesalahan untuk input bidang keahlian -->
            <div class="invalid-feedback">Expertise is required.</div>
        </div>
        <div class="form-group">
            <label for="deskripsi">Description:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
            <!-- Tambahkan pesan kesalahan untuk input deskripsi -->
            <div class="invalid-feedback">Description is required.</div>
        </div>
        <div class="form-group">
            <label for="foto_guru">Photo:</label>
            <input type="file" class="form-control-file" id="foto_guru" name="foto_guru" required>
            <!-- Tambahkan pesan kesalahan untuk input foto guru -->
            <div class="invalid-feedback">Photo is required.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection() ?>