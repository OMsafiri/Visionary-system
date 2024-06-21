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
	<title>Member contributions</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/default.css">
</head>
<body>
	<?php require_once('../partials/navbar.php'); ?>

	<div class="container space-top mt-5">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="">Member Contribution</h2>
				<h6 class="text-muted">A starting place for contributions management tasks.</h6>
			</div>
			<div class="col-md-12">
				<?php echo $message; ?>
			</div>
		</div>
		
		<div class="row d-flex justify-content-center mt-5">
			<div class="col-md-3">
				<div class="card">
					<div class="card-body text-center">
						<span><i class="text-primary fas fa-window-restore large"></i></span>
						<a class="nav-link" href="matumizi.php">Expenses</a>
						<p>organization money,usege See expenses</p>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="card">
					<div class="card-body text-center">
						<span><i class="text-primary fas fa-window-restore large"></i></span>
						<a class="nav-link" href="mikopo.php">Loans</a>
						<p>Organization loans,view current loans</p>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="card">
					<div class="card-body text-center">
						<span><i class="text-primary fas fa-window-restore large"></i></span>
						<a class="nav-link" href="mapato.php">Incomes</a>
						<p>Manage your current incomes , provided necessary for the Station.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<div class="card-body text-center">
						<span><i class="text-primary fas fa-window-restore large"></i></span>
						<a class="nav-link" href="fain.php">Fines</a>
						<p>Manage your current fines , provided necessary for the Station.</p>
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