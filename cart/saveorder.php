<?php

if (isset($_SESSION['iduser'])) {
    if (isset($_POST['click'])) {
        // xu ly du lieu lên database
        if (!empty($_SESSION['cart'])) {
            $product = mysqli_query($con, "SELECT * FROM vegetable WHERE VegetableID IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
            $total = 0;
            $orderProducts = array();
            while ($rows = mysqli_fetch_array($product)) {
                $orderProducts[] = $rows;
                $amount = $_SESSION['cart'][$rows['VegetableID']];
                $total += $rows['Price'] * $amount;
                if ($rows['Amount'] < $amount) {
                    echo "<script type='text/javascript'>alert('Thanh toán thất bại \nCó sản phẩm đã hết hàng');</script>";
                    echo "<a href='javascript:history.back();'>Quay Lại</a>";
                    exit;
                }
            }
            // tao du lieu cho bang orders

            $insertOrder = mysqli_query($con, "INSERT INTO `orders` (`OrderID`, `CustomerID`, `Date`, `Total`, `Note`) VALUES (NULL,'" . $_SESSION['iduser'] . "', '" . date("Y-m-d") . "', '" . $total . "', '" . $_POST['Notes'] . "')");
            // hàm insert_id là hàm lấy lại id của câu query phía trên
            $idorder = $con->insert_id;
            $insertString = "";
            
            foreach ($orderProducts as $keys => $product) {
                $totalproduct = $product['Price'] * $_SESSION['cart'][$product['VegetableID']];
                $insertString .= "('" . $idorder . "', '" . $product['VegetableID'] . "', '" . $_SESSION['cart'][$product['VegetableID']] . "', '" . $totalproduct . "')";
 
                if ($keys != count($orderProducts) - 1) {
                    $insertString .= ",";
                }
            }
            // tao du lieu cho bang order_detail
            $insertOrder = mysqli_query($con, "INSERT INTO `orderdetail` (`OrderID`, `VegetableID`, `Quantity`, `Price`) VALUES " . $insertString . "");
            if ($insertOrder) {
                foreach ($orderProducts as $keys => $product) {
                    $amount = $_SESSION['cart'][$product['VegetableID']];
                    // sản phẩm trong csdl - sản phẩm trong giỏ hàng
                    $reduce = $product['Amount'] - $amount;
                    $update = mysqli_query($con, "UPDATE `vegetable` SET `Amount` = '" . $reduce . "' WHERE `vegetable`.`VegetableID` = '" . $product['VegetableID'] . "'");
                }
                unset($_SESSION['cart']);
                echo "<script type='text/javascript'>alert('Bạn đã đặt hàng thành công');</script>";
            } else {
                echo "<script type='text/javascript'>alert('Thanh toán thất bại');</script>";
            }
        }
    }
} else {
    echo "<h1>Xin đăng nhập trước khi thanh toán. </h1><a href='javascript:history.back()'>Go Back</a>";
    exit;
}
