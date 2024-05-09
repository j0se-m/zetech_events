<?php
require('config.php');

// Server-side validation and handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs (your existing code)

    // Insert event details into the database (your existing code)

    // Close database connection (your existing code)
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Events</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card {
            border: 1px solid #ccc; /* Add border to the card */
            border-radius: 10px; /* Optional: Rounded corners for the card */
            width: 80%; /* Set the width of the card */
            margin: auto; /* Center the card horizontally */
            padding: 20px; /* Add padding inside the card */
            text-align: center; /* Center text inside the card */
        }

        .card-body {
            padding: 0; /* Remove default padding from card body */
        }

        .form-label {
            margin-bottom: 5px; /* Add margin below form labels */
        }

        .form-control {
            border: 1px solid #ccc; /* Add border to form controls */
        }
    </style>
</head>

<body>
    <?php include 'admin-header.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4 text-center">Post Events</h1>

        <!-- Flash message for event added successfully -->
        <div id="flashAlert" class="alert alert-success" role="alert" style="display: none;">Event added successfully</div>

        <div class="card">
            <div class="card-body">
                <h2 class="card-title mb-4">Add New Event</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="eventName" class="form-label">Event Name:</label>
                        <input type="text" class="form-control" id="eventName" name="eventName" required>
                    </div>
                    <div class="mb-3">
                        <label for="eventDescription" class="form-label">Event Description:</label>
                        <textarea class="form-control" id="eventDescription" name="eventDescription" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="eventImage" class="form-label">Event Image:</label>
                        <input type="file" class="form-control" id="eventImage" name="eventImage">
                    </div>
                    <div class="mb-3">
                        <label for="eventDate" class="form-label">Event Date:</label>
                        <input type="date" class="form-control" id="eventDate" name="eventDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="eventLocation" class="form-label">Event Location:</label>
                        <input type="text" class="form-control" id="eventLocation" name="eventLocation" required>
                    </div>
                    <div class="mb-3">
                        <label for="eventFile" class="form-label">Event File (Optional):</label>
                        <input type="file" class="form-control" id="eventFile" name="eventFile">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
