<?php
    if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] === "OK") {
        $data = file_get_contents("../private/passwd");
        $unserialized = unserialize($data);
		foreach ($unserialized as $_ => $user)
        {
			if ($user['login'] == $_POST['login']) {
				if ($user['passwd'] === hash("whirlpool", $_POST['oldpw'])) {
					$unserialized[$_]["passwd"] = hash("whirlpool", $_POST['newpw']);
					file_put_contents("../private/passwd", serialize($unserialized));
					echo "OK\n";
					header("Location: index.html");
					exit(0);
				}
			}
		}
		echo "<script>alert('ERROR')</script>";
		echo "<script>window.open('modif.html','_self')</script>";
	}
	else {
		echo "<script>alert('ERROR')</script>";
		echo "<script>window.open('modif.html','_self')</script>";
	}
?>