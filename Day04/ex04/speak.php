<?php
require 'chat.php';
date_default_timezone_set("Africa/Johannesburg");	
if ($_POST['msg'] && $_SESSION['login'] && $_POST['submit'] === "OK") {
	if (!file_exists('../private/chat'))
		file_put_contents('../private/chat', "");
	if (authenticate($_SESSION['login'])) {
		$data = unserialize(file_get_contents('../private/chat'));
		$file = fopen('../private/chat',"w");
		$tmp['login'] = $_SESSION['login'];
		$t = time();
		$tmp['date'] = date("G",$t);
		$tmp['msg'] = $_POST['msg'];
		$data[] = $tmp;
		if (flock($file, LOCK_EX)) {
			file_put_contents('../private/chat', serialize($data));
			flock($file, LOCK_UN);
		}
		else
			echo "<script>alert('Error locking file!')</script>";
		fclose($file);
	}
}
?>

<html>
	<head>
		<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
	</head>
	<body>
		<form method="POST" action='speak.php'>
			<input type='text' name='msg' width="60%">
			<button type='submit' name='submit' value='OK'>SEND</button>
		</form>
	</body>
</html>