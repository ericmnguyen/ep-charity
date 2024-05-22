<?php
//session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../includes/header.php' ?>
</head>

<body>
  <?php
    include '../includes/navbar.php';
    echo '<h2>RoleId: ' . $_SESSION['roleId'] . ", Email: " . $_SESSION['emailAddress'] . '</h2>';
  ?>
  <h2>This is company dashboard</h2>
  <a href = "signout.php" tite = "Logout">Sign out</a>
</body>

</html>
