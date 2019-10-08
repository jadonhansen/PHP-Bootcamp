#!/usr/bin/php
<?php
$i = 1;
$c = 0;

while ($i <= $argc)
{
    $string .= " $argv[$i]";
    $string = trim($string);
    $i++;
}

$array = preg_split("/[\s,]+/", $string);
sort($array);

while ($array[$c])
{
    echo $array[$c], "\n";
    $c++;
}
?>