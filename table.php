<?php

include_once "unpaid_order_exception.php";

class Table
{
    protected $number;
    protected $orders = [];

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function createOrder($items)
    {
        foreach ($this->orders as $order) {
            if ($order->getReciept() == null) {
                throw new UnpaidOrderException('You have to pay your order');
            }
        }
        $order = new Order($this->number, $items);
        array_push($this->orders, $order);
        return $order;
    }
}
