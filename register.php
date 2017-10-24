<?php 
	require_once('connect.php');

	if ($user->isLoggedIn()) {
		header('Location: index.php');
	}

	if (isset($_POST['submit'])) {		
		if ($_POST['password'] === $_POST['confirm_password']) {
			if($user->register($_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['password'])) {
				header('Location: login.php');
				exit;
			}
		} else {			
			$_SESSION['message'] = "Password do not match!";
		}
	}
	
?>
<!Doctype html>
<html>
<head>
	<title>REGISTER</title>
	<link rel="stylesheet" type="text/css" href= "assets.css">
	<style>
     	.container { 	
     		background-color: gray;
			font-style: Courier;
			color: yellow;
			padding: none;
			width: 50%;
			margin-left: auto;
			margin-right: auto;
		}

		table {
			margin-right: auto;
			margin-left: auto;
			text-align: center;
		}

		td {
			padding: 5px;
		}

		h1 {
			text-align: center;
		}

		#error {
			color: red;
			text-align: center;
		}

		input	{
			border-style: outset;
		}
		body {
			background-color: #000000 ;
		}
		a {
			font-family: Courier;
			font: #fff000;
			font-size: 15px;
		}
                  
	</style>


</head>
<body>
	<br>
	<br>
	<br>
	<div class="container">
	<h1><strong>Create an account</strong></h1>
	<hr>
		<br>
		<br>
		<div id="error">
			<?php 
				if (isset($_SESSION['message'])){
				 	echo $_SESSION['message'];
					unset($_SESSION['message']);
			 	}
			?>
		</div>
		<form action="" method="POST">
			<table>
				<tr>
					<td>
						<input id="first_name" type="text" placeholder= " First Name" name="first_name"  required> </center>
					</td>
				</tr>
				<tr>
					<td>
						<input id="last_name" type="text" placeholder= " Last Name" name="last_name"  required></center> 
					</td>
				</tr>
				<tr>
					<td>
						<input id="username" type="text"  placeholder=" Username"  name="username" required/></center>
					</td>
				</tr>
				<tr>
					<td>
						<input id="password " type="password" placeholder=" Password"  name="password" placeholder="  Password" required/></center>
					</td>
				</tr>
				<tr>
					<td>
						<input id="confirm_password " type="password" placeholder=" Confirm Password" name="confirm_password"  required> </input></center>	
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="submit" value="Register">
					</td>
				</tr>
				<tr>
					<td>
						<hr> <br><br>
						<a style="color: red;">Already have an account? </a><br>
						<a href="login.php">Login Here</a>
					</td>
				</tr>
			</table>
		<br>
		<br>

		</form>

	</div>
</body>
</html>