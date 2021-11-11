<?php

class User{

    private $name;

    private $last_name;

    protected $name2;

    public function __construct($name, $last_name) {
        $this->name = ucfirst($name);
        $this->last_name = ucfirst($last_name);        
        $this->name2 = ucfirst($name);
    }

    public function getFullName()
    {
        return $this->name.' '.$this->last_name;
    }
}