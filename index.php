<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './includes/header.php' ?>
</head>

<body>

    <?php include './includes/navbar.php' ?>
    <?php include './includes/alert.php' ?>



    <main>

        <section class="intro" style="background-image: url(https://img.freepik.com/premium-vector/people-digital-communication_1343-615.jpg);">
            <div class="container ">
                <div class="row">
                    <div class="col-xl-10 mx-auto">
                        <h1 class="display-3 fw-bold text-shadow">
                            Who needs my help?</h1>
                        <h3 class="text-lg text-shadow">
                            Find volunteering opportunities</h3>
                        <a class="btn btn-info btn-lg" href="<?php echo $root_directory; ?>/events/event-list.php">START NOW</a>
                    </div>
                </div>
            </div>
        </section>


        <section class="steps">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 px-5 position-relative">
                        <p class="number"> 1</p>
                        <div class="ps-lg-5">
                            <h6 class="text-uppercase"> Explore</h6>
                            <p class="text-muted text-sm mb-5 mb-lg-0"> Browse opportunities or sign up.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 px-5 position-relative">
                        <p class="number"> 2</p>
                        <div class="ps-lg-5">
                            <h6 class="text-uppercase"> Match</h6>
                            <p class="text-muted text-sm mb-5 mb-lg-0"> Find something you like? Click and Apply!</p>
                        </div>
                    </div>
                    <div class="col-lg-4 px-5 position-relative">
                        <p class="number"> 3</p>
                        <div class="ps-lg-5">
                            <h6 class="text-uppercase"> Volunteer</h6>
                            <p class="text-muted text-sm mb-5 mb-lg-0"> It's that simple...</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="bg-white py-5">
            <div class="container">

                <h3>BROWSE EVENTS </h3>
                <br>

                <div class="event row">
                    <?php
                    require_once './conn.php';

                    $sql = "SELECT * FROM Event,Company WHERE Event.eventStatus != 'Finished' AND Event.accountId = Company.accountId";
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
                                    <small><i class="fa-solid fa-building-ngo"></i> <?php echo $row['companyName']; ?></small>
                                    <a href="<?php echo $root_directory; ?>/events/event-view.php?eventId=<?php echo $row['eventId']; ?>" class="btn btn-main">See Event</a>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No events found.";
                    }

                    ?>
                </div>
            </div>
        </section>

        <section class="pt-5 pb-3">
            <div class="container company">

                <h3>BROWSE EVENTS BY COMPANIES </h3>
                <div class="row">
                    <?php
                    require_once './conn.php';

                    $sql = "SELECT * FROM Company";
                    $result = mysqli_query($mysqli, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="col-12 col-md-6 col-lg-4 g-2">
                                <div class="d-flex align-items-center p-3">
                                    <img src="https://source.unsplash.com/random/60x60?sig=<?php echo $row['companyId']; ?>" class="m-2 rounded-circle">
                                    <div>
                                        <h5>
                                            <small> <?php echo $row['companyName']; ?> <br></small>
                                        </h5>
                                        <a class="btn btn-main2 btn-sm me-0" href="<?php echo $root_directory; ?>/events/event-list.php?companyId=<?php echo $row['companyId']; ?>">See Events </a>
                                        <a href="<?php echo $row['website'] ?>" target="_blank" class=" btn btn-outline-success btn-sm">See Website</a>

                                    </div>

                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No Companies.";
                    }

                    // Close the database connection
                    $mysqli->close();
                    ?>
                </div>
            </div>
        </section>
    </main>




    <!-- footer -->
    <?php include './includes/footer.php' ?>
    <!-- page-specific js -->
    <script>

    </script>

</body>

</html>