<?php  
	require_once('connect.php');	

	if (!$user->isLoggedIn()) {
		header('Location: login.php');
	}

	$userData = $user->getUserData($_SESSION['user_session']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<style type="text/css">
		table, th, td{
			font-family: Courier;
			background-color: white;
			border: 1px solid black;
			margin-left: auto;
			margin-right: auto;		
			margin-top: 30px;
			margin-bottom: 30px;
		}
		body	{
			font-family: Helvetica;
			background-color: gray;
			margin-top: 100px;
			text-align: center;
		}
	</style>
</head>
<body>
	<?php 
		if (isset($_SESSION['message'])) {
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		} 
	?>	
	<h1>Welcome <?php echo  $userData->first_name . '!'; ?></h1>	
	<table>
		<tr>
			<th>First Name</th>	
			<th>Last Name</th>	
			<th>Username</th>	
		</tr>
		<tr>
			<td><?php echo $userData->first_name; ?></td>
			<td><?php echo $userData->last_name; ?></td>
			<td><?php echo $userData->username; ?></td>
		</tr>
	</table>

	<a>Want to update your account? Click: </a>
	<a href="update.php">Update</a><br>
	<a>Done? Click: </a>
	<a href="logout.php">Logout</a> 
</body>
</html>