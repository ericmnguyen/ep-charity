<?php
session_start();
ob_start();
include('../config.php');

if (isset($_SESSION['roleId']) != 1) {
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
				validateName("#companyName");
				validateName("#firstName");
				validateName("#lastName");
				validateContactNumber();
				validateEmail();
				const isValidForm = validateName("#companyName") &&
					validateEmail() &&
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

	$companyInfoQuery = "SELECT * FROM Account, Company WHERE Account.accountId = Company.accountId AND Account.accountId=$accountId";
	$companyInfoResponse = mysqli_query($mysqli, $companyInfoQuery);
	if (!$companyInfoResponse) {
		die(mysqli_connect_error());
	}
	$companyData = mysqli_fetch_assoc($companyInfoResponse);
	$emailAddress = $companyData["emailAddress"];
	$firstName = $companyData["firstName"];
	$lastName = $companyData["lastName"];
	$contactNumber = $companyData["contactNumber"];
	$companyName = $companyData["companyName"];
	$website = $companyData["website"];

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitBtn']) && $_POST['randcheck'] == $_SESSION['rand']) {
		$emailAddress = $_POST["emailAddress"];
		$companyName = $_POST["companyName"];
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$contactNumber = $_POST["contactNumber"];
		$website = $_POST["website"];

		$update_account_query = "UPDATE Account SET firstName='$firstName',lastName='$lastName', emailAddress='$emailAddress', contactNumber='$contactNumber' WHERE accountId='$accountId'";
		$update_account_response = mysqli_query($mysqli, $update_account_query);
		if (!$update_account_response) {
			die(mysqli_connect_error());
		}
		$update_company_query = "UPDATE Company SET companyName='$companyName', website='$website' WHERE accountId='$accountId'";
		$update_company_response = mysqli_query($mysqli, $update_company_query);
		if (!$update_company_response) {
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
						<?php include './company-topbar.php' ?>
					</div>
					<div class="col-md-3">
						<div class="profile-sidebar-container">
							<?php include 'company-sidebar.php'; ?>
						</div>
					</div>
					<div class="col-md-9">
						<div class="profile-content">

							<!-- edit account -->
							<div id="acccedit">
								<div class="content-title">
									<h2>Account</h2>
									<h4>Organisation details</h4>
								</div>
								<form method="post" action="">
									<?php
									$rand = rand();
									$_SESSION['rand'] = $rand;
									?>
									<input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
									<div class="form-group row">
										<label for="fname" class="col-sm-2 col-form-label">Name</label>
										<div class="col-sm-9">
											<input type="text" value="<?php echo $companyName ?>" class="form-control" name="companyName" id="companyName" placeholder="Enter Company Name">
											<small id="companyNameCheck">This field is required</small>
										</div>
									</div>
									<div class="form-group row">
										<label for="lname" class="col-sm-2 col-form-label">Website</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="website" id="website" value="<?php echo $website ?>" placeholder="Enter Company Website">
											<small id="websiteCheck">This field is required</small>
										</div>
									</div>

									<br>
									<div class="content-title">
										<h4>Organisation Representative details</h4>
									</div>

									<div class="form-group row">
										<label for="fname" class="col-sm-2 col-form-label">First Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value=<?php echo $firstName ?> name="firstName" id="firstName" placeholder="Enter First Name">
											<small id="firstNameCheck">This field is required</small>
										</div>
									</div>
									<div class="form-group row">
										<label for="lname" class="col-sm-2 col-form-label">Last Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value=<?php echo $lastName ?> name="lastName" id="lastName" placeholder="Enter Last Name">
											<small id="lastNameCheck">This field is required</small>
										</div>
									</div>
									<div class="form-group row">
										<label for="email" class="col-sm-2 col-form-label">E-mail</label>
										<div class="col-sm-9">
											<input type="email" class="form-control" value=<?php echo $emailAddress ?> name="emailAddress" id="emailAddress" placeholder="Enter Email Address">
											<small id="emailAddressCheck">This field is invalid</small>
										</div>
									</div>
									<div class="form-group row">
										<label for="mobnum" class="col-sm-2 col-form-label">Contact Number</label>
										<div class="col-sm-9">
											<input type="number" class="form-control" value=<?php echo $contactNumber ?> name="contactNumber" id="contactNumber" placeholder="04********">
											<small id="contactNumberCheck">This field is invalid</small>
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
											<button type="submit" name="submitBtn" class="btn default-btn">Submit </button>
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