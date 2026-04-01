<?php
require_once 'transferbank.php';
require_once 'ewallet.php';
require_once 'qris.php';
require_once 'cod.php';
require_once 'va.php';

$hasil = "";

if (isset($_POST['submit'])) {
    $jumlah = $_POST['jumlah'];
    $metode = $_POST['metode'];

    switch ($metode) {
        case "transfer":
            $obj = new transferbank($jumlah);
            break;
        case "ewallet":
            $obj = new ewallet($jumlah);
            break;
        case "qris":
            $obj = new qris($jumlah);
            break;
        case "cod":
            $obj = new cod($jumlah);
            break;
        case "va":
            $obj = new va($jumlah);
            break;
        default:
            $obj = null;
    }

    if ($obj) {
        $hasil = $obj->prosespembayaran() . "<br><br>" .
                 $obj->detail() . "<br><br>" .
                 $obj->cetakStruk();
    } else {
        $hasil = "Metode tidak valid";
    }
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
    Jumlah: <br>
    <input type="number" name="jumlah" required><br><br>

    Metode: <br>
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

<h3>hasil:</h3>
<?php echo $hasil; ?>

</body>
</html>