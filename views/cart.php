<?php
require('../app.php');
session_start();
$role = $_SESSION["role"];

if ($role !== "buyyer") {
    echo "<script>alert('Maaf anda tidak bisa akses!'); location='./penjual/index.php';;</script>";
}

?>

<?php require('../partials/header.php'); ?>
<?php require('../partials/navigation.php'); ?>


<?php if (empty($_SESSION["keranjang"]) || !isset($_SESSION["keranjang"])) : ?>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center mt-5">
                <h2>Loh ko sepi?</h2>
            </div>
            <img src="../assets/images/empty-cart.png" style="width: 30%; margin: auto;" class="img-fluid" alt="Empty Cart">
            <a href="barang.php" class="text-center text-decoration-none fw-bold">Beli buku dulu yu!</a>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION["keranjang"])) : ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <?php $totalcart = 0; ?>
                    <?php foreach ($_SESSION["keranjang"] as $bookid => $hasil) :  ?>
                        <?php $data = querySql("SELECT * FROM products WHERE id_product = $bookid")[0];
                        $totalHarga =  $data["harga_buku"] * $hasil;
                        ?>
                        <div class="card-body">
                            <div class="d-flex align-items-center">

                                <div class="mx-4">
                                    <div class="card-title mb-5">
                                        <h5 class="badge bg-info"><?= $data["kategori_buku"]; ?></h5>
                                        <h5><small> <?= $data["judul_buku"]; ?></small></h5>
                                        <h5><small>Harga Buku: Rp <?= number_format($data["harga_buku"]); ?></small></h5>
                                        <h5><small>Total Buku: <?= $hasil; ?></small></h5>
                                        <h5><small><?= $data["deskripsi_buku"]; ?></small>:</h5>
                                        <a href="delete-cart.php?id=<?= $data["id_product"]; ?>" class="btn btn-outline-danger btn-sm">Hapus</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <?php $totalcart += $totalHarga; ?>
                    <?php endforeach;  ?>
                    <?php if (empty($_SESSION["keranjang"]) || !isset($_SESSION["keranjang"])) : ?>
                    <?php else : ?>
                        <h4 class="mt-3 text-end">Total Harga: Rp. <?= number_format($totalcart); ?></h4>
                        <a href="checkout.php" class="text-end mx-3 text-decoration-none fw-bold">Checkout</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>