<?php 
	require_once('connect.php');

	if ($user->isLoggedIn()) {
		$user_id = $_SESSION['user_session'];

		$user_data = $user->getUserData($user_id);
	} else {
		header('Location: login.php');
		exit;
	}

	if (isset($_POST['submit'])) {		
		if ($_POST['password'] === $_POST['confirm_password']) {
			if($user->update($user_id, $_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['password'])) {
				header('Location: index.php');
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
	<title>UPDATE</title>
	<link rel="stylesheet" type="text/css" href= "asset/css/assets.css">
	<style>
     	.container { 	
     		background-color: black;
			font-family: Courier;
			color: aqua;
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
                  
	</style>

</head>
<body>
	<br>
	<br>
	<br>
	<div class="container">
	<h1><strong>Update account</strong></h1>
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
						<input id="first_name" type="text" placeholder= " First Name" name="first_name"  value="<?php echo $user_data->first_name; ?>" required> </center>
					</td>
				</tr>
				<tr>
					<td>
						<input id="last_name" type="text" placeholder= " Last Name" name="last_name" value="<?php echo $user_data->last_name; ?>" required></center> 
					</td>
				</tr>
				<tr>
					<td>
						<input id="username" type="text"  placeholder=" Username"  name="username" value="<?php echo $user_data->username; ?>" required/></center>
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
						<input type="submit" name="submit" value="Update">
						<a href="index.php"><input type="button" value="Cancel"></a>
					</td>
				</tr>
			</table>
		<br>
		<br>

		</form>

	</div>
</body>
</html>