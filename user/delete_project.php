<?php
require_once('../database/connection.php');
require_once('../includes/functions.php');

	// check if the user is authenticated
isAuth();

	// initialize database connection
$instance = openConnection();
if(isset($_GET['id'])){
	$userid = $_GET['id'];
	$query = "DELETE FROM ".TBL_PROJECT." WHERE id = ?";
	$stmt = $instance->prepare($query);
	$stmt->bind_param("s", $userid);
	if($stmt->execute()){
		header('Location: manage_projects.php');
	}
}