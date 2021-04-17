<?php
require("../app.php");
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}


$role = $_SESSION["role"];

if ($role !== "buyyer") {
    header("Location: ./penjual/index.php");
}

$user = $_SESSION["nama"];
$orderan = querySql("SELECT * FROM checkout WHERE nama = '$user'");
if ($orderan == null) {
    echo "<script>alert('Orderan masih kosong nih, yu beli dulu!'); location='product.php';</script>";
}
?>

<?php require("../partials/header.php"); ?>
<?php require("../partials/navigation.php"); ?>


<div class="container">
    <div class="row">
        <div class="col mt-4">
            <h5>Hai <?= $user; ?> ini hasil orderan kamu ya</h5>
            <?php foreach ($orderan as $order) : ?>
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Order Id: <?= $order["id_checkout"]; ?></h5>
                            <h5> <?= $order["nama"]; ?></h5>
                            <h5> <?= $order["nama_buku"]; ?></h5>
                            <h5>Total Harga: Rp <?= number_format($order["harga_buku"]); ?></h5>
                            <span>Status:</span>
                            <?php if ($order["status_buku"] == "pending") : ?>
                                <small class="badge bg-dark"> <?= $order["status_buku"]; ?></small>
                            <?php elseif ($order["status_buku"] == "reject") : ?>
                                <small class="badge bg-danger"> <?= $order["status_buku"]; ?></small>
                            <?php elseif ($order["status_buku"] == "accept") : ?>
                                <small class="badge bg-success"> <?= $order["status_buku"]; ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col mt-4">
            <?php if ($order["status_buku"] === "pending") : ?>
                <img src="../assets/images/pending.png" alt="Thank You For Order" width="100%" class="mx-auto img-fluid">
                <h5 class="text-center">Omachikudasai \Wait \Tunggu Ya \Ngenteni</h5>
            <?php elseif ($order["status_buku"] === "reject") : ?>
                <img src="../assets/images/reject.png" alt="Thank You For Order" width="100%" class="mx-auto img-fluid">
                <h5 class="text-center">Kyanseru \Rejected \Maaf Orderan Ditolak \dibatalake</h5>
            <?php elseif ($order["status_buku"] === "accept") : ?>
                <img src="../assets/images/thank-you.png" alt="Thank You For Order" width="100%" class="mx-auto img-fluid">
                <h5 class="text-center">Arigatoo \Thank You \Terima Kasih \Matur Nuwun</h5>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require('../partials/footer.php'); ?>