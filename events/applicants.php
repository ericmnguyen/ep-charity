<?php
ob_start();
session_start();

include('../config.php');


// Ensure no output before the headers are sent
// if (!isset($_GET['eventId'])) {
//   header("Location: $root_directory/events/event-list.php");
//   exit;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../includes/header.php' ?>
  <script>
    // function onClickHire(accountId) {
    //   alert(accountId);
    //   $.ajax({
    //     type: "POST",
    //     url: 'attendee-list.php',
    //     data: {
    //       accountId
    //     },
    //     success: function(html) {
    //       alert(html);
    //     }

    //   });
    // }
  </script>
</head>

<body>
  <?php
  include '../includes/navbar.php';
  include '../conn.php';
  ?>
  <div class="container">
    <h1>Applicant list</h1>
    <?php
    $eventId = $_GET['eventId'];
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hireBtn']) && $_POST['randcheck'] == $_SESSION['rand']) {
      // Handle approve applicants
      $applicantAccountId = $_POST['accountId'];
      $approve_query = "UPDATE AccountEvent SET accountEventStatus='Approved' WHERE accountId=$applicantAccountId AND eventId=$eventId";
      $approve_response = mysqli_query($mysqli, $approve_query);
      if (!$approve_response) {
        die(mysqli_connect_error());
      }
    }

    // Handle get applicant list
    $attendee_list_query = "SELECT Account.accountId, Account.emailAddress, Account.firstName, Account.lastName, Account.contactNumber,
                        AccountEvent.*
                        FROM AccountEvent, Account
                        WHERE AccountEvent.accountId = Account.accountId AND AccountEvent.eventId = $eventId";
    $attendee_list_response = mysqli_query($mysqli, $attendee_list_query);

    if (!$attendee_list_response) {
      die(mysqli_connect_error());
    }
    ?>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email Address</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($attendee_list_response->num_rows > 0) {
          $rand = rand();
          $_SESSION['rand'] = $rand;
          while ($row = $attendee_list_response->fetch_array()) {
            echo "
    <form method='post' action=''>
    <input type='hidden' value='$rand' name='randcheck' />
    <tr>
      <td scope='col'>" . $row[0] . "<input type='hidden' value='" . $row['accountId'] . "' name='accountId' /></td>
      <td scope='col'>" . $row["firstName"] . "</td>
      <td scope='col'>" . $row["lastName"] . "</td>
      <td scope='col'>" . $row['emailAddress'] . "</td>";
            if ($row["accountEventStatus"] == 'Approved') {
              echo "<td scope='col' style='color: green;'><i class='fa-solid fa-check'></i> Approved</td>";
            } else {
              echo "<td scope='col'><button name='hireBtn' class='btn btn-main2' type='submit'>Hire</button></td>";
            }
            echo "</tr></form>";
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>