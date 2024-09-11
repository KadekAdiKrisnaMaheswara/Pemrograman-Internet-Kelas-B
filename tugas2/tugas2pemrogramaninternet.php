<?php
// Data siswa
$siswa = [
    ["nama" => "Andi", "matematika" => 85, "bahasa_inggris" => 70, "ipa" => 80],
    ["nama" => "Budi", "matematika" => 60, "bahasa_inggris" => 50, "ipa" => 65],
    ["nama" => "Cici", "matematika" => 75, "bahasa_inggris" => 80, "ipa" => 70],
    ["nama" => "Dodi", "matematika" => 95, "bahasa_inggris" => 85, "ipa" => 90],
    ["nama" => "Eka", "matematika" => 50, "bahasa_inggris" => 60, "ipa" => 55],
];

// Variabel untuk menghitung jumlah siswa lulus dan tidak lulus
$totalLulus = 0;
$totalTidakLulus = 0;

// Fungsi untuk menghitung rata-rata
function hitungRataRata($nilai1, $nilai2, $nilai3) {
    return ($nilai1 + $nilai2 + $nilai3) / 3;
}

// Fungsi untuk menentukan mata pelajaran dengan nilai terendah
function mataPelajaranTerendah($matematika, $bahasa_inggris, $ipa) {
    $nilaiMapel = [
        "Matematika" => $matematika,
        "Bahasa Inggris" => $bahasa_inggris,
        "IPA" => $ipa
    ];
    asort($nilaiMapel); // Urutkan berdasarkan nilai terendah
    return array_key_first($nilaiMapel); // Kembalikan kunci pertama (nilai terendah)
}

// Header Tabel
echo "<style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        caption {
            caption-side: top;
            font-size: 1.5em;
            font-weight: bold;
            color: #4CAF50;
        }
      </style>";

// Cetak tabel
echo "<table>";
echo "<caption>DAFTAR NILAI SISWA DAN STATUS LULUS</caption>";
echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nilai Matematika</th>
        <th>Nilai Bahasa Inggris</th>
        <th>Nilai IPA</th>
        <th>Rata-rata</th>
        <th>Status</th>
        <th>Mata Pelajaran Perbaikan</th>
      </tr>";

// Iterasi untuk setiap siswa
$no = 1; // Untuk penomoran
foreach ($siswa as $dataSiswa) {
    // Hitung rata-rata nilai
    $rataRata = hitungRataRata($dataSiswa['matematika'], $dataSiswa['bahasa_inggris'], $dataSiswa['ipa']);
    $dataSiswa['rata_rata'] = $rataRata;

    // Tentukan status kelulusan
    if ($rataRata >= 75) {
        $dataSiswa['status'] = "Lulus";
        $dataSiswa['mapel_terendah'] = "-"; // Kosongkan untuk siswa yang lulus
        $totalLulus++;
    } else {
        $dataSiswa['status'] = "Tidak Lulus";
        $dataSiswa['mapel_terendah'] = mataPelajaranTerendah($dataSiswa['matematika'], $dataSiswa['bahasa_inggris'], $dataSiswa['ipa']);
        $totalTidakLulus++;
    }

    // Cetak baris tabel
    echo "<tr>
            <td>" . $no++ . "</td>
            <td>" . $dataSiswa['nama'] . "</td>
            <td>" . $dataSiswa['matematika'] . "</td>
            <td>" . $dataSiswa['bahasa_inggris'] . "</td>
            <td>" . $dataSiswa['ipa'] . "</td>
            <td>" . round($dataSiswa['rata_rata'], 2) . "</td>
            <td>" . $dataSiswa['status'] . "</td>
            <td>" . $dataSiswa['mapel_terendah'] . "</td>
          </tr>";
}

// Akhiri tabel
echo "</table>";

// Tampilkan jumlah total siswa yang lulus dan tidak lulus
echo "<p><strong>Jumlah siswa yang lulus:</strong> $totalLulus</p>";
echo "<p><strong>Jumlah siswa yang tidak lulus:</strong> $totalTidakLulus</p>";
?>
