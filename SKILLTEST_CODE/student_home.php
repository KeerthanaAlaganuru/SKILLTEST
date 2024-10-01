<!DOCTYPE html>
<html lang="en">
<head>
  <title>Skill Test</title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
			<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
      <link rel="icon" href="K.jpeg" type="image/png">
  		<link rel="stylesheet" href="styles.css">
  		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  		<style>
    .overlay-buttons {
      position: absolute;
      bottom: 50px;
      left: 50%;
      transform: translateX(-20%);
    }
    .welcome-text {
      position: absolute; /* Position the text absolutely inside the container */
      top: 20%; /* Move the text to the center vertically */
      left: 50%; /* Move the text to the center horizontally */
      transform: translate(-50%, -50%); /* Center the text precisely */
      font-size: 24px;
      color: gold; /* Text color */
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add a subtle text shadow for readability */
      z-index: 1; /* Ensure the text is on top of the image */
    }
  </style>
  	</head>
<body id="page-body">
<nav class="navbar navbar-expand-lg navbar-light fixed-top-navbar">
    <a class="navbar-brand dflex" href="#about">
        <img src="K.jpeg" class="rounded-pill" height="50" width="100%">
        <span class="text-warning m-0 ml-2">SKILL TEST</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			   <li class="nav-item active">
			     <a class="nav-link" href="student_home.php">Home </a>
			   </li>
			   <li class="nav-item">
			     <a class="nav-link" href="resultshown.php">Results</a>
			   </li>
				 <li class="nav-item">
					  <a class="nav-link" href="SkillTestWeb.html">LOGOUT</a>
				 </li>
			</ul>
    </div>
</nav>
	<div class="image-container">
    <img class="scroll" src="exam.jpeg" alt="Background Image"> 
    <div class="welcome-text">
      <?php
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        session_start(); // Start the session

        if (isset($_SESSION['USERNAME'])) {
          $username = $_SESSION['USERNAME']; // Get the value from the session
          echo "Welcome, $username"; // Display the value
        } else {
          echo "Welcome, Guest"; // Display default message if not logged in
        }
      ?>
    </div>
    <div class="overlay-buttons">
      <a href="selectsubject.php" class="btn btn-primary btn-lg mx-2">Start Your Test</a>
    </div>
  </div>
	</div>
   <script>
  function updateBackdrop() {
    var offcanvasElement = document.getElementById('mycanvas');
    var pageBody = document.getElementById('page-body');
    
    if (window.innerWidth <= 700) {
      offcanvasElement.setAttribute('data-bs-backdrop', 'static');
      pageBody.style.overflow = 'auto';
    } else {
      offcanvasElement.setAttribute('data-bs-backdrop', 'false');
      pageBody.style.overflow = 'auto';
    }
  }

  // Initial call to set the backdrop on page load
  updateBackdrop();

  // Listen for window resize events
  window.addEventListener('resize', updateBackdrop);
</script>
	
</body>
</html>


