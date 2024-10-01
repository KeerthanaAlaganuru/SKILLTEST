<!-- Login Page -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  	<link rel="stylesheet" href="styles.css">
    <link rel="icon" href="K.jpeg" type="image/png">
  	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-light fixed-top-navbar">
    <a class="navbar-brand dflex" href="#about">
        <img src="K.jpeg" class="rounded-pill" height="50" width="100%">
        <span class="text-warning m-0 ml-2">SKILL TEST</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="SkillTestWeb.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="administration.html">Administration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="studentregister.html">Student Registration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="studentlogin.php">Student Login</a>
            </li>
        </ul>
    </div>
</nav>
	<div class="container">
	<br><br><br><br><br><br>
	<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card" style="background-color: rgb(159, 163, 158)">
        <div class="card-header">
          <h2>Admin Login</h2>
        </div>
        <div class="card-body">
          <form action="adminValidation.php" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">User ID:</label>
              <input type="text" class="form-control" name="userid" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password:</label>
              <input type="password" class="form-control" name="password" required>
            </div>
            <center><button type="submit" class="btn btn-primary">Login</button></center>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


</body>
</html>
