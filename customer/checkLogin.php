<?php
session_start();
include "../vegetable/connection.php";
$error = false;
if (isset($_POST['login'])) {
    //kiểm tra tên tài khoản đã điền vào chưa
    if (!empty($_POST['nameid']) && !empty($_POST['passwd'])) {
        $nameid = $_POST['nameid'];
        $passwd = $_POST['passwd'];
        $querysql = mysqli_query($con, "SELECT * FROM customers WHERE Password = '$passwd' AND FullName = '$nameid'");
        if (mysqli_num_rows($querysql) > 0) {
            $result = mysqli_fetch_assoc($querysql);
            $_SESSION['iduser'] = $result['CustomerID'];
            $_SESSION['username'] = $result['FullName'];
            header('location:../vegetable/index.php');
        } else {
          $error = 'Bạn đã nhập sai tài khoản hoặc mật khẩu';
        }
    } else {
        $error = 'Xin mới điền vào thông tin đăng nhập';
    }
}
