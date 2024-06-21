<?php
	session_start();

	if(isset($_GET['value'])) {
		$value = $_GET['value'];

		unset($_SESSION['userId']);
		unset($_SESSION['isAuth']);
		unset($_SESSION['role']);

		session_destroy();
		header('Location: .');
	}

