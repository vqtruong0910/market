<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <?php
    require "../class/vegetable.php";
    require "../class/category.php";
    include "./menu.php";
    ?>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <?php $category = category::getAll();
                    if ($category != null) {
                    ?>
                        <form action="" method="POST">
                            <div class="menuleft">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Category Name:</h5>
                                    </div>
                                </div>
                                <?php
                                while ($rows = mysqli_fetch_assoc($category)) {
                                ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="checkbox" name="category[<?= $rows['CategoryID'] ?>]" id="" value="<?= $rows['CategoryID'] ?>">
                                            <span><?= $rows['Name'] ?></span>
                                        </div>
                                    </div>
                                <?php } ?>
                                <input type="submit" value="Filter" class="btn btn-warning">
                            </div>
                        </form>
                    <?php } else { ?>
                        <h4 style="color: #dc3545;">Không có dữ liệu về Category</h4>
                    <?php } ?>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Vegetable</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        if (isset($_POST['category'])) {
                            $product = vegetable::getListByCateIDs($_POST['category']);
                        } else {
                            $product = vegetable::getAll();
                        }
                        if ($product != null) {
                            while ($row = mysqli_fetch_assoc($product)) {
                        ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="..\images\<?= $row['Image'] ?>" class="card-img-top" style="height: 180px;" alt="..." />
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $row['VegetableName'] ?> <span class="badge bg-warning" style="color: white;"><?= $row['Price'] ?>đ</span></h5>
                                            <?php if ($row['Amount'] > 0) { ?>
                                                <a href="../cart/index.php?action=add&sanpham=<?= $row['VegetableID'] ?>" class="btn btn-danger">Buy</a>
                                            <?php } else { ?>
                                                <a href="javascript:alert('Sản phẩm này đã hết');" class="btn btn-danger">Đã hết</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <h3 style="color: #dc3545;">Không có sản phẩm nào *_*.</h3>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>