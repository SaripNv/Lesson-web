<!-- app/Views/admin/gallery/gallery.php -->

<?= $this->extend('template/dashboard') ?>

<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Gallery Management</h1>
    <p class="mb-4">Here you can manage your photo gallery.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Photo List</h6>
            <a href="<?= base_url('admin/gallery/add') ?>" class="btn btn-primary">Add New Photo</a>
        </div>
        <div class="card-body">
            <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php elseif(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($gallery)) : ?>
                        <?php foreach ($gallery as $key => $photo) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $photo['nama_foto'] ?></td>
                            <td><?= $photo['deskripsi'] ?></td>
                            <td>
                                <img src="<?= base_url('assets/gallery/' . $photo['foto']) ?>" class="img-thumbnail"
                                    width="100" height="100">
                            </td>
                            <td>
                                <a href="<?= base_url('/admin/gallery/edit/' . $photo['id_gallery']) ?>"
                                    class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('/admin/gallery/delete/' . $photo['id_gallery']) ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this photo?')">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <tr>
                            <td colspan="5">No photos found</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>