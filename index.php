<?php 
require_once('database/connection.php');
$connection = openConnection();
$message = "";
$isAuthenticated = false;
$currentUser = null;


if(isset($_POST['submit'])){

	if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){

		$username = $_POST['username'];
		$password = $_POST['password'];
		$encrypted = $_POST['password'];


		// select a user based on username and password
		// expected result is one record or none

		$query = "SELECT * FROM tbl_users WHERE username = ? AND password = ? LIMIT 1";
		$stmt = $connection->prepare($query);
		$stmt->bind_param("ss", $username, $encrypted);
		$stmt->execute();

		$result = $stmt->get_result();
		$rows = $result->num_rows;
		$user = $result->fetch_assoc();

		if($rows > 0){

			$isAuth = true;

			$_SESSION['isAuth'] = $isAuth;
			$_SESSION['userId'] = $user['id'];
			$_SESSION['role'] = $user['role'];

			if($user['isActive'] == 1){
				if($user['role'] == 'admin'){
					header('Location: admin/');
				} else if($user['role'] == 'accountant' ){
					header('Location: accountant/');
				} else {
					header('Location: user/');
				}
			} else {
				$message = "<div class='alert alert-danger'>Your account is deactivated, consult System Administrator</div>";
			}
		} else {
			$message = "<div class='alert alert-danger'>This account is not Available</div>";
		}

	} else {
		echo "<div class='alert alert-danger'>There is a problem from server</div>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Visionary Management Information System</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/default.css">
</head>
<body>
	
	<div class="container space-top" style="height: 100vh !important;">
		<div class="row">
			<div class="col-md-4 col-sm-12 col-xs-12 m-auto">
				<div class="card mt-5" style="margin-top: 18rem">
					<div class="card-body">
						<div class="heading mt-2">
							<div class="logo text-center">
								<h6 class="mt-3 mb-3">Visionary System</h6>
								<h2><b>Sign In</b></h2>
								<p class="text-muted">Use your credentials given by the system Administrator</p>
							</div>
						</div>

						<div class="form-container">
							<form action="" method="POST" autocomplete="off">
								<div class="row">
									<!-- username input -->
									<div class="col-12">
										<div class="form-group">
											<input type="text" name="username" class="form-control" placeholder="Enter Username" required>
										</div>
									</div>
									<!-- password input -->
									<div class="col-12">
										<div class="form-group">
											<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
										</div>
									</div>

									<!-- password input -->
									<div class="col-12">
										<div class="form-group">
											<input type="submit" name="submit" class="btn btn-primary btn-block" value="Sign In">
										</div>
									</div>
								</div>
							</form>
							<div class="col-12 m-auto">
								<?php echo $message; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="assets/js/jquery-3.4.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>