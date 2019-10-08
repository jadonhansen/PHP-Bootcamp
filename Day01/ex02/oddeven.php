#!/usr/bin/php
<?php
$ans = 0;
echo "Enter a number: "; 
while ($ans = (fgets(STDIN)))
{
    $ans = trim($ans);
    if (is_numeric($ans))
    {
        if ($ans % 2 == 0)
            echo "The number $ans is even\n";
        else if (is_numeric($ans))
            echo "The number $ans is odd\n";        
    }
    else
        echo "'$ans' is not a number\n";
    echo "Enter a number: "; 
}
?>