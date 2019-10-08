#!/usr/bin/php
<?php
function ft_is_sort($array)
{
    $arr = $array;
    sort($arr);
    if ($arr == $array)
        return (TRUE);
    else
        return (FALSE);
}
?>