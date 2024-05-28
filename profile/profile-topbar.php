 <?php
    include('../config.php');
    ob_start();


    if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] != 2) ) {
        echo ($_SESSION['roleId']);
        echo ('roleId');
        header("Location: $root_directory/404.php");
        // echo "<script>location.href = '/404.php';</script>";
        exit();
    }

    ob_end_flush();
    ?>

 <div class="profile-top-layout">
     <div class="profile-info">
         <div class="profile-picture"><img src="https://66.media.tumblr.com/de62698dc1b7eab4e505358bf0414f13/tumblr_prmny2ZaBb1uua0sto5_540.png" alt="ananddavis" />
         </div>
         <div class="profile-header">
             <div class="profile-account">
                 <h4 class="profile-username"><?php echo $_SESSION['firstName']; ?> <?php echo $_SESSION['lastName']; ?></h4>
                 
                 <h6 class="profile-email"><?php echo $_SESSION['emailAddress']; ?></h6>
             </div>
             <div class="profile-edit"><a class="profile-button" href="#">Volunteer</a></div>
         </div>
     </div>
 </div>