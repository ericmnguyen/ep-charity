<?php
// Check if a session is already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// // Debugging: Output session information
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";


?>

<div class="topbar">
    <div class="container-fluid">
        <div class="social">
            <a href="./"><i class="fab fa-instagram-square"></i></a>
            <a href="./"><i class="fab fa-facebook-square"></i></a>
            <a href="./"><i class="fab fa-twitter-square"></i></a>
        </div>

        <div class="offer">
            <!-- <a href="./"> New Events</a> -->

            <a href="">1:company and 2:Volunter................</a> 

            <?php
            if (isset($_SESSION['roleId'])) {
                echo '<a>Welcome, accountId : ' . htmlspecialchars($_SESSION['accountId']) . ", roleId :" . htmlspecialchars($_SESSION['roleId']) . '</a>';
            } else {
                echo '<a>Welcome, Guest!</a>';
            }
            ?>
        </div>

        <div class="help">
            <a href="./">Blog</a>
            <a href="./">Need Help?</a>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg mainnav shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="../assets/img/logo1.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-chevron-down"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="upper">
                <form class="search-bar-nav">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>



                <div class="user-nav-btn">

                    <!-- <a href="/profile/profile.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Events"><i class="fa fa-heart">
                            <span>5</span>
                        </i>
                    </a> -->

                    <?php
                    if (isset($_SESSION['roleId'])) {
                        echo '<a href="/profile/profile.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Account"><i class="fa fa-user"> </i> </a>';

                        echo '<a href="/signout.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Events"><i class="fa fa-trash"><span>!</span></i></a>';
                    } else {
                        echo '<a href="/signin.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Account"><i class="fa fa-user"><span>!</span> </i> </a>';
                    }

                    // Debugging: Output session information
                    // echo "<pre>";
                    // var_dump($_SESSION);
                    // echo "</pre>";
                    // ?>


                    <!-- <a href="signout.php" tite="Logout">Sign out</a> -->
                </div>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/events/event-form.php">Events form</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/events/event-list.php">Events list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/top-volunteer.php">Top Volunteer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/comapnies.php">Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile/profile.php">Account</a>
                </li>
            </ul>

        </div>
    </div>
</nav>