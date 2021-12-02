<?php
use PHPUnit\Framework\TestCase;
use forStubMockTesting\User;

class UserStubTest extends  TestCase {

  
    public function testCreateUser()
    {        
        //$user = new User();
        //$stub = $this->getMockBuilder(User::class)->getMock();
        //$stub->method('createUser')->willReturn('fake');

        // $user = new User;
        // $stub = $this->getMockBuilder(User::class)
        //  ->getMock(); // = $this->createStub(User::class); all methods return null by default unless mocked
        // $stub->method('save')->willReturn('fake');
         
        //$stub = $this->getMockBuilder(User::class)
        //  ->setMethods(null)
        //  ->getMock(); // works like a real object*/

        //https://phpunit.readthedocs.io/en/9.5/test-doubles.html?highlight=onlyMethods
        $stub = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['save'])
            ->getMock();

        $stub->method('save')->willReturn(true);

        $this->assertTrue($stub->createUser('Nikos', 'anthimidis@sga.gr'));
        $this->assertFalse($stub->createUser('Nikos', 'anthimidis@sgagr'));
    }

}
