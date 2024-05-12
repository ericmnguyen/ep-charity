<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './includes/header.php' ?>
</head>

<body>

    <?php include './includes/navbar.php' ?>

    <div class="sign-body">
        <section class="sign-container container">
            <div class="container-box">
                <div class="row">
                    <div class="col-lg-5 bg">
                        <h6 class="card-title">SIGN IN TO <br> <span>Social Volunteer</span></h6>

                        <p>
                            Welcome, <br><br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia quia laboriosam reprehenderit culpa neque, obcaecati repudiandae debitis, amet accusamus autem placeat voluptatibus libero. Quos nihil, sint itaque qui quidem corporis! Aepellat aliquam culpa exercitationem tenetur sunt officia dicta.
                        </p>
                    </div>
                    <div class="col-lg-7">
                        <div class="card-box">
                            <div class="card-body">
                                <h6 class="card-title">Login</h6>



                                <form action="" class="row no-gutters" style="max-width: 100%;">

                                    <div class="form-group col-lg-12">
                                        <label for="regemail">Email</label>
                                        <input type="email" name="regemail" id="regemail" class="form-control" placeholder="Email address">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="col-md-12 text-align-start">
                                        <a class="btn login-btn mb-4" href="./profile.php">Login</a>
                                    </div>
                                </form>

                                <a href="./forgotpassword.php" class="forgot-password-link">Forgot password?</a>

                                <p class="already-text">Create an account.
                                    <a href="./signup-volunteer.php">Sign Up</a>
                                </p>


                                <p class="already-text">Do you want to add your Comapny Events here?
                                    <br>
                                    <a href="./signup-company.php">Create an Company Account</a>
                                </p>


                                <nav class="login-card-footer-nav">
                                    <a href="">Terms of use.</a>
                                    <a href="">Privacy policy</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- footer -->
    <?php include './includes/footer.php' ?>
    <!-- page-specific js -->
    <script>

    </script>

</body>

</html>