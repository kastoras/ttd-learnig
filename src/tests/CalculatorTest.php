<?php

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{

    protected $calculator;        

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testAdd()
    {
        $a = $b = 1;

        $expected = 2;        

        $actual =  $this->calculator->add($a, $b);

        $this->assertSame($expected, $actual);
    }

    public function testSubtract()
    {
        $a = 2;
        $b = 1;

        $expected = 1;
        $actual = $this->calculator->subtract($a,$b);

        $this->assertSame($expected,$actual);
    }

    public function testMultiply()
    {
        $a = $b = 5;        
        $expected = 25;

        $actual = $this->calculator->multiply($a,$b);

        $this->assertSame($expected, $actual);
    }

    public function testMultiplyZero()
    {
        $a = 5;
        $b = 0;
        $expected = 0;

        $actual = $this->calculator->multiply($a,$b);

        $this->assertSame($expected, $actual);
    }

    public function testDivide()
    {
        $a = $b = 2;
        $expected = 1;

        $actual = $this->calculator->divide($a,$b);
        $this->assertSame($expected, $actual);
    }

    public function testDivideWithZero()
    {
        $this->expectException(DivisionByZeroError::class);
        
        $a = 2;
        $b = 0;

        $this->calculator->divide($a,$b);
    }
 
}