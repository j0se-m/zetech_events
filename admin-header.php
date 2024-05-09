<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <style>
        /* Custom styles for header/navbar */
        body{
            /* overflow: auto */
        }
        .navbar {
            background-color:#202124;
            top: 0; 
            width: 100%; 
            z-index: 1000;
            position: fixed;
            height: 55px;
        }
        main {margin-top:120px; margin-left:240px;}


        .sidebar {
            position: fixed;
            top: 2px;
            left: 0;
            margin-top: 53px;
            bottom: 0;
            z-index: 1000;
            width: 200px;
            padding-top: 3rem;
            background-color: #202124;
            color: #fff; /* Text color for sidebar */
            /* overflow-y: auto; */
            padding-right: 15px; 
            
            padding-top: 15px;
            /* overflow: hidden;  */

        }


        .sidebar-heading {
            font-size: 1.2rem;
            font-weight: bold;
            padding: 15px;
            margin-top: 15px; 
            background-color: #202124;/* Adjusted padding */
        }
        .list-group-item {
            background-color: rgba(255, 255, 255, 0.1); 
        }

        .list-group-item {
            border: none;
        }
        .list-group-item {
            background-color: rgba(0, 0, 0, 0); /* Background color for active menu item */
        }

        .content-wrapper {
            margin-left: 250px;
            padding: 15px;
        }

        /* Adjust sidebar to be inline with navbar */
        @media (max-width: 768px) {
            .navbar-collapse {
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                z-index: 1001;
                background-color: rgba(0, 0, 0, 0.5);
                width: 250px;
                padding: 0;
                overflow-y: auto;
                overflow-x: auto;
            }

            .navbar-nav {
                flex-direction: column;
            }

            .navbar-nav .nav-item {
                width: 100%;
            }
        }

        /* Ensure sidebar links are visible */
        .sidebar a {
            color: #fff;
        }
        div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: auto;
}
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
.content-wrapper::-webkit-scrollbar {
            width: 8px;
        }
    </style>
</head>

<body>
    
     <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#" style="max-width: 4%;">
    <img src="img/download.jpg" class="img-fluid">
 </a>
<a class="navbar-brand" href="index.php">ZETECH <br>UNIVERSITY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin-add-event.php">Post New Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-view-event.php">View Events</a>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="admin-add-upcoming.php">Post Upcoming Events</a> -->
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="admin-upcoming.php">View Upcoming Events</a> -->
                </li>
                <li class="nav-item">
            <a href="admin-view-users.php" class="nav-link">View users</a>
            </li>
            
                <li class="nav-item">
            <!-- <a href="add-new.php" class="nav-link">Add New</a> -->
            </li>
                <form class="form-inline">
        <a href="logout.php" class="btn btn-outline-danger" style="margin-right: 20px;">Logout</a>
    </form>
            </ul>
        </div>
    </nav>
    <!-- Content wrapper -->
    <div class="content-wrapper">
