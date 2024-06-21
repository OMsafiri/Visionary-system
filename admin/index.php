<?php
require_once('../database/connection.php');
require_once('../includes/functions.php');

isAuth();
$user = getUser(openConnection(), $_SESSION['userId']);
$username = $user['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Visionary System.</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/default.css">
</head>
<body>
	<?php require_once('../partials/navbar.php'); ?>

	<div class="container mt-5 space-top">
		<div class="row mt-5">
			<div class="col-md-12 text-center">
				<h2 class="">Administrator Dashboard</h2>
				<h6 class="text-muted">A starting place for administrator tasks.</h6>
			</div>
		</div>
		<div class="row d-flex justify-content-center mt-5">
			<div class="col-md-3">
				<div class="card">
					<div class="card-body text-center">
						<span><i class="text-primary fas fa-user large"></i></span>
						<a class="nav-link" href="manage_members.php">Manage Members</a>
						<p>Manage organization members, view Registered members and user auditing and reports</p>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="card">
					<div class="card-body text-center">
						<span><i class="text-primary fas fa-bookmark large"></i></span>
						<a class="nav-link" href="manage_projects.php">Manage Projects</a>
						<p>Manage organization projects, view current projects and member reports</p>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="card">
					<div class="card-body text-center">
						<span><i class="text-primary fas fa-window-restore large"></i></span>
						<a class="nav-link" href="member_contributions.php">Manage Contribution</a>
						<p>Manage your current work station, provided necessary for the Station.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<div class="card-body text-center">
						<span><i class="text-primary fas fa-users-cog large"></i></span>
						<a class="nav-link" href="manage_users.php">Manage Users</a>
						<p>Manage and Users and reports, manage various report for user management.</p>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	

	<script src="assets/js/jquery-3.4.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>