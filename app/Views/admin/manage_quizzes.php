<!-- List of Quizzes -->
<h2>Daftar Kuis</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Pelajaran</th>
            <th>Pertanyaan</th>
            <th>Opsi</th>
            <th>Opsi Benar</th>
            <th>Dibuat Pada</th>
            <th>Diperbarui Pada</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($quizzes as $quiz): ?>
        <tr>
            <td><?= $quiz['id_quiz'] ?></td>
            <td><?= $quiz['id_lesson'] ?></td>
            <td><?= $quiz['question'] ?></td>
            <td><?= $quiz['options'] ?></td>
            <td><?= $quiz['correct_option'] ?></td>
            <td><?= $quiz['created_at'] ?></td>
            <td><?= $quiz['updated_at'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>