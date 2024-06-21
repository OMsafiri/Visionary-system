<?php
require_once('../database/connection.php');
require_once('../includes/functions.php');

// check if the user is authenticated
isAuth();

// initialize database connection
$instance = openConnection();
// fetch data for authenticated user
$user = getUser($instance, $_SESSION['userId']);
$username = $user['username'];
$userId = $user['id'];
$message = "";
$project_id = $_GET['id'];


$item = getProject($instance, $project_id);


if(isset($_POST['submit'])){


	if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){

		$name = $_POST['name'];
		$description = $_POST['description'];
		$project_type = $_POST['project_type'];
		$location = $_POST['location'];
		$startDate = $_POST['startDate'];
		$endDate = $_POST['endDate'];
		$budget = $_POST['budget'];


		$query = "UPDATE tbl_projects SET name=?, description=?, project_type=?, location=?, startDate=?, endDate=?, budget=? WHERE id = $project_id";
		$stmt = $instance->prepare($query);
		$stmt->bind_param("sssssss", $name, $description, $project_type, $location, $startDate, $endDate, $budget);
		$stmt->execute();

		if ($stmt->affected_rows > 0) {
			$message = "<div class='alert alert-warning'> Project ".$name." was updated successfully</div>";
			header('Location: manage_projects.php');

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
					<a href="./" class="btn btn-dark"> Go Back</a>
				</div>
			</div>
			<div class="row d-flex justify-content-center">
				<div class="col-md-8 my-4">
					<div class="row">
						<div class="col-md-12 my-3">
							<h2 class="">Update Project</h2>
							<h6 class="text-muted">Update an existing project.</h6>
						</div>
						<div class="col-md-12">
							<form method="POST" action="" autocomplete="off">
								<div class="row">
									<div class="col-8">
										<div class="mb-3">
											<label for="name">Project Name</label>
											<input value="<?php echo $item['name']; ?>" type="text" class="form-control" name="name" id="name">
										</div>
									</div>
									<div class="col-4">
										<div class="mb-3">
											<label for="type">Project Type</label>
											<select class="form-control" name="project_type" id="type">
												<option value="wool making">Wool Making</option>
												<option value="Soap making">Soap Making</option>
												<option value="Paper bag making">Pape bag Making</option>
												<option value="Fishing">Fishing Pond</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-8">
										<div class="mb-3">
											<label for="description">Description</label>
											<input type="text" value="<?php echo $item['description']; ?>" class="form-control" name="description" id="description">
										</div>
									</div>
									<div class="col-4">
										<div class="mb-3">
											<label for="location">Project Location</label>
											<input value="<?php echo $item['location']; ?>" type="text" class="form-control" name="location" id="location">
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-4">
										<div class="mb-3">
											<label for="startDate">Start Date</label>
											<input value="<?php echo $item['startDate']; ?>" type="text" class="form-control" name="startDate" id="startDate">
										</div>
									</div>

									<div class="col-4">
										<div class="mb-3">
											<label for="endDate">End Date</label>
											<input value="<?php echo $item['endDate']; ?>" type="text" class="form-control" name="endDate" id="endDate">
										</div>
									</div>

									<div class="col-4">
										<div class="mb-3">
											<label for="budget">Project Budget</label>
											<input value="<?php echo $item['budget']; ?>" type="text" class="form-control" name="budget" id="budget">
										</div>
									</div>

									

								</div>
								<div class="row">
									<div class="col-md-12">
										<button name="submit" type="submit" class="btn btn-lg btn-primary">Update Project</button>
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