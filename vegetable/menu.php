<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <div class="col-md-10">
            <a class="navbar-brand" href="#">Market online</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-md-2">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <!-- <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a> -->
                    <a class="nav-link" href="#">Vegetable</a>
                    <a class="nav-link" href="../cart/index.php">Cart</a>
                    <?php
                    if (!isset($_SESSION['iduser']) && !isset($_SESSION['username'])) {

                    ?>
                        <a class="btn btn-primary " type="submit" href="../customer/login.php">Login</a>
                    <?php
                    } else {
                    ?>
                        <a class="nav-link" href="../cart/history.php">History</a>
                        <a class="nav-link" href="../customer/logout.php">Logout</a>
                        <a class="btn btn-primary " type="submit" href="#"><?= $_SESSION['username'] ?></a>
                    <?php } ?>
                    <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                </div>
            </div>
        </div>
    </div>
</nav>