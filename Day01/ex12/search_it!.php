#!/usr/bin/php
<?php
    if($argc > 2){
        $search = $argv[1];
        $array = [];
        for($i = 2; $i < $argc; $i++){
         $a = explode(":", $argv[$i]);
         $array[$a[0]] = $a[1];
        }
        if (array_key_exists($search, $array)){
            print($array[$search]."\n");
        }
    }
?>