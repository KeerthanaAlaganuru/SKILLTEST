<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  	<link rel="stylesheet" href="styles.css">
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

<?php
ini_set('display_errors', 1);
	error_reporting(E_ALL);
session_start();

$server = 'localhost';
$user = 'root';
$pwd = '';
$database = 'SKILLTEST';

$connect = mysqli_connect($server, $user, $pwd, $database);
$error = mysqli_connect_error();
if (!$connect) {
    die("Failed to connect: " . $error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $Username = $_POST['username'];
    $Password = $_POST['password'];

    $Username = mysqli_real_escape_string($connect, $Username);
    $Password = mysqli_real_escape_string($connect, $Password);

    $query = "SELECT * FROM STUDENTS WHERE user_name='$Username' AND user_pwd='$Password';";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) == 1) {
        // Successful login
      	$_SESSION['loggedin'] = true;
   		$_SESSION['USERNAME'] = $Username;
   		if($_SESSION['USERNAME']);
   		{
      		header("Location: student_home.php"); // Redirect to admin.php or any other page
        		exit();
        }
    } else {
        // Invalid login
        echo '<script>
                $(document).ready(function(){
                    $("#invalidCredentialsModal").modal("show");
                });
              </script>';
    }
}
?>
<div class="modal fade" id="invalidCredentialsModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="invalidCredentialsModalLabel">Invalid Credentials</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Your login credentials are invalid. Please try again.
            </div>
            <div class="modal-footer">
                <a href="studentlogin.php" class="btn btn-primary">Try Again</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
      $("#loginForm").submit(function (event) {
        event.preventDefault(); // Prevent the form from submitting

        const username = $("#username").val();
        const password = $("#password").val();

        $.post("studentlogin.php", { username: username, password: password }, function (data) {
          if (data === "success") {
            // Successful login
            window.location.href = "student_home.php;"// Redirect to admin_home.html or any other page
          } else {
            // Invalid login
            $("#invalidCredentialsModal").modal("show");
          }
        });
      });
    });
  </script>
</body></html>
