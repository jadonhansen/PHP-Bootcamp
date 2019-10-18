<?php
    session_start();
    
    $oldpass = hash('whirlpool', $_POST['oldpw']);
    $newpass = hash('whirlpool', $_POST['newpw']);
    $i = 0;
    $array = [];
    if ($_POST["login"] && $_POST["newpw"] && $_POST["oldpw"] && $_POST["submit"] === "OK") {
        $usr = $_POST['login'];
        if (!file_exists("../private"))
            mkdir("../private");
        if (file_exists("../private/passwd")){
            $content = file_get_contents("../private/passwd");
            $array =  unserialize($content);
            foreach ($array as $account => $login){
                if ($usr === $account){
                    $i = 1;
                }
            }
        }
        $file = '../private/passwd';
        if ($i && $oldpass === $array[$usr]){
            $array[$usr] = $newpass;
            file_put_contents($file, serialize($array));
            echo "OK";    
        }
        else{
            echo "ERROR\n";
        }
    }
    else
        echo "ERROR\n";
?>