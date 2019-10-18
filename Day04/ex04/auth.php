<?php
    function auth($login, $passwd) {
        $temp = unserialize(file_get_contents("../private/passwd"));
        foreach ($temp as $current => $check) {
            if ($check['login'] === $login && $check['passwd'] === hash("whirlpool", $passwd)) {
                return true;
            }
        }
        return false;
    }
?>