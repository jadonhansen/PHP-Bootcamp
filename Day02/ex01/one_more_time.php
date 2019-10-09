#!/usr/bin/php
<?PHP
    $i = 0;
    date_default_timezone_set("Europe/Paris");
    if($argc !== 2)
        return;
    preg_match('^(.undi|.ardi|.ercredi|.eudi|.endredi|.amedi|.imanche) (\d\d?) (.anvier|.évrier|.ars|.vril|.ai|.uin|.uillet|.out|.eptembre|.ctobre|.ovembre|.écembre) (\d\d\d\d) (\d\d):(\d\d):(\d\d)^', $argv[1], $matches);
    while($matches[$i])
        $i++;
    if($i != 8)
        echo("Wrong Format");
    else
    {
    if (strcmp("janvier", $matches[3] == 0))
        $m = 1;
    if (strcmp("Janvier", $matches[3] == 0))
        $m = 1;
    if (strcmp("février", $matches[3] == 0))
        $m = 2;
    if (strcmp("Février", $matches[3] == 0))
        $m = 2;
    if (strcmp("mars", $matches[3] == 0))
        $m = 3;
    if (strcmp("Mars", $matches[3] == 0))
        $m = 3;
    if (strcmp("avril", $matches[3] == 0))
        $m = 4;
    if (strcmp("Avril", $matches[3] == 0))
        $m = 4;
    if (strcmp("mai", $matches[3] == 0))
        $m = 5;
    if (strcmp("Mai", $matches[3] == 0))
        $m = 5;
    if (strcmp("juin", $matches[3] == 0))
        $m = 6;
    if (strcmp("Juin", $matches[3] == 0))
        $m = 6;
    if (strcmp("juillet", $matches[3] == 0))
        $m = 7;
    if (strcmp("Juillet", $matches[3] == 0))
        $m = 7;
    if (strcmp("aout", $matches[3] == 0))
        $m = 8;
    if (strcmp("Aout", $matches[3] == 0))
        $m = 8;
    if (strcmp("septembre", $matches[3] == 0))
        $m = 9;
    if (strcmp("Septembre", $matches[3] == 0))
        $m = 9;
    if (strcmp("octobre", $matches[3] == 0))
        $m = 10;
    if (strcmp("Octobre", $matches[3] == 0))
        $m = 10;
    if (strcmp("novembre", $matches[3] == 0))
        $m = 11;
    if (strcmp("Novembre", $matches[3] == 0))
        $m = 11;
    if (strcmp("décembre", $matches[3]) == 0)
        $m = 12;
    if (strcmp("Décembre", $matches[3]) == 0)
        $m = 12;
    echo(mktime($matches[5], $matches[6], $matches[7], $m, $matches[2], $matches[4])."\n");
    }
?>
