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
				<h2 class="">Member Fain</h2>
				<h6 class="text-muted">A starting place for fains management tasks.</h6>
			</div>
			<div class="col-md-12">
				<?php echo $message; ?>
			</div>
		</div>
		<div class="row d-flex justify-content-center mt-5">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<h4 class="m-0">Member Fains.</h4>
						<div>
						<a href="./member_contributions.php" class="btn btn-sm btn-outline-primary">Back</a>
							<a href="faini_contribution.php" class="btn btn-sm btn-outline-primary">Add Fines</a>
						</div>
					</div>

					<?php

require('connect.php');

$sql="SELECT fain.id,fain.description,fain.amount,fain.status,tbl_users.firstname,tbl_users.middleName,tbl_users.lastName FROM fain INNER JOIN tbl_users ON fain.member=tbl_users.id";
$result1=mysqli_query($con,$sql);
?>



					<table class="table align-items-center">
						<head>
							<tr>
								<th>Member name</th>
								<th>Description </th>
								<th>Amount</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>

							<?php
								$no=1;
								$totalIncome = 0;
								while ($row=mysqli_fetch_assoc($result1)){
								$totalIncome += $row['amount'];
							?>
						</head>
						<tbody>
		
								<tr>
								
									<td><?php echo $row['firstname'] . ' ' . $row['middleName'] . ' ' . $row['lastName']; ?></td>
									<td><?php echo $row['description']; ?></td>
									<td><?php echo $row['amount']; ?></td>
									<td><?php echo $row['status']; ?></td>

									<td>
										<span class="mr-2">
											<a href="edit_fain.php?id=<?php echo $row['id']; ?>" class=""><i class="fas fa-edit"></i>
											</a>
										</span>
										<span>
											<a href="delete_fain.php?id=<?php echo $row['id']; ?>" class="text-danger"><i class="fas fa-trash"></i>
											</a>
										</span>
									</td>
								
								</tr>
					
						</tbody>

						<?php } ?>
						<tfoot style="font-weight: bolder;">
							<tr>
								<td></td>
								<td></td>
								<td>Total <?php echo $totalIncome; ?></td>
							</tr>
						</tfoot>
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