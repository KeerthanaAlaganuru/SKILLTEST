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
                <a class="nav-link" href="admin_home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="subjects.php">Subjects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="SkillTestWeb.html">LOGOUT</a>
            </li>
        </ul>
    </div>
</nav>

<div class="image-container">
    <img class="scroll" src="ad2.jpeg" alt="Background Image" height="150px"> 
    <div class="welcome-text">
      <?php
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        session_start(); // Start the session

        if (isset($_SESSION['USERID'])) {
          $userID = $_SESSION['USERID']; // Get the value from the session
          echo "Welcome, $userID"; // Display the value
        } else {
          echo "Welcome, Guest"; // Display default message if not logged in
        }
      ?>
    </div>
</div>
</body>
</html>
