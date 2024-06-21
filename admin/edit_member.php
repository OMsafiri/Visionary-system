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
$user_id = $_GET['id'];


$item = getUser($instance, $user_id);


if(isset($_POST['submit'])){


	if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){

		$username = $_POST['username'];
		$firstName = $_POST['firstName'];
		$middleName = $_POST['middleName'];
		$lastName = $_POST['lastName'];
		$emailAddress = $_POST['emailAddress'];
		$mobileNumber = $_POST['mobileNumber'];
		$gender = $_POST['gender'];
		$role = $_POST['role'];



		$query = "UPDATE tbl_users SET username=?,firstName=?, middleName=?, lastName=?, emailAddress=?, mobileNumber=?, gender=?, role=? WHERE id = $user_id";
		$stmt = $instance->prepare($query);
		$stmt->bind_param("ssssssss", $username, $firstName, $middleName, $lastName, $emailAddress, $mobileNumber, $gender, $role);
		$stmt->execute();

		if ($stmt->affected_rows > 0) {
			$message = "<div class='alert alert-warning'> A user ".$firstName." ".$middleName." ".$lastName." was updated successfully</div>";
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
							<h2 class="">Update Member</h2>
							<h6 class="text-muted">Update an existing visonary members.</h6>
						</div>
						<div class="col-md-12">
  <form method="POST" action="" autocomplete="off">
								<div class="row">
									<div class="col-4">
										<div class="mb-3">
											<label for="inputfirstName">First Name</label>
											<input type="text" class="form-control" name="firstName" id="inputfirstName" value="<?php echo $item['firstName']; ?>">
										</div>
									</div>
									<div class="col-4">
										<div class="mb-3">
											<label for="inputMiddleName">Middle Name</label>
											<input type="text" class="form-control" name="middleName" id="inputMiddleName"  value="<?php echo $item['middleName']; ?>">
										</div>
									</div>
									<div class="col-4">
										<div class="mb-3">
											<label for="inputLastname">Last Name</label>
											<input type="text" class="form-control" name="lastName" id="inputLastname" value="<?php echo $item['lastName']; ?>">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-6">
										<div class="mb-3">
											<label for="inputEmailaddress">Email Address</label>
											<input type="text" class="form-control" name="emailAddress" id="inputEmailaddress" value="<?php echo $item['emailAddress']; ?>">
										</div>
									</div>
									<div class="col-3">
										<div class="mb-3">
											<label for="inputMobileNumber">Mobile Number</label>
											<input type="text" class="form-control" name="mobileNumber" id="inputMobileNumber" value="<?php echo $item['mobileNumber']; ?>">
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
									<div class="col-8">
										<div class="mb-3">
											<label for="inputUsername">Enter username</label>
											<input type="text" class="form-control" name="username" id="inputUsername">
										</div>
									</div>

									<div class="col-4">
										<div class="mb-3">
											<label for="inputRole">Role</label>
											<select class="form-control" name="role" id="inputRole">
												<option value="admin">Administrator</option>
												<option value="accountant">Accountant</option>
												<option value="guest">Public User</option>
											</select>
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-md-12">
										<button name="submit" type="submit" class="btn btn-lg btn-primary">Save Member</button>
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