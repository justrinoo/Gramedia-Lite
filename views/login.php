<?php
session_start();

if (isset($_SESSION["user"])) {
    header("Location: index.php");
}

require('../app.php');

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $queryLogin = "SELECT * FROM users WHERE email = '$email'";
    $user =  mysqli_query($db, $queryLogin);

    if (mysqli_num_rows($user) === 1) {
        $data = mysqli_fetch_assoc($user);
        if (password_verify($password, $data["password"])) {
            if ($data["role"] === "buyyer") {
                $_SESSION["user"] = true;
                $_SESSION["nama"] = $data["nama"];
                $_SESSION["email"] = $data["email"];
                $_SESSION["role"] = $data["role"];
                header("Location: index.php");
            } else if ($data["role"] === "seller") {
                $_SESSION["user"] = true;
                $_SESSION["nama"] = $data["nama"];
                $_SESSION["role"] = $data["role"];
                header("Location: ./penjual/index.php");
            }
        }
    } else {
        echo "<script> alert('Email dan Password tidak ada!'); </script>";
    }
}




require('../partials/header.php');
?>
<?php require('../partials/navigation.php'); ?>

<section style="height: 70vh;">
    <div class="container">
        <div class="mt-5">
            <div class="card" style="width: 90%; margin: auto;">
                <div class="card-header d-flex">
                    <h5 class="mr-auto">Login Dulu Yu!</h5>
                    <span class="mx-auto"></span>
                    <a href="daftar.php" class="text-decoration-none float-end">
                        <p>Buat akun disini!</p>
                    </a>
                </div>
                <div class="card-body">
                    <?php isset($_COOKIE["error_login"]) ? $error_login = $_COOKIE["error_login"] : $error_login = null ?>

                    <?php if ($error_login) : ?>
                        <div class="alert alert-danger">
                            <p><?= $error_login; ?></p>
                        </div>
                    <?php endif; ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control mt-2" name="email" id="email" placeholder="eren@mail.com" autocomplete="off">
                        </div>
                        <div class="form-group mt-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control mt-2" name="password" id="password" placeholder="***********" autocomplete="off">
                        </div>
                        <div class="form-group mt-2 ">
                            <button type="submit" class="btn btn-outline-dark mt-2 w-100" name="login">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require('../partials/footer.php'); ?>