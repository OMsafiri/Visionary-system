<?php
require_once('../database/connection.php');
require_once('../includes/functions.php');

	// check if the user is authenticated
isAuth();
$message ="";
$message = $_SESSION['message'];

	// initialize database connection
$instance = openConnection();

	// get data for authenticated user
$user = getUser($instance, $_SESSION['userId']);
$username = $user['username'];

$users = get_all_users($instance);
$contributions = get_all_contributions($instance);



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin - member contributions</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/default.css">
</head>
<body>
	<?php require_once('../partials/navbar.php'); ?>

	<div class="container space-top mt-5">
		
		<div class="container mt-5 space-top">
			<div class="row mt-5">
				<div class="col-md-12 text-center">
					<h2 class="">Members Contributions Dashboard</h2>
					<h6 class="text-muted">A starting place for administrator tasks.</h6>
				</div>
			</div>
			<div class="row d-flex justify-content-center mt-5">
				<div class="col-md-3">
					<div class="card">
						<div class="card-body text-center">
							<span><i class="text-primary fas fa-window-restore large"></i></span>
							<a class="nav-link" href="loan.php">Loans </a>
							<p>Manage organization members loans, view members loans and user auditing and reports</p>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card">
						<div class="card-body text-center">
							<span><i class="text-primary fas fa-window-restore large"></i></span>
							<a class="nav-link" href="rambirambi.php">Rambirambi </a>
							<p>Manage organization rambirambi,Together in Remembrance and Support </p>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card">
						<div class="card-body text-center">
							<span><i class="text-primary fas fa-window-restore large"></i></span>
							<a class="nav-link" href="faini.php">Fine Contributions</a>
							<p>Manage your current Fines, provided necessary for the Station.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<div class="card-body text-center">
							<span><i class="text-primary fas fa-window-restore large"></i></span>
							<a class="nav-link" href="summary.php">Summary </a>
							<p>Manage and Users and reports, manage various report for user management.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3" style="margin-top: 20px;">
				<div class="card">
					<div class="card-body text-center">
						<span><i class="text-primary fas fa-window-restore large"></i></span>
						<a class="nav-link" href="member_contributions2.php">Membership Contributions</a>
						<p>Manage your current work station, provided necessary for the Station.</p>
					</div>
				</div>
			</div>
			</div>
		</div>											
	</div>

	<script src="../assets/js/jquery-3.4.1.slim.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>