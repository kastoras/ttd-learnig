<?php

class ShopingCart
{

    public $cartItems = [];

    public $amount;

    public function addItem($item)
    {
        $this->cartItems[] = $item;
        $this->amount++;
    }
    
    public function getAmount()
    {
        return $this->amount;
    }

    public function getCartItems()
    {
        return $this->cartItems;
    }
}
