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

if(isset($_POST['submit'])){


	if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){

		$firstName = $_POST['firstName'];
		$middleName = $_POST['middleName'];
		$lastName = $_POST['lastName'];
		$emailAddress = $_POST['emailAddress'];
		$mobileNumber = $_POST['mobileNumber'];
		$gender = $_POST['gender'];



		$query = "INSERT INTO tbl_members(firstName, middleName, lastName, emailAddress, mobileNumber, gender) VALUES(?,?,?,?,?,?)";
		$stmt = $instance->prepare($query);
		$stmt->bind_param("ssssss", $firstName, $middleName, $lastName, $emailAddress, $mobileNumber, $gender);
		$stmt->execute();

		if ($stmt->affected_rows > 0) {
			$message = "<div class='alert alert-warning'> A user ".$firstName." ".$middleName." ".$lastName." was added successfully</div>";
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

		<div class="container space-top">
			<div class="row">
				<div class="col-md-12">
					<a href="./" class="btn btn-dark"> Go Back</a>
				</div>
			</div>
			<div class="row d-flex justify-content-center">
				<div class="col-md-8 my-4">
					<div class="row">
						<div class="col-md-12 my-4">
							<h2 class="">Register Member</h2>
							<h6 class="text-muted">Register a new visonary member.</h6>
						</div>
						<div class="col-md-12">
							<form method="POST" action="" autocomplete="off">
								<div class="row">
									<div class="col-4">
										<div class="mb-3">
											<label for="inputfirstName">First Name</label>
											<input type="text" class="form-control" name="firstName" id="inputfirstName">
										</div>
									</div>
									<div class="col-4">
										<div class="mb-3">
											<label for="inputMiddleName">Middle Name</label>
											<input type="text" class="form-control" name="middleName" id="inputMiddleName">
										</div>
									</div>
									<div class="col-4">
										<div class="mb-3">
											<label for="inputLastname">Last Name</label>
											<input type="text" class="form-control" name="lastName" id="inputLastname">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-6">
										<div class="mb-3">
											<label for="inputEmailaddress">Email Address</label>
											<input type="text" class="form-control" name="emailAddress" id="inputEmailaddress">
										</div>
									</div>
									<div class="col-3">
										<div class="mb-3">
											<label for="inputMobileNumber">Mobile Number</label>
											<input type="text" class="form-control" name="mobileNumber" id="inputMobileNumber">
										</div>
									</div>
									<div class="col-3">
										<div class="mb-3">
											<label for="inputGender">Gender</label>
											<select class="form-control" name="gender" id="inputGender">
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<button name="submit" type="submit" class="btn btn-lg btn-primary">Add Member</button>
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