<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/header.php' ?>
</head>

<body>

    <?php include '../includes/navbar.php' ?>


    <main class="profile-container">
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
                                    <div class="offset-2 col-sm-9">
                                        <button type="submit" class="btn default-btn">Submit </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <br>
                        <!-- change password -->
                        <div id="passchange">
                            <div class="content-title">
                                <h2>password</h2>
                                <h4>Change your password</h4>
                            </div>
                            <form>
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
                        <br>
                        <!-- address -->
                        <div id="address">
                            <div class="content-title">
                                <h2>Address</h2>
                                <h4>Manage your Address</h4>
                            </div>
                            <button class="btn btn-add" type="button" data-bs-toggle="collapse" data-bs-target="#addaddresstoggle" aria-expanded="false" aria-controls="addaddresstoggle">
                                <span class="p-2">Add New Address</span> <i class="fa fa-plus"></i>
                            </button>

                            <div class="collapse" id="addaddresstoggle">
                                <form>
                                    <div class="form-group row">
                                        <label for="adname" class="col-sm-2 col-form-label">Street</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="adname" placeholder="Enter Full Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="city" class="col-sm-2 col-form-label">City</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="city" placeholder="Enter City">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="state" class="col-sm-2 col-form-label">State</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="state" placeholder="Enter State">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="country" class="col-sm-2 col-form-label">Country</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="country" placeholder="Enter Nepal">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="zcode" class="col-sm-2 col-form-label">Post Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="zcode" placeholder="Enter Zip Code">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="country" class="col-sm-2 col-form-label">Contact Number</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="country" placeholder="Enter Phone / Mob">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-2 col-sm-9">
                                            <button type="submit" class="btn default-btn">Submit </button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div class="address-table table-responsive">
                                <table class="table table-light table-borderless">
                                    <tbody>
                                        <tr class="address-row row">
                                            <td class="address col-sm-8">
                                                <strong> 161-169 Macquarie St, Parramatta</strong>
                                                <br>
                                                NSW, 2150, Australia
                                                <br>
                                                <i class="fa fa-phone-square-alt me-1"></i>4256910

                                            </td>
                                            <td class="address-btns col-sm-4">
                                                <button class="btn btn-sm btn-success">
                                                    <span>Edit</span><i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    <span>Delete</span><i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> <br>
                            </div>

                        </div>
                        <br>
                        <!-- my payment -->
                        <div id="history">
                            <div class="content-title">
                                <h2>My Payment History</h2>
                                <h4>My Payment History</h4>
                            </div>


                            <div class="orders-container">
                                <div class="row orders-row">
                                    <div class="col-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>DATE</th>
                                                    <th>DESCRIPTION</th>
                                                    <th>TERM</th>
                                                    <th>CHARGE</th>
                                                    <th>PAYMENT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>18-JUL-2023</td>
                                                    <td>Payment</td>
                                                    <td>23 - Spring</td>
                                                    <td></td>
                                                    <td>$18,000.00</td>
                                                </tr>
                                                <tr>
                                                    <td>17-JUN-2023</td>
                                                    <td>Tuition: INFO 6001 - SPR</td>
                                                    <td>23 - Spring</td>
                                                    <td>$4,500.00</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>17-JUN-2023</td>
                                                    <td>Tuition: INFS 7008 - SPR</td>
                                                    <td>23 - Spring</td>
                                                    <td>$4,500.00</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>17-JUN-2023</td>
                                                    <td>Tuition: INFO 7016 - SPR</td>
                                                    <td>23 - Spring</td>
                                                    <td>$4,500.00</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>17-JUN-2023</td>
                                                    <td>Tuition: INFO 7015 - SPR</td>
                                                    <td>23 - Spring</td>
                                                    <td>$4,500.00</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>25-MAY-2023</td>
                                                    <td>Payment</td>
                                                    <td>23 - Autumn, SC1, WSTC T1</td>
                                                    <td></td>
                                                    <td>$180.00</td>
                                                </tr>
                                                <tr>
                                                    <td>01-MAY-2023</td>
                                                    <td>Student Amenity Fee</td>
                                                    <td>23 - Autumn, SC1, WSTC T1</td>
                                                    <td>$180.00</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>23-FEB-2023</td>
                                                    <td>Payment</td>
                                                    <td>23 - Autumn, SC1, WSTC T1</td>
                                                    <td></td>
                                                    <td>$18,000.00</td>
                                                </tr>
                                                <tr>
                                                    <td>15-FEB-2023</td>
                                                    <td>Tuition: COMP 7003 - AUT</td>
                                                    <td>23 - Autumn, SC1, WSTC T1</td>
                                                    <td>$4,500.00</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>30-JAN-2023</td>
                                                    <td>Tuition: INFO 7014 - AUT</td>
                                                    <td>23 - Autumn, SC1, WSTC T1</td>
                                                    <td>$4,500.00</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>30-JAN-2023</td>
                                                    <td>Tuition: NATS 7057 - AUT</td>
                                                    <td>23 - Autumn, SC1, WSTC T1</td>
                                                    <td>$4,500.00</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>30-JAN-2023</td>
                                                    <td>Tuition: INFO 7003 - AUT</td>
                                                    <td>23 - Autumn, SC1, WSTC T1</td>
                                                    <td>$4,500.00</td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>07-NOV-2022</td>
                                                    <td>Payment</td>
                                                    <td>2022 Semester 2</td>
                                                    <td></td>
                                                    <td>$160.00</td>
                                                </tr>
                                                <tr>
                                                    <td>19-OCT-2022</td>
                                                    <td>Student Amenity Fee</td>
                                                    <td>2022 Semester 2</td>
                                                    <td>$160.00</td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <br>
                        <!-- method -->
                        <div id="method">
                            <div class="content-title">
                                <h2>Connected Banks</h2>
                                <h4>Manage your Banks</h4>
                            </div>

                            <a href="/bank.php">
                                <button class="btn btn-add" type="button">
                                    <span class="p-2">Add New Bank</span> <i class="fa fa-plus"></i>
                                </button>
                            </a>

                            <div class="address-table table-responsive">
                                <table class="table table-light table-borderless">
                                    <tbody>
                                        <tr class="address-row row">
                                            <td class="address col-sm-8">
                                                <strong>Commonwealth Bank</strong>
                                                <br>
                                                Pratik Bajracharya
                                                <br>
                                                062-101 12345690
                                                <br>

                                            </td>
                                            <td class="address-btns col-sm-4">
                                                <button class="btn btn-sm btn-success">
                                                    <span>Default</span><i class="fa fa-check-double"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    <span>Delete</span><i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="address-row row">
                                            <td class="address col-sm-8">
                                                <strong>ANZ Bank</strong>
                                                <br>
                                                Pratik Bajracharya
                                                <br>
                                                012-101 78945654
                                                <br>

                                            </td>
                                            <td class="address-btns col-sm-4">
                                                <button class="btn btn-sm btn-warning">
                                                    <span>Make Default</span><i class="fa fa-check"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    <span>Delete</span><i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>




    <!-- footer -->
    <?php include '../includes/footer.php' ?>
    <!-- page-specific js -->
    <script>

    </script>

</body>

</html>