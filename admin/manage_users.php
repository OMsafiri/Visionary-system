<?php
require_once('../database/connection.php');
require_once('../includes/functions.php');

	// check if the user is authenticated
isAuth();
$message = "";
$message = $_SESSION['message'];

	// initialize database connection
$instance = openConnection();

	// get data for authenticated user
$user = getUser($instance, $_SESSION['userId']);
$username = $user['username'];

$users = get_all_users($instance);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin - User Management</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/default.css">
</head>
<body>
	<?php require_once('../partials/navbar.php'); ?>

	<div class="container space-top mt-5">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="">User Management</h2>
				<h6 class="text-muted">A starting place for user management tasks.</h6>
			</div>
			<div class="col-md-12">
				<?php echo $message; unset($_SESSION['message']); ?>
			</div>
		</div>
		<div class="row d-flex justify-content-center mt-5">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<h4 class="m-0">Registered Users <?php echo 3; ?></h4>
						<div>
							<a href="./" class="btn btn-sm btn-outline-primary">Home</a>
							<a href="register_user.php" class="btn btn-sm btn-outline-primary">Register System User</a>
						</div>
					</div>
					<table class="table align-items-center">
						<head>
							<tr>
								<th>Firstname</th>
								<th>Lastname</th>
								<th>Gender</th>
								<th>Mobile</th>
								<th>Email</th>
								<th>Username</th>
								<th>role</th>
								<th>Actions</th>
							</tr>
						</head>
						<tbody>

							<?php  foreach($users as $user): ?>
								<tr>
									<td><?php echo $user['firstName']; ?></td>
									<td><?php echo $user['lastName']; ?></td>
									<td><?php echo $user['gender']; ?></td>
									<td><?php echo $user['mobileNumber']; ?></td>
									<td><?php echo $user['emailAddress']; ?></td>
									<td><?php echo $user['username']; ?></td>
									<td><span class="badge badge-warning">
										<?php echo $user['role'];?></span>
									</td>
									<td>
										<span class="mr-2">
											<a href="edit_user.php?id=<?php echo $user['id']; ?>" class=""><i class="fas fa-edit"></i>
											</a>
										</span>
										<span>
											<a href="delete_user.php?id=<?php echo $user['id']; ?>" class="text-danger"><i class="fas fa-trash"></i>
											</a>
										</span>
									</td>
								</tr>

							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script src="../assets/js/jquery-3.4.1.slim.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>