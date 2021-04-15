<?php
require('../../app.php');
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../signin.php");
}

$bookId = $_GET["id"];

if (rejectBook($bookId) > 0) {
    echo "
        <script>
            alert('Orderan Berhasil Di Tolak!');
            location='history-order.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Kesalahan Jaringan WKWKW!');
            location='history-order.php';
        </script>
    ";
}
