<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testValidUserName()
    {
        $user = new User('nikos', 'anthimidis');

        $expected = 'Nikos';

        $phpunit = $this;

        $closure = function () use ($phpunit, $expected){
            $phpunit->assertSame($expected, $this->name);
        };

        $binding = $closure->bindTo($user, get_class($user));

        $binding();
        
    }

    public function testValidUserName2()
    {
        $user = new class('nikos','anthimidis') extends User{
            public function getName2()
            {
                return $this->name2;
            }
        };

        $this->assertSame('Nikos',$user->getName2());
    }
}