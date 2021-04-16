<?php

/**
 * SET UP DATABASE
 */
$db = mysqli_connect("localhost", "root", "root", "book-store");


function querySql($query)
{
    global $db;

    $book =  mysqli_query($db, $query);
    $books = [];
    while ($row = mysqli_fetch_assoc($book)) {
        $books[] = $row;
    }
    return $books;
}

function createUser($data)
{
    global $db;

    $nama = htmlspecialchars($data["nama"]);
    $email =  htmlspecialchars($data["email"]);
    $password =  htmlspecialchars($data["password"]);
    $book_favorite =  htmlspecialchars($data["book_favorite"]);
    $jenis_kelamin =  htmlspecialchars($data["jenis_kelamin"]);
    $createdAt =  date("Y-m-d h:m:s");

    $queryUserAlready = "SELECT * FROM users WHERE nama = '$nama'";
    $userAlready = mysqli_query($db, $queryUserAlready);

    if (mysqli_fetch_assoc($userAlready)) {
        setcookie("error_auth", "maaf user tersebut sudah ada, ganti yang lain yu!", time() + 1);
        header("location: signup.php");
    }


    if (empty($nama)) {
        setcookie("error_auth", 'Nama wajib di isi', time() + 1);
        header("Location: signup.php");
    } else if (empty($email)) {
        setcookie("error_auth", 'Email juga wajib di isi', time() + 1);
        header("Location: signup.php");
    } else if (empty($password)) {
        setcookie("error_auth", 'Password juga ya wajib di isi', time() + 1);
        header("Location: signup.php");
    } else if (empty($book_favorite)) {
        setcookie("error_auth", 'Buku juga supaya kita tau, buku favorite kamu!', time() + 1);
        header("Location: signup.php");
    } else if (empty($jenis_kelamin)) {
        setcookie("error_auth", 'Jenis kelamin juga ya jangan lupa!', time() + 1);
        header("Location: signup.php");
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $queryCreateUser = "INSERT INTO users VALUES (id, '$nama','$email','$passwordHash','$book_favorite','$jenis_kelamin','buyyer','$createdAt')";
    mysqli_query($db, $queryCreateUser);

    return mysqli_affected_rows($db);
}

function createBook($data)
{
    global $db;

    $judul_buku = $data["judul_buku"];
    $kategori_buku = $data["kategori_buku"];
    $harga_buku = $data["harga_buku"];
    $pembuat_buku = $data["pembuat_buku"];
    $deskripsi_buku = $data["deskripsi_buku"];
    $rilis_buku = date("Y-m-d h:m:s");

    $queryBook = "SELECT * FROM products WHERE judul_buku = '$judul_buku'";
    $dataBook = mysqli_query($db, $queryBook);
    if (mysqli_fetch_assoc($dataBook)) {
        setcookie("error_form", 'Buku Sudah Ada!', time() + 1);
        header("Location: create-product.php");
        return false;
    }

    if (empty($judul_buku)) {
        setcookie("error_form", 'Judul Buku wajib di isi!', time() + 1);
        header("Location: create-product.php");
    } else if (empty($kategori_buku)) {
        setcookie("error_form", 'Kategori buku juga wajib di isi!', time() + 1);
        header("Location: create-product.php");
    } else if (empty($harga_buku)) {
        setcookie("error_form", 'Harga buku juga ya!', time() + 1);
        header("Location: create-product.php");
    } else if (empty($pembuat_buku)) {
        setcookie("error_form", 'Pembuat nya juga, penting soalnya!', time() + 1);
        header("Location: create-product.php");
    } else if (empty($deskripsi_buku)) {
        setcookie("error_form", 'Deskripsi juga di isi ya!', time() + 1);
        header("Location: create-product.php");
    }


    $queryCreateBook = "INSERT INTO products VALUES(id_product,'$judul_buku','$kategori_buku','$harga_buku','$pembuat_buku','$deskripsi_buku','$rilis_buku')";

    mysqli_query($db, $queryCreateBook);
    return mysqli_affected_rows($db);
}


function deleteCartBook($id)
{
    global $db;

    $queryDeleteCartBook = "DELETE FROM products WHERE id_product = '$id'";
    mysqli_query($db, $queryDeleteCartBook);
    return mysqli_affected_rows($db);
}

function createCheckout($data)
{
    global $db;
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $tipe_pembayaran = htmlspecialchars($data["tipe_pembayaran"]);
    $id_ongkir = htmlspecialchars($data["id_ongkir"]);
    $nama_buku = htmlspecialchars($data["nama_buku"]);
    $harga_buku = htmlspecialchars($data["harga_buku"]);
    $tanggalCheckout = date("Y-m-d h:m:s");
    $sqlOngkir = "SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'";
    mysqli_query($db, $sqlOngkir);

    if (empty($no_telp)) {
        setcookie("error_validation_checkout", 'Nomor Handphone nya di isi ya!', time() + 1);
        header("Location: checkout.php");
        return false;
    } else if (empty($alamat)) {
        setcookie("error_validation_checkout", 'Alamat nya juga ya!', time() + 1);
        header("Location: checkout.php");
        return false;
    }

    $sqlAlreadyCheckout = "SELECT * FROM checkout WHERE nama = '$nama'";
    $dataCheckout =  mysqli_query($db, $sqlAlreadyCheckout);

    if (mysqli_fetch_assoc($dataCheckout)) {
        setcookie("error_validation_checkout", 'sepertinya anda sudah melakukan checkout!', time() + 1);
        header("Location: checkout.php");
        return false;
    }

    $sqlCheckout = "INSERT INTO checkout VALUES(id_checkout,'$id_ongkir','$nama','$nama_buku','$email','$no_telp','$alamat','$harga_buku','$tipe_pembayaran','pending','$tanggalCheckout')";
    mysqli_query($db, $sqlCheckout);
    unset($_SESSION["keranjang"]);
    return mysqli_affected_rows($db);
}

function acceptBook($id)
{
    global $db;
    $queryAcceptOrder = "UPDATE checkout SET status_buku ='accept' WHERE id_checkout = '$id'";
    mysqli_query($db, $queryAcceptOrder);
    return mysqli_affected_rows($db);
}

function rejectBook($bookid)
{
    global $db;

    $queryRejectBook = "UPDATE checkout SET status_buku = 'reject' WHERE id_checkout ='$bookid'";
    mysqli_query($db, $queryRejectBook);
    return mysqli_affected_rows($db);
}
function editBook($data, $id)
{

    global $db;

    $judul_buku = $data["judul_buku"];
    $kategori_buku = $data["kategori_buku"];
    $harga_buku = $data["harga_buku"];
    $pembuat_buku = $data["pembuat_buku"];
    $deskripsi_buku = $data["deskripsi_buku"];
    $updateBuku = date("Y-m-d h:m:s");

    $findBook = "UPDATE products SET judul_buku = '$judul_buku', kategori_buku = '$kategori_buku', harga_buku = '$harga_buku', pembuat_buku = '$pembuat_buku', deskripsi_buku = '$deskripsi_buku', rilis_buku = '$updateBuku' WHERE id_product = '$id'";
    mysqli_query($db, $findBook);
    return mysqli_affected_rows($db);
}
function deleteBook($id)
{
    global $db;

    $queryDeleteBook = "DELETE FROM products WHERE id_product = '$id'";
    mysqli_query($db, $queryDeleteBook);
    return mysqli_affected_rows($db);
}
