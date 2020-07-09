<?php

require 'db.php';

if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	//add cart to cart table in db
}
else
	alert("Please login or create a user account before checking out!");