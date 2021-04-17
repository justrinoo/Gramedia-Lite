<?php
session_start();
require('../app.php');
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}

$role = $_SESSION["role"];
if ($role !== "buyyer") {
    header("Location: ./penjual/index.php");
}


if (isset($_POST["checkoutBuku"])) {
    if (createCheckout($_POST) > 0) {
        header("Location: history-order.php");
    } else {
        echo mysqli_error($db);
    }
}

if (empty($_SESSION["keranjang"]) || !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang masih kosong belanja dulu yu!'); location='barang.php';</script>";
}

?>

<?php require('../partials/header.php'); ?>
<?php require('../partials/navigation.php'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col mt-4">
                <h2>Checkout Buku</h2>
                <div class="card">
                    <div class="card-body">
                        <?php
                        $totalBelanjaBuku = 0;
                        foreach ($_SESSION["keranjang"] as $checkoutId => $result) : ?>
                            <?php $data = querySql("SELECT * FROM products WHERE id_product = '$checkoutId'")[0];
                            $totalHargaBuku = $data["harga_buku"] * $result;
                            ?>
                            <div class="card-title">
                                <h5><?= $data["judul_buku"]; ?></h5>
                                <h5>Total Buku: <?= $result; ?></h5>
                                <h5>Harga Per-buku: <?= number_format($totalHargaBuku); ?></h5>
                            </div>
                            <hr>
                            <?php $totalBelanjaBuku += $totalHargaBuku; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col mt-4">
                <?php isset($_COOKIE["error_validation_checkout"]) ? $error_checkout = $_COOKIE["error_validation_checkout"] : $error_checkout = null ?>
                <?php if ($error_checkout) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error_checkout ?>
                    </div>
                <?php endif; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama Pembeli</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $_SESSION["nama"]; ?>" readonly>
                    </div>
                    <div class="form-group mt-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?= $_SESSION["email"]; ?>" readonly>
                    </div>
                    <div class="form-group mt-2">
                        <label for="nama_buku" class="form-label">Judul Buku</label>
                        <input type="text" name="nama_buku" id="nama_buku" class="form-control" value="<?= $data["judul_buku"]; ?>" readonly>
                    </div>
                    <div class="form-group mt-2">
                        <label for="no_telp" class="form-label">Nomor Telephone Aktif</label>
                        <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Nomor Telephone yang aktif ya!">
                    </div>
                    <div class="form-group mt-2">
                        <label for="id_ongkir" class="form-label">Ongkir Ke Kota Anda</label>
                        <select name="id_ongkir" id="id_ongkir" class="form-select">
                            <?php $dataOngkir = querySql("SELECT * FROM ongkir"); ?>
                            <?php foreach ($dataOngkir as $ongkir) :
                            ?>
                                <option value="<?= $ongkir["id_ongkir"]; ?>"><?= $ongkir["nama_kota"]; ?> - Rp <?= number_format($ongkir["tarif"]); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="tipe_pembayaran" class="form-label">Tipe Pembayarannya</label>
                        <select name="tipe_pembayaran" id="tipe_pembayaran" class="form-select">
                            <option value="Alfamart">Alfamart</option>
                            <option value="Indomart">Indomart</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="harga_buku" class="form-label">Alamat Lengkap</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" placeholder="Alamat lengkap nya jangan sampai salah ya!"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <label for="harga_buku" class="form-label">Total Harga</label>
                        <input type="text" name="harga_buku" id="harga_buku" class="form-control" value="<?= $totalBelanjaBuku ?>" readonly>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" name="checkoutBuku" class="btn btn-outline-info mt-3">Bayar Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>