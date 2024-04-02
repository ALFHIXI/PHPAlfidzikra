<?php
// Periksa apakah sesi sudah aktif sebelum memulai sesi kembali
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Mulai sesi jika belum aktif
}

// Menyisipkan kelas Mahasiswa
class Mahasiswa
{
    public $nim;
    public $nama;
    public $kuliah;
    public $nilai;
    public $grade;
    public $predikat;
    public $status;
    public $universitas; // Tambahkan properti universitas

    public function __construct($nim, $nama, $kuliah, $nilai, $universitas)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->kuliah = $kuliah;
        $this->nilai = $nilai;
        $this->universitas = $universitas; // Inisialisasi properti universitas
        $this->hitungGrade();
        $this->hitungPredikat();
        $this->hitungStatus();
    }

    private function hitungGrade()
    {
        if ($this->nilai >= 85) {
            $this->grade = 'A';
        } elseif ($this->nilai >= 75) {
            $this->grade = 'B';
        } elseif ($this->nilai >= 60) {
            $this->grade = 'C';
        } elseif ($this->nilai >= 40) {
            $this->grade = 'D';
        } else {
            $this->grade = 'E';
        }
    }

    private function hitungPredikat()
    {
        switch ($this->grade) {
            case 'A':
                $this->predikat = 'Sangat Memuaskan';
                break;
            case 'B':
                $this->predikat = 'Memuaskan';
                break;
            case 'C':
                $this->predikat = 'Cukup';
                break;
            case 'D':
                $this->predikat = 'Kurang';
                break;
            default:
                $this->predikat = 'Sangat Kurang';
        }
    }

    private function hitungStatus()
    {
        $this->status = ($this->nilai >= 65) ? 'Lulus' : 'Tidak Lulus';
    }
}
?>