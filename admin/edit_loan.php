<?php
require_once('../database/connection.php');
require_once('../includes/functions.php');

// check if the user is authenticated
isAuth();

// initialize database connection
$instance = openConnection();
// fetch data for authenticated user
$user = getUser($instance, $_SESSION['userId']);
$users = get_all_users($instance);
$categories = get_all_categories($instance);
$username = $user['username'];
$userId = $user['id'];
$message = "";
$LoanId = $_GET['id'];

$item = getLoans($instance, $LoanId);

$balance = $item['amount_returned'] - $item['amount'];

if ($balance < 0) {
	$color = "red";
} else {
	$color = "green";
}


if(isset($_POST['submit'])){

	


	if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){

		$description = $_POST['description'];
		$amount = $_POST['amount_returned'] + $item['amount_returned'];
		$status = $_POST['status'];

		$query = "UPDATE loans SET description=?,amount_returned=?, status=? WHERE id = $LoanId";
		$stmt = $instance->prepare($query);
		$stmt->bind_param("sis", $description, $amount, $status);
		$stmt->execute();

		if ($stmt->affected_rows > 0) {
			$message = "<div class='alert alert-warning'> A Loan ".$description." ".$amount." "." was updated successfully</div>";
		}else {
			print_r($stmt);
		}


	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Visionary - Dashboard</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/default.css">
</head>
<body>
	<main class="main">
		<?php require_once('../partials/navbar.php'); ?>

		<div class="container space-top mt-5">
			<div class="row">
				<div class="col-md-12">
					<a href="loan.php" class="btn btn-dark"> Go Back</a>
				</div>
			</div>
			<div class="row d-flex justify-content-center">
				<div class="col-md-8 my-4">
					<div class="row">
						<div class="col-md-12 my-3">
							<h2 class="">Update Loan</h2>
							<h6 class="text-muted">Update an existing Loan.</h6>
						</div>
						<div class="col-md-12">
							<form method="POST" action="" autocomplete="off">
								<div class="row">
									<div class="col-4">
										<div class="mb-3">
											<label for="inputfirstName">Description</label>
											<input type="text" class="form-control" name="description" id="inputfirstName" value="<?php echo $item['description']; ?>">
										</div>
									</div>
									<div class="col-4">
										<div class="mb-3">
											<label for="inputMiddleName">Amount </label>
											<input type="text" class="form-control" name="amount" id="inputMiddleName"  value="<?php echo $item['amount']; ?>" disabled>
										</div>
									</div>
									<div class="col-4">
										<div class="mb-3">
											<label for="inputMiddleName">Cum.Amount </label>
											<input type="text" class="form-control" name="cum_amount" id="inputMiddleName"  value="<?php echo $item['cum_amount']; ?>" disabled>
										</div>
									</div>
									<div class="col-4">
										<div class="mb-3">
											<label for="inputMiddleName">Amount Returned </label>
											<input type="text" class="form-control" name="amount_returned" id="inputMiddleName"  value="<?php echo 0;//$item['amount_returned']; ?>">
										</div>
									</div>
									
									<div style="  padding:10px 30px;
									border: 1px solid rgba(0, 0, 0, 0.3); border-radius: 10px; font:600 14px Helvetica;
									margin:28px 10px;width:fit-content;color: <?php echo $color; ?>">
										Balance <?php echo " " . $balance; ?>
									</div>
								</div>

								</div>
								<div class="row">
									<div class="col-md-12">
										<button name="submit" type="submit" class="btn btn-lg btn-primary">Save Loan</button>
									</div>
									<?php echo $message; ?>
								</div>
							</form>
						</div>
					</div>

				</div>

			</div>
		</div>
	</main>

	<script src="../assets/js/jquery-3.4.1.slim.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>