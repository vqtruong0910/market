<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <?php
    session_start();
    include '../vegetable/connection.php';
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (isset($_GET['action'])) {
        function update_cart($add = false)
        {
            $id = $_GET['sanpham'];
            if ($add) {
                if (!empty($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id] += 1;
                } else {
                    $_SESSION['cart'][$id] = 1;
                }
            }
        }
        switch ($_GET["action"]) {
            case "add":
                update_cart(true);
                header('location: ./index.php');
                break;
            case "delete":
                if (isset($_GET['id'])) {
                    unset($_SESSION['cart'][$_GET['id']]);
                }
                header('location: ./index.php');
                break;
            case "submit":
                include './saveorder.php';
                break;
        }
    }
    if (!empty($_SESSION["cart"])) {
        $product = mysqli_query($con, "SELECT * FROM vegetable WHERE VegetableID IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
    } else {
        $product = null;
    } ?>
    <div class="container">
        <form action="?action=submit" method="POST">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:50%">Tên sản phẩm</th>
                        <th style="width:10%">Giá</th>
                        <th style="width:8%">Số lượng</th>
                        <th style="width:22%" class="text-center">Thành tiền</th>
                        <th style="width:10%"> </th>
                    </tr>
                </thead>
                <?php
                if ($product != null) {
                    $totalall = 0;
                    while ($row = mysqli_fetch_assoc($product)) {
                ?>
                        <tbody>
                            <tr>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-2 hidden-xs"><img src="../images/<?= $row['Image'] ?>" alt="..." class="img-responsive" width="100">
                                        </div>
                                        <div class="col-sm-10">
                                            <h4 class="nomargin"><?= $row['VegetableName'] ?></h4>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price"><?= $row['Price'] ?> Đ</td>
                                <td data-th="Subtotal" class="text-center"><span><?= $_SESSION['cart'][$row['VegetableID']] ?></span></td>
                                <?php
                                $total = $row['Price'] * $_SESSION['cart'][$row['VegetableID']];
                                $totalall += $total;
                                ?>
                                <td data-th="Quantity" class="text-center"><span><?= $total ?> Đ</span>
                                </td>
                                <td class="actions" data-th="">
                                    <!-- <button class  ="btn btn-info btn-sm"><i class="fa fa-edit">Sửa</i>
                        </button> -->
                                    <a class="btn btn-danger btn-sm" href="./index.php?action=delete&id=<?= $row['VegetableID'] ?>"><i class="fa fa-trash-o">Xóa</i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                    <tfoot>
                        <tr>
                            <td><a href="../vegetable/index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                            </td>
                            <td colspan="2" class="hidden-xs"> </td>
                            <td class="hidden-xs text-center"><strong>Tổng tiền <?= $totalall ?> Đ</strong>
                            </td>
                            <td><input type="submit" name="click" value="Order" class="btn btn-success btn-block" /><i class="fa fa-angle-right"></i>
                            </td>
                        </tr>
                    </tfoot>
            </table>
            <div id="thongtin" style="text-align: end;">
                <hr>
                <?php if (!empty($error)) { ?>
                    <p style="color: red;margin-right: 20px;">*<?= $error ?></p>
                <?php } ?>
                <div style="margin: 20px;"><label>Ghi chú: </label> <textarea name="Notes" cols="100" rows="7"></textarea></div>
                <!-- <a href="" class="btn btn-dark btn-block">Thanh toán <i class="fa fa-angle-right"></i></a> -->
            </div>
        <?php } else { ?>
            <tfoot>
                <tr>
                    <td><a href="../vegetable/index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                    </td>
                    <td colspan="2" class="hidden-xs"> </td>
                    <td class="hidden-xs text-center"><strong>Tổng tiền 0 đ</strong>
                    </td>
                </tr>
            </tfoot>
        <?php } ?>
        </table>
        </form>
    </div>
</body>

</html>