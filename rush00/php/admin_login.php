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
		echo "<script>window.open('../pages/admin_login.html?error=emptyfileds&username=$username','_self')</script>";
		exit();
	}
	else {
		$sql = "SELECT * FROM admin_users WHERE password_user=? AND username_user=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "<script>window.open('../pages/admin_login.html?error=sqlerror','_self')</script>";
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "ss", $password, $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$result = mysqli_stmt_num_rows($stmt);
			if ($result > 0) {
				session_start();
				$_SESSION['username'] = $username;
				echo "<script>alert('Welcome $username!')</script>";
				echo "<script>window.open('admin.php?adminlogin=success','_self')</script>";
				exit();
			}
			else {
				echo "<script>alert('You are not an admin!')</script>";
				echo "<script>window.open('../pages/admin_login.html?login=failure&username=$username','_self')</script>";
				exit();
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else {
	echo "<script>window.open('../pages/admin_login.html','_self')</script>";
	exit();
}

?>