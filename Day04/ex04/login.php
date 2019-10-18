<?php
    require 'auth.php';
    session_start();

    if ($_POST['login'] && $_POST['passwd'] && auth($_POST['login'], $_POST['passwd'])) {
        $_SESSION['loggued_on_user'] = $_POST['login'];
        echo "<script>window.open('speak.php','_self')</script>";
    }
    else {
        echo "<script>alert('Details entered have not been found!')</script>";
        echo "<script>window.open('index.html','_self')</script>";
    }
?>