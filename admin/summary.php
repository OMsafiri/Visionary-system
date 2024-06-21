<?php
require_once('../database/connection.php');
require_once('../includes/functions.php');

	// check if the user is authenticated
isAuth();
$message ="";


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
				<div class="col-md-12">
				<a href="./member_contributions.php" class="btn btn-dark"> Go Back</a>
				</div>
			</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="">Summary</h2>
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
						<h4 class="m-0">Income.</h4>
						<div>
							<a href="register_income.php" class="btn btn-sm btn-outline-primary">Add Income</a>
							<a href="./" class="btn btn-sm btn-outline-primary" onclick="printPage()">Print</a>
						</div>
					</div>

					<?php

						require('connect.php');

						require("db.conn.php");
						$sql="SELECT * FROM income";
						$result1=mysqli_query($con,$sql);
					?>



					<table class="table align-items-center">
						<head>
							<tr>
								<th>No.</th>
								<th>Date</th>
								<th>Source Name</th>
								<th>Description</th>
								<th>Amount</th>
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
								 
									 <td><?php echo $no++; ?></td>
									 <td><?php echo $row['date']; ?></td>
									 <td><?php echo $row['source']; ?></td>
									 <td><?php echo $row['description']; ?></td>
									 <td><?php echo $row['amount']; ?></td>
								 
								 </tr>
					 
						</tbody>
 
						<?php } ?>
						<tfoot style="font-weight: bolder;">
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td style="text-align:right;">Total</td>
								<td><?php echo $totalIncome; ?></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>

		<div class="row d-flex justify-content-center mt-5">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<h4 class="m-0">Expenses.</h4>
						<div>
							<a href="register_expenses.php" class="btn btn-sm btn-outline-primary">Add Expenses</a>
						</div>
					</div>

					<?php

						require('connect.php');

						require("db.conn.php");
						$sql="SELECT * FROM expenses";
						$result1=mysqli_query($con,$sql);
					?>



					<table class="table align-items-center">
						<head>
							<tr>
								<th>No.</th>
								<th>Date</th>
								<th>Expenses For</th>
								<th>Description</th>
								<th>Amount</th>
							</tr>

							<?php
								$no=1;
								$totalExpenses = 0;
								while ($row=mysqli_fetch_assoc($result1)){
								$totalExpenses += $row['amount'];
							?>
						</head>
						<tbody>
		 
								 <tr>
								 
									 <td><?php echo $no++; ?></td>
									 <td><?php echo $row['date']; ?></td>
									 <td><?php echo $row['expesnses_for']; ?></td>
									 <td><?php echo $row['description']; ?></td>
									 <td><?php echo $row['amount']; ?></td>
								 
								 </tr>
					 
						</tbody>
 
						<?php } ?>
						<tfoot style="font-weight: bolder;">
							 <tr>
								<td></td>
								<td></td>
								<td></td>
								<td style="text-align:right;">Total</td>
								 <td><?php echo $totalExpenses; ?></td>
							 </tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>

		<div class="row d-flex justify-content-center mt-5">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<h4 class="m-0">Balance.</h4>
					</div>



					<table class="table align-items-center">
						<head>
							<tr>
								<th>Total Income</th>
								<th>Total Expenses</th>
								<th>Total Balance</th>
							</tr>

						</head>
						<tbody>
		 
								 <tr>
								 
									 <td><?php echo $totalIncome ?></td>
									 <td><?php echo $totalExpenses ?></td>
									 <td><?php echo $totalIncome - $totalExpenses; ?></td>
								 
								 </tr>
					 
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
	<script>
		 function printPage() {
            window.print();
        }
	</script>
	<script src="../assets/js/jquery-3.4.1.slim.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>