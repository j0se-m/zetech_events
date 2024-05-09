<?php require 'header.php'; ?>
    
<?php include 'header.php'; ?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #f8f9fa; 
            overflow: auto;/* Light background color */
           
        }

        .container {
            max-width: 800px; /* Limit container width for better readability */
        }

        .card {
            margin-bottom: 20px; /* Add margin below the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add box shadow for depth */
        }

        .card-title {
            color: #333; /* Dark text color for card title */
            font-weight: bold; /* Bold font for title */
            margin-bottom: 10px; /* Add space below title */
        }

        .card-text {
            color: #555; /* Medium text color for card content */
        }

        .btn-primary,
        .btn-danger {
            margin-right: 10px; /* Add margin between buttons */
        }
    </style>

</head>   
<body>
<div class="container mt-5">
<h1 class="mb-4">View Event</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Event Title</h5>
                <p class="card-text">Event Description</p>
                <p class="card-text"><strong>Date:</strong> Event Date</p>
                <p class="card-text"><strong>Location:</strong> Event Location</p>
                <!-- <a href="#" class="btn btn-primary">Edit</a> -->
                <!-- <a href="#" class="btn btn-danger">Delete</a> -->
            </div>
       

 </div>
</div>

</body>

</html>

<?php include 'footer.php'; ?>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const eventLinks = document.querySelectorAll('.event-link');
        const eventDetailsContainer = document.getElementById('eventDetails');

        eventLinks.forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const eventId = this.getAttribute('data-event-id');
                fetchEventDetails(eventId);
            });
        });

        function fetchEventDetails(eventId) {
            // Example fetch request to retrieve event details (replace with actual data retrieval logic)
            const eventDetails = {
                title: `Event ${eventId} Details`,
                description: `Event ${eventId} details go here.`,
                date: '2024-05-09',
                location: 'Event Location',
                organizer: 'Event Organizer'
            };

            // Update event details container with fetched data
            eventDetailsContainer.innerHTML = `
                <div class="card mt-3">
                    <div class="card-header">
                        ${eventDetails.title}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">${eventDetails.date} - ${eventDetails.location}</h5>
                        <p class="card-text">${eventDetails.description}</p>
                        <p class="card-text">Organized by: ${eventDetails.organizer}</p>
                    </div>
                </div>
            `;
        }
    });
</script>


