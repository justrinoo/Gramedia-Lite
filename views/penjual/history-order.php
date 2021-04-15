<?php
require('../../app.php');
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../signin.php");
}

$penjual = $_SESSION["role"];

if ($penjual !== "seller") {
    header("Location: ../index.php");
}
?>

<?php require("../../partials/header.php"); ?>
<?php require("nav.php"); ?>


<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-responsive mt-4">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Pembeli</th>
                        <th scope="col">Buku</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telphone</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Pembayaran</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal Checkout</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    $dataCheckout = querySql("SELECT * FROM checkout"); ?>
                    <?php foreach ($dataCheckout as $orderan) : ?>
                        <tr>
                            <td scope="row"><?= $nomor++; ?></td>
                            <td><?= $orderan["nama"]; ?></td>
                            <td><?= $orderan["nama_buku"]; ?></td>
                            <td><?= $orderan["email"]; ?></td>
                            <td><?= $orderan["no_telp"]; ?></td>
                            <td><?= number_format($orderan["harga_buku"]); ?></td>
                            <td><?= $orderan["tipe_pembayaran"]; ?></td>
                            <td><?= $orderan["alamat"]; ?></td>
                            <td>
                                <?php if ($orderan["status_buku"] === "accept") : ?>
                                    <span class="text-success fw-bold"><?= $orderan["status_buku"]; ?></span>
                                <?php elseif ($orderan["status_buku"] === "reject") : ?>
                                    <span class="text-danger fw-bold"> <?= $orderan["status_buku"]; ?></span>
                                <?php else : ?>
                                    <?= $orderan["status_buku"]; ?>
                                    <a href="accept.php?id=<?= $orderan["id_checkout"]; ?>" class="badge bg-success rounded-pill text-decoration-none">Terima</a>
                                    <a href="reject.php?id=<?= $orderan["id_checkout"]; ?>" class="badge bg-danger rounded-pill text-decoration-none">Tolak</a>
                                <?php endif; ?>

                            </td>
                            <td><?= date("d-M-Y", strtotime($orderan["tanggal_checkout"])); ?></td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>