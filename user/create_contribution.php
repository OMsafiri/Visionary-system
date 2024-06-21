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


if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){

		$member = $_POST['member'];
		$contr = $_POST['typecontr'];
		$amt = $_POST['amount'];
		$balance = $_POST['balance'];
	



		$query = "INSERT INTO tlb_contribution(memberName, contributionType, amount, balance) VALUES(?,?,?,?)";
		$stmt = $instance->prepare($query);
		$stmt->bind_param("ssss", $member, $contr,$amt,$balance);
		$stmt->execute();

		if ($stmt->affected_rows > 0) {
			$message = "<div class='alert alert-warning'> A user ".$member."  was added successfully</div>";
		}else {
			print_r($stmt);
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
					<a href="./" class="btn btn-dark"> Go Back</a>
				</div>
			</div>
			<div class="row d-flex justify-content-center">
				<div class="col-md-6 my-4">
					<div class="row">
						<div class="col-md-12 my-4">
							<h2 class="">Register Contribution</h2>
							<h6 class="text-muted">Register a contribution from a visonary member</h6>
						</div>
						<div class="col-md-12">
							<form method="POST" action="" autocomplete="off">
								<div class="row">
									<div class="col-8">
										<div class="mb-3">
											<label class="form-label" for="inputMember">Select Member</label>
											<select class="form-control" name="member" id="inputMember">
												<?php  foreach($users as $user): ?>
													<option value=<?php echo $user['firstName'].' '.$user['lastName']; ?>"><?php echo $user['firstName'].' '.$user['lastName']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-4">
										<div class="mb-3">
											<label class="form-label" for="inputCategory">Contribution Type</label>
											<select class="form-control" name="typecontr" id="inputCategory">
												<?php  foreach($categories as $category): ?>
													<option value="<?php echo $category['name']; ?>"><?php echo $category['name']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-8">
										<div class="mb-3">
											<label for="inputAmount">Contribution Amount</label>
											<input type="number" class="form-control" name="amount" id="inputAmount">
										</div>
									</div>

									<div class="col-4">
										<div class="mb-3">
											<label for="inputBalance">Current Balance</label>
											<input  type="text" class="form-control" name="balance" id="inputBalance">
											<br>
											<label for="submit">Save contribution</label>
												<input type="submit"  name="save" value="save">
										</div>
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