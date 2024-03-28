<?php

$nilai_mahasiswa = [
    ['no' => 1, 'nama' => 'Alfi', 'nilai' => 75],
    ['no' => 2, 'nama' => 'Muhammad', 'nilai' => 85],
    ['no' => 3, 'nama' => 'Dzikra', 'nilai' => 60],
    ['no' => 4, 'nama' => 'Andree', 'nilai' => 70],
    ['no' => 5, 'nama' => 'Maldini', 'nilai' => 90],
    ['no' => 6, 'nama' => 'Samuel', 'nilai' => 55],
    ['no' => 7, 'nama' => 'Ridwan', 'nilai' => 80],
    ['no' => 8, 'nama' => 'Rahmat', 'nilai' => 95],
    ['no' => 9, 'nama' => 'Ali', 'nilai' => 65],
    ['no' => 10, 'nama' => 'Zulfakor', 'nilai' => 72],
];

// Fungsi untuk mendapatkan grade dari nilai
function getGrade($nilai) {
    return $nilai >= 85 ? 'A' :
           ($nilai >= 75 ? 'B' :
           ($nilai >= 65 ? 'C' :
           ($nilai >= 55 ? 'D' : 'E')));
}

// Fungsi untuk mendapatkan predikat dari grade
function getPredikat($grade) {
    switch ($grade) {
        case 'A':
            return 'Memuaskan';
        case 'B':
            return 'Bagus';
        case 'C':
            return 'Cukup';
        case 'D':
            return 'Kurang';
        default:
            return 'Buruk';
    }
}

// Fungsi untuk mendapatkan keterangan lulus/gagal
function getKeterangan($nilai) {
    return $nilai >= 60 ? 'Lulus' : 'Gagal';
}

// Hitung agregat nilai
$nilai_total = array_column($nilai_mahasiswa, 'nilai');
$nilai_tertinggi = max($nilai_total);
$nilai_terendah = min($nilai_total);
$jumlah_mahasiswa = count($nilai_mahasiswa);
$jumlah_nilai = array_sum($nilai_total);
$rata_rata = $jumlah_nilai / $jumlah_mahasiswa;

// Generate NIM dengan format 2021080111 dan seterusnya
$start_nim = 2021080111;
foreach ($nilai_mahasiswa as $key => &$mahasiswa) {
    $mahasiswa['nim'] = $start_nim + $key;
}

$agregat_nilai = [
    'Nilai Tertinggi' => $nilai_tertinggi,
    'Nilai Terendah' => $nilai_terendah,
    'Nilai Rata-Rata' => number_format($rata_rata, 2),
    'Jumlah Mahasiswa' => $jumlah_mahasiswa,
    'Jumlah Keseluruhan Nilai' => $jumlah_nilai,
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tfoot {
            font-weight: bold;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
    </style>
</head>
<body>
    <h3 align='center'>Daftar Nilai Mahasiswa</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Nilai</th>
                <th>Keterangan</th>
                <th>Grade</th>
                <th>Predikat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nilai_mahasiswa as $nilai) : ?>
                <tr>
                    <td><?= $nilai['no'] ?></td>
                    <td><?= $nilai['nama'] ?></td>
                    <td><?= $nilai['nim'] ?></td>
                    <td><?= $nilai['nilai'] ?></td>
                    <td><?= getKeterangan($nilai['nilai']) ?></td>
                    <td><?= getGrade($nilai['nilai']) ?></td>
                    <td><?= getPredikat(getGrade($nilai['nilai'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <?php foreach ($agregat_nilai as $keterangan => $hasil) : ?>
                <tr>
                    <td colspan="6"><?= $keterangan ?></td>
                    <td><?= $hasil ?></td>
                </tr>
            <?php endforeach; ?>
        </tfoot>
    </table>
    <footer>&copy; 2024 Alfidzikra</footer>
</body>
</html>
