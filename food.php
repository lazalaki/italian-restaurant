<?php

include_once "order_item.php";


class Food extends OrderItem
{
    const MIN_PRICE = 300;
    const MAX_PRICE = 600;
    public function __construct($name)
    {
        parent::__construct($name, $this->calculatePrice(self::MIN_PRICE, self::MAX_PRICE));
    }
}
