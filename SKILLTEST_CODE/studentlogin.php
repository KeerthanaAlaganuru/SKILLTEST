<!-- Login Page -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  	<link rel="stylesheet" href="styles.css">
    <link rel="icon" href="K.jpeg" type="image/png">
  	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	 <style>
    /* Add media query to adjust styles for smaller devices */
    @media (max-width: 768px) {
      .navbar-nav .nav-link {
        color: rgba(5, 5, 5); /* Change text color for small devices */
      }
      .navbar-nav .nav-link:hover {
	  background-color: rgba(245, 243, 115);
	  border-radius: 0.25rem;
		}
    }
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light">
		<a class="navbar-brand dflex" href="#about">
  			<img src="K.jpeg" class="rounded-pill" height="50" width="100%">
  			<span class="text-warning m-0 ml-2">SKILL TEST</span>
  		</a>
  		<button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#mycanvas">
                <span class="navbar-toggler-icon"></span>
       </button>
		<div class="collapse navbar-collapse" id="mynav">
			<ul class="navbar-nav ml-auto">
			   <li class="nav-item active">
			     <a class="nav-link" href="SkillTestWeb.html">Home </a>
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
	</div>
	<div class="container mt-5" ">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card" style="background-color: rgb(40, 224, 166)">
        <div class="card-header">
         <h2>Student Login</h2>
        </div>
        <div class="card-body">
          <form action="studentValidation.php" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">Username:</label>
              <input type="text" class="form-control" name="username" required>
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
</body>
</html>
