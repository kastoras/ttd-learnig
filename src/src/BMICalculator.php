<?php

class BMICalculator {

    private $BMI;
    private $mass;
    private $height;

    public function calculate()
    {
        return round($this->mass / pow($this->height, 2), 1); //2.1
    }

    public function getTextResultFromBMI()
    {
        if($this->BMI < 18) {
            return 'Underweight';
        }
        elseif ($this->BMI >= 18 && $this->BMI <= 25) {
            return 'Normal';
        }
        else{
            return 'Overweight';
        }
    }

    public function getBMI()
    {
        return $this->BMI;
    }

    public function setBMI($BMI)
    {
        $this->BMI = $BMI;
    }

    public function getMass()
    {
        return $this->mass;
    }

    public function setMass($mass)
    {
        $this->mass = $mass;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height):void
    {
        $this->height = $height;
    }
}