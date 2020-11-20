<?php

include_once "logger.php";

class Reciept
{
    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
        $logger = Logger::getInstance();
        $logger->logMessage('Racun: sto broj ' . $this->order->getTableNumber() . ", naplata " . $this->order->getTotalPrice() . "RSD");
    }

    public function getOrder()
    {
        return $this->order;
    }
}
