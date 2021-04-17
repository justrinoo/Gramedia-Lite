<?php
session_start();
require('../app.php');
$productBook = querySql("SELECT * FROM products ORDER BY id_product ASC");

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}

?>
<?php require('../partials/header.php'); ?>
<?php require('../partials/navigation.php'); ?>

<!-- List Buku -->
<div class="container mb-5">
    <div class="row">
        <div class="col">
            <h3 class="mt-5">Rekomendasi Dari Kami</h3>
        </div>
    </div>
    <div class="row">
        <?php foreach ($productBook as $book) { ?>
            <div class="col-md-3">
                <div class="card mt-3" style="width: 17rem;">
                    <div class="card-header">Buku <?= $book["kategori_buku"]; ?></div>
                    <img src="<?= $book["link_image"]; ?>" width="100%" height="100%" alt="">
                    <div class="card-body">
                        <h5 class="card-title text-truncate"><?= $book["judul_buku"]; ?></h5>
                        <span class="badge bg-primary"><?= $book["kategori_buku"]; ?></span>
                        <h6>Rp <?= number_format($book["harga_buku"]); ?></h6>
                        <p class="card-text text-truncate"><?= $book["deskripsi_buku"]; ?></p>
                        <a href="d-product.php?id=<?= $book["id_product"]; ?>" class="btn btn-primary btn-sm">Detail Buku</a>
                        <a href="buy.php?id=<?= $book["id_product"]; ?>" class="btn btn-outline-info btn-sm">Beli Sekarang</a>
                    </div>
                    <div class="card-footer">
                        <span> Pembuat: <?= $book["pembuat_buku"]; ?></span>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>
<?php require('../partials/footer.php'); ?>