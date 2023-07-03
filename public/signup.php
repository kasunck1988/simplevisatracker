<?php
session_start();

include("connection.php");
include("functions.php");

$message1 = ""; // Variable to store the message
$message2 = ""; // Variable to store the message
$message3 = ""; // Variable to store the message
$message4 = ""; // Variable to store the message

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	// SOMETHING WAS POSTED
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (!empty($username) && !empty($password) && !empty($email) && !is_numeric($username)) {
		// Check if the username and email already exist
		$query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) == 0) {
			// Username and email don't exist, save to database
			$user_id = random_num(20);
			$query = "INSERT INTO users (user_id, email, username, password) VALUES ('$user_id', '$email', '$username', '$password')";
			mysqli_query($con, $query);

			$message1 = "Congratulations..! Click here to login";
		} else {
			$row = mysqli_fetch_assoc($result);
			if ($row['username'] == $username) {
				$message2 = "Username already exists. Please choose a different username.";
			}
			if ($row['email'] == $email) {
				$message4 = "Email already exists. Please choose a different email.";
			}
		}
	} else {
		$message3 = "Please enter valid information. Username should contain letters.";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Signup - Simple Visa Tracker</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="signup/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signup/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signup/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signup/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signup/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signup/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signup/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signup/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signup/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="signup/css/util.css">
	<link rel="stylesheet" type="text/css" href="signup/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-15" style="font-size: 20px">
						Welcome to
					</span>
					<span class="login100-form-title p-b-26" style="color: #2b2f7f">
						SIMPLE VISA TRACKER
					</span>
					<span class="login100-form-title p-b-20">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate="Valid email is: yourname@domain.com">
						<input class="input100" type="email" name="email">
						<span class="focus-input100" data-placeholder="email address"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Must contain letters">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" value="Signup">
								Signup for FREE
							</button>
						</div>

					</div>

					<div class="text-center p-t-75">
						<span class="txt1 message1" style="color:#5cbc3f; font-size:15px">
							<a href="login.php" style="color:#5cbc3f; font-size:15px">
								<?php echo $message1; ?>
							</a>
						</span>
						<span class="txt1 message2" style="color: #ea9424; font-size:15px">
							<?php echo $message2; ?>
						</span>
						<span class="txt1 message3" style="color: #c80000; font-size:15px">
							<?php echo $message3; ?>
						</span>
						<span class="txt1 message4" style="color: #ea9424; font-size:15px">
							<?php echo $message4; ?>
						</span><br>
						<span class="txt1">
							Already have an account?
						</span>

						<a class="txt2" href="login.php" style="color:#FFA500; font-size:15px">
							Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="signup/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="signup/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="signup/vendor/bootstrap/js/popper.js"></script>
	<script src="signup/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="signup/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="signup/vendor/daterangepicker/moment.min.js"></script>
	<script src="signup/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="signup/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="signup/js/main.js"></script>

</body>

</html>