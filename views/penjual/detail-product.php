<?php
require('../../app.php');
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
}

$bookId = $_GET["id"];

$findOneBook = querySql("SELECT * FROM products WHERE id_product = $bookId")[0];
?>


<?php require('../../partials/header.php'); ?>
<?php require('nav.php'); ?>


<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4" style="width: 20rem; margin: auto;">
                <img src="https://placeimg.com/640/480/nature" width="100%" alt="Detail Picture <?= $findOneBook["judul_buku"]; ?>">
                <div class="card-body">
                    <div class="card-title">
                        <span class="badge bg-info rounded-pill"><?= $findOneBook["kategori_buku"]; ?></span>
                        <h6 class="mt-2"><?= $findOneBook["judul_buku"] ?></h6>
                        <h6>Rp <?= number_format($findOneBook["harga_buku"]) ?></h6>
                        <p class="text-muted"><?= $findOneBook["deskripsi_buku"] ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="delete-product.php?id=<?= $findOneBook["id_product"]; ?>" class="badge bg-danger text-decoration-none">Delete</a>
                            <a href="edit-product.php?id=<?= $findOneBook["id_product"]; ?>" class="badge bg-success text-decoration-none">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <small><?= $findOneBook["pembuat_buku"]; ?></small>
                    <small class=""><?= date("d-M-y", strtotime($findOneBook["rilis_buku"])); ?></small>
                </div>
            </div>
        </div>
    </div>
</div>