<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Market online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" 
                data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
    </nav>
</body>

</html>