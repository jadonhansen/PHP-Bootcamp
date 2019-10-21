<?php
	session_start();
	if (!$_SESSION['login'])
		echo "ERROR: You are not authorised to view this chat!";
	else if (file_exists("../private") && file_exists('../private/chat')) {
		$data = unserialize(file_get_contents('../private/chat'));
		foreach ($data as $line => $k) {
			echo "[" . date("H:i", $k['time']) . "]" . " <b>" . $k['login'] . "</b>: " . $k['msg'] . "<br />";
			echo PHP_EOL;
		}
	}
?>