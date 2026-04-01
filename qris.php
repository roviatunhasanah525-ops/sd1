<?php
require_once 'Pembayaran.php';
require_once 'Cetak.php';

//Penggunaan Class QRIS dari Extend
class QRIS extends Pembayaran implements Cetak {

    public function prosesPembayaran() {
        if ($this->validasi()) {
            $total = $this->hitungTotal();
            return "Pembayaran QRIS Rp {$this->jumlah} berhasil | Total Bayar: Rp {$total}";
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        $total = $this->hitungTotal();
        return "Struk QRIS: Rp {$this->jumlah} | Total: Rp {$total}";
    }
}
?>