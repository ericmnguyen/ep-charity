<!-- no access if signed in -->
<?php
session_start();
ob_start();

include('../config.php');

if (isset($_SESSION['roleId'])) {
	header("Location: $root_directory/profile/profile-edit.php");
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include '../includes/header.php' ?>
	<script>
		$(document).ready(function() {
			$("form").submit(function() {
				validateName("#companyName");
				validateName("#firstName");
				validateName("#lastName");
				validateEmail();
				validatePassword();
				const isValidForm = validateName("#companyName") &&
					validateEmail() &&
					validateName("#firstName") &&
					validateName("#lastName") &&
					validatePassword();
				if (isValidForm) {
					// TODO: submit form
					return true;
				}
				return false;
			});
		})
	</script>
</head>

<body>

	<?php
	include '../includes/navbar.php';
	include '../conn.php';



	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$emailAddress = $_POST["emailAddress"];
		$password = $_POST["password"];
		$companyName = $_POST["companyName"];
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$contactNumber = $_POST["contactNumber"];
		$website = $_POST["website"];
		// Register Handling
		if ($_POST['randcheck'] == $_SESSION['rand']) {
			// hash password
			$hashPassword = password_hash($password, PASSWORD_BCRYPT);
			// DB Query
			// Check if email already exists
			$check_email_exist_query = "SELECT * FROM Account WHERE emailAddress='$emailAddress'";
			$email_exist_response = mysqli_query($mysqli, $check_email_exist_query);
			if (!$email_exist_response) {
				die(mysqli_connect_error());
			} else if (mysqli_num_rows($email_exist_response) > 0) {
				echo "<h3 class='text-danger'>Email exists. Please use another email.</h3>";
			} else {
				$register_query = "INSERT INTO ACCOUNT(emailAddress, password, firstName, lastName, contactNumber, roleId)
			VALUES ('" . $emailAddress . "', '" . $hashPassword . "', '" . $firstName . "', '" . $lastName . "', '" . $contactNumber . "', 1)";
				$regis_response = mysqli_query($mysqli, $register_query);
				if (!$regis_response) {
					die(mysqli_connect_error());
				} else {
					echo "<h3 class='text-success'>Registered successfully.</h3>";
				}
				// insert more information
				$insert_company_query = "INSERT INTO Company(companyName, website, accountId) VALUES ('$companyName', '$website', LAST_INSERT_ID())";
				$insert_company_response = mysqli_query($mysqli, $insert_company_query);
				if (!$insert_company_response) {
					die(mysqli_connect_error());
				} else {
					echo "<h3 class='text-success'>Company added.</h3>";
				}
			}
		}
		mysqli_close($mysqli);
	}


	?>



	<div class="sign-body">
		<section class="sign-container container">
			<div class="container-box">
				<div class="row">
					<div class="col-lg-5 bg">
						<h6 class="card-title">SIGN UP <br> <span>Social Volunteering</span></h6>
						</h6>

						<p> Register for an account with us and become one of our members.
							<br><br>
							Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam, et voluptate quasi enim molestiae, dolorem neque impedit ipsa autem recusandae illo quod consequatur. In voluptate incidunt quibusdam reprehenderit libero quae? <br>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium aut laborum quos cupiditate assumenda animi, tempora illum velit, facere adipisci a aperiam doloribus alias sapiente, sit rem eius? Necessitatibus, labore.
						</p>
					</div>
					<div class="col-lg-7">
						<div class="card-box">
							<div class="card-body">
								<h6 class="card-title">Register as an Organization</h6>

								<form method="post" action="" class="row no-gutters" style="max-width: 100%;">
									<?php
									$rand = rand();
									$_SESSION['rand'] = $rand;
									?>
									<input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
									<div class="form-group col-lg-6">
										<label for="companyName">Organization Name</label>
										<input type="text" name="companyName" id="companyName" class="form-control" placeholder="Organization Name">
										<small id="companyNameCheck">This field is required</small>
									</div>
									<div class="form-group col-lg-6 pr-lg-3">
										<label for="website">Website</label>
										<input type="text" name="website" id="website" class="form-control" placeholder="Website">
										<small id="websiteCheck">This field is required</small>
									</div>
									<div class="form-group col-lg-6 pr-lg-3">
										<label for="firstName">First Name</label>
										<input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name">
										<small id="firstNameCheck">This field is required</small>
									</div>
									<div class="form-group col-lg-6">
										<label for="lastName">Last Name</label>
										<input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name">
										<small id="lastNameCheck">This field is required</small>
									</div>
									<div class="form-group col-lg-6 pr-lg-3">
										<label for="contactNumber">Contact number</label>
										<input type="number" name="contactNumber" id="contactNumber" class="form-control" placeholder="04********">
										<small id="contactNumberCheck">This field is required</small>
									</div>
									<div class="form-group col-lg-6">
										<label for="email">Email</label>
										<input type="email" name="emailAddress" id="emailAddress" class="form-control" placeholder="Email address">
										<small id="emailAddressCheck">This field is invalid</small>
									</div>
									<div class="form-group col-lg-12">
										<label for="password">Password</label>
										<input type="password" name="password" id="password" class="form-control" placeholder="Password">
										<small id="passwordCheck">This field is required</small>
									</div>
									<div class="form-group col-lg-12">
										<label for="reenter-password">Re-Enter Password</label>
										<input type="password" name="reenter-password" id="reenter-password" class="form-control" placeholder="Re-Enter Password">
										<small id="reenterPasswordCheck">This field is required</small>
									</div>

									<div class="col-md-8 m-auto">
										<input type="submit" id="submitBtn" value="Submit" class="btn btn-block login-btn mb-4 mx-auto" />

									</div>

								</form>

								<a href="<?php echo $root_directory; ?>" class="forgot-password-link">Forgot password?</a>

								<p class="already-text">Already have an account?
									<a href="<?php echo $root_directory; ?>/signin.php">Sign In</a>
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
	<?php include '../includes/footer.php' ?>
	<!-- page-specific js -->
	<script>

	</script>

</body>

</html>