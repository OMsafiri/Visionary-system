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
	<title>Expenses</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/default.css">
</head>
<body>
	<?php require_once('../partials/navbar.php'); ?>

	<div class="container space-top mt-5">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="">Expenses </h2>
				<h6 class="text-muted">A starting place for Expenses .</h6>
			</div>
			<div class="col-md-12">
				<?php echo $message; ?>
			</div>
		</div>
		<div class="row d-flex justify-content-center mt-5">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<h4 class="m-0">Expenses</h4>
						<div>
						<a href="./contributions.php" class="btn btn-sm btn-outline-primary">Back</a>

						</div>
					</div>

					<?php

require("db.conn.php");
$sql="SELECT * FROM expenses";
$result1=mysqli_query($con,$sql);
?>



					<table class="table align-items-center">
						<head>
							<tr>
								<th>No.</th>
								<th>Expenses Name</th>
								<th>Description</th>
								<th>Amount</th>
							</tr>

							<?php
                    $total=0;
					$no = 1;
                   while ($row=mysqli_fetch_assoc($result1)){
					$total += $row['amount'];
                  ?>
						</head>
						<tbody>
		
								<tr>
								
									<td><?php echo $no++; ?></td>
									<td><?php echo $row['expesnses_for']; ?></td>
									<td><?php echo $row['description']; ?></td>
									<td><?php echo $row['amount']; ?></td>
								
								</tr>
					
						</tbody>

						<?php } ?>
						<tfoot style="font-weight: bolder;">
							<tr>
								<td>Total <?php echo $total; ?></td>
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