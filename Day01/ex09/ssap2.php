#!/usr/bin/php
<?php
function sortmf($a, $b)
{
    $i = 0;
    $a = strtolower($a);
    $b = strtolower($b);
    while ($a[$i] && $b[$i])
    {
        $ora = ctype_alpha($a[$i])? 0 : (ctype_digit($a[$i])? 1 : 2);
        $orb = ctype_alpha($b[$i])? 0 : (ctype_digit($b[$i])? 1 : 2);
        if ($ora - $orb)
            return ($ora - $orb);
        else if ($a[$i] !== $b[$i])
            return ($a[$i] < $b[$i]? -1: 1);
        $i++;
    }
    return (($a[$i] == '\0')? -1: 1);
}

$i = 1;
$c = 0;

while ($i <= $argc)
{
    $string .= " $argv[$i]";
    $string = trim($string);
    $i++;
}

$array = preg_split("/[\s,]+/", $string);
usort($array, sortmf);

while ($array[$c])
{
    echo $array[$c], "\n";
    $c++;
}
?>