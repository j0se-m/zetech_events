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

// Check if event ID is provided
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch event details based on ID
    $sql = "SELECT * FROM upcoming_events WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // You can use $row["event_name"], $row["event_date"], etc., to display the event details in an edit form
    } else {
        echo "Event not found";
    }
} else {
    echo "Event ID not provided";
}

// Close connection
$conn->close();
?>

<!-- HTML form for editing event details -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
</head>

<body>
    <h1>Edit Event</h1>
    <form action="update_event.php" method="POST">
        <input type="hidden" name="event_id" value="<?php echo $id; ?>">
        <!-- Include form fields for editing event details here -->
        <button type="submit" name="submit">Update Event</button>
    </form>
</body>

</html>
