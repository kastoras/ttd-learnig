<?php 

namespace AbstractClassesAndTraits;

abstract class PersonAbstract
{

    protected $firstName;

    protected $lastName;

    public function __construct($name, $lastName)
    {
        $this->firstName = $name;
        $this->lastName = $lastName;
    }

    abstract public function getSalary();

    public function showFullNameAndSalary()
    {
        return $this->firstName . ' ' . $this->lastName . ' earns ' . $this->getSalary() . ' per month'; 
    }
}