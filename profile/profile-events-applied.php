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
                                    <h4>Applied Events</h4>
                                </div>
                                <div class="event row">
                                    <div class="col-12">
                                        <div class="event-list-content">
                                            <ul class="">
                                                <li><i class="fas fa-map-marker-alt"></i> Local Beach</li>
                                                <li><i class="far fa-clock"></i> Saturday, June 15th, 9:00 AM - 12:00 PM</li>
                                            </ul>
                                            <h2>Beach Cleanup Day</h2>
                                            <a href="#" class="btn btn-main">See event</a>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="event-list-content">
                                            <ul class="">
                                                <li><i class="fas fa-map-marker-alt"></i> City Community Garden</li>
                                                <li><i class="far fa-clock"></i> Sunday, July 21st, 10:00 AM - 1:00 PM</li>
                                            </ul>
                                            <h2>Community Garden Planting</h2>
                                            <a href="#" class="btn btn-main">See event</a>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="event-list-content">
                                            <ul class="">
                                                <li><i class="fas fa-map-marker-alt"></i> Local Community Center, City</li>
                                                <li><i class="far fa-clock"></i>Sunday, July 29th, 9.00 AM - 12.00 PM</li>
                                            </ul>
                                            <h2>Community Outreach Day 2024</h2>
                                            <a href="#" class="btn btn-main">See event</a>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="event-list-content">
                                            <ul class="">
                                                <li><i class="fas fa-map-marker-alt"></i> Local Beach</li>
                                                <li><i class="far fa-clock"></i> Saturday, June 15th, 9:00 AM - 12:00 PM</li>
                                            </ul>
                                            <h2>Beach Cleanup Day</h2>
                                            <a href="#" class="btn btn-main">See event</a>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="event-list-content">
                                            <ul class="">
                                                <li><i class="fas fa-map-marker-alt"></i> Local Senior Center</li>
                                                <li><i class="far fa-clock"></i> Saturday, August 10th, 2:00 PM - 4:00 PM</li>
                                            </ul>
                                            <h2>Senior Center Visitation</h2>
                                            <a href="#" class="btn btn-main">See event</a>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="event-list-content">
                                            <ul class="">
                                                <li><i class="fas fa-map-marker-alt"></i> City Park</li>
                                                <li><i class="far fa-clock"></i> Sunday, September 8th, 9:30 AM - 12:30 PM</li>
                                            </ul>
                                            <h2>Park Restoration Project</h2>
                                            <a href="#" class="btn btn-main">See event</a>
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