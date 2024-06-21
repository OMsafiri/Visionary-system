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
	<title>Admin - Loan</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/default.css">
</head>
<body>
	<?php require_once('../partials/navbar.php'); ?>

	<div class="container space-top mt-5">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="">Loans</h2>
				<h6 class="text-muted">A starting place for loans management tasks.</h6>
			</div>
			<div class="col-md-12">
				<?php echo $message; ?>
			</div>
		</div>
		<div class="row d-flex justify-content-center mt-5">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<h4 class="m-0">Loans .</h4>
						<div>
						<a href="./member_contributions.php" class="btn btn-sm btn-outline-primary">Back</a>
							<a href="register_loan.php" class="btn btn-sm btn-outline-primary">Add Loan</a>
						</div>
					</div>

					<?php

require('connect.php');

$sql="SELECT loans.id,loans.description,loans.loan_date,loans.amount,loans.cum_amount,loans.amount_returned,loans.status,tbl_users.firstname,tbl_users.middlename,
	tbl_users.lastname FROM loans INNER JOIN tbl_users ON loans.member=tbl_users.id ";
$result1=mysqli_query($con,$sql);
?>



					<table class="table align-items-center">
						<head>
							<tr>
								<th>No</th>
								<th>Full Name</th>
								<th>Description</th>
								<th>Date</th>
                                <th>Amount</th>
								<th>Cum.Amount</th>
								<th>Amount Returned</th>
								<th>Balance</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>

							<?php
                    $count=1;
                   while ($row=mysqli_fetch_assoc($result1)){
					$fullname = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
					$balance = $row['amount_returned'] - $row['cum_amount'];
					$status = ($balance == 0) ? '<b style="background-color:green; color:white;border-radius:5px;padding:0px 0px 0px 1.5px;"> Complete </b>' :  '<b style="background-color:blue; color:white;border-radius:5px;padding:0px 0px 0px 1.5px;">On going</b>';
                  ?>
						</head>
						<tbody>
		
								<tr>
									<td><?php echo $count++; ?></td>
									<td><?php echo $fullname; ?></td>
									<td><?php echo $row['description']; ?></td>
									<td><?php echo $row['loan_date']; ?></td>
									<td><?php echo $row['amount']; ?></td>
									<td><?php echo $row['cum_amount']; ?></td>
									<td><?php echo $row['amount_returned']; ?></td>
									<td><?php echo $balance; ?></td>
									<td><?php echo $status; ?></td>
									<td>
										<span class="mr-2">
											<a href="edit_loan.php?id=<?php echo $row['id']; ?>" class=""><i class="fas fa-edit"></i>
											</a>
										</span>
										<span>
											<a href="delete_loan.php?id=<?php echo $row['id']; ?>" class="text-danger"><i class="fas fa-trash"></i>
											</a>
										</span>
									</td>
								
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