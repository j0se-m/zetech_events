<?php
require('config.php');
include 'admin-header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php include 'footer.php'; ?>
</body>
</html>

<?php 
// Retrieve events from the database
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// Check if there are any events
if ($result->num_rows > 0) {
    echo '<div class="row">';
    // Output each event as a column in a row
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4 mt-5 mx-3">';
        echo '<div class="card">';
        echo '<img src="' . $row['image'] . '" class="card-img-top" alt="' . $row['name'] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p class="card-text">' . substr($row['description'], 0, 100) . '...</p>';
        echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventModal' . $row['id'] . '">Read More</button>';
        echo '</div>';
        echo '<div class="card-footer">';
        echo '<form action="edit_event.php" method="post" class="d-inline">';
        echo '<input type="hidden" name="event_id" value="' . $row['id'] . '">';
        echo '<button type="submit" class="btn btn-warning mr-2">Edit</button>';
        echo '</form>';
        echo '<form action="delete_event.php" method="post" class="d-inline">';
        echo '<input type="hidden" name="event_id" value="' . $row['id'] . '">';
        echo '<button type="submit" class="btn btn-danger">Delete</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        
        // Modal for displaying event description
        echo '<div class="modal fade" id="eventModal' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel' . $row['id'] . '" aria-hidden="true">';
        echo '<div class="modal-dialog" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h5 class="modal-title" id="eventModalLabel' . $row['id'] . '">' . $row['name'] . ': '. $row['date'] . '</h5>';
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        echo '<div class="modal-body">';
        echo '<p>' . $row['description'] . '</p>';
        echo '</div>';
        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "No events found";
}
$conn->close();
?>
