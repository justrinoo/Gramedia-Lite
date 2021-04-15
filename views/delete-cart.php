<?php
session_start();
require('../app.php');
$bookId = $_GET["id"];

unset($_SESSION["keranjang"][$bookId]);
echo "<script>
    alert('Buku telah dihapus dari keranjang!');
    location='cart.php';
</script>";
