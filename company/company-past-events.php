<?php include('../config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../includes/header.php' ?>
</head>

<body>

  <?php include "../includes/navbar.php" ?>


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

              <div class="content-title">
                <h2>Company Events</h2>
                <h4>Past Events</h4>
              </div>


              <div class="event row">
                <?php
                require_once '../conn.php';

                if (isset($_SESSION['accountId'])) {

                  $accountId = mysqli_real_escape_string($mysqli, $_SESSION['accountId']);

                  // $sql = "SELECT event.* FROM accountevent JOIN event ON accountevent.eventId = event.eventId WHERE accountevent.accountId = $accountId AND accountevent.accountEventStatus = 'Applied'  AND event.eventStatus = 'Finished'";
                  $sql = "SELECT Event.* FROM Event WHERE Event.accountId = $accountId AND Event.eventStatus = 'Finished'";

                  $result = mysqli_query($mysqli, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>



                      <div class="col-12">
                        <div class="event-list-content p-3">
                          <ul class="">
                            <li class="mb-2"><i class="fas fa-map-marker-alt"></i> <?php echo $row['address']; ?></li>
                            <li class="mb-2"><i class="far fa-clock"></i> <?php echo $row['startDate'] ?> ,
                              <?php
                              $startTimeAMPM = date("g:i A", strtotime($row['startDate'] . ' ' . $row['startTime']));
                              $endTimeAMPM = date("g:i A", strtotime($row['endDate'] . ' ' . $row['endTime']));
                              echo $startTimeAMPM . ' - ' . $endTimeAMPM;
                              ?></li>
                          </ul>
                          <h2 class="mb-2"><?php echo $row['eventName']; ?></h2>
                          <p class="mb-1"><?php echo $row['description']; ?></p>
                          <a href="<?php echo $root_directory; ?>/events/event-view.php?eventId=<?php echo $row['eventId']; ?>" class="btn btn-main">See Event</a>
                        </div>
                      </div>



                <?php
                    }
                  } else {
                    echo "No events found.";
                  }
                } else {
                  // If accountId is not provided
                  echo "Please provide accountId";
                }
                // Close the database connection
                $mysqli->close();
                ?>
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