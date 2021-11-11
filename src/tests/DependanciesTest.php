<?php

use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

class DependanciesTest extends TestCase
{

  private $value;

  public function testFirstTest()
  {
    $this->value = 1;
    $this->assertEquals(1, $this->value);
    return $this->value;
  }

  /**
   * @depends testFirstTest
   */
  public function testDependancy1($value)
  {
    $value++;
    $expected = 2;
    $result = $value;
    $this->assertEquals($expected, $result);

    return $value;
  }

  /**
   * @depends testDependancy1
   */
  public function testDependancy2($value)
  {
    $value++;
    $expected = 3;
    $result = $value;
    $this->assertEquals($expected, $result);

    return $value;
  }
}
