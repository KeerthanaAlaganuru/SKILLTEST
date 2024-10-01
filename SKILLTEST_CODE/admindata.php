<?php
// Display errors for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection parameters
$server = 'localhost';
$user = 'root';
$pwd = '';
$database = 'SKILLTEST';

// Connect to the database
$connect = mysqli_connect($server, $user, $pwd, $database);
if (!$connect) {
    die("Failed to connect to the database: " . mysqli_connect_error());
}

// Create registered_admins table if it doesn't exist
$create_admins_table = "CREATE TABLE IF NOT EXISTS registered_admins (
    userid INT PRIMARY KEY,
    branch VARCHAR(50),
    password VARCHAR(255)
)";
if (!mysqli_query($connect, $create_admins_table)) {
    die("Error creating registered_admins table: " . mysqli_error($connect));
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $UserID = mysqli_real_escape_string($connect, $_POST['userid']);
    $Branch = mysqli_real_escape_string($connect, $_POST['branch']);
    $Password = mysqli_real_escape_string($connect, $_POST['password']);

    // Check if the user's details exist in the valid_admins table
    $check_query = "SELECT * FROM valid_admins WHERE userid = '$UserID' AND password = '$Password'";
    $check_result = mysqli_query($connect, $check_query);

    if (!$check_result) {
        die("Query error: " . mysqli_error($connect));
    }

    if (mysqli_num_rows($check_result) > 0) {
        // Allow registration for users found in the valid_admins table
        $insert = "INSERT INTO registered_admins (userid, branch, password) VALUES ('$UserID', '$Branch', '$Password')";
        if (!mysqli_query($connect, $insert)) {
            die("Error inserting data into registered_admins table: " . mysqli_error($connect));
        } else {
            echo '<script>alert("Registration successful.");</script>';
            echo '<script>window.location.href = "adminlogin.php";</script>';
        }
    } else {
        // Display error message for users not found in the valid_admins table
        echo '<script>alert("You are not authorized to register.");</script>';
        echo '<script>window.location.href = "administration.html";</script>';
    }
}

// Close the database connection
mysqli_close($connect);
?>
