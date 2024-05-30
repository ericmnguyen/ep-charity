<?php
session_start();
// ob_start();
// if (!isset($_SESSION['roleId'])) {
//     header("Location: /signin.php");
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/header.php' ?>
</head>

<body>

    <?php include '../includes/navbar.php' ?>

    <div class="bg-white" style="margin-bottom: -50px;">
        <main class="container ">
            <section>
                <section class="py-1">
                    <div class="company py-5">

                        <h3 class="text-center mb-5">BROWSE EVENTS BY COMPANIES </h3>
                        <div class="row">
                            <?php
                            require_once '../conn.php';

                            $sql = "SELECT * FROM Company";
                            $result = mysqli_query($mysqli, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <div class="col-12 col-md-6 col-lg-4 g-2">
                                        <div class="d-flex flex-wrap align-items-center justify-content-center p-3 flex-column">
                                            <div class="w-100 mb-4">
                                                <img src="https://source.unsplash.com/random/100x100?sig=<?php echo $row['companyId']; ?>" class="d-block p-2 m-auto rounded-circle shadow-sm">
                                            </div>
                                            <h5>
                                                <?php echo $row['companyName']; ?> <br>
                                            </h5>
                                            <div class="d-flex flex-wrap align-items-center justify-content-center">
                                                <a class="btn btn-main2 btn-sm me-0" href="<?php echo $root_directory; ?>/events/event-list-by-company.php?companyId=<?php echo $row['companyId']; ?>">See Events </a>
                                                <a href="<?php echo $row['website'] ?>" target="_blank" class=" btn btn-outline-success btn-sm">See Website</a>

                                            </div>

                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "No Companies.";
                            }

                            // Close the database connection
                            $mysqli->close();
                            ?>
                        </div>
                    </div>
                </section>
            </section>
        </main>
    </div>





    <!-- footer -->
    <?php include '../includes/footer.php' ?>
    <!-- page-specific js -->
    <script>

    </script>

</body>

</html>