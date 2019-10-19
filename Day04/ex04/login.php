<?php
    require 'auth.php';
    session_start();

    if ($_POST['login'] && $_POST['passwd'] && auth($_POST['login'], $_POST['passwd'])) {
		$_SESSION['login'] = $_POST['login'];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>42Chat</title>
    </head>
    <body style="background-image:url('https://wallpaperplay.com/walls/full/3/c/8/52790.jpg')">
	<body>	
		<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
        <iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
    </body>
</html>

<?php
    }
    else {
		$_SESSION['login'] = "";
        echo "<script>alert('Details entered have not been found!')</script>";
        echo "<script>window.open('index.html','_self')</script>";
    }
?>