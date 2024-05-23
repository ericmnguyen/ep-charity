
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/header.php' ?>
</head>

<body>

    <?php include '../includes/navbar.php' ?>


    <main class="container">
        <section class="profile-container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mb-4">
                        <?php include './profile-topbar.php' ?>
                    </div>
                    <div class="col-md-3">
                        <div class="profile-sidebar-container">
                            <?php include 'profile-sidebar.php'; ?>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="profile-content">

                            <!-- edit account -->
                            <div id="acccedit">
                                <div class="content-title">
                                    <h2>Account</h2>
                                    <h4>Personal details</h4>
                                </div>
                                <form>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="lname" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="email" placeholder="Enter Email Address">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobnum" class="col-sm-2 col-form-label">Mobile Number</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="mobnum" placeholder="98*********">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="dob" placeholder="98*********">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tele" class="col-sm-2 col-form-label">Telephone</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="tele" placeholder="55*****">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-9">
                                            <select class="custom-select form-control">
                                                <option selected>Select</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pass" class="col-sm-2 col-form-label">Enter Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="pass" placeholder="Enter New Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="repass" class="col-sm-2 col-form-label">Re-enter Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="repass" placeholder="Re-enter New Password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-2 col-sm-9">
                                            <button type="submit" class="btn default-btn">Submit </button>
                                        </div>
                                    </div>

                                </form>
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