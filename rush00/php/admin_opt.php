<?php

if (isset($_POST['submit'])){
	require 'db.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	if (empty($password) || empty($username)){
		echo "<script>window.open('admin.php?error=emptyfileds&username=$username','_self')</script>";
		exit();
	}
	else {
		$sql = "SELECT * FROM users WHERE password_user=? AND username_user=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "<script>window.open('admin.php?error=sqlerror','_self')</script>";
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "ss", $password, $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$result = mysqli_stmt_num_rows($stmt);
			if ($result > 0) {
				$sql = "DELETE FROM users WHERE username_user='$username'";
				$run_customer = mysqli_query($conn, $sql);
				echo "<script>alert('Account has been deleted!')</script>";
				echo "<script>window.open('admin.php','_self')</script>";
				exit();
			}
			else {
				echo "<script>alert('Could not be deleted for some reason! Please make sure you have entered a valid account in.')</script>";
				echo "<script>window.open('admin.php?delete=failure&username=$username','_self')</script>";
				exit();
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else {
	echo "<script>window.open('admin.php','_self')</script>";
	exit();
}

?>