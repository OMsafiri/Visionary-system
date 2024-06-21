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



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fain</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/default.css">
</head>
<body>
	<?php require_once('../partials/navbar.php'); ?>

	<div class="container space-top mt-5">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="">Fines </h2>
				<h6 class="text-muted">A starting place for Fines .</h6>
			</div>
			<div class="col-md-12">
				<?php echo $message; ?>
			</div>
		</div>
		<div class="row d-flex justify-content-center mt-5">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between">
						<h4 class="m-0">Fines.</h4>
						<div>
							<a href="./contributions.php" class="btn btn-sm btn-outline-primary">Back</a>

						</div>
					</div>

					<?php

require("db.conn.php");
$sql="SELECT fain.id,fain.amount,fain.description,fain.status FROM fain where member = $userId";
$result1=mysqli_query($con,$sql);
?>
				<!-- <?php

					//if ($result1->num_rows_)

				?> -->


					<table class="table align-items-center">
						<head>
							<tr>
								<th>Desciption</th>
								<th>Amount</th>
								<th>Status</th>
							</tr>

							<?php
                    $totalFain = 0;
                   while ($row=mysqli_fetch_assoc($result1)){
					$totalFain += $row['amount'];
					if ($totalFain < 0) {
						$color = "red";
					} else if ($totalFain > 0) {
						$color = "green";
					}
                  ?>
						</head>
						<tbody>
		
								<tr>
									<td><?php echo $row['description']; ?></td>
									<td><?php echo $row['amount']; ?></td>
									<td><?php echo $row['status']; ?></td>
								
								</tr>
					
						</tbody>

						<?php } ?>
					</table>
				</div>
				<div style="margin: 20px;padding:10px 20px; border: 1px solid rgba(0, 0, 0, 0.5); border-radius: 10px; font-weight: bold;
				background: linear-gradient(90deg, whitesmoke, lightblue); width:fit-content; color: <?php echo $color; ?>">
						Total Fines <?php echo " " . $totalFain; ?>
					</div>
			</div>
		</div>
	</div>

	<script src="../assets/js/jquery-3.4.1.slim.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>