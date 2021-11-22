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

        $product->setLoggerCallable(function(){
            echo 'Real logger was not called!';
        });

        $this->assertSame('product 1', $product->fetchProductById(1));
    }

    public function testAnother()
    {
        //stops execution
        $this->markTestIncomplete(
            'Not Implemented test'
        );

        if(!extension_loaded('xdebug')){
            //stops execution
            $this->markTestSkipped('The Xdebug extension is not available.');
        }

        $this->assertTrue(true);
    }
}