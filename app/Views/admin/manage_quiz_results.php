<!-- List of Quiz Results -->
<h2>Daftar Hasil Kuis</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Pengguna</th>
            <th>ID Kuis</th>
            <th>Opsi Dipilih</th>
            <th>Benar?</th>
            <th>Dibuat Pada</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($quizResults as $quizResult): ?>
        <tr>
            <td><?= $quizResult['id_Quiz_Results'] ?></td>
            <td><?= $quizResult['id_user'] ?></td>
            <td><?= $quizResult['id_quiz'] ?></td>
            <td><?= $quizResult['selected_option'] ?></td>
            <td><?= $quizResult['is_correct'] ?></td>
            <td><?= $quizResult['created_at'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>