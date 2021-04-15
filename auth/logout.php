<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();
echo "<script>alert('Terima kasih anda telah logout!'); location='../views/signin.php'; </script>";
