<?php

use PHPUnit\Framework\TestCase;

class ErrorsExceptionsTest extends TestCase
{

  public function testErrorCanBeExpected(): void
  {
    //$this->expectError();
    //\trigger_error('foo', \E_USER_ERROR);

    $this->expectErrorMessage('foo');
    throw new Exception('foo');
  }

  public function testException()
  {
    $this->expectException(WrongBMIDataException::class);
    $BMICalculator = new BMICalculator();
    $BMICalculator->setMass(0);
    $BMICalculator->setHeight(1.6);
    $BMICalculator->calculate();
  }
}
