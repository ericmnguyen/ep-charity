<!-- no access if signed in -->
<?php
session_start();
ob_start();
if (isset($_SESSION['roleId'])) {
	header("Location: /profile/profile.php");
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include './includes/header.php' ?>
	<!-- <script>
		$(document).ready(function() {
			$("form").submit(function() {
				validateEmail();
				validatePassword();
				const isValidForm =
					validateEmail() &&
					validatePassword();
				if (isValidForm) {
					// TODO: submit form
					return true;
				}
				return false;
			});
		})
	</script> -->
</head>

<body>

	<?php
	include './includes/navbar.php';
	include './conn.php';

	$emailAddress = $_POST["emailAddress"];
	$password = $_POST["password"];
	// Handle sign in
	if ($_POST['randcheck'] == $_SESSION['rand']) {
		$get_account_query = "SELECT emailAddress, password FROM Account WHERE emailAddress='$emailAddress'";
		$account_response = mysqli_query($mysqli, $get_account_query);

		if (!$account_response) {
			die(mysqli_connect_error());
		} else if (mysqli_num_rows($account_response) > 0) {
			$result = mysqli_fetch_array($account_response);
			$hashPassword = $result['password'];
			$verify = password_verify($password, $hashPassword);
			// Verify the password
			if ($verify) {
				echo 'Password Verified!';
				// TODO: clear the password in session
				$get_account_info = "SELECT accountId, emailAddress, firstName, lastName, contactNumber, roleId FROM Account WHERE emailAddress='$emailAddress'";
				$account_info = mysqli_query($mysqli, $get_account_info);
				if (!$account_info) {
					die(mysqli_connect_error());
				}
				$user = mysqli_fetch_array($account_info);
				$_SESSION['accountId'] = $user['accountId'];
				$_SESSION['emailAddress'] = $user['emailAddress'];
				$_SESSION['firstName'] = $user['firstName'];
				$_SESSION['lastName'] = $user['lastName'];
				$_SESSION['contactNumber'] = $user['contactNumber'];
				$_SESSION['roleId'] = $user['roleId'];
				// TODO: calculate the session timeout
				$_SESSION['valid'] = true;
				$_SESSION['timeout'] = time();
				echo $_SESSION['accountId'] . $_SESSION['emailAddress'] . $_SESSION['roleId'];
				if ($user['roleId'] == 1) {
					// navigate to company dashboard
					header("Location: /dashboard/company-dashboard.php", true, 301);
					$script = "<script>window.location = '/dashboard/company-dashboard.php';</script>";
					echo $script;
					exit();
				} else {
					// navigate to volunteer dashboard
					header("Location: /dashboard/dashboard.php", true, 301);
					$script = "<script>window.location = '/dashboard/dashboard.php';</script>";
					echo $script;
					exit();
				}
			}
		} else {
			echo "<h3 class='text-danger'>Invalid. Please try again.</h3>";
		}
	}
	?>

	<div class="sign-body">
		<section class="sign-container container">
			<div class="container-box">
				<div class="row">
					<div class="col-lg-5 bg">
						<h6 class="card-title">SIGN IN TO <br> <span>Social Volunteer</span></h6>

						<p>
							Welcome, <br><br>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia quia laboriosam reprehenderit culpa neque, obcaecati repudiandae debitis, amet accusamus autem placeat voluptatibus libero. Quos nihil, sint itaque qui quidem corporis! Aepellat aliquam culpa exercitationem tenetur sunt officia dicta.
						</p>
					</div>
					<div class="col-lg-7">
						<div class="card-box">
							<div class="card-body">
								<h6 class="card-title">Login</h6>
								<br>
								<form method="post" action="" id="signInUser" class="row no-gutters" style="max-width: 100%;">
									<?php
									$rand = rand();
									$_SESSION['rand'] = $rand;
									?>
									<input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
									<div class="form-group col-lg-12">
										<label for="emailAddress">Email</label>
										<input type="email" name="emailAddress" id="emailAddress" class="form-control" placeholder="Email address">
									</div>
									<div class="form-group col-lg-12">
										<label for="password">Password</label>
										<input type="password" name="password" id="password" class="form-control" placeholder="Password">
									</div>
									<div class="col-md-12 text-align-start">
										<input type="submit" id="submitBtn" value="Login" class="btn btn-block login-btn mb-4 mx-auto" />
									</div>
								</form>

								<a href="./forgotpassword.php" class="forgot-password-link">Forgot password?</a>

								<p class="already-text">Create an account.
									<a href="./register/signup-volunteer.php">Sign Up</a>
								</p>


								<p class="already-text">Do you want to add your Comapny Events here?
									<br>
									<a href="./register/signup-company.php">Create an Company Account</a>
								</p>


								<nav class="login-card-footer-nav">
									<a href="">Terms of use.</a>
									<a href="">Privacy policy</a>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- footer -->
	<?php include './includes/footer.php' ?>
	<!-- page-specific js -->
	<script>
		$(document).ready(function() {
			$("#signInUser").validate({
				rules: {
					emailAddress: {
						required: true,
						email: true
					},
					password: {
						required: true,
						minlength: 6
					}
				},
				messages: {
					emailAddress: {
						required: "Please enter your email address",
						email: "Please enter a valid email address"
					},
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 6 characters long"
					}
				},
				errorElement: "div",
				errorPlacement: function(error, element) {
					error.addClass("invalid-feedback");
					if (element.prop("type") === "checkbox") {
						error.insertAfter(element.next("label"));
					} else {
						error.insertAfter(element);
					}
				},
				highlight: function(element, errorClass, validClass) {
					$(element).addClass("is-invalid").removeClass("is-valid");
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).addClass("is-valid").removeClass("is-invalid");
				}
			});
		});
	</script>

</body>

</html>