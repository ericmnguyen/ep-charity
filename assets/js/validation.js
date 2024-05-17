function validateName(id) {
  let name = $(id).val();
  if (name.length == "") {
    $(id + "Check").show();
    $(id).addClass('error');
  } else {
    $(id + "Check").hide();
    $(id).removeClass('error');
    return true;
  }
  return false;
};

function validateEmail() {
  let email = $("#emailAddress").val();
  let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
  if (regex.test(email)) {
    $("#emailAddress").removeClass("error");
    $("#emailAddressCheck").hide();
    return true;
  } else {
    $("#emailAddress").addClass("error");
    $("#emailAddressCheck").show();
  }
  return false;
};

function validatePassword() {
  let password = $("#password").val();
  let rePassword = $("#reenter-password").val();
  let passwordValid, rePasswordValid = false;
  $("#passwordCheck").hide();
  $("#reenterPasswordCheck").hide();
  $("#passwordCheck").html('This field is required.');
  $("#reenterPasswordCheck").html('This field is required.');
  if(!password) {
    $("#password").addClass("error");
    $("#passwordCheck").show();
  } else if (password.length < 8) {
    $("#password").addClass("error");
    $("#passwordCheck").show();
    $("#passwordCheck").html('Should have more than 8 characters.');
  } else {
    $("#password").removeClass("error");
    $("#passwordCheck").hide();
    passwordValid = true;
  }
  if(!rePassword) {
    $("#reenter-password").addClass("error");
    $("#reenterPasswordCheck").show();
  } else if (password !== rePassword) {
    $("#reenter-password").addClass("error");
    $("#reenterPasswordCheck").show();
    $("#reenterPasswordCheck").html('This field does not match with password field.');
  } else {
    $("#reenter-password").removeClass("error");
    $("#reenterPasswordCheck").hide();
    rePasswordValid = true;
  }
  return passwordValid && rePasswordValid;
};