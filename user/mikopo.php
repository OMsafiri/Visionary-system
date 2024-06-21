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
$userId = $user['id'];

$users = get_all_users($instance);
$contributions = get_all_contributions($instance);

$loans = getLoans($instance, $user['id']);



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Loans</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/default.css">
</head>
<body>
	<?php require_once('../partials/navbar.php'); ?>

	<div class="container space-top mt-5">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="">Loans </h2>
				<h6 class="text-muted">A starting place for Loans .</h6>
			</div>
			<div class="col-md-12">
				<?php echo $message; ?>
			</div>
		</div>
		<div class="row d-flex justify-content-center mt-5">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<h4 class="m-0">Loans.</h4>
						<div>
						<a href="./contributions.php" class="btn btn-sm btn-outline-primary">Back</a>

						</div>
					</div>

					<?php

require("db.conn.php");
$sql="SELECT loans.description,loans.amount,loans.loan_date,loans.amount_returned,loans.balance,loans.status FROM loans where member = $userId";
$result1=mysqli_query($con,$sql);
?>



					<table class="table align-items-center">
						<head>
							<tr>
								<th>No.</th>
								<th>Description</th>
								<th>Date</th>
								<th>Loan Amount</th>
								<th>Amount Returned</th>
								<th>Balance</th>
								<th>Status</th>
							</tr>

							<?php
                    $count=0;
					$totalBalance = 0;
                   while ($row=mysqli_fetch_assoc($result1)){
					$balance = $row['amount_returned'] - $row['amount'];
					$totalBalance += $balance;
					if ($totalBalance < 0) {
						$color = "red";
					} else if ($totalBalance > 0) {
						$color = "green";
					}
                  ?>
						</head>
						<tbody>
		
								<tr>
									<td><?php echo ++$count; ?></td>
									<td><?php echo $row['description']; ?></td>
									<td><?php echo $row['loan_date']; ?></td>
									<td><?php echo $row['amount']; ?></td>
									<td><?php echo $row['amount_returned']; ?></td>
									<td><?php echo $balance; ?></td>
									<td><?php echo $row['status']; ?></td>
								
								</tr>
					
						</tbody>

						<?php } ?>
					</table>
				</div>
				<div style="margin: 20px;padding:10px 20px; border: 1px solid rgba(0, 0, 0, 0.5); border-radius: 10px; font-weight: bold;
				background: linear-gradient(90deg, whitesmoke, lightblue); width:fit-content; color: <?php echo $color; ?>">
						Total Balance <?php echo " " . $totalBalance; ?>
					</div>
			</div>
		</div>
	</div>

	<script src="../assets/js/jquery-3.4.1.slim.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>