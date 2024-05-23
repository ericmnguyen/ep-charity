<?php
ob_start();
session_start();
// Ensure no output before the headers are sent
// if (!isset($_GET['eventId'])) {
//     header("Location: /events/event-list.php");
//     exit;
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/header.php' ?>
</head>

<body>




    <?php
    include '../includes/navbar.php';

    include '../conn.php';

    $eventId = $_GET['eventId'];
    $sqlEvent = "SELECT * FROM event WHERE eventId = '$eventId'";
    $resultEvent = mysqli_query($mysqli, $sqlEvent);

    // Check for errors
    if (!$resultEvent) {
        die("Error executing  query: " . mysqli_error($mysqli));
    }

    // Fetch the book details
    if (mysqli_num_rows($resultEvent) > 0) {
        $rowEvent = mysqli_fetch_assoc($resultEvent);
        $eventId = $rowEvent['eventId'];
        $eventName = $rowEvent['eventName'];
        $description = $rowEvent['description'];
        $eventType = $rowEvent['eventType'];
        $startDate = $rowEvent['startDate'];
        $endDate = $rowEvent['endDate'];
        $startTime = $rowEvent['startTime'];
        $endTime = $rowEvent['endTime'];
        $venueName = $rowEvent['venueName'];
        $address = $rowEvent['address'];
        $locationType = $rowEvent['locationType'];
        $maxAttendees = $rowEvent['maxAttendees'];
        $createdAt = $rowEvent['createdAt'];
        $eventStatus = $rowEvent['eventStatus'];
        $accountId = $rowEvent['accountId'];
    } else {
        die("No Event found.");
    }





    // Get company and account details based on the accountId
    $sqlAccountCompany = "
            SELECT 
                Account.accountId,
                Account.emailAddress,
                Account.password,
                Account.firstName,
                Account.lastName,
                Account.contactNumber,
                Account.createdDate,
                Company.companyId,
                Company.companyName,
                Company.website,
                Company.image
            FROM 
                Account
            JOIN 
                Company ON Account.accountId = Company.accountId
            WHERE 
            Account.accountId = '$accountId'";
    $resultAccountCompany = mysqli_query($mysqli, $sqlAccountCompany);

    // Check for errors
    if (!$resultAccountCompany) {
        die("Error executing query: " . mysqli_error($mysqli));
    }

    // Fetch the company and account details
    if (mysqli_num_rows($resultAccountCompany) > 0) {
        $rowAccountCompany = mysqli_fetch_assoc($resultAccountCompany);
        $emailAddress = $rowAccountCompany['emailAddress'];
        $firstName = $rowAccountCompany['firstName'];
        $lastName = $rowAccountCompany['lastName'];
        $contactNumber = $rowAccountCompany['contactNumber'];
        // $companyId = $rowAccountCompany['companyId'];
        $companyName = $rowAccountCompany['companyName'];
        $website = $rowAccountCompany['website'];
        $companyImage = $rowAccountCompany['image'];
    } else {
        die("No company found for the specified account ID.");
    }


    // Initialize variables
    $accountEventStatus = '';

    if (isset($_SESSION['accountId']) && isset($_GET['eventId'])) {
        $accountId = mysqli_real_escape_string($mysqli, $_SESSION['accountId']);
        $eventId = mysqli_real_escape_string($mysqli, $_GET['eventId']);

        $sql = "SELECT accountEventStatus FROM accountevent WHERE accountId = ? AND eventId = ?";
        $stmt = $mysqli->prepare($sql);

        $stmt->bind_param("ii", $accountId, $eventId);
        $stmt->execute();
        $stmt->bind_result($accountEventStatus);
        $stmt->fetch();

        echo $accountEventStatus;

        $stmt->close();
    } 


    ?>



    <?php
    include '../conn.php';
    $currentURL = $_SERVER['REQUEST_URI'];

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $eventIdApply = $_POST["eventId"];
        $accountIdApply = $_POST["accountId"];

        $sql = "INSERT INTO accountevent (eventId, accountId, accountEventStatus) VALUES (?, ?, 'Applied')";
        $stmt = $mysqli->prepare($sql);

        $stmt->bind_param("ii", $eventIdApply, $accountIdApply);

        // Execute statement
        if ($stmt->execute() === TRUE) {
            $_SESSION['success_message'] = "asdasd Created.";
            echo "Record inserted successfully";
            echo '<script>alert("Form submitted. Event ID: ' . $eventIdApply  . ' ' . $_GET['eventId'] . ', Account ID: ' . $accountIdApply . '");</script>';
            // header("Location: $currentURL");
            header("Location: /events/event-list.php");
        } else {
            $_SESSION['error_message'] = "asdasd Not Created.";
            // echo "Error: " . $sql . "<br>" . $mysqli->error;
            // echo '<script>alert("Form submitted. Event ID: ' . $eventIdApply . ', Account ID: ' . $accountIdApply . '");</script>';
            header("Location: /events/event-list.php");
        }

        // Close statement
        $stmt->close();
    }




    ?>


    <div class="event-banner">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13259.592462159666!2d150.9984115508324!3d-33.81494224218676!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12a318e167af4f%3A0x5017d681632c600!2sParramatta%20NSW%202150!5e0!3m2!1sen!2sau!4v1715585024195!5m2!1sen!2sau" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


    <main class="container">




        <div class="event-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="event-block">

                        <!-- Event details -->
                        <div class="row">

                            <h1><?php echo $eventName ?></h1>

                            <?php
                            if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 1)) {
                                if ($accountId === $_SESSION['accountId']) {
                            ?>
                                    <div class="d-flex gap-3 mb-5 alert alert-dark">
                                        <h4 class="mr-4 mb-0"> Admin Actions: </h4>
                                        <a href="/events/event-edit.php?eventId=<?php echo $eventId; ?>" class="btn btn-warning">EDIT</a>
                                        <button class="btn btn-danger">DELETE</button>
                                    </div>
                            <?php
                                }
                            }
                            ?>


                            <p class="text-muted">
                                <i class="fa-map-marker-alt fa me-3"> </i>
                                <a class="text-muted"> <?php echo $venueName ?></a>
                                |
                                <a class="text-muted"> <?php echo $address ?></a>
                                |
                                <a class="text-muted"> <?php echo $locationType ?></a>

                            </p>
                            <p class="text-muted">
                                <i class="fa-map-marker-alt fa me-3"> </i>
                                <a class="text-muted">Event Type: <?php echo $eventType ?></a>

                            </p>
                            <p class="text-muted">
                                <i class="fa-map-marker-alt fa me-3"> </i>
                                <a class="text-muted">Max Attendees: <?php echo $maxAttendees ?></a>
                            </p>

                            <ul class="list-inline text-sm mb-4">
                                <li class="list-inline-item me-3 my-1"> <i class="fa fa-tags text-primary me-3"> </i> <?php echo $eventStatus ?> </li>
                            </ul>

                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="text-uppercase text-sm text-muted mb-0"><i class="far fa-clock me-2"></i>Posted on <?php echo $createdAt ?></p>
                                </div>
                                <div class="col-lg-6">
                                    <p class="text-uppercase text-sm text-muted mb-0"><i class="far fa-clock me-2"></i>Last updated on <?php echo $createdAt ?></p>
                                </div>
                            </div>

                        </div>

                        <hr class="mt-3 mb-5">

                        <!-- event description -->
                        <div class="row my-3">
                            <p class="text-muted">
                                <?php echo $description ?>
                            </p>

                        </div>
                    </div>

                    <!-- Event Date and time -->
                    <div class="event-block">
                        <h4 class="mb-4">
                            Date and Time
                        </h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="text-uppercase text-sm text-muted"><i class="far fa-calendar me-2"></i>Start date: <?php echo $startTime ?> </p>
                            </div>
                            <div class="col-lg-6">
                                <p class="text-uppercase text-sm text-muted"><i class="far fa-calendar me-2"> </i>End date: - <?php echo $endDate ?></p>
                            </div>
                            <div class="col-lg-6">
                                <p class="text-uppercase text-sm text-muted"><i class="far fa-clock me-2"> </i>Time:
                                    <?php
                                    $startTimeAMPM = date("g:i A", strtotime($startDate . ' ' . $startTime));
                                    $endTimeAMPM = date("g:i A", strtotime($endDate . ' ' . $endTime));
                                    echo $startTimeAMPM . ' - ' . $endTimeAMPM;
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>


                    <!-- Posted by -->
                    <div class="event-block mt-5 border-bottom">
                        <div class="d-flex">
                            <div>
                                <p>
                                    <span class="text-muted text-uppercase text-sm">
                                        Posted by
                                    </span>
                                    <br>
                                    <a class="text-uppercase" href="">
                                        <p> <?php echo $firstName ?> <?php echo $lastName ?> (Organization Representative)</p>
                                        <h4> <?php echo $companyName ?></h4>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 my-lg-0 my-5 apply-block">
                    <div class="card mb-5 ms-lg-4">
                        <div class="card-header bg-white py-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <p class="subtitle text-sm">
                                        Organisation information
                                    </p>
                                    <h4>
                                        Who are we?
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <a class="text-uppercase" href="">
                                <h4>
                                    <?php echo $companyName ?>
                                </h4>
                            </a>
                            <p class="text-muted py-2">
                            </p>

                            <!-- social media and contact links -->
                            <ul class="list-inline mb-0 socials">
                                <li class="list-inline-item mb-3">
                                    <a class="text-primary text-lg" target="_blank" href=" <?php echo $website ?>">
                                        <i class="fa me-2 fa-globe "></i> <?php echo $website ?>
                                    </a>
                                </li>
                                <br>
                                <li class="list-inline-item mb-3">
                                    <a class="text-primary text-lg" target="_blank" href="mailto:<?php echo $emailAddress ?>">
                                        <i class="me-2 fa fa-envelope"></i> <?php echo $emailAddress ?>
                                    </a>
                                </li>
                                <br>
                                <li class="list-inline-item mb-3">
                                    <a class="text-primary text-lg" target="_blank" href="tel:<?php echo $contactNumber ?>">
                                        <i class="fa me-2 fa-phone"></i> <?php echo $contactNumber ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body border m-4 rounded">
                            <p class="text-muted text-sm">
                                Apply for this opportunity
                            </p>

                            <?php
                            if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 2)) {
                                if ($accountEventStatus == "Applied") {
                                    echo ' <a class="btn btn-success disabled">Applied</a>';
                                } else {
                            ?>

                                    <div class="d-grid mb-4">
                                        <a class="btn btn-main2" href="" data-bs-toggle="modal" data-bs-target="#applyModal">
                                            Apply Now
                                        </a>
                                    </div>

                                    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="applyModalLabel">Quick Apply</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?eventId=' . $eventId; ?>">
                                                    <div class="modal-body">


                                                        <input type="hidden" name="eventId" value="<?php echo $eventId ?>">
                                                        <input type="hidden" name="accountId" value=" <?php echo $_SESSION['accountId'] ?>">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                             
                            } elseif (isset($_SESSION['roleId']) && ($_SESSION['roleId'] == 1)) {
                            ?>
                                <div class="d-grid mb-4">
                                    Company Account cannot apply. User your volunteer account.
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="d-grid mb-4">
                                    <a class="btn btn-main2" href="/signin.php">
                                        Sign in to Apply
                                    </a>
                                </div>
                            <?php
                            }
                            ?>






                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>




    <!-- footer -->
    <?php include '../includes/footer.php' ?>
    <!-- page-specific js -->

</body>

</html>