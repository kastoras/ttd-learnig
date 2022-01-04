<?php

/**
 * Do not change this class. This is only for simulating the enviromnent.
 */
class DataSource {

    public $data = [

        'Albert Einstein' => [
            '"Insanity: doing the same thing over and over again and expecting different results."',
            '"Imagination is more important than knowledge."',
            '"Two things are infinite: the universe and human stupidity; and I\'m not sure about the universe."'
        ],

        'Pope John Paul II' => [
            '"Do not abandon yourselves to despair. We are the Easter people and hallelujah is our song."',
            '"The future starts today, not tomorrow."',
            '"As the family goes, so goes the nation and so goes the whole world in which we live."'
        ],

        'Bill Gates' => [
            '"Success is a lousy teacher. It seduces smart people into thinking they can\'t lose."',
            '"Your most unhappy customers are your greatest source of learning."',
            '"It\'s fine to celebrate success but it is more important to heed the lessons of failure."'
        ]
    ];

    public function fetchQuote($person)
    {
        $random = mt_rand(0,2);
        return $this->data[$person][$random];
    }
}

class RandomNumber {

    public function getBetween($first,$last)
    {
        return mt_rand($first,$last);
    }

}

/**
 * This is the class that you should refactor so that the entire internal logic is fully covered by unit test. You must not change the class functionality. It must work 100% the same.
 */
class UnitUntestable {

    private $dataSource;
    private $randomNumber;

    public function __construct($dataSource)
    {
        $this->dataSource = $dataSource;
    }

    public function setRandomNamber($number)
    {
        $this->randomNumber = $number;
    }

    public function getRandomQoute()
    {
        $body = $this->getBody($this->randomNumber);
        $person = $this->getPerson($this->randomNumber);
        $quote = $this->getQuote($person);

        return $body.$person.': '.$quote;
    }

    public function getPerson($number)
    {
        if($number == 0){
            return 'Albert Einstein';
        }

        if($number == 1){
            return 'Pope John Paul II';
        }

        if($number == 2){
            return 'Bill Gates';
        }
    }

    public function getBody($number)
    {
        $body = 'Today the quote from ';

        if($number == 0){
            return $body.'one the famous physicist ';
        }

        if($number == 1){
            return $body.'head of the Catholic Church and sovereign of the Vatican City ';
        }

        if($number == 2){
            return $body.'the co-founder of Microsoft Corporation ';
        }
    }

    public function getQuote($person)
    {        
        return $this->dataSource->fetchQuote($person);
    }
}


// example usage:
/*$obj = new UnitUntestable(new DataSource());

$number = (new RandomNumber())->getBetween(1,3);

$obj->setRandomNamber($number);

echo $obj->getRandomQoute();*/