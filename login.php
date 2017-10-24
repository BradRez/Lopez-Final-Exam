<?php	
	require_once('connect.php');
	
	if (isset($_SESSION['user_session'])) {
		
		header('Location: index.php');
		exit;
	}

	if (isset($_POST['submit'])) {
		if (isset($_POST['username']) && isset($_POST['password'])) {
			if($user->login($_POST['username'], $_POST['password'])) {
				header('Location: index.php');	
				exit;
			}	
		}
	}
		

?>

<!Doctype html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href= "assets.css">
	<style>
     	.container
		{ 
			
			font-family: Courier;
			padding: none;
			width: 600px;
			height: 300px;
			color: #ff0000;
			margin-left: auto;
			margin-right: auto;
			text-align: center;
		}

		table {
			margin-left: auto;
			margin-right: auto;		
		}

		#message {
			margin-right: auto;
			margin-left: auto;
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
	<div class="container">
	
		<br>
		<br>
		<br>
		<h1><strong>PLEASE LOGIN</strong></h1>
		<hr>
		<br>
		<br>
		<div id="message">
			<?php 
				if (isset($_SESSION['message'])){
				 	echo $_SESSION['message'];	
					unset($_SESSION['message']);
			 	}
			?>		
		</div>
		<form action="" method = "POST"> <br>
		  	<table>
				<tr>
					<td>
						<input id="username" type="text" name="username" placeholder="Username" required></input> 
						
						<br><br>
						<input id="password " type="password" name="password" placeholder="Password" required> </input> 
						
						<br><br>
						
						<input type="submit" name="submit" value="Login">
					</td>
				</tr>
			</table>
		</form>
		<br><br>
		<p style="color: aqua;">Don't Have An Account?</p>
		<a href="register.php">Register Here</a>
 	</div>

</body>
</html>

