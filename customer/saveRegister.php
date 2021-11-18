<?php
require '../class/customer.php';
$error = false;
if (isset($_POST['register'])) {
    if (empty($_POST['fullname']) || empty($_POST['passwd']) || empty($_POST['address']) || empty($_POST['city'])) {
        $error = 'Xin hãy điền đầy đủ thông tin đăng ký';
    } else {
        $fullname = $_POST['fullname'];
        $passwd = $_POST['passwd'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        /** @var type $fullname */
        $cus = new customer(NULL, $passwd, $fullname, $address, $city);
        if(customer::add($cus) == 2) {
            header('location:../customer/login.php');
        } else if(customer::add($cus) == 1){
            $error = 'Tài khoản đã tồn tại!!!';
        } else {
            $error = 'Tạo không thành công đã có lỗi xảy ra';
        }
    }
}
