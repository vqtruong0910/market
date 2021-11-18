<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <?php
    session_start();
    require '../class/order.php';
    require '../class/vegetable.php';
    ?>
    <div class="container">
        <?php
        if (!empty($_SESSION['iduser']) && isset($_GET['OrderID'])) {
        ?>
            <h1>Order Detail</h1>
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:10%">#</th>
                        <th style="width:50%">Image</th>
                        <th style="width:8%">Name</th>
                        <th style="width:22%" class="text-center">Amout</th>
                        <th style="width:10%">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $detail = order::getOrderDetail($_GET['OrderID']);
                    if ($detail != null) {
                        $stt = 1;
                        $sum = 0;
                        while ($row = mysqli_fetch_assoc($detail)) {
                            $lisveg = vegetable::getListByVegeID($row['VegetableID']);
                            $vegetable = mysqli_fetch_assoc($lisveg);
                            $sum += $row['Price'];
                    ?>
                            <tr>
                                <td data-th="STT"><?= $stt++ ?></td>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-2 hidden-xs"><img src="../images/<?= $vegetable['Image'] ?>" alt="Sản phẩm 1" class="img-responsive" width="100"></div>
                                    </div>
                                </td>
                                <td data-th="Quantity" class="text-center"><?= $vegetable['VegetableName'] ?>
                                </td>
                                <td data-th="Subtotal" class="text-center"><?= $row['Quantity'] ?></td>
                                <td class="actions" data-th=""><?= $row['Price'] ?></td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td><a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-angle-left"></i>Quay lại</a>
                        </td>
                        <td colspan="2" class="hidden-xs"> </td>
                        <td class="hidden-xs text-center"><strong>Tổng tiền <?= $sum ?> Đ</strong>
                        </td>
                    </tr>
                </tfoot>
            </table>
        <?php } else { ?>
            <h1>Bạn chưa được sử dụng chức năng này</h1>
            <a href="javascript:history.back()">Quay lại</a>
        <?php } ?>
    </div>
</body>

</html>