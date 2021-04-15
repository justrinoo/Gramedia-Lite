<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Book Store (<?= $_SESSION["role"]; ?>) </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                    <a class="nav-link" href="create-product.php">Create Product</a>
                    <a class="nav-link" href="history-order.php">History Order</a>
                </div>
                <div class="navbar-nav mr-auto">
                    <a href="../../auth/logout.php" class="nav-link">Logout</a>
                </div>

            </div>
        </div>
    </nav>

</header>