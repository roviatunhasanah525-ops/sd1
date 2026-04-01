<?php
require_once 'Pembayaran.php';
require_once 'Cetak.php';

//Penggunaan Class COD dari Extend
class COD extends Pembayaran implements Cetak {

    public function prosesPembayaran() {
        if ($this->validasi()) {
            $total = $this->hitungTotal();
            return "Pembayaran COD Rp {$this->jumlah} berhasil | Total Bayar: Rp {$total}";
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        $total = $this->hitungTotal();
        return "Struk COD: Rp {$this->jumlah} | Total: Rp {$total}";
    }
}
?>