<?php
    if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] === "OK") {
        $data = file_get_contents("../private/passwd");
        $unserialized = unserialize($data);
        
        if ($unserialized) {
            $check = 0;
            foreach ($unserialized as $_ => $user)
            {
                if ($user['login'] !== $_POST['login'])
                    continue;
                if ($user['passwd'] === hash("whirlpool", $_POST['oldpw'])) {
                    $check = 1;
                    $unserialized[$_]["passwd"] = hash("whirlpool", $_POST['newpw']);
                    file_put_contents("../private/passwd", serialize($unserialized));
                    echo "<script>alert('OK')</script>"; //
                    header("Location: index.html");
                }
                else {
                    // echo "<script>alert('ERROR')</script>";
                    // echo "<script>window.open('modif.php','_self')</script>";
                }
            }
        }
        else {
            // echo "<script>alert('ERROR')</script>";
            // echo "<script>window.open('modif.php','_self')</script>";
        }
    }
    else {
        // echo "<script>alert('ERROR')</script>";
        // echo "<script>window.open('modif.php','_self')</script>";
    }
?>