<?php
abstract class Pembayaran {
    protected $jumlah;
    
    public function __construct($jumlah) {
        $this->jumlah = $jumlah;
    }

    abstract public function prosesPembayaran();

    public function validasi() {
        return $this->jumlah > 0;
    }

    // 🔥 Diskon + Pajak
    public function hitungTotal() {
        $diskon = 0.1 * $this->jumlah;
        $setelahDiskon = $this->jumlah - $diskon;

        $pajak = 0.11 * $setelahDiskon;
        return $setelahDiskon + $pajak;
    }
}
?>