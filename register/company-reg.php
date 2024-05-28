<!-- no access if signed in -->
<?php
session_start();
ob_start();

    include('../config.php');
    

if (isset($_SESSION['roleId'])) {
  header("Location: $root_directory/profile/profile-edit.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php

?>

<head>
  <script>
    function validateForm() {
      let formVal = document.forms["company-registration-form"];
      // TODO: form validation
      let password = formVal['password'].value;
      let reTypePassword = formVal['retype-password'].value;

      console.log('password ', password);

      if (password === reTypePassword) {
        return true;
      }
      return false;
    }
  </script>
</head>

<body>
  <h2>You are Company Representative!</h2>
  <form name="company-registration-form" method="post">
    <label for="email">Email Address <input name="emailAddress" type="text"></label><br /><br />
    <label for="pwd">Password <input name="password" type="password"></label><br /><br />
    <label for="retype-pwd">Retype Password <input name="retype-password" type="password"></label><br /><br />
    <label for="firstName">Company Representative First Name <input name="firstName" type="text"></label><br /><br />
    <label for="lastName">Company Representative Last Name <input name="lastName" type="text"></label><br /><br />
    <label for="companyName">Company Name <input name="companyName" type="text"></label><br /><br />
    <label for="contactNumber">Contact Number <input name="contactNumber" type="text" value="+64"></label><br />
    <button type="reset">Reset</button>
    <button type="submit" onclick="return validateForm();">Submit</button>
    </p>
  </form>
</body>

</html>