<?php
	require_once('connect.php');

	if ($user->logout()) {
		header('Location: login.php');
	}

	echo "Something went wrong!";
?>