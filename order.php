<?php

include_once "reciept.php";
include_once "logger.php";

class Order
{
    protected $tableNumber;
    protected $items;
    protected $totalPrice;
    protected $reciept = null;


    public function __construct($tableNumber, $items)
    {
        $this->tableNumber = $tableNumber;
        $this->items = $items;
        $logger = Logger::getInstance();
        $logger->logMessage("Porudzbina: sto broj " . $this->tableNumber);
    }

    public function getTableNumber()
    {
        return $this->tableNumber;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getReciept()
    {
        return $this->reciept;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    private function calculatePrice()
    {
        foreach ($this->items as $item) {
            $this->totalPrice += $item->getPrice();
        }
    }

    public function payReciept()
    {
        $this->calculatePrice();
        $this->reciept = new Reciept($this);
    }
}
