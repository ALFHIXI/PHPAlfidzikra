<?php

class Mahasiswa {
    public $nim;
    public $nama;
    public $universitas;
    public $matkul;
    public $nilai;
    
    // Constructor
    public function __construct($nim, $nama, $universitas, $matkul, $nilai) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->universitas = $universitas;
        $this->matkul = $matkul;
        $this->nilai = $nilai;
    }
    
    // Fungsi untuk mendapatkan status
    public function getStatus() {
        return ($this->nilai >= 65) ? "Lulus" : "Tidak Lulus";
    }
    
    // Fungsi untuk mendapatkan grade
    public function getGrade() {
        if ($this->nilai >= 85) {
            return "A";
        } elseif ($this->nilai >= 75) {
            return "B";
        } elseif ($this->nilai >= 60) {
            return "C";
        } elseif ($this->nilai >= 40) {
            return "D";
        } else {
            return "E";
        }
    }
    
    // Fungsi untuk mendapatkan predikat
    public function getPredikat() {
        if ($this->nilai >= 85) {
            return "Sangat Memuaskan";
        } elseif ($this->nilai >= 75) {
            return "Memuaskan";
        } elseif ($this->nilai >= 60) {
            return "Cukup";
        } elseif ($this->nilai >= 40) {
            return "Kurang";
        } else {
            return "Sangat Kurang";
        }
    }
}

?>
