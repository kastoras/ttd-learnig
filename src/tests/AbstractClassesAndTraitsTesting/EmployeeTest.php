<?php

use AbstractClassesAndTraits\PersonAbstract;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{
    public function testFullName()
    {
        $mock = $this->getMockBuilder(PersonAbstract::class)
            ->setConstructorArgs(['Nikos', 'Anthimidis'])
            ->getMockForAbstractClass();

        $mock->expects($this->any())
            ->method('getSalary')
            ->will($this->returnValue(6000));

        $this->assertSame('Nikos Anthimidis earns 6000 per month',$mock->showFullNameAndSalary());
    }
}