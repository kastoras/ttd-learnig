<?php

trait CustomAssertionTrait{

    public function assertArrayData(array $array)
    {
        foreach(['user','email','age'] as $key){
            $this->assertArrayHasKey($key, $array, "Array doesn`t contain the $key key");
        }

        $this->assertIsString($array['user'], 'User must be string');

        $this->assertMatchesRegularExpression('/^.+\@\S+\.\S+$/', $array['email'], 'Email fild must be valid email');

        $this->assertIsInt($array['age'], 'Age must be integer');
    }
}