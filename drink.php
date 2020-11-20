<?php

include_once "order_item.php";

class Drink extends OrderItem
{
    const MIN_VALUE = 150;
    const MAX_VALUE = 500;
    protected $volume;

    public function __construct($volume, $name)
    {
        parent::__construct($name, $this->calculatePrice(self::MIN_VALUE, self::MAX_VALUE));
        $this->volume = $volume;
    }
}
