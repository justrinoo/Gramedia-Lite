<?php
session_start();
require('../app.php');
$bookId = $_GET["id"];
$book = querySql("SELECT * FROM products WHERE id_product = $bookId")[0];


if (!isset($_SESSION["user"])) {
    header("Location: signin.php");
}

$role = $_SESSION["role"];
if ($role !== "buyyer") {
    header("Location: ./penjual/index.php");
}
?>
<?php require('../partials/header.php'); ?>
<?php require('../partials/navigation.php'); ?>


<div class="container mt-4">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <img src="https://placeimg.com/300/300/nature" width="100%" alt="Picture <?= $book["judul_buku"]; ?>">
                        </div>
                        <div class="mx-4">
                            <div class="card-title mb-5">
                                <h5 class="badge bg-info"><?= $book["kategori_buku"]; ?></h5>
                                <h5><small>Judul: </small><?= $book["judul_buku"]; ?></h5>
                                <h5><small>Harga:</small> Rp. <?= number_format($book["harga_buku"]); ?></h5>
                                <h5><small>Deskripsi: </small>: <?= $book["deskripsi_buku"]; ?></h5>
                                <form method="post">
                                    <label for="stock" class="form-label">Stock Buku</label>
                                    <input type="number" class="form-control" id="stock" name="stock" required placeholder="Berapa Buku?">
                                    <button type="submit" name="buy" class="btn btn-primary mt-4">Beli Buku</button>
                                </form>
                            </div>
                        </div>
                        <?php
                        if (isset($_POST["buy"])) {
                            $total = $_POST["stock"];
                            $book = $_SESSION["keranjang"][$bookId] = $total;
                            if ($book > 10) {
                                echo "<script>
                                alert('Maaf Buku Terlalu Banyak!');
                                location= 'd-product.php?id=$bookId';
                                </script>";
                            }
                            echo "<script>
                            alert('Buku berhasil ditambahkan dikeranjang!');
                            location= 'cart.php';
                            </script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>