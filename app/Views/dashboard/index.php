<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Content -->
            <div class="col-md-9">
                <h1>Dashboard</h1>
                <p>Welcome to the Admin Panel</p>
            </div>
            <!-- /.Content -->
            <!-- Sidebar -->
            <?= $this->include('partials/sidebar') ?>
        </div>
    </div>
</section>
<!-- /.content -->
<?= $this->endSection() ?>