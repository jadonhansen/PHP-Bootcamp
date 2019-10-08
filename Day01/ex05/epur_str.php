#!/usr/bin/php
<?php
$c = 0;
$array = preg_replace("/[\s]+/", ' ',trim($argv[1]));
print ("$array\n");
?>