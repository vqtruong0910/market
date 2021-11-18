<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of customer
 *
 * @author Quang Truong
 */
class customer {
    //put your code here
    private $CustomerID;
    private $Password;
    private $FullName;
    private $Address;
    private $City;
    
    public function __construct($CustomerID, $Password, $FullName, $Address, $City) {
        $this->CustomerID = $CustomerID;
        $this->Password = $Password;
        $this->FullName = $FullName;
        $this->Address = $Address;
        $this->City = $City;
    }
//    public function __construct() {
//        
//    }
    public static function getByID($cusid) {
        include "../vegetable/connection.php";
        $querysql = mysqli_query($con, "SELECT * FROM customers WHERE CustomerID = '$cusid'");
        if (mysqli_num_rows($querysql) > 0) {
            $result = mysqli_fetch_assoc($querysql);
            return $result;
        }
        return null;
    }
    
    public static function add($cus) {
        include "../vegetable/connection.php";
        $id = $cus->getCustomerID();
        $fullname = $cus->getFullName();
        $passwd = $cus->getPassword();
        $address = $cus->getAddress();
        $city = $cus->getCity();
        $query = mysqli_query($con, "SELECT FullName FROM customers WHERE FullName = '$fullname'");
        if (mysqli_num_rows($query) > 0) {
            // 1 là trùng tên đăng nhập
            return 1;
        } else {
            $queryrg = mysqli_query($con, "INSERT INTO customers VALUES ('$id','$passwd','$fullname','$address','$city')");
            if (!$queryrg) {
                // sự cố dabase
                return false;
            } else {
                // thành công
                return 2;
            }
        }
        return false;
    }

    public function getCustomerID() {
        return $this->CustomerID;
    }

    public function getPassword() {
        return $this->Password;
    }

    public function getFullName() {
        return $this->FullName;
    }

    public function getAddress() {
        return $this->Address;
    }

    public function getCity() {
        return $this->City;
    }

    public function setCustomerID($CustomerID): void {
        $this->CustomerID = $CustomerID;
    }

    public function setPassword($Password): void {
        $this->Password = $Password;
    }

    public function setFullName($FullName): void {
        $this->FullName = $FullName;
    }

    public function setAddress($Address): void {
        $this->Address = $Address;
    }

    public function setCity($City): void {
        $this->City = $City;
    }
    
}
