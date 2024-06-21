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
			<div class="col-md-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<h4 class="m-0">Member Contribution.</h4>
						<div>
							<a href="./" class="btn btn-sm btn-outline-primary">Home</a>
							<a href="register_contribution.php" class="btn btn-sm btn-outline-primary">Add Contribution</a>
						</div>
					</div>

					<?php

require("db.conn.php");
$sql="SELECT tbl_contributions.id,tbl_contributions.amount,tbl_contributions.balance,tbl_users.firstname,`tbl_categories`.`name` FROM tbl_contributions INNER JOIN tbl_users ON tbl_contributions.user_id=tbl_users.id INNER JOIN tbl_categories ON tbl_contributions.category_id=tbl_categories.id";
$result1=mysqli_query($con,$sql);
?>



					<table class="table align-items-center">
						<head>
							<tr>
								<th>Member name</th>
								<th>Contribution Type</th>
								<th>Amount</th>
								<th>Balance</th>
							</tr>

							<?php
                    $no=1;
                   while ($row=mysqli_fetch_assoc($result1)){
                  ?>
						</head>
						<tbody>
		
								<tr>
								
									<td><?php echo $row['firstname']; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['amount']; ?></td>
									<td><?php echo $row['balance']; ?></td>
								
								</tr>
					
						</tbody>

						<?php } ?>
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