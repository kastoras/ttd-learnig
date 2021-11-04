<?php

use PHPUnit\Framework\TestCase;

class BMICalculatorTest extends TestCase{

    public function testShowsUnderweightWhenBmiLessThan18()
    {
        $expected = 'Underweight';

        $BMICalc = new BMICalculator();
        $BMICalc->setBMI(10);

        $result = $BMICalc->getTextResultFromBMI();

        $this->assertSame($expected, $result);
    }

    public function testShowsNormalWhenBmiBetween1825()
    {
        $expected = 'Normal';

        $BMICalc = new BMICalculator();
        $BMICalc->setBMI(24);

        $result = $BMICalc->getTextResultFromBMI();

        $this->assertSame($expected, $result);
    }

    public function testShowsOverweightWhenBmiGreaterThan25()
    {
        $expected = 'Overweight';

        $BMICalc = new BMICalculator();
        $BMICalc->setBMI(28);

        $result = $BMICalc->getTextResultFromBMI();        

        $this->assertSame($expected, $result);
    }

    public function testCanCalculatorCorrectBmi()
    {
        $expected = 39.1;

        $BMICalc = new BMICalculator();
        $BMICalc->setMass(100);
        $BMICalc->setHeight(1.6);

        $result = $BMICalc->calculate();

        $this->assertEquals($expected, $result);
    }
}