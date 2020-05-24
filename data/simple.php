<?php
$array = [
    'hello',
    'world',
    'array' => [
        1,2,3
    ]

];

class Person
{
    private $id;
    protected $lastName;
    public $firstName;
    public $test;
}

$john = new Person();
$john->test = [
    1,2,3
];
$john->titi = 'hello world';
$john->firstName = 'john';

