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
$members = get_all_users($instance);
$username = $user['username'];

$memberId = "";
$current_balance = 0;
$current_member = 0;
$userId = $user['id'];
$message = "Before submit";

if(isset($_POST['submit'])){


	if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){


		$source = $_POST['source'];
		$description = $_POST['description'];
		$amount = $_POST['amount'];

		if (empty($source) && empty($amount)) {
			echo"<script>window.location.href='summary.php';</script>";
		} else {
			$query = "INSERT INTO income(source,description,amount) VALUES(?,?,?)";
			$stmt = $instance->prepare($query);
			$stmt->bind_param("ssi", $source, $description, $amount);
			$stmt->execute();

			if ($stmt->affected_rows > 0) {
				echo"<script>window.location.href='summary.php';</script>";
			}else {
				print_r($stmt);
			}
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

		<div class="container space-top">
			<div class="row">
				<div class="col-md-12">
				<a href="./summary.php" class="btn btn-dark"> Go Back</a>
				</div>
			</div>
			<div class="row d-flex justify-content-center">
				<div class="col-md-8 my-4">
					<div class="row">
						<div class="col-md-12 my-4">
							<h2 class="">Income</h2>
							<h6 class="text-muted">Add Income .</h6>
						</div>
						<div class="col-md-12">
							<form method="POST" action="" autocomplete="off">
								
								<div class="row">
									<div class="col-4">
										<div class="mb-4">
											<label for="source">Income Source</label>
											<input type="text" name="source" id="source" class="form-control">
										</div>
									</div>

									<div class="col-3">
										<div class="mb-3">
											<label for="description">Description</label>
											<input type="text" name="description" id="description" class="form-control">
										</div>
									</div>

									<div class="col-5">
										<div class="mb-3">
											<label for="inputAmount"> Amount</label>
											<input type="text" class="form-control" name="amount" id="inputAmount">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-2">
										<div class="mb-3">
											<input type="hidden" value="<?php echo $current_balance; ?>" class="form-control" name="balance" id="inputBalance">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<button name="submit" type="submit" class="btn btn-lg btn-primary">Save</button>
									</div>
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