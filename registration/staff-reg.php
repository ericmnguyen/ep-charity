<!DOCTYPE html>
<html lang="en">
<?php
$emailAddress = $_POST["emailAddress"];
echo "email address ne: " . $emailAddress;
?>

<head>
  <script>
    function validateForm() {
      let formVal = document.forms["staff-registration-form"];
      // TODO: form validation

      return false;
    }
  </script>
</head>

<body>
  <h2>You are staff!</h2>
  <form name="staff-registration-form" method="post">
    <label for="email">Email Address <input name="emailAddress" type="text"></label><br /><br />
    <label for="pwd">Password <input name="password" type="password"></label><br /><br />
    <label for="retype-pwd">Retype Password <input name="retype-password" type="password"></label><br /><br />
    <label for="firstName">First Name <input name="firstName" type="text"></label><br /><br />
    <label for="lastName">Last Name <input name="lastName" type="text"></label><br /><br />
    <label for="contactNumber">Contact Number <input name="contactNumber" type="text" value="+64"></label><br />
    <label for="birthday">Birthday:</label>
    <input type="date" id="birthday" name="birthday">
    <button type="reset">Reset</button>
    <button type="submit" onclick="return validateForm();">Submit</button>
    </p>
  </form>
</body>

</html>