<?php
class order
{
    private $OrderID;
    private $CustomerID;
    private $Date;
    private $Total;
    private $Note;

    public function __construct($OrderID, $CustomerID, $Date, $Total, $Note)
    {
        $this->OrderID = $OrderID;
        $this->CustomerID = $CustomerID;
        $this->Date = $Date;
        $this->Total = $Total;
        $this->Note = $Note;
    }
    //    public function __construct() {
    //        
    //    }

    public static function getAllOrder($cusID)
    {
        include "../vegetable/connection.php";
        $querysql = mysqli_query($con, "SELECT * FROM orders WHERE CustomerID = '$cusID'");
        if (mysqli_num_rows($querysql) > 0) {
            return $querysql;
        }
        return null;
    }

    public static function getOrderDetail($orderid)
    {
        include "../vegetable/connection.php";
        $querysql = mysqli_query($con, "SELECT * FROM orderdetail WHERE OrderID = '$orderid'");
        if (mysqli_num_rows($querysql) > 0) {
            return $querysql;
        }
        return null;
    }


    public function getOrderID()
    {
        return $this->OrderID;
    }

    public function getCustomerID()
    {
        return $this->CustomerID;
    }

    public function getDate()
    {
        return $this->Date;
    }

    public function getTotal()
    {
        return $this->Total;
    }

    public function getNote()
    {
        return $this->Note;
    }

    public function setOrderID($OrderID)
    {
        $this->OrderID = $OrderID;
    }

    public function setCustomerID($CustomerID)
    {
        $this->CustomerID = $CustomerID;
    }

    public function setDate($Date)
    {
        $this->Date = $Date;
    }

    public function setTotal($Total)
    {
        $this->Total = $Total;
    }

    public function setNote($Note)
    {
        $this->Note = $Note;
    }
}
