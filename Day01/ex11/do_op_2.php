#!/usr/bin/php
<?php
if ($argc == 2){
    if (strpos($argv[1], "+")){
        $arr = explode("+", $argv[1]);
        $op = '+';
    }
    else if (strpos($argv[1], "-")){
        $arr = explode("-", $argv[1]);
        $op = '-';
    }
    else if (strpos($argv[1], "*")){
        $arr = explode("*", $argv[1]);
        $op = '*';
    }
    else if (strpos($argv[1], "/")){
        $arr = explode("/", $argv[1]);
        $op = '/';
    }
    else if (strpos($argv[1], "%")){
        $arr = explode("%", $argv[1]);
        $op = '%';
    }
    $num1 = trim($arr[0]);
    $num2 = trim($arr[1]);
    if (count($arr) != 2 || !(ctype_digit($num1)) || !(ctype_digit($num2))){
        print("Syntax Error\n");
        exit(0);
    }
    if ($op != '+' && $op != '-' && $op != '*' && $op != '/' && $op != '%' ){
        print("Syntax Error\n");
        exit(0);
    }
    if ($op == '+')
        print(($num1 + $num2)."\n");
    else if ($op == '-')
        print(($num1 - $num2)."\n");
    else if ($op == '*')
        print(($num1 * $num2)."\n");
    else if ($op == '%')
        print(($num1 % $num2)."\n");
    else if ($op == '/')
        print(($num1 / $num2)."\n");
}
else 
    print("Syntax Error\n");
?>