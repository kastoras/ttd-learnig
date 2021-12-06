<?php 

namespace AbstractClassesAndTraits;

class Employee extends PersonAbstract
{
    public function getSalary()
    {
        return 50 * 100; // $ * h
    }
}