<?php
$y = 22;
function sayHello($name)
{
    global $y;
    echo "$y<br>";
    echo "HELLO $name<br>";
}

sayHello("Long");
function sum($a = 0, $b = 0)
{
    return $a + $b;
}
$sum = sum(4, 3);
echo "Sum a + b = $sum<br>";
$multiply = fn ($a, $b) => $a * $b;

echo $multiply(3, 4);
