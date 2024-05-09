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

// Check if event ID is provided for deletion
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Delete event based on ID
    $sql = "DELETE FROM upcoming_events WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Event deleted successfully";
    } else {
        echo "Error deleting event: " . $conn->error;
    }
} else {
    echo "Event ID not provided";
}

// Close connection
$conn->close();
?>
