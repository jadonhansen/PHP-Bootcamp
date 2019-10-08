#!/usr/bin/php
<?php
if ($argc > 1)
{
    $string = $argv[1];
    $array = preg_split("/[\s,]+/", $string);
    $i = 1;
    while ($array[$i])
    {
      echo $array[$i], "\n";
      $i++;
    }
    echo $array[0], "\n";
}
?>