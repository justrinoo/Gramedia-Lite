<?php
session_start();
require('../app.php');
$productBook = querySql("SELECT * FROM products ORDER BY id_product ASC");


?>
<?php require('../partials/header.php'); ?>

<section style="background: #fff7ed; height: 100vh; color: #000;">
    <?php require('../partials/navigation.php'); ?>
    <?php require('../partials/hero.php'); ?>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-3">
                <h3 class="fw-bold">Fakta Artikel Tentang Buku</h3>
                <div class="mt-4">
                    <h5>(+) Ada sekitar 129 juta buku tercetak di dunia</h5>
                    <p>Mengacu pada data algoritma Google yang dikutip dari Mashable, buku yang telah dicetak di semua era modern ini adalah 129 juta buku, dengan jumlah terhitung persisnya 129.864.880 buah buku. Walau bagaimana pun, Google mengakui perhitungannya belum sempurna, tetapi mereka dapat memastikan bahwa buku-buku yang terhitung tersebut adalah yang tercantum dalam ISBN (International Standard Book Number).</p>
                    <p>Sumber: <a href="https://literasinusantara.com/fakta-unik-tentang-buku/" class="text-decoration-none text-dark fw-bold">Literasi Nusantara</a></p>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <img src="../assets/images/reading-book-content.png" width="90%" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-3">
                <h3 class="fw-bold">Feature Gramedia Lite</h3>
                <div class="mt-4">
                    <img src="../assets/images/feature-app.png" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div style="margin-top: 70px;">
                    <h5>(-) Authentication User (Login & Register)</h5>
                    <h5>(-) Order Book</h5>
                    <h5>(-) History Order</h5>
                    <h5>(-) Multi User</h5>
                    <h5>(-) Control Order (Admin Page)</h5>
                    <h5>(-) CRUD Product (Admin Page)</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="background: url(../assets/images/bg-contact.svg); background-size: cover; height: 55vh;" class="position-relative d-flex justify-content-center text-center">
    <div style="margin-top: 150px;">
        <h3 class="fw-bold">Saya Siap bantu anda!!</h3>
        <h3 class="fw-bolder">Jangan ragu hubungi saya 😁</h3>
        <a href="https://t.me/riyaraa" class="text-decoration-none">
            <div class="mt-3">
                <img src="../assets/images/icons/telegram.svg" width="30" alt="">
                <span>Lets Talk</span>
            </div>
        </a>
        <div class="d-flex justify-content-center mt-4">
            <a href="https://github.com/riyaraa" class="text-decoration-none mx-3"><img src="../assets/images/icons/github.svg" width="30" alt="Github"> </a>
            <a href="https://twitter.com/riyaraaa" class="text-decoration-none mx-3">
                <img src="../assets/images/icons/twitter.svg" width="30" alt="">
            </a>
            <a href="https://instagram.com/rinosatyaputra_" class="text-decoration-none mx-3">
                <img src="../assets/images/icons/instagram.svg" width="30" alt="">
            </a>
            <a href="https://www.linkedin.com/in/rino-satya-putra-940539173/" class="text-decoration-none mx-3">
                <img src="../assets/images/icons/linkedin.svg" width="30" alt="">
            </a>
        </div>
    </div>
</section>