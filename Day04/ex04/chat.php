<?php
		session_start();
		function authenticate($user) {
			if (!file_exists("../private") || !file_exists('../private/passwd'))
				return false;
			else {
				$data = unserialize(file_get_contents('../private/passwd'));
				foreach ($data as $line => $k) {
					if ($k['login'] === $_SESSION['login'])
						return true;
				}
			}
		}
		function chat() {
			if (file_exists("../private") && file_exists('../private/chat') && authenticate($_SESSION['login'])) {
				$data = unserialize(file_get_contents('../private/chat'));
				foreach ($data as $line) {
					echo "[" . date('H:i', $line['time']) . "] <b>" . $line['login'] . "</b>: " . $line['msg'] . "<br />";
					// echo date("[H:i]", $k['time'])." <b>".$k['login']."</b>: ".$k['msg']."<br />".PHP_EOL;
				}
			}
		}
?>