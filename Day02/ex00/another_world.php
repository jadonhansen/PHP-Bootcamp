#!/usr/bin/php
<?php
$str = $argv[1];
$str = trim(preg_replace("/\s+/", " " , $str));
print("$str\n");
?>
