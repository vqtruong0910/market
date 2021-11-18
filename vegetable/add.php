<?php
include '../vegetable/connection.php';
$error = false;
if (isset($_POST['AddVegetable'])) {
    if (!empty($_POST['NameVege']) && !empty($_POST['Unit']) && !empty($_POST['Amount']) && !empty($_POST['NameCategory']) && !empty($_POST['Price'])) {
        if (isset($_FILES["image"])) {
            $namevege = $_POST['NameVege'];
            $unit = $_POST['Unit'];
            $amount = $_POST['Amount'];
            $namecate = $_POST['NameCategory'];
            $price = $_POST['Price'];

            $target_dir = "../images/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $file_name = $_FILES["image"]["name"];
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            
            $check = getimagesize($_FILES["image"]["tmp_name"]);

            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $error = "File is not an image.";
                $uploadOk = 0;
            }
            
            if (file_exists($target_file)) {
                $error = "Sorry, file already exists.";
                $uploadOk = 0;
            }
            
            if ($_FILES["image"]["size"] > 2621440) {
                $error = "Sorry, your file is too large.";
                $uploadOk = 0;
            }
        
            if (
                $imageFileType != "jpg" &&
                $imageFileType != "png"
            ) {
                $error = "Sorry, only JPG, PNG files are allowed.";
                $uploadOk = 0;
            }
    
            if ($uploadOk == 0) {
                $error = "Sorry, your file was not uploaded.";
            
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $queryvege = mysqli_query($con, "INSERT INTO vegetable VALUES ('NULL','$namecate','$namevege','$unit','$amount','$file_name','$price')");
                    if (!$queryvege) {
                        $error = 'Thêm không thành công!!!';
                    } else {
                        echo "<script type='text/javascript'>alert('Successfull!');</script>";
                    }
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            $error = "Hãy chọn ảnh cho sản phẩm trên";
        }
    } else {
        $error = 'Xin hãy điền đầy đủ!!!';
    }
}
