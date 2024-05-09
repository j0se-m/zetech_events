<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Custom Styles -->
   <style>
      /* Custom styles for the form */
      .form-container {
         border: 1px solid #ccc;
         border-radius: 10px;
         padding: 7px;
         box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);

      }

      /* Additional styles for form elements */
      .form-control {
         border: 1px solid #ccc;
         border-radius: 5px;
         padding: 8px;
      }

      /* Additional styles can be added as needed */
   </style>

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>New user Registration</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #333; color:white">
      <a href="index.php">User Registration </a>
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h4>Add New User</h4>
         <p class="text-muted">Complete the form below to add a new user</p>
      </div>

      <div class="container d-flex justify-content-center">
         <div class="form-container"> <!-- Added class for the form container -->
            <form action="" method="post" style="width:50vw; min-width:300px;">
               <div class="row mb-3">
                  <div class="col">
                     <label class="form-label">First Name:</label>
                     <input type="text" class="form-control" name="first_name" placeholder="Albert">
                  </div>
   
                  <div class="col">
                     <label class="form-label">Last Name:</label>
                     <input type="text" class="form-control" name="last_name" placeholder="Einstein">
                  </div>
               </div>
   
               <div class="mb-3">
                  <label class="form-label">Email:</label>
                  <input type="email" class="form-control" name="email" placeholder="name@example.com">
               </div>
               
               <div class="mb-3">
                  <label class="form-label">Username:</label>
                  <input type="text" class="form-control" name="username" placeholder="LEC/00/01">
               </div>
   
               <div class="mb-3">
                  <label class="form-label">Password:</label>
                  <input type="text" class="form-control" name="password" placeholder="lec12@">
               </div>
   
               <div class="form-group mb-3">
                  <label>Gender:</label>
                  &nbsp;
                  <input type="radio" class="form-check-input" name="gender" id="male" value="male">
                  <label for="male" class="form-input-label">Male</label>
                  &nbsp;
                  <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                  <label for="female" class="form-input-label">Female</label>
               </div>
   
               <div style="padding-bottom:50px;">
                  <button type="submit" class="btn btn-success" name="submit">Save</button>
                  <a href="index.php" class="btn btn-danger">Cancel</a>
               </div>
            </form>
         </div>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
