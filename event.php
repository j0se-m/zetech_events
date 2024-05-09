
<?php include 'header.php'; ?>
<body>
<div class="container mt-5">
        <h1 class="mb-4">Post Event</h1>
        <form>
            <div class="form-group">
                <label for="eventTitle">Event Title</label>
                <input type="text" class="form-control" id="eventTitle" placeholder="Enter event title">
            </div>
            <div class="form-group">
                <label for="eventDescription">Event Description</label>
                <textarea class="form-control" id="eventDescription" rows="3" placeholder="Enter event description"></textarea>
            </div>
            <div class="form-group">
                <label for="eventDate">Event Date</label>
                <input type="date" class="form-control" id="eventDate">
            </div>
            <div class="form-group">
                <label for="eventLocation">Event Location</label>
                <input type="text" class="form-control" id="eventLocation" placeholder="Enter event location">
            </div>
            <div class="form-group">
                <label for="eventFile">Upload File</label>
                <input type="file" class="form-control-file" id="eventFile">
            </div>
            <div class="form-group">
                <label for="eventVideo">Embed Video</label>
                <input type="text" class="form-control" id="eventVideo" placeholder="Enter video URL">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>