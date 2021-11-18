<?php
require '../class/category.php';
$error = false;
if (isset($_POST['AddCategory'])) {
    if (!empty($_POST['NameCate']) && !empty($_POST['Des'])) {
        $cate = new category('NULL', $_POST['NameCate'], $_POST['Des']);
        if(category::add($cate)) {
            // header('location: ./index.php');
            
        }
    }
    else {
        $error = 'Bạn cần điền đầy đủ thông tin!!!';
    }
}
