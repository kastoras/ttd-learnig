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

    public function testValidDataFormatRisky()
    {
        $user = new User('nikos', 'anthimidis');
        $this->assertSame('Nikos Anthimidis', $user->getFullName());
    }

    public function testValidDataFormat()
    {
        $user = new User('nikos', 'anthimidis');
        $mockedDB = new class extends Database{
            public function getEmailAndLastName()
            {
                echo 'no real db touched!';
            }
        };

        $setUserClosure = function () use ($mockedDB){
            $this->db = $mockedDB;
        };

        $executeGetUserClosure = $setUserClosure->bindTo($user, get_class($user));

        $executeGetUserClosure();

        $this->assertSame('Nikos Anthimidis', $user->getFullName());
    }

    public function testPasswordHashed()
    {
        $user = new User('nikos', 'anthimidis');

        $expected = 'Password hashed';

        $phpunit = $this;

        $assertClosure = function() use ($expected, $phpunit){
            $phpunit->assertSame($expected, $this->hashPassword());
        };

        $executeAssertClosure = $assertClosure->bindTo($user, get_class($user));

        $executeAssertClosure();        
    }

    public function testPasswordHashed2()
    {
        $user = new class('nikos', 'anthimidis') extends User {
            public function getHashedPassword()
            {
                return $this->hashPasswordProtected();
            }

        };

        $expected = 'Password hashed';

        $this->assertSame($expected, $user->getHashedPassword());
    }

}