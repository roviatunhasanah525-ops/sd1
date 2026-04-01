<?php
interface Pembayaran {
    public function bayar($jumlah);
}

class TransferBank implements Pembayaran {
    public function bayar($jumlah) {
        return "Transfer Rp $jumlah berhasil";
    }
}

class EWallet implements Pembayaran {
    public function bayar($jumlah) {
        return "E-Wallet Rp $jumlah berhasil";
    }
}
?>