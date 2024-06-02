  <?php include('../config.php'); ?>
  <div class="profile-sidebar sticky-top">


      <div class="profile-usermenu sidebar-sticky">
          <ul class="nav flex-column">
              <li class="nav-title">
                  <h2>My COMPANY Account</h2>
              </li>
              <li class="nav-item">
                  <a href="<?php echo $root_directory; ?>/company/company-edit.php" class="nav-link">
                      <i class="far fa-user-circle"></i>
                      Edit Account </a>
              </li>

              <li class="nav-title">
                  <h2>Company Events</h2>
              </li>
              <li class="nav-item activeNo">
                  <a href="<?php echo $root_directory; ?>/company/company-past-events.php" class="nav-link activeNo">
                      <i class="fa fa-cubes"></i>
                      Past Events </a>
              </li>
              <li class="nav-item">
                  <a href="<?php echo $root_directory; ?>/company/company-current-events.php" class="nav-link ">
                      <i class="fa fa-cubes"></i>
                      Current Events </a>
              </li>

              <li class="nav-title">
                  <h2> Company Reviews</h2>
              </li>
              <li class="nav-item">
                  <a href="<?php echo $root_directory; ?>/company/company-review.php" class="nav-link">
                      <i class="fa fa-cubes"></i>
                      Reviews </a>
              </li>

          </ul>
      </div>
      <!-- END MENU -->

  </div>