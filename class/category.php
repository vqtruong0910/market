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
class category
{
    //put your code here
    private $CategoryID;
    private $Name;
    private $Description;


    public function __construct($CategoryID, $Name, $Description)
    {
        $this->CategoryID = $CategoryID;
        $this->Name = $Name;
        $this->Description = $Description;
    }
    //    public function __construct() {
    //        
    //    }
    public static function getAll()
    {
        include "../vegetable/connection.php";
        $alltheloai = mysqli_query($con, "SELECT * FROM category");
        if (mysqli_num_rows($alltheloai) > 0) {
            return $alltheloai;
        }
        return null;
    }

    public static function add($cate)
    {
        include "../vegetable/connection.php";
        $cateid = $cate->getCategoryID();
        $name = $cate->getName();
        $description = $cate->getDescription();
        $queryrg = mysqli_query($con, "INSERT INTO category VALUES ('$cateid','$name','$description')");
        if (!$queryrg) {
            return false;
        } else {
            mysqli_close($con);
            return true;
        }
        return false;
    }

    public function getCategoryID()
    {
        return $this->CategoryID;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function getDescription()
    {
        return $this->Description;
    }

    public function setCategoryID($CategoryID): void
    {
        $this->CategoryID = $CategoryID;
    }

    public function setPassword($Name): void
    {
        $this->Name = $Name;
    }

    public function setDescription($Description): void
    {
        $this->Description = $Description;
    }
}
