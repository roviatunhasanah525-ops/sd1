<?php
require_once 'pembayaran.php';
require_once 'cetak.php';

class cod extends pembayaran implements cetak {

    public function prosespembayaran() {
        if ($this->validasi()) {
            return "Pembayaran COD Rp " . number_format($this->hitungtotal(),0,',','.') . " berhasil";
        }
        return "Jumlah tidak valid";
    }

    public function cetakstruk() {
        return "Struk COD: Rp " . number_format($this->hitungtotal(),0,',','.');
    }
}
?>