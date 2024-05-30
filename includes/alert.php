<?php
    // Check if success message is set and display it
    if (isset($_SESSION['success_message'])) {
        echo '<div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert">';
        echo '<strong>Nice!</strong> ' . $_SESSION["success_message"] . ' ';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show mx-3 mt-3" role="alert">';
        echo '<strong>Opps!</strong> ' . $_SESSION["error_message"] . ' ';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
        unset($_SESSION['error_message']);
    }

    ?>