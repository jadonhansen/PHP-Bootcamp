#!/usr/bin/php
<?php
if ($argc !== 4)
{
    echo "Incorrect Parameters\n";
    exit;
}
else
{
    if (trim($argv[2]) == "+")
        echo trim($argv[1]) + trim($argv[3]), "\n";
    else if (trim($argv[2]) == "-")
        echo trim($argv[1]) - trim($argv[3]), "\n";
    else if (trim($argv[2]) == "*")
        echo trim($argv[1]) * trim($argv[3]), "\n";
    else if (trim($argv[2]) == "/")
        echo trim($argv[1]) / trim($argv[3]), "\n";
    else if (trim($argv[2]) == "%")
        echo trim($argv[1]) % trim($argv[3]), "\n";
}
?>