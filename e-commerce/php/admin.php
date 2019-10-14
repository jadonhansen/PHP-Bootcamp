<!DOCTYPE html>
<htmL>
	<head>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<title>SurfLOCAL</title>
	</head>
	<body>

		<div class="admin-account-background">
			<div class="admin-background-layer">
				
			</div>
		</div>

		<div class="nav-section" id="custom-nav">
			<div class="nav-items">
				<ul>
					<li><a href="../index.html"><img src="../images/Logo.png" alt="My Logo" class="logo"></a></li>
					<li><a href="../index.html">Home</a></li>
					<li><a href="products.html">Products</a></li>
				</ul>
			</div>
		</div>
		<div class="admin-table" style="margin-top:100px">
			<table border="1" cellspacing="0" cellpadding="10">
      			<tr style="align=center">
          			<td>Name:</td>
          			<td>Surname:</td>
          			<td>Username:</td>
          			<td>Password:</td>
				</tr>
				<?php
					require '../php/db.php';
					$sql = "SELECT * FROM users";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_array($result)) {
						$name = $row['name_user'];
						$surname = $row['surname_user'];
						$username = $row['username_user'];
						$password = $row['password_user'];
				?>
					<tr style="align=center">
						<td><?php echo $name;?></td>
						<td><?php echo $surname;?></td>
						<td><?php echo $username;?></td>
						<td><?php echo $password;?></td>
					</tr>
				<?php } ?>
				</table>
		</div>

		<div class="content-section">
			<div class="admin-box">
				<div class="admin-box-inner-section">
					<div class="deletion_heading" style="text-align:center;">
						<h4>Account Deletion</h5>
					</div>
					<form action="admin_opt.php" method="post">
						<div class="input-section">
							<div class="input-tag">
								<h5>Enter an existing username</h5>
							</div>
							<input type="text" name="username" class="login-user" required>
						</div>
						<div class="input-section">
							<div class="input-tag">
								<h5>Enter the corresponding 'hashed' password</h5>
							</div>
							<input type="password" name="password" class="login-pass" required>
						</div>
                        <div class="input-section" style="text-align:center;">
                                <button type="submit" name="submit">Delete</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</body>
</html>