<?php
require('config.php');


// Server-side validation and handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $eventName = htmlspecialchars($_POST["eventName"]);
    $eventDescription = htmlspecialchars($_POST["eventDescription"]);
    $eventDate = htmlspecialchars($_POST["eventDate"]);
    $eventLocation = htmlspecialchars($_POST["eventLocation"]);

    // Validate and handle event image upload
    $targetDir = "uploads/events/";
    $targetFile = $targetDir . basename($_FILES["eventImage"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is an actual image
    $check = getimagesize($_FILES["eventImage"]["tmp_name"]);
    if ($check === false) {
        echo "Error: Uploaded file is not an image.";
        exit();
    }

    // Check file size
    if ($_FILES["eventImage"]["size"] > 5000000) { // 5MB limit
        echo "Error: Uploaded image file is too large.";
        exit();
    }

    // Allow only certain image file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Error: Only JPG, JPEG, and PNG files are allowed for event images.";
        exit();
    }

    // Resize and save event image
    $img = imagecreatefromstring(file_get_contents($_FILES["eventImage"]["tmp_name"]));
    $resizedImg = imagescale($img, 300, 250); // Resize to 300x250 pixels
    imagedestroy($img); // Free memory
    imagejpeg($resizedImg, $targetFile); // Save resized image
    imagedestroy($resizedImg); // Free memory

    // Handle optional event file upload (PDF only)
    $eventFile = "";
    if (!empty($_FILES["eventFile"]["name"])) {
        $eventFileType = strtolower(pathinfo($_FILES["eventFile"]["name"], PATHINFO_EXTENSION));
        if ($eventFileType != "pdf") {
            echo "Error: Only PDF files are allowed for event files.";
            exit();
        }
        $eventFileDir = "uploads/files/";
        $eventFile = $eventFileDir . basename($_FILES["eventFile"]["name"]);
        move_uploaded_file($_FILES["eventFile"]["tmp_name"], $eventFile);
    }

    // Insert event details into the database
    $sql = "INSERT INTO events (name, description, image, date, location, filename) VALUES ('$eventName', '$eventDescription', '$targetFile', '$eventDate', '$eventLocation', '$eventFile')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
        setTimeout(function() {
            document.getElementById('flashAlert').style.display = 'none';
        }, 3000);
     </script>";
echo "<div id='flashAlert' class='alert alert-success' role='alert'>Event added successfully</div>";;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>





<?php include 'header.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Post Events</h1>
    <?php
    // Call the function to display upcoming events
    // getUpcomingEvents();
    ?>

    <h2 class="mt-5">Add New Event</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="form-group">
            <label for="eventName">Event Name:</label>
            <input type="text" class="form-control" id="eventName" name="eventName" required>
        </div>
        <div class="form-group">
            <label for="eventDescription">Event Description:</label>
            <textarea class="form-control" id="eventDescription" name="eventDescription" rows="3" required></textarea>
        </div>
        <div class="form-group">
        <label for="eventImage">Event Image</label>
        <input type="file" class="form-control-file" id="eventImage" name="eventImage">
      </div>
        <div class="form-group">
            <label for="eventDate">Event Date:</label>
            <input type="date" class="form-control" id="eventDate" name="eventDate" required>
        </div>
        <div class="form-group">
            <label for="eventLocation">Event Location:</label>
            <input type="text" class="form-control" id="eventLocation" name="eventLocation" required>
        </div>
        <div class="form-group">
        <label for="eventFile">Event File(Optional)</label>
        <input type="file" class="form-control-file" id="eventFile" name="eventFile">
      </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include 'footer.php'; ?>

