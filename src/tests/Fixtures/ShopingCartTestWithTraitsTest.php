<?php

use PHPUnit\Framework\TestCase;

class ShopingCartTestWithTraitsTest extends TestCase
{
    use DatabaseTrait;
    use ShoppingCartFixturesTrait;

    public function testCorrectNumberOfItems()
    {
        $this->cart->addItem('one');

        $expected = 1;

        $actual = $this->cart->getAmount();

        $this->assertEquals($expected,$actual);
    }

    public function testCorrectProductName()
    {
        $this->cart->addItem('Apple');
        $this->assertContains('Apple', $this->cart->getCartItems());
    }
    
}

