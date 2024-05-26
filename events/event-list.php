<?php
session_start();
// ob_start();
// if (!isset($_SESSION['roleId'])) {
//     header("Location: /signin.php");
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/header.php' ?>
</head>

<body>

    <?php include '../includes/navbar.php' ?>

    <?php
    // Check if success message is set and display it
    if (isset($_SESSION['success_message'])) {
        echo '<div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert">';
        echo '<strong>Nice!</strong> ' . $_SESSION["success_message"] . ' ';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show mx-3 mt-3" role="alert">';
        echo '<strong>Opps!</strong> ' . $_SESSION["error_message"] . ' ';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
        unset($_SESSION['error_message']);
    }

    ?>


    <?php
    // include '../conn.php';
    // $searchText = $_GET['searchText'];
    // $startDate = $_GET['startDate'];
    // echo "----- " . $searchText;
    // echo "----- " . $startDate;
    // $search_query = "SELECT * FROM Event 
    // WHERE (eventName LIKE '%$searchText%' OR eventType LIKE '%$searchText%' OR address LIKE '%$searchText%') 
    // AND startDate LIKE'%$startDate%'";
    // $searchList = mysqli_query($mysqli, $search_query);
    ?>


    <main class="container">
        <section>
            <div class="event-search">
                <div class="row">
                    <h4>SEARCH</h4>
                    <form action="" method="get">
                        <div class="col-12 col-md-5">
                            <div class="input-group">
                                <span class="input-group-text" id="text">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <input name="searchText" type="text" class="form-control" placeholder="Event name, address, event type " aria-label="searchtxt" aria-describedby="text">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="input-group">
                                <span class="input-group-text" id="date">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <input name="startDate" type="date" class="form-control" placeholder="date" aria-label="date" aria-describedby="date">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="input-group">
                                <button type="submit" class="btn ms-2 btn-main"> <i class="fa fa-search"></i> </button>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 d-flex justify-content-end">
                            <button class="btn btn-link btn-sm">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="event row">
                <?php
                require_once '../conn.php';
                $searchText = $_GET['searchText'];
                $startDate = $_GET['startDate'];
                $roleId = $_SESSION['roleId'];
                $accountId = $_SESSION['accountId'];
                // if ($roleId == 1) {
                //     $sql = "SELECT * FROM Event 
                //         WHERE (eventName LIKE '%$searchText%' OR eventType LIKE '%$searchText%' OR address LIKE '%$searchText%') 
                //         AND startDate LIKE'%$startDate%' AND accountId=$accountId";
                // } else {
                    $sql = "SELECT * FROM Event 
                        WHERE (eventName LIKE '%$searchText%' OR eventType LIKE '%$searchText%' OR address LIKE '%$searchText%') 
                        AND startDate LIKE'%$startDate%'";
                // }
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
                                <a href="/events/event-view.php?eventId=<?php echo $row['eventId']; ?>" class="btn btn-main">See Event</a>
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