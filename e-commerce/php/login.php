<?php

if (isset($_SESSION['username']) && ($_SESSION['username'] === $_POST['username']))
{
	echo "<script>alert('You are already logged in!')</script>";
	exit();
}

if (isset($_POST['submit'])){
	require 'db.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	if (empty($password) || empty($username)){
		echo "<script>window.open('../pages/login.html?error=emptyfileds&username=$username')</script>";
		exit();
	}
	else {
		$hashed = hash("whirlpool", $password);
		$sql = "SELECT * FROM users WHERE password_user=? AND username_user=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "<script>window.open('../pages/login.html?error=sqlerror','_self')</script>";
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "ss", $hashed, $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$result = mysqli_stmt_num_rows($stmt);
			if ($result > 0) {
				session_start();
				$_SESSION['username'] = $username;
				echo "<script>alert('Welcome $username!')</script>";
				echo "<script>window.open('../index.html?login=success&username=$username','_self')</script>";
				exit();
			}
			else {
				echo "<script>alert('Details entered have not been found!')</script>";
				echo "<script>window.open('../pages/login.html?login=failure&username=$username','_self')</script>";
				exit();
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else {
	echo "<script>window.open('../pages/login.html','_self')</script>";
	exit();
}

?>