<?php

if (isset($_POST['createaccount'])){
	require 'db.php';

	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username) || empty($surname) || empty($name) || empty($password)){
		$location = "../pages/create.html?error=emptyfileds&username=$username&name=$name&surname=$surname";
		header("Location: " . $location);
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !preg_match("/^[a-zA-Z0-9]*$/", $name) && !preg_match("/^[a-zA-Z0-9]*$/", $surname)) {
		$location = "../pages/create.html?error=invalidinput";
		header("Location: " . $location);
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$location = "../pages/create.html?error=invalidinput&name=$name&surname=$surname";
		header("Location: " . $location);
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
		$location = "../pages/create.html?error=invalidinput&username=$username&surname=$surname";
		header("Location: " . $location);
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $surname)) {
		$location = "../pages/create.html?error=invalidinput&username=$username&name=$name";
		header("Location: " . $location);
		exit();		
	}
	else {
		$sql = "SELECT username_user FROM users WHERE username_user=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo "<script>window.open('../pages/create.html?error=sqlerror','_self')</script>";
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$result = mysqli_stmt_num_rows($stmt);
			if ($result > 0) {
				echo "<script>alert('Username taken! Please use a different one.')</script>";
				echo "<script>window.open('../pages/create.html?error=usernametaken&name=$name&surname=$surname','_self')</script>";
				exit();
			}
			else {
				$sql = "INSERT INTO users (name_user, surname_user, username_user, password_user) VALUES (?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo "<script>window.open('../pages/create.html?error=sqlerror','_self')</script>";
					exit();
				}
				else {
					$hashed = hash("whirlpool", $password);
					mysqli_stmt_bind_param($stmt, "ssss", $name, $surname, $username, $hashed);
					mysqli_stmt_execute($stmt);
					session_start();
					$_SESSION['username'] = $username;
					echo "<script>alert('Welcome $username')</script>";
					echo "<script>window.open('../index.html?signup=success','_self')</script>";
					exit();
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else {
	echo "<script>window.open('../pages/create.html','_self')</script>";
	exit();	
}