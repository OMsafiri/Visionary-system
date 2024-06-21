<?php

// a function which checks if a user is authenticated
function isAuth(){
	if($_SESSION['isAuth'] == false) {
		header('Location: ../');
	} 
}

function truncate($string){
	return preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, 60));
}

// this function will return a single user by a given userid
function get_all_users($connection){
	$query = "SELECT * FROM ".TBL_USER;
	$stmt = $connection->prepare($query);

	$stmt->execute();
	$result = $stmt->get_result();
	$users = $result->fetch_all(MYSQLI_ASSOC);

	return $users;
}

function get_all_projects($connection){
	$query = "SELECT * FROM ".TBL_PROJECT;
	$stmt = $connection->prepare($query);

	$stmt->execute();
	$result = $stmt->get_result();
	$projects = $result->fetch_all(MYSQLI_ASSOC);

	return $projects;
}

function getProject($connection, $projectid){
	$query = "SELECT * FROM ".TBL_PROJECT." WHERE id = ?";
	$stmt = $connection->prepare($query);
	$stmt->bind_param("s", $projectid);
	$stmt->execute();
	$result = $stmt->get_result();
	$project = $result->fetch_assoc();

	return $project;
}


// this function will return a single user by a given userid
function getUser($connection, $userid){
	$query = "SELECT * FROM ".TBL_USER." WHERE id = ?";
	$stmt = $connection->prepare($query);
	$stmt->bind_param("s", $userid);
	$stmt->execute();
	$result = $stmt->get_result();
	$user = $result->fetch_assoc();

	return $user;
}

// this function will return a single user by a given userid
function get_all_categories($connection){
	$query = "SELECT * FROM ".TBL_CATEGORY;
	$stmt = $connection->prepare($query);

	$stmt->execute();
	$result = $stmt->get_result();
	$categories = $result->fetch_all(MYSQLI_ASSOC);

	return $categories;
}

function get_category($connection, $category_id){
	$query = "SELECT * FROM ".TBL_CATEGORY." WHERE id = ?";
	$stmt = $connection->prepare($query);
	$stmt->bind_param("s", $category_id);
	$stmt->execute();
	$result = $stmt->get_result();
	$category = $result->fetch_assoc();

	return $category;
}

function get_all_members($connection){
	$query = "SELECT * FROM ".TBL_MEMBER;
	$stmt = $connection->prepare($query);

	$stmt->execute();
	$result = $stmt->get_result();
	$members = $result->fetch_all(MYSQLI_ASSOC);

	return $members;
}

function get_member($connection, $memberid){
	$query = "SELECT * FROM ".TBL_MEMBER." WHERE id = ?";
	$stmt = $connection->prepare($query);
	$stmt->bind_param("s", $memberid);
	$stmt->execute();
	$result = $stmt->get_result();
	$member = $result->fetch_assoc();

	return $member;
}

// this function will return users by a given stationid
function get_contribution_by_user($connection, $userId){
	$query = "SELECT * FROM ".TBL_CONTRIBUTION." WHERE user_id = ?";
	$stmt = $connection->prepare($query);
	$stmt->bind_param("s", $userId);
	$stmt->execute();
	$result = $stmt->get_result();
	$users = $result->fetch_all(MYSQLI_ASSOC);

	return $users;
}

function get_contribution_by_member($connection, $member_id, $category_id){
	$query = "SELECT * FROM ".TBL_CONTRIBUTION." WHERE user_id = ? AND category_id = ? ORDER BY id DESC LIMIT 1 ";
	$stmt = $connection->prepare($query);
	$stmt->bind_param("ss", $member_id, $category_id);
	$stmt->execute();
	$result = $stmt->get_result();
	$contribution = $result->fetch_assoc();

	return $contribution;
}


function get_all_contributions($connection){
	$query = "SELECT * FROM ".TBL_CONTRIBUTION;
	$stmt = $connection->prepare($query);

	$stmt->execute();
	$result = $stmt->get_result();
	$contributions = $result->fetch_all(MYSQLI_ASSOC);

	return $contributions;
}


function getArrCount ($arr, $depth=1) {
	if (!is_array($arr) || !$depth) return 0;
	$res=count($arr);
	foreach ($arr as $in_ar)
		$res+=getArrCount($in_ar, $depth-1);
	return $res;
}

function getFains($connection, $fainId){
	$query = "SELECT * FROM fain WHERE id = ?";
	$stmt = $connection->prepare($query);
	$stmt->bind_param("s", $fainId);
	$stmt->execute();
	$result = $stmt->get_result();
	$user = $result->fetch_assoc();

	return $user;
}

function getLoans($connection, $loanId){
	$query = "SELECT * FROM loans WHERE id = ?";
	$stmt = $connection->prepare($query);
	$stmt->bind_param("s", $loanId);
	$stmt->execute();
	$result = $stmt->get_result();
	$user = $result->fetch_assoc();

	return $user;
}

