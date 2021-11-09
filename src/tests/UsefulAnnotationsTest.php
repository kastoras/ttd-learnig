<?php

use PHPUnit\Framework\TestCase;

class UsefulAnnotationsTest extends TestCase{

    private $value;

    /**
    * @before
    */
    public function runBeforeEachTestMethod()
    {
        $this->value = 1;
    }

    /**
     * @after
    */
    public function runAfterEachTestMethod()
    {
        //does nothing at this point
        //it can be used for example for db connection
        unset($this->value);
    }

    public function testAnnotation1()
    {
        $this->value++;

        $expected = 2;

        $actual = $this->value;

        $this->assertEquals($expected, $actual);
    }

    public function testAnnotation2()
    {
        $this->value++;

        $expected = 2;

        $actual = $this->value;

        $this->assertEquals($expected, $actual);
    }    
}