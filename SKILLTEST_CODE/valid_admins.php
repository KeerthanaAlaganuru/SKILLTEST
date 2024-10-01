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

// Create valid_admins table if it doesn't exist
$create_valid_admins_table = "CREATE TABLE IF NOT EXISTS valid_admins (
    userid INT PRIMARY KEY,
    username VARCHAR(30) UNIQUE,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    branch VARCHAR(50),
    phone_number VARCHAR(15)
)";
if (!mysqli_query($connect, $create_valid_admins_table)) {
    die("Error creating valid_admins table: " . mysqli_error($connect));
}

// Insert data into valid_admins table if it's empty
$insert_valid_admins_values = "INSERT IGNORE INTO valid_admins (userid, username, email, password, branch, phone_number) VALUES
    (742, 'keerthi@742', 'keerthi742@gmail.com', 'keerthi@742', 'ECE', '6304525891'),
    (912, 'ganesh@912', 'ganesh912@gmail.com', 'ganesh@912', 'ECE', '9121353922'),
    (786, 'hima@786', 'hima786@gmail.com', 'hima@786', 'CSE', '9640673308'),
    (743, 'gouthami@743', 'gouthami743@gmail.com', 'gouthami@743', 'ECE', '9121353922'),
    (737, 'niveditha@737', 'niveditha737@gmail.com', 'niveditha@737', 'CSE', '9640673308')";
if (!mysqli_query($connect, $insert_valid_admins_values)) {
    die("Error inserting data into valid_admins table: " . mysqli_error($connect));
} else {
    echo "Data inserted successfully into valid_admins table.";
}

// Close the database connection
mysqli_close($connect);
?>
