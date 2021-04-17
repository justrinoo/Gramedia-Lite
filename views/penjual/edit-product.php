<?php

require('../../app.php');
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
}

$id = $_GET["id"];

$book = querySql("SELECT * FROM products WHERE id_product = $id")[0];

if (isset($_POST["editBook"])) {
    if (editBook($_POST, $id) > 0) {
        echo "
            <script>
                alert('Berhasil Mengubah Buku!');
                location='index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Kesalahan Jaringan!');
                location='index.php';
            </script>
        ";
    }
}

?>


<?php require('../../partials/header.php'); ?>
<?php require('nav.php'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4" style="width: 20rem;">
                <img src="https://placeimg.com/640/480/nature" width="100%" alt="Detail Picture <?= $book["judul_buku"]; ?>">
                <div class="card-body">
                    <div class="card-title">
                        <span class="badge bg-info rounded-pill"><?= $book["kategori_buku"]; ?></span>
                        <h6 class="mt-2"><?= $book["judul_buku"] ?></h6>
                        <h6>Rp <?= number_format($book["harga_buku"]) ?></h6>
                        <p class="text-muted"><?= $book["deskripsi_buku"] ?></p>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <small><?= $book["pembuat_buku"]; ?></small>
                    <small class=""><?= date("d-M-y", strtotime($book["rilis_buku"])); ?></small>
                </div>
            </div>
        </div>
        <div class="col">
            <h4 class="mt-4">Form Edit Book <span class="fw-bold"><?= $book["judul_buku"]; ?></span></h4>
            <form method="post" class="mt-3">
                <div class="form-group mt-2">
                    <label for="judul_buku">Judul Buku</label>
                    <input type="text" name="judul_buku" id="judul_buku" class="form-control" value="<?= $book["judul_buku"]; ?>">
                </div>
                <div class="form-group mt-2">
                    <label for="kategori_buku">Kategori Buku</label>
                    <select name="kategori_buku" id="kategori_buku" class="form-select">
                        <option hidden><?= $book["kategori_buku"]; ?></option>
                        <option value="action">Action</option>
                        <option value="Fighting">Fighting</option>
                        <option value="Drama">Drama</option>
                        <option value="School">School</option>
                        <option value="Ghost">Ghost</option>
                        <option value="Sad">Sad</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="harga_buku">Harga Buku</label>
                    <input type="text" name="harga_buku" id="harga_buku" class="form-control" value="<?= $book["harga_buku"]; ?>">
                </div>
                <div class="form-group mt-2">
                    <label for="pembuat_buku">Pembuat Buku</label>
                    <input type="text" name="pembuat_buku" id="pembuat_buku" class="form-control" value="<?= $book["pembuat_buku"]; ?>">
                </div>
                <div class="form-group mt-2">
                    <label for="deskripsi_buku">Deskripsi Buku</label>
                    <textarea name="deskripsi_buku" id="deskripsi_buku" class="form-control" cols="30" rows="2"><?= $book["deskripsi_buku"]; ?></textarea>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-outline-primary w-100" name="editBook">Edit Book</button>
                </div>
            </form>
        </div>
    </div>
</div>