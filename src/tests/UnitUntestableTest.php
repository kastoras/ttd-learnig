<?php

use PHPUnit\Framework\TestCase;

class UnitUntestableTest extends TestCase {

    public function testPerson()
    {
        $dataSource = new class extends DataSource{

            public function fetchQuote($person)
            {
                return '';    
            }
        };

        $obj = new UnitUntestable($dataSource);

        $this->assertSame('Albert Einstein', $obj->getPerson(0));

        $this->assertSame('Pope John Paul II', $obj->getPerson(1));

        $this->assertSame('Bill Gates',$obj->getPerson(2));
 
    }

    public function testBody()
    {
        $dataSource = new class extends DataSource{

            public function fetchQuote($person)
            {
                return '';    
            }
        };

        $obj = new UnitUntestable($dataSource);

        $this->assertStringContainsString('one the famous physicist', $obj->getBody(0));

        $this->assertStringContainsString('head of the Catholic Church and sovereign of the Vatican City', $obj->getBody(1));

        $this->assertStringContainsString('the co-founder of Microsoft Corporation',$obj->getBody(2));
    }

    public function testQuote()
    {
        $dataSource = new class extends DataSource{

            public function fetchQuote($person)
            {
                return '';    
            }
        };

        $obj = new UnitUntestable($dataSource);

        $obj->setRandomNamber(0);
        $this->assertSame('Today the quote from one the famous physicist Albert Einstein: ', $obj->getRandomQoute());

        $obj->setRandomNamber(1);
        $this->assertSame('Today the quote from head of the Catholic Church and sovereign of the Vatican City Pope John Paul II: ', $obj->getRandomQoute());

        $obj->setRandomNamber(2);
        $this->assertSame('Today the quote from the co-founder of Microsoft Corporation Bill Gates: ', $obj->getRandomQoute());

    }
}