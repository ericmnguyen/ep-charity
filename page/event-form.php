<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/header.php' ?>
</head>

<body>

    <?php include '../includes/navbar.php' ?>


    <main class="container">


        <div class="form-container">

            <h1>
                CREATE EVENT
            </h1>
            <form id="eventForm" class="row form-content">
                <div class="form-floating">
                    <input class="form-control" id="eventName" type="text" placeholder="Event Name" data-sb-validations="required" />
                    <label for="eventName">Event Name</label>
                    <div class="invalid-feedback" data-sb-feedback="eventName:required">Event Name is required.</div>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" id="description" type="text" placeholder="Description" style="height: 10rem;" data-sb-validations="required"></textarea>
                    <label for="description">Description</label>
                    <div class="invalid-feedback" data-sb-feedback="description:required">Description is required.</div>
                </div>
                <div class="form-floating">
                    <input class="form-control" id="eventType" type="text" placeholder="Event Type" data-sb-validations="required" />
                    <label for="eventType">Event Type</label>
                    <div class="invalid-feedback" data-sb-feedback="eventType:required">Event Type is required.</div>
                </div>
                <div class="col-12 col-md-6 form-floating">
                    <input class="form-control" id="startDate" type="text" placeholder="Start Date" data-sb-validations="required" />
                    <label for="startDate">Start Date</label>
                    <div class="invalid-feedback" data-sb-feedback="startDate:required">Start Date is required.</div>
                </div>
                <div class="col-12 col-md-6 form-floating">
                    <input class="form-control" id="endDate" type="text" placeholder="End Date" data-sb-validations="required" />
                    <label for="endDate">End Date</label>
                    <div class="invalid-feedback" data-sb-feedback="endDate:required">End Date is required.</div>
                </div>
                <div class="col-12 col-md-6 form-floating">
                    <input class="form-control" id="startTime" type="text" placeholder="Start Time" data-sb-validations="required" />
                    <label for="startTime">Start Time</label>
                    <div class="invalid-feedback" data-sb-feedback="startTime:required">Start Time is required.</div>
                </div>
                <div class="col-12 col-md-6 form-floating">
                    <input class="form-control" id="endTime" type="text" placeholder="End Time" data-sb-validations="required" />
                    <label for="endTime">End Time</label>
                    <div class="invalid-feedback" data-sb-feedback="endTime:required">End Time is required.</div>
                </div>
                <div class="form-floating">
                    <input class="form-control" id="venueName" type="text" placeholder="Venue Name" data-sb-validations="required" />
                    <label for="venueName">Venue Name</label>
                    <div class="invalid-feedback" data-sb-feedback="venueName:required">Venue Name is required.</div>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" id="address" type="text" placeholder="Address" style="height: 10rem;" data-sb-validations="required"></textarea>
                    <label for="address">Address</label>
                    <div class="invalid-feedback" data-sb-feedback="address:required">Address is required.</div>
                </div>
                <div class="form-floating">
                    <select class="form-select" id="locationType" aria-label="Location Type">
                        <option value="In-Person">In-Person</option>
                        <option value="Online">Online</option>
                        <option value="Hybrid">Hybrid</option>
                    </select>
                    <label for="locationType">Location Type</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" id="maxAttendees" type="text" placeholder="Max Attendees" data-sb-validations="required" />
                    <label for="maxAttendees">Max Attendees</label>
                    <div class="invalid-feedback" data-sb-feedback="maxAttendees:required">Max Attendees is required.</div>
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

    </script>

</body>

</html>