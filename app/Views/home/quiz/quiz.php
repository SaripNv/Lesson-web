<?= $this->extend('layouts/home') ?>

<?= $this->section('content') ?>
<section>
    <h1>Quiz</h1>
    <form id="quiz-form">
        <div class="question">
            <p>Pertanyaan 1: Apa yang menjadi fokus utama dari Course 1?</p>
            <input type="radio" name="question1" value="a"> A. Topik A<br>
            <input type="radio" name="question1" value="b"> B. Topik B<br>
            <input type="radio" name="question1" value="c"> C. Topik C<br>
        </div>
        <div class="question">
            <p>Pertanyaan 2: Berapa jumlah bab dalam Course 5?</p>
            <input type="radio" name="question2" value="a"> A. 5<br>
            <input type="radio" name="question2" value="b"> B. 7<br>
            <input type="radio" name="question2" value="c"> C. 10<br>
        </div>
        <button type="submit" id="submit-btn">Submit</button>
    </form>
    <div id="result"></div>
</section>

<script>
document.getElementById('quiz-form').addEventListener('submit', function(event) {
    event.preventDefault();

    // Ambil nilai jawaban dari form
    var answer1 = document.querySelector('input[name="question1"]:checked');
    var answer2 = document.querySelector('input[name="question2"]:checked');

    // Validasi apakah semua pertanyaan telah dijawab
    if (!answer1 || !answer2) {
        document.getElementById('result').innerHTML = "Mohon jawab semua pertanyaan.";
        return;
    }

    // Hitung skor
    var score = 0;
    if (answer1.value === 'a') {
        score += 1;
    }
    if (answer2.value === 'b') {
        score += 1;
    }

    // Tampilkan hasil
    document.getElementById('result').innerHTML = "Skor Anda: " + score + "/2";
});
</script>

<?= $this->endSection() ?>