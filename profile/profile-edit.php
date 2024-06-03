<?php
session_start();
ob_start();
include('../config.php');

if (isset($_SESSION['roleId']) != 2) {
	header("Location: $root_directory/signin.php");
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
				validateName("#firstName");
				validateName("#lastName");
				validateContactNumber();
				validateEmail();
				validateDate("#dob");
				const isValidForm =
					validateEmail() &&
					validateDate("#dob") &&
					validateContactNumber() &&
					validateName("#firstName") &&
					validateName("#lastName");
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
	$accountId = $_SESSION["accountId"];

	$staffInfoQuery = "SELECT * FROM Account, Staff WHERE Account.accountId = Staff.accountId AND Account.accountId=$accountId";
	$staffInfoResponse = mysqli_query($mysqli, $staffInfoQuery);
	if (!$staffInfoResponse) {
		die(mysqli_connect_error());
	}
	$staffData = mysqli_fetch_assoc($staffInfoResponse);
	$emailAddress = $staffData["emailAddress"];
	$firstName = $staffData["firstName"];
	$lastName = $staffData["lastName"];
	$contactNumber = $staffData["contactNumber"];
	$address = $staffData["address"];
	$gender = $staffData["gender"];
	$companyName = $staffData["companyName"];
	$website = $staffData["website"];
	$dateOfBirth = $staffData["dateOfBirth"];

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitBtn']) && $_POST['randcheck'] == $_SESSION['rand']) {
		$emailAddress = $_POST["emailAddress"];
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$address = $_POST["address"];
		$gender = $_POST["gender"];
		$dateOfBirth = $_POST["dateOfBirth"];
		$skills = $_POST["skills"];
		$interests = $_POST["interests"];
		$contactNumber = $_POST["contactNumber"];
		$update_account_query = "UPDATE Account SET firstName='$firstName',lastName='$lastName', emailAddress='$emailAddress', contactNumber='$contactNumber' WHERE accountId='$accountId'";
		$update_account_response = mysqli_query($mysqli, $update_account_query);
		if (!$update_account_response) {
			die(mysqli_connect_error());
		}
		$update_staff_query = "UPDATE Staff SET address='$address', dateOfBirth='$dateOfBirth', gender='$gender', skills='$skills', interests='$interests' WHERE accountId='$accountId'";
		$update_staff_response = mysqli_query($mysqli, $update_staff_query);
		if (!$update_staff_response) {
			die(mysqli_connect_error());
		}
		echo "<h3 class='text-success'>Updated successfully.</h3>";
	}
	?>


	<main class="container">
		<section class="profile-container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 mb-4">
						<?php include './profile-topbar.php' ?>
					</div>
					<div class="col-md-3">
						<div class="profile-sidebar-container">
							<?php include 'profile-sidebar.php'; ?>
						</div>
					</div>
					<div class="col-md-9">
						<div class="profile-content">

							<!-- edit account -->
							<div id="acccedit">
								<div class="content-title">
									<h2>Account</h2>
									<h4>Personal details</h4>
								</div>
								<form method="post" action="">
									<?php
									$rand = rand();
									$_SESSION['rand'] = $rand;
									?>
									<input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
									<div class="form-group row">
										<label for="fname" class="col-sm-2 col-form-label">First Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php echo $firstName ?>" name="firstName" id="firstName" placeholder="Enter First Name">
											<small id="firstNameCheck">This field is required</small>
										</div>
									</div>
									<div class="form-group row">
										<label for="lname" class="col-sm-2 col-form-label">Last Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php echo $lastName ?>" name="lastName" id="lastName" placeholder="Enter Last Name">
											<small id="lastNameCheck">This field is required</small>
										</div>
									</div>
									<div class="form-group row">
										<label for="email" class="col-sm-2 col-form-label">E-mail</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php echo $emailAddress ?>" name="emailAddress" id="emailAddress" placeholder="Enter Email Address">
											<small id="emailAddressCheck">This field is invalid</small>
										</div>
									</div>
									<div class="form-group row">
										<label for="mobnum" class="col-sm-2 col-form-label">Mobile Number</label>
										<div class="col-sm-9">
											<input type="number" class="form-control" value="<?php echo $contactNumber ?>" name="contactNumber" id="contactNumber" placeholder="98*********">
											<small id="contactNumberCheck">This field is invalid</small>
										</div>
									</div>
									<div class="form-group row">
										<label for="address" class="col-sm-2 col-form-label">Address</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php echo $address ?>" name="address" id="address" placeholder="Enter Your Address">
										</div>
									</div>
									<div class="form-group row">
										<label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
										<div class="col-sm-9">
											<input type="date" class="form-control" name="dateOfBirth" id="dateOfBirth" value="<?php echo $dateOfBirth ?>">
											<small id="dobCheck">This field is required</small>
										</div>
									</div>
									<div class="form-group row">
										<label for="gender" class="col-sm-2 col-form-label">Gender</label>
										<div class="col-sm-9">
											<select name="gender" value="<?php echo $gender ?>" class="custom-select form-control">
												<option disabled value="none">Select</option>
												<option value="male">Male</option>
												<option value="female">Female</option>
												<option value="other">Other</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label for="skills" class="col-sm-2 col-form-label">Skills</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php echo $skills ?>" name="skills" id="skills" placeholder="Enter Your Skills">
										</div>
									</div>
									<div class="form-group row">
										<label for="interests" class="col-sm-2 col-form-label">Interests</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php echo $skills ?>" name="interests" id="interests" placeholder="Enter Your Interests">
										</div>
									</div>
									<!-- <div class="form-group row">
                                        <label for="pass" class="col-sm-2 col-form-label">Enter Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="pass" placeholder="Enter New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="repass" class="col-sm-2 col-form-label">Re-enter Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="repass" placeholder="Re-enter New Password">
                                        </div>
                                    </div> -->

									<div class="form-group row">
										<div class="offset-2 col-sm-9">
											<button type="submit" id="submitBtn" name="submitBtn" class="btn default-btn">Submit </button>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>




	<!-- footer -->
	<?php include '../includes/footer.php' ?>
	<!-- page-specific js -->
	<script>

	</script>

</body>

</html>