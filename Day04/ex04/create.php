<?php
    if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK") {
        if (!file_exists("../private")) {
            mkdir("../private");
        }
        if (!file_exists('../private/passwd')) {
            file_put_contents('../private/passwd', "");
        }
        $data = unserialize(file_get_contents('../private/passwd'));
        if ($data) {
            $check = 0;
            foreach ($data as $current => $me) {
                if ($me['login'] === $_POST['login'])
                    $check = 1;
            }
        }
        if ($check) {
            echo "<script>alert('ERROR: Username taken!')</script>";
            echo "<script>window.open('create.html','_self')</script>";
        } 
        else {
            $tmp['login'] = $_POST['login'];
            $tmp['passwd'] = hash('whirlpool', $_POST['passwd']);
            $data[] = $tmp;
            file_put_contents('../private/passwd', serialize($data));
            echo "OK\n";
            header("Location: index.html");
        }
    }
    else {
        echo "<script>alert('ERROR')</script>";
        echo "<script>window.open('create.html','_self')</script>";
    }
?>