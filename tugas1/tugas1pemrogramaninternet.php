<!DOCTYPE html>
<html>
<head>
    <title>Penilaian Mata Kuliah Pemrograman Internet</title>
</head>
<body>
    <h2>Form Penilaian Mata Kuliah Pemrograman Internet</h2>
    <h4>Kadek Adi Krisna Maheswara | Pemrograman Internet Kelas B (2305551086)</h4>
    <form method="post" action="">
        Nama: <input type="text" name="nama" required><br><br>
        NIM: <input type="text" name="nim" required><br><br>
        Nilai Angka: <input type="number" name="nilai" min="0" max="100" required><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $nilai = $_POST['nilai'];

        // Menentukan nilai huruf berdasarkan nilai angka
        if ($nilai >= 85 && $nilai <= 100) {
            $nilaiHuruf = "A";
        } elseif ($nilai >= 80 && $nilai < 85) {
            $nilaiHuruf = "B+";
        } elseif ($nilai >= 70 && $nilai < 80) {
            $nilaiHuruf = "B";
        } elseif ($nilai >= 65 && $nilai < 70) {
            $nilaiHuruf = "C+";
        } elseif ($nilai >= 55 && $nilai < 65) {
            $nilaiHuruf = "C";
        } elseif ($nilai >= 50 && $nilai < 55) {
            $nilaiHuruf = "D";
        } else {
            $nilaiHuruf = "E";
        }

        // Menampilkan hasil
        echo "<h3>Hasil Penilaian</h3>";
        echo "Nama: $nama<br>";
        echo "NIM: $nim<br>";
        echo "Nilai Angka: $nilai<br>";
        echo "Nilai Huruf: $nilaiHuruf<br>";
    }
    ?>
</body>
</html>
