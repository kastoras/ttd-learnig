<?php

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase{

    public function testProduct()
    {
        //change this 
        //$product = new Product(new Session);

        //to that        
        $session = new class Implements SessionInterface{
            public function open(){}

            public function close(){}
        
            public function write($product){
                echo 'mocked writing to the session '. $product;
            }
        };
        $product = new Product($session);

        $this->assertSame('product 1', $product->fetchProductById(1));
    }
}