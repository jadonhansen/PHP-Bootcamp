<?PHP
foreach($_GET as $index => $second)
    $array[$index] = $second;
if ($array["action"] === "del")
    setcookie($array["name"], $array["value"], time() -1);
else if ($array["action"] === "get")
    echo $_COOKIE[$array["name"]];
else if ($array["action"] === "set")
    setcookie($array["name"], $array["value"], time()+60*60);
?>