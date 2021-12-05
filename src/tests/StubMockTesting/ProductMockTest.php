<?php

use forStubMockTesting\Logger;
use PHPUnit\Framework\TestCase;
use forStubMockTesting\Product;

class ProductMockTest extends TestCase
{

  public function testSaveProduct()
  {
    //$logger = new Logger(); //mock this
    //$loggerMock = $this->getMockBuilder(Logger::class)
    //  ->disableOriginalConstructor()
    //  ->onlyMethods(['log'])
    //  ->getMock();

    $loggerMock = $this->createMock(Logger::class);
    $loggerMock->expects($this->once())
      ->method('log')
      ->with(
        $this->equalTo('error'),
        $this->anything()
      );

    $product = new Product($loggerMock);

    $this->assertFalse($product->saveProduct('Panaspnic', 'price'));
  }

  public function testSaveProduct2()
  {
    $loggerMock = $this->createMock(Logger::class);

    $loggerMock->expects($this->exactly(2))
      ->method('log')
      ->withConsecutive(
        [$this->equalTo('notice'), $this->stringContains('greater than 10')],
        [$this->equalTo('success'), $this->stringContains('Product was saved')]
      );

    $product = new Product($loggerMock);
    $this->assertTrue($product->saveProduct('Panaspnic', 11));
  }
}
