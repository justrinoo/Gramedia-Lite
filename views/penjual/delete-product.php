<?php
require('../../app.php');
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../login.php");
}

$bookId = $_GET["id"];

if (deleteBook($bookId) > 0) {
    echo "
        <script>
        alert('Buku Telah dihapus!');
        location='index.php';
        </script>
    ";
} else {
    echo mysqli_error($db);
}
