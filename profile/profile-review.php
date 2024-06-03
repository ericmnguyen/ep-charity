<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/header.php' ?>
</head>

<body>

	<?php
	include '../includes/navbar.php';
	include '../conn.php';

	$accountId = $_SESSION["accountId"];

	$reviewsQuery = "SELECT Review.*, Event.eventName
    FROM Review
    JOIN Event ON Review.eventId = Event.eventId
    WHERE Review.accountId='$accountId'";
	$reviewsResponse = mysqli_query($mysqli, $reviewsQuery);
	if (!$reviewsResponse) {
		die(mysqli_connect_error());
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
									<h2>Reviews</h2>
									<h4>Reviews</h4>
								</div>
								<div class="orders-container">
									<div class="row orders-row">
										<div class="col-12">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>DATE</th>
														<th>EVENT</th>
														<th>REVIEWS</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<?php
													if (mysqli_num_rows($reviewsResponse) > 0) {
														while ($row = mysqli_fetch_array($reviewsResponse)) {
															echo "
                              <tr>
                              <td>" . $row["createdAt"] . "</td>
                              <td>" . $row["eventName"] . "</td>
                              <td>" . $row["message"] . "</td>
                              <td>
                                <a href='../events/event-view.php?eventId=" . $row["eventId"] . "' class='btn btn-link'>See Event</a>
                              </td>
                              </tr>
                              ";
														}
													}
													?>
												</tbody>
											</table>
										</div>
									</div>

								</div>
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