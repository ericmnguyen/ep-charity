<!-- let access if company -->
<?php
session_start();
ob_start();
if (!isset($_SESSION['roleId']) || ($_SESSION['roleId'] != 1)) {
    header("Location: /404.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/header.php' ?>
</head>

<body>

    <?php include '../includes/navbar.php' ?>
    <?php
    require_once '../conn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $eventName = $mysqli->real_escape_string($_POST['eventName']);
        $description = $mysqli->real_escape_string($_POST['description']);
        $eventType = $mysqli->real_escape_string($_POST['eventType']);
        $startDate = $mysqli->real_escape_string($_POST['startDate']);
        $endDate = $mysqli->real_escape_string($_POST['endDate']);
        $startTime = $mysqli->real_escape_string($_POST['startTime']);
        $endTime = $mysqli->real_escape_string($_POST['endTime']);
        $venueName = $mysqli->real_escape_string($_POST['venueName']);
        $address = $mysqli->real_escape_string($_POST['address']);
        $locationType = $mysqli->real_escape_string($_POST['locationType']);
        $maxAttendees = $mysqli->real_escape_string($_POST['maxAttendees']);
        $eventStatus = $mysqli->real_escape_string($_POST['eventStatus']);
        $accountId = $_SESSION['accountId'];

        $sql = "INSERT INTO event (eventName, description, eventType, startDate, endDate, startTime, endTime, venueName, address, locationType, maxAttendees, eventStatus, accountId) VALUES ('$eventName', '$description', '$eventType', '$startDate', '$endDate', '$startTime', '$endTime', '$venueName', '$address', '$locationType', '$maxAttendees', '$eventStatus', '$accountId')";

        if ($mysqli->query($sql) === TRUE) {
            $_SESSION['success_message'] = "Event Created.";
            header("Location: /events/event-list.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
            $_SESSION['error_message'] = "Event Not Created.";
            header("Location: /events/event-list.php");
            exit();
        }
    }

    $mysqli->close();
    ?>






    <main class="container">


        <div class="form-container">

            <h1>
                CREATE EVENT <?php echo $_SESSION['accountId']; ?>
            </h1>
            <form id="eventForm" class="row form-content" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-floating">
                    <input class="form-control" id="eventName" type="text" name="eventName" placeholder="Event Name" data-sb-validations="required" />
                    <label for="eventName">Event Name</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" id="description" name="description" type="text" placeholder="Description" style="height: 10rem;" data-sb-validations="required"></textarea>
                    <label for="description">Description</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" id="eventType" name="eventType" type="text" placeholder="Event Type" data-sb-validations="required" />
                    <label for="eventType">Event Type</label>
                </div>
                <div class="col-12 col-md-6 form-floating">
                    <input class="form-control" id="startDate" name="startDate" type="date" placeholder="Start Date" data-sb-validations="required" />
                    <label for="startDate">Start Date</label>
                </div>
                <div class="col-12 col-md-6 form-floating">
                    <input class="form-control" id="endDate" name="endDate" type="date" placeholder="End Date" data-sb-validations="required" />
                    <label for="endDate">End Date</label>
                </div>
                <div class="col-12 col-md-6 form-floating">
                    <input class="form-control" id="startTime" name="startTime" type="time" placeholder="Start Time" data-sb-validations="required" />
                    <label for="startTime">Start Time</label>
                </div>
                <div class="col-12 col-md-6 form-floating">
                    <input class="form-control" id="endTime" name="endTime" type="time" placeholder="End Time" data-sb-validations="required" />
                    <label for="endTime">End Time</label>
                </div>
                <div class="form-floating">
                    <select class="form-select" id="locationType" name="locationType" aria-label="LocationType">
                        <option value="In-Person">In-Person</option>
                        <option value="Online">Online</option>
                        <option value="Hybrid">Hybrid</option>
                    </select>
                    <label for="locationType">Location Type</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" id="venueName" name="venueName" type="text" placeholder="Venue Name" data-sb-validations="required" />
                    <label for="venueName">Venue/Platform</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" id="address" name="address" type="text" placeholder="Address" style="height: 7rem;" data-sb-validations="required"></textarea>
                    <label for="address">Full Address</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" id="maxAttendees" name="maxAttendees" type="number" placeholder="Max Attendees" data-sb-validations="required" />
                    <label for="maxAttendees">Max Attendees</label>
                </div>
                <div class="form-floating">
                    <select class="form-select" id="eventStatus" name="eventStatus" aria-label="eventStatus">
                        <option value="Published">Published</option>
                        <option value="Ongoing">Ongoing</option>
                        <option value="Finished">Finished</option>
                    </select>
                    <label for="eventStatus">Location Type</label>
                </div>
                <div class="d-flex flex-wrap ps-1">
                    <button class="btn btn-main2" id="submitButton" type="submit">Submit</button>
                    <button class="btn btn-main" id="" type="reset">Reset</button>
                </div>

            </form>
        </div>

    </main>




    <!-- footer -->
    <?php include '../includes/footer.php' ?>
    <!-- page-specific js -->
    <script>
        $(document).ready(function() {
            $('#eventForm').validate({
                rules: {
                    eventName: {
                        required: true,
                        maxlength: 200
                    },
                    description: {
                        required: true,
                        maxlength: 5000
                    },
                    eventType: {
                        required: true,
                        maxlength: 100
                    },
                    startDate: {
                        required: true
                    },
                    endDate: {
                        required: true,
                        greaterThanStartDate: true
                    },
                    startTime: {
                        required: true
                    },
                    endTime: {
                        required: true,
                        greaterThanStartTime: true
                    },
                    locationType: {
                        required: true
                    },
                    venueName: {
                        required: true,
                        maxlength: 200
                    },
                    address: {
                        required: true,
                        maxlength: 500
                    },
                    maxAttendees: {
                        required: true
                    },
                    eventStatus: {
                        required: true
                    },
                },
                messages: {
                    eventName: {
                        required: "Please enter the event name.",
                        maxlength: "Event name must not exceed 200 characters."
                    },
                    description: {
                        required: "Please enter the event description.",
                        maxlength: "Description must not exceed 5000 characters."
                    },
                    eventType: "Please enter the event type.",
                    startDate: "Please select the start date.",
                    endDate: {
                        required: "Please select the end date.",
                        greaterThanStartDate: "End date must be greater than start date."
                    },
                    startTime: "Please select the start time.",
                    endTime: {
                        required: "Please select the end time.",
                        greaterThanStartTime: "End time must be greater than start time."
                    },
                    locationType: "Please select the location type.",
                    venueName: {
                        required: "Please enter the venue/platform name.",
                        maxlength: "Venue name must not exceed 200 characters."
                    },
                    address: {
                        required: "Please enter the full address.",
                        maxlength: "Address must not exceed 500 characters."
                    },
                    maxAttendees: "Please enter the maximum number of attendees."
                },
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-floating').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid').removeClass('is-valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                }
            });

            // Custom validation method for end date
            $.validator.addMethod('greaterThanStartDate', function(value, element) {
                var startDateValue = $('#startDate').val();
                return Date.parse(startDateValue) <= Date.parse(value);
            }, 'End date must be greater than start date.');

            // Custom validation method for end time
            $.validator.addMethod('greaterThanStartTime', function(value, element) {
                var startTimeValue = $('#startTime').val();
                var startDateValue = $('#startDate').val();
                var endDateValue = $('#endDate').val();
                var endTimeValue = value;
                var endTime = new Date(endDateValue + ' ' + endTimeValue);
                var startTime = new Date(startDateValue + ' ' + startTimeValue);
                return endTime > startTime;
            }, 'End time must be greater than start time.');
        });
    </script>


</body>

</html>