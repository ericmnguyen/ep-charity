 <?php
    include('../config.php');
    ob_start();


    if (isset($_SESSION['roleId']) && ($_SESSION['roleId'] != 1)) {
        echo ($_SESSION['roleId']);
        // header("Location: $root_directory/404.php");
        echo "<script>location.href = '$root_directory/404.php';</script>";
        exit();
    }

    ob_end_flush();
    ?>

 <div class="profile-top-layout bg-info p-1">
     <div class="profile-info">
         <div class="profile-picture"><img src="https://e7.pngegg.com/pngimages/784/809/png-clipart-building-small-business-company-office-corporation-office-icon-insharepics-miscellaneous-blue-thumbnail.png" alt="ananddavis" />
         </div>
         <div class="profile-header">
             <div class="profile-account">
                 <h4 class="profile-username"><?php echo $_SESSION['firstName']; ?> <?php echo $_SESSION['lastName']; ?></h4>
                 <h4 class="profile-username">COMPANY NAME HERE</h4>

                 <h6 class="profile-email"><?php echo $_SESSION['emailAddress']; ?></h6>
             </div>
             <div class="profile-edit"><a class="profile-button btn-main2" href="#">COMPANY</a></div>
         </div>
     </div>
 </div>