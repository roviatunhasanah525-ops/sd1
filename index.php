<?php
require_once 'TransferBank.php';
require_once 'Ewallet.php';
require_once 'QRIS.php';
require_once 'COD.php';
require_once 'VirtualAccount.php';

$hasil = "";

if (isset($_POST['submit'])) {
    $jumlah = $_POST['jumlah'];
    $metode = $_POST['metode'];

    if ($metode == "transfer") {
        $obj = new TransferBank($jumlah);
    } elseif ($metode == "ewallet") {
        $obj = new Ewallet($jumlah);
    } elseif ($metode == "qris") {
        $obj = new QRIS($jumlah);
    } elseif ($metode == "cod") {
        $obj = new COD($jumlah);
    } elseif ($metode == "va") {
        $obj = new VirtualAccount($jumlah);
    }

    $hasil .= $obj->prosesPembayaran();
    $hasil .= "<br>";
    $hasil .= $obj->cetakStruk();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Pembayaran</title>
</head>
<body>

<h2>Form Pembayaran</h2>

<form method="POST">
    <label>Jumlah:</label><br>
    <input type="number" name="jumlah" required><br><br>

    <label>Metode Pembayaran:</label><br>
    <select name="metode">
        <option value="transfer">Transfer Bank</option>
        <option value="ewallet">E-Wallet</option>
        <option value="qris">QRIS</option>
        <option value="cod">COD</option>
        <option value="va">Virtual Account</option>
    </select><br><br>

    <button type="submit" name="submit">Bayar</button>
</form>

<hr>

<h3>Hasil:</h3>
<?php echo $hasil; ?>

</body>
</html>