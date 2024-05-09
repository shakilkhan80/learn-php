<?php
use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';


$numbers = new Collection([
    1,
    2,
    3,
    4,
    5,
    6,
    7,
    8,
    9,
    10
]);

$lessThan5Equal = $numbers->filter(function ($number) {
    return $number <= 5;
});
var_dump($lessThan5Equal);