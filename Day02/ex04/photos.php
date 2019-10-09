#!/usr/bin/php
<?php
if ($argc == 2){
    $ch = file_get_contents("https://".$argv[1]);
    preg_match_all('/<img src\s*=\s*"(.+?)"/', $ch, $line);
    print_r($line);
}
?>