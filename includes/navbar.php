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

<?php
include('inc_config.php');
?>

<div class="topbar">
    <div class="container-fluid">
        <div class="social">
            <a href="<?php echo $root_directory; ?>"><i class="fab fa-instagram-square"></i></a>
            <a href="<?php echo $root_directory; ?>"><i class="fab fa-facebook-square"></i></a>
            <a href="<?php echo $root_directory; ?>"><i class="fab fa-twitter-square"></i></a>
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
            <a href="<?php echo $root_directory; ?>">Blog</a>
            <a href="<?php echo $root_directory; ?>">Need Help?</a>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg mainnav shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $root_directory; ?>/">
            <img src="<?php echo $root_directory; ?>/assets/img/logo1.png" alt="">
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

                    <?php
                    if (isset($_SESSION['roleId'])) {
                        if ($_SESSION['roleId'] == 1) { //company
                            echo '<a href="' . $root_directory . '/company/company-edit.php" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $_SESSION['emailAddress'] . '"><i class="fa fa-user"> </i> </a>';
                            echo '<a href="' . $root_directory . '/signout.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>';
                        }
                        if ($_SESSION['roleId'] == 2) { //volunteer
                            echo '<a href="' . $root_directory . '/profile/profile-edit.php" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $_SESSION['emailAddress'] . '"><i class="fa fa-user"> </i> </a>';
                            echo '<a href="' . $root_directory . '/signout.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>';
                        }
                    } else {
                        echo '<a href="' . $root_directory . '/signin.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign in"><i class="fa fa-user"><span>!</span> </i> </a>';
                    }

                    // Debugging: Output session information
                    // echo "<pre>";
                    // var_dump($_SESSION);
                    // echo "</pre>";
                    // 
                    ?>


                    <!-- <a href="signout.php" tite="Logout">Sign out</a> -->
                </div>
            </div>
            <ul class="navbar-nav">




                <?php
                if (isset($_SESSION['roleId'])) {
                    if ($_SESSION['roleId'] == 1) { //company
                        echo '<li class="nav-item"><a class="nav-link active" href="' . $root_directory . '/events/event-form.php">Add Events</a> </li>';
                    }
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $root_directory; ?>/events/event-list.php">Events</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php echo $root_directory; ?>/top-volunteer.php">Top Volunteer</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $root_directory; ?>/company/company-list.php">Our Companies</a>
                </li>
            </ul>

        </div>
    </div>
</nav>