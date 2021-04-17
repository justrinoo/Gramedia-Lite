<?php
session_start();
require('../../app.php');

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
}


$role = $_SESSION["role"];

if ($role !== "seller") {
    header("Location: ../index.php");
}

// Logic Create Product
if (isset($_POST["createProduct"])) {
    if (createBook($_POST) > 0) {
        echo "<script>
            alert('Berhasil membuat produk buku!');
            location='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Kesalahan Jaringan');
            location='index.php';
        </script>";
    }
}



?>
<?php require('../../partials/header.php'); ?>

<?php require('./nav.php'); ?>



<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4 mx-auto" style="width: 50%;">
                <div class="card-body">
                    <div class="card-title">
                        <h4>Create a Book!</h4>
                    </div>
                    <?php isset($_COOKIE["error_form"]) ? $errorForm = $_COOKIE["error_form"] : $errorForm =  null  ?>
                    <?php if ($errorForm) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $errorForm; ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" class="mt-3">
                        <div class="form-group mt-2">
                            <label for="judul_buku">Judul Buku</label>
                            <input type="text" name="judul_buku" id="judul_buku" class="form-control" placeholder="Shingeki No Kyojin">
                        </div>
                        <div class="form-group mt-2">
                            <label for="kategori_buku">Kategori Buku</label>
                            <select name="kategori_buku" id="kategori_buku" class="form-select">
                                <option hidden>Kategori Bukunya</option>
                                <option value="action">Action</option>
                                <option value="Fight">Fighting</option>
                                <option value="Drama">Drama</option>
                                <option value="School">School</option>
                                <option value="Ghost">Ghost</option>
                                <option value="Sad">Sad</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="harga_buku">Harga Buku</label>
                            <input type="text" name="harga_buku" id="harga_buku" class="form-control" placeholder="90000">
                        </div>
                        <div class="form-group mt-2">
                            <label for="pembuat_buku">Pembuat Buku</label>
                            <input type="text" name="pembuat_buku" id="pembuat_buku" class="form-control" placeholder="Hajime Isayama">
                        </div>
                        <div class="form-group mt-2">
                            <label for="deskripsi_buku">Deskripsi Buku</label>
                            <textarea name="deskripsi_buku" id="deskripsi_buku" class="form-control" cols="30" rows="2" placeholder="berlatar di dunia tempat umat manusia hidup di wilayah yang dikelilingi tiga lapis tembok besar"></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-outline-primary w-100" name="createProduct">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>