<?php
class detail
{
    private $OrderID;
    private $VegetableID;
    private $Quantity;
    private $Price;

    public function __construct($OrderID, $VegetableID, $Quantity, $Price)
    {
        $this->OrderID = $OrderID;
        $this->VegetableID = $VegetableID;
        $this->Quantity = $Quantity;
        $this->Price = $Price;
    }

    public function getOrderID()
    {
        return $this->OrderID;
    }

    public function getVegetableID()
    {
        return $this->VegetableID;
    }

    public function getQuantity()
    {
        return $this->Quantity;
    }

    public function getPrice()
    {
        return $this->Price;
    }

    public function setOrderID($OrderID)
    {
        $this->OrderID = $OrderID;
    }

    public function setVegetableID($VegetableID)
    {
        $this->VegetableID = $VegetableID;
    }

    public function setQuantity($Quantity)
    {
        $this->Quantity = $Quantity;
    }

    public function setPrice($Price)
    {
        $this->Price = $Price;
    }
}