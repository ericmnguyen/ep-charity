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
                                    <h4>POINTS COLLECTED</h4>
                                </div>
                                <div class="orders-container">
                                    <div class="row orders-row">
                                        <div class="col-12">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>DATE</th>
                                                        <th>EVENT</th>
                                                        <th>POINTS COLLECTED</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>18-JUL-2024</td>
                                                        <td>EVENT name 1</td>
                                                        <td>5</td>
                                                        <td>
                                                            <button class="btn btn-link">See Event</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>18-JUL-2024</td>
                                                        <td>EVENT name 1</td>
                                                        <td>5</td>
                                                        <td>
                                                            <button class="btn btn-link">See Event</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>18-JUL-2024</td>
                                                        <td>EVENT name 1</td>
                                                        <td>5</td>
                                                        <td>
                                                            <button class="btn btn-link">See Event</button>
                                                        </td>
                                                    </tr>





                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
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