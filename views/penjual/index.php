<?php session_start();
require('../../app.php');

if (!isset($_SESSION["user"])) {
    header("Location: ../index.php");
}


// Ambil semua data dari table product tapi product yang terbaru
$books = querySql("SELECT * FROM products ORDER BY id_product ASC");

$role = $_SESSION["role"];

if ($role !== "seller") {
    header("Location: ../index.php");
}

?>

<?php require('../../partials/header.php'); ?>
<?php require('./nav.php'); ?>

<section>
    <div class="container">
        <div class="row">
            <?php foreach ($books as $book) : ?>
                <div class="col-md-3">
                    <div class="card mt-4" style="width: 17rem;">
                        <img src="https://placeimg.com/320/250/nature" width="100%" alt="">
                        <div class="card-body">
                            <div class="card-title">
                                <h6><?= $book["judul_buku"]; ?></h6>
                            </div>
                            <p class="badge bg-info"><?= $book["kategori_buku"]; ?></p>
                            <p class="fw-bold">Rp <?= number_format($book["harga_buku"]); ?></p>
                            <p class="text-justify text-truncate" style="max-width: 250px;"><?= $book["deskripsi_buku"]; ?></p>
                            <a href="d-product.php?id=<?= $book["id_product"]; ?>" class="btn btn-info btn-sm">Baca Lebih Lanjut</a>
                        </div>
                        <div class="card-footer">
                            <span>Pembuat: <?= $book["pembuat_buku"]; ?></span>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>