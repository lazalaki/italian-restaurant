<?php

include_once "order_item.php";

class SideDish extends OrderItem
{
    const MIN_PRICE = 20;
    const MAX_PRICE = 100;
    public function __construct($name)
    {
        parent::__construct($name, $this->calculatePrice(self::MIN_PRICE, self::MAX_PRICE));
    }
}
