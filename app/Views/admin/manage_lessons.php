<!-- List of Lessons -->
<!-- Extend the layout -->
<?= $this->extend('layouts/main') ?>

<!-- Define the content section -->
<?= $this->section('content') ?>
<h2>Daftar Pelajaran</h2>
<a href="<?= base_url('admin/add_lesson') ?>" class="btn btn-primary mb-3">Add New Lesson</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Kursus</th>
            <th>Judul</th>
            <th>Konten</th>
            <th>URL Video</th>
            <th>Nomor Urutan</th>
            <th>Tindakan</th> <!-- Kolom untuk tombol aksi -->
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($courses)) : ?>
        <?php foreach ($lessons as $lesson): ?>
        <tr>
            <td><?= $lesson['id_lesson'] ?></td>
            <td><?= $lesson['id_course'] ?></td>
            <td><?= $lesson['judul'] ?></td>
            <td><?= $lesson['konten'] ?></td>
            <td><?= $lesson['video_url'] ?></td>
            <td><?= $lesson['sequence_number'] ?></td>
            <td>
                <!-- Tombol untuk edit -->
                <a href="<?= base_url('admin/edit_lesson/' . $lesson['id_lesson']) ?>"
                    class="btn btn-sm btn-warning">Edit</a>
                <!-- Tombol untuk hapus -->
                <a href="<?= base_url('admin/delete_lesson/' . $lesson['id_lesson']) ?>" class="btn btn-sm btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus pelajaran ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else : ?>
        <tr>
            <td colspan="4">No courses found</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
<?= $this->endSection() ?>