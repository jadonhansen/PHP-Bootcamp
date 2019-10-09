#!/usr/bin/php 
<?PHP
    date_default_timezone_set("Europe/Paris");
    $fd = fopen("/var/run/utmpx", "r");
    $users = array();
    while ($line = fread($fd, 628)) {
        $line = unpack("a256user/a4id/a32line/ipid/itype/I2time", $line);
        if (($line['type'] ==  "7"))
            printf("%s %s %s\n", $line['user'], $line['line'], date(" M  j H:i", $line['time1']));
    
    }
?>
