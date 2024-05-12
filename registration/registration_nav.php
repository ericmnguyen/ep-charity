<!DOCTYPE html>
<html lang="en">
<?php

?>
<head>
  <script>
    function onHandleNavigation(role) {
      if (role === 'company') {
        window.location.href = './registration/company_reg.php';
      } else {
        window.location.href = './registration/staff_reg.php';
      }
    }
  </script>
</head>

<body>
  <h2>You are:</h2>
  <button onclick="onHandleNavigation('staff');">Stafsssf</button>
  <button onclick="onHandleNavigation('company');">Company</button>
</body>

</html>