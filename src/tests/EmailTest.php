<?php

use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

class EmailTest extends TestCase
{
  /**
   * @dataProvider emailsProvider
   */
  public function testValidEmail($email)
  {
    $this->assertMatchesRegularExpression('/^.+\@\S+\.\S+$/', $email);
  }

  public function emailsProvider()
  {
    return [
      ['tese@ds.gr'],
      ['tese@dsgr.fr'],
      ['tese@das.gr'],
    ];
  }

  /**
   * @dataProvider numbersProvider
   */
  public function testMath($a, $b, $expected)
  {
    $actual = $a * $b;

    $this->assertEquals($expected, $actual);
  }

  public function numbersProvider()
  {
    return [
      [1, 2, 2],
      [2, 2, 4],
      [3, 3, 9]
    ];
  }
}
