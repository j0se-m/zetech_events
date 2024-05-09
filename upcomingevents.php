<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "events_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get all upcoming events from the database
// function getUpcomingEvents()
// {
//     global $conn;

//     $sql = "SELECT * FROM upcoming_events WHERE event_date >= CURDATE() ORDER BY event_date ASC";
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         echo '<div class="list-group">';
//         while ($row = $result->fetch_assoc()) {
//             echo '<a href="#" class="list-group-item list-group-item-action">';
//             echo '<div class="d-flex w-100 justify-content-between">';
//             echo '<h5 class="mb-1">' . $row["event_name"] . '</h5>';
//             echo '<small>' . $row["event_date"] . '</small>';
//             echo '</div>';
//             echo '<p class="mb-1">' . $row["location"] . '</p>';
//             echo '<small>' . $row["organizer"] . '</small>';
//             echo '</a>';
//         }
//         echo '</div>';
//     } else {
//         echo '<p>No upcoming events found</p>';
//     }
// }

// Function to add a new event to the database
function addEvent($name, $description, $date, $location, $organizer)
{
    global $conn;

    $sql = "INSERT INTO upcoming_events (event_name, event_description, event_date, location, organizer)
            VALUES ('$name', '$description', '$date', '$location', '$organizer')";

    if ($conn->query($sql) === TRUE) {
        echo "Event added successfully";
    } else {
        echo "Error adding event: " . $conn->error;
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = $_POST["eventName"];
    $eventDescription = $_POST["eventDescription"];
    $eventDate = $_POST["eventDate"];
    $eventLocation = $_POST["eventLocation"];
    $eventOrganizer = $_POST["eventOrganizer"];

    // Call addEvent function to insert new event
    addEvent($eventName, $eventDescription, $eventDate, $eventLocation, $eventOrganizer);
}
?>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Upcoming Events</h1>
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
            <label for="eventDate">Event Date:</label>
            <input type="date" class="form-control" id="eventDate" name="eventDate" required>
        </div>
        <div class="form-group">
            <label for="eventLocation">Event Location:</label>
            <input type="text" class="form-control" id="eventLocation" name="eventLocation" required>
        </div>
        <div class="form-group">
            <label for="eventOrganizer">Event Organizer:</label>
            <input type="text" class="form-control" id="eventOrganizer" name="eventOrganizer" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include 'footer.php'; ?>
