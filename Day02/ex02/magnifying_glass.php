#!/usr/bin/php
<?php
if ($argc == 2){
    $content = explode("\n", file_get_contents($argv[1]));
    foreach ($content as $line) {
        preg_match('/<a.*?>([^<]+)/',$line ,$matches);
        $line = str_replace($matches[1], strtoupper($matches[1]), $line);
        preg_match('/<a .*title="(.*)"/', $line ,$matches);
        $line = str_replace($matches[1], strtoupper($matches[1]), $line);
        echo $line, "\n";
    }
}
?>