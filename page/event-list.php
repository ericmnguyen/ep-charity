<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/header.php' ?>
</head>

<body>

    <?php include '../includes/navbar.php' ?>



    <main class="container">
        <section>
            <div class="event-search">
                <div class="row">
                    <h4>SEARCH</h4>
                    <div class="col-12 col-md-5">
                        <div class="input-group">
                            <span class="input-group-text" id="text">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="searchtxt" aria-label="searchtxt" aria-describedby="text">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="input-group">
                            <span class="input-group-text" id="date">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <input type="date" class="form-control" placeholder="date" aria-label="date" aria-describedby="date">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="input-group">
                            <span class="input-group-text" id="location">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Select Location</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <button type="button" class="btn ms-2 btn-main"> <i class="fa fa-search"></i> </button>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 d-flex justify-content-end">
                        <button class="btn btn-link btn-sm">Reset</button>
                    </div>
                </div>
            </div>
            <div class="event row">
                <div class="col-12 col-lg-6">
                    <div class="event-list-content">
                        <ul class="">
                            <li><i class="fas fa-map-marker-alt"></i> Local Beach</li>
                            <li><i class="far fa-clock"></i> Saturday, June 15th, 9:00 AM - 12:00 PM</li>
                        </ul>
                        <h2>Beach Cleanup Day</h2>
                        <p>Help keep our beaches clean and protect marine life by joining us for a beach cleanup day. Gloves and trash bags will be provided. Let's make a positive impact together!</p>
                        <a href="#" class="btn btn-main">Learn More</a>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="event-list-content">
                        <ul class="">
                            <li><i class="fas fa-map-marker-alt"></i> City Community Garden</li>
                            <li><i class="far fa-clock"></i> Sunday, July 21st, 10:00 AM - 1:00 PM</li>
                        </ul>
                        <h2>Community Garden Planting</h2>
                        <p>Get your hands dirty and contribute to our city's green spaces by planting flowers, herbs, and vegetables in our community garden. No green thumb required – just enthusiasm for gardening and community!</p>
                        <a href="#" class="btn btn-main">Learn More</a>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="event-list-content">
                        <ul class="">
                            <li><i class="fas fa-map-marker-alt"></i> Local Community Center, City</li>
                            <li><i class="far fa-clock"></i>Sunday, July 29th, 9.00 AM - 12.00 PM</li>
                        </ul>
                        <h2>Community Outreach Day 2024</h2>
                        <p>Join us for a day of volunteering and making a positive impact in our community. Whether you're passionate about environmental sustainability, education, or social welfare, there's a place for you to contribute and connect with others.</p>
                        <a href="#" class="btn btn-main">Learn More</a>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="event-list-content">
                        <ul class="">
                            <li><i class="fas fa-map-marker-alt"></i> Local Beach</li>
                            <li><i class="far fa-clock"></i> Saturday, June 15th, 9:00 AM - 12:00 PM</li>
                        </ul>
                        <h2>Beach Cleanup Day</h2>
                        <p>Help keep our beaches clean and protect marine life by joining us for a beach cleanup day. Gloves and trash bags will be provided. Let's make a positive impact together!</p>
                        <a href="#" class="btn btn-main">Learn More</a>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="event-list-content">
                        <ul class="">
                            <li><i class="fas fa-map-marker-alt"></i> Local Senior Center</li>
                            <li><i class="far fa-clock"></i> Saturday, August 10th, 2:00 PM - 4:00 PM</li>
                        </ul>
                        <h2>Senior Center Visitation</h2>
                        <p>Spend an afternoon brightening the day of seniors in our community. Join us for activities, conversations, and companionship at the senior center. Your presence can make a world of difference!</p>
                        <a href="#" class="btn btn-main">Learn More</a>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="event-list-content">
                        <ul class="">
                            <li><i class="fas fa-map-marker-alt"></i> City Park</li>
                            <li><i class="far fa-clock"></i> Sunday, September 8th, 9:30 AM - 12:30 PM</li>
                        </ul>
                        <h2>Park Restoration Project</h2>
                        <p>Help restore and beautify our city park by participating in tree planting, trail maintenance, and litter cleanup. Together, we can preserve our green spaces for future generations to enjoy.</p>
                        <a href="#" class="btn btn-main">Learn More</a>
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