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
                    <p>Mengacu pada data algoritma Google yang dikutip dari Mashable, buku yang telah dicetak di semua era modern ini adalah 129 juta buku, dengan jumlah terhitung persisnya 129.864.880 buah buku. Walau bagaimana pun, Google mengakui perhitungannya belum sempurna, tetapi mereka dapat memastikan bahwa buku-buku yang terhitung tersebut adalah yang tercantum dalam ISBN (International Standard Book Number</p>
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
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <h3 class="mt-5 text-center">Ada masalah saat pembelian buku? silahkan hubungi saya 😁</h3>
        <div class="text-center">
            <a href="https://t.me/riyaraa" class="btn btn-primary mt-3">
                <img src="../assets/images/icons/telegram.svg" width="30" alt="">
                <span>Lets Talk</span>
            </a>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffdeeb" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>

</section>