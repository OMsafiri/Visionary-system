<?php
	session_start();
	require_once('constants.php');
	$connection = null;

	// open database connection
	function openConnection(){
		$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		if(!$connection){
			die('There was a connection issue');
		}
		return $connection;
	}


	function closeConnection(){
		//
	}