<?php
require_once 'Pembayaran.php';
require_once 'Cetak.php';

//Penggunaan Class Virtual Account dari Extend
class VirtualAccount extends Pembayaran implements Cetak {

    public function prosesPembayaran() {
        if ($this->validasi()) {
            $total = $this->hitungTotal();
            return "Pembayaran Virtual Account Rp {$this->jumlah} berhasil | Total Bayar: Rp {$total}";
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        $total = $this->hitungTotal();
        return "Struk Virtual Account: Rp {$this->jumlah} | Total: Rp {$total}";
    }
}
?>