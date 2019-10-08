#!/usr/bin/php
<?php
function ft_split($string)
{
    $array = preg_split("/[\s,]+/", $string);
    sort($array);
    return ($array);
}
?>