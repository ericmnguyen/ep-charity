<?php
session_start();
// ob_start();
// if (!isset($_SESSION['roleId'])) {
//     header("Location: /signin.php");
//     exit();
// }

// Ensure no output before the headers are sent
if (!isset($_GET['companyId']) || ($_GET['companyId'] == '')) {
    header("Location: $root_directory/company/company-list.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/header.php' ?>
</head>

<body>

    <?php include '../includes/navbar.php' ?>

    <div class="container mt-5">
        <a href="<?php echo $root_directory; ?>/company/company-list.php" class="backbtn">
            <i class="fa-solid fa-circle-arrow-left"></i> <span>See Company List</span>
        </a>
    </div>

    <main class="container mt-4">
        <section>

            <div class="event row">
                <?php
                require_once '../conn.php';

                $companyId = $_GET['companyId'];

                $sql = "SELECT e.eventId, e.eventName, e.description, e.eventType, e.startDate, e.endDate, e.startTime, e.endTime, e.venueName, e.address, e.locationType, e.maxAttendees, e.createdAt, e.eventStatus, e.accountId, c.companyId FROM Event e INNER JOIN Account a ON e.accountId = a.accountId INNER JOIN Company c ON a.accountId = c.accountId WHERE c.companyId = $companyId ORDER BY e.startDate";

                $result = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-12 col-lg-6">
                            <div class="event-list-content">
                                <ul class="">
                                    <li><i class="fas fa-map-marker-alt"></i> <?php echo $row['address']; ?></li>
                                    <li><i class="far fa-clock"></i> <?php echo $row['startDate'] ?> ,
                                        <?php
                                        $startTimeAMPM = date("g:i A", strtotime($row['startDate'] . ' ' . $row['startTime']));
                                        $endTimeAMPM = date("g:i A", strtotime($row['endDate'] . ' ' . $row['endTime']));
                                        echo $startTimeAMPM . ' - ' . $endTimeAMPM;
                                        ?></li>
                                </ul>
                                <h2><?php echo $row['eventName']; ?></h2>
                                <p><?php echo $row['description']; ?></p>
                                <a href="<?php echo $root_directory; ?>/events/event-view.php?eventId=<?php echo $row['eventId']; ?>" class="btn btn-main">See Event</a>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "No events found.";
                }

                // Close the database connection
                $mysqli->close();
                ?>
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