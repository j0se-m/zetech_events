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
function getUpcomingEvents()
{
    global $conn;

    $sql = "SELECT * FROM upcoming_events WHERE event_date >= CURDATE() ORDER BY event_date ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="row">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-6 mb-4">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row["event_name"] . '</h5>';
            echo '<p class="card-text"><strong>Location:</strong> ' . $row["location"] . '</p>';
            echo '<p class="card-text"><strong>Date:</strong> ' . $row["event_date"] . '</p>';
            echo '</div>'; // Close card-body

            echo '<div class="card-footer">';
            echo '<div class="btn-group">';
            // echo '<button type="button" class="btn btn-primary btn-sm" onclick="editEvent(' . $row["id"] . ')"><i class="fas fa-pencil-alt"></i> Edit</button>';
            // echo '<button type="button" class="btn btn-danger btn-sm" onclick="deleteEvent(' . $row["id"] . ')"><i class="fas fa-trash"></i> Delete</button>';
            echo '</div>'; // Close btn-group
            echo '</div>'; // Close card-footer

            echo '</div>'; // Close card
            echo '</div>'; // Close col-md-6
        }
        echo '</div>'; // Close row
    } else {
        echo '<p>No upcoming events found</p>';
    }
}

?>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Upcoming Events</h1>
    <?php
    // Call the function to display upcoming events
    getUpcomingEvents();
    ?>
</div>

<?php include 'footer.php'; ?>

<script>
    // JavaScript function to handle event editing
    function editEvent(id) {
        // Redirect to edit page with event ID
        window.location.href = 'edit_event.php?id=' + id;
    }

    // JavaScript function to handle event deletion
    function deleteEvent(id) {
        // Confirm deletion
        if (confirm("Are you sure you want to delete this event?")) {
            // Redirect to delete page with event ID
            window.location.href = 'delete_event.php?id=' + id;
        }
    }
</script>

<style>
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-footer {
        background-color: #f8f9fa;
        border-top: 1px solid #dee2e6;
        padding: 0.75rem 1.25rem;
    }

    .btn-group {
        margin-bottom: 0; /* To remove extra margin from button group */
    }
</style>
