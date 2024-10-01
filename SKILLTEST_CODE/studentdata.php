<!DOCTYPE html>
<html lang="en">
<head>
  <title>Skill Test</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  	<link rel="stylesheet" href="styles.css">
    <link rel="icon" href="K.jpeg" type="image/png">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  	</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	$server = 'localhost';
    $user = 'root';
    $pwd = '';
	$database = 'SKILLTEST'; // Change this to your desired database name

	$connect = mysqli_connect($server, $user, $pwd);
	$error = mysqli_connect_error();
	if (!$connect) {
		 die("Failed to connect: " . $error);
	}

	$createDB = "CREATE DATABASE IF NOT EXISTS $database;";
	$result1 = mysqli_query($connect, $createDB);

	$useDB = "USE $database;";
	$result2 = mysqli_query($connect, $useDB);

	$create_table = "CREATE TABLE IF NOT EXISTS STUDENTS(user_name VARCHAR(30),user_email VARCHAR(50), user_pwd VARCHAR(15));";
	$table_result = mysqli_query($connect, $create_table);

	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		 $Username = $_POST['username'];
		 $Useremail=$_POST["email"];
		 $Password = $_POST['password'];

		 $Username = mysqli_real_escape_string($connect, $Username);
		 $Useremail = mysqli_real_escape_string($connect, $Useremail);
		 $Password = mysqli_real_escape_string($connect, $Password);
		
			// Check if the username already exists in the database
    $check_query = "SELECT * FROM STUDENTS WHERE user_name = '$Username'";
    $check_result = mysqli_query($connect, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo '<script>alert("Username already exists. Please choose a different username.");</script>';
        echo '<script>window.location.href = "studentregister.html";</script>';
        exit;
    } else {
		  $insert = "INSERT INTO STUDENTS(user_name,user_email,user_pwd)
		            VALUES('$Username','$Useremail','$Password')";
		 $ins_res = mysqli_query($connect, $insert);
		 if (!$ins_res) {
            die("Insertion error: " . mysqli_error($connect));
        } else {
            echo '<script>
        $(document).ready(function() {
            $("#successModal").modal("show");
        });
    </script>';
        }
        }
	}
	?>
	<div class="modal fade" id="successModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Registration Successful</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Your registration was successful. Click the button below to proceed to the login page.
            </div>
            <div class="modal-footer">
                <a href="studentlogin.php" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
</div>
</body>


</html>

