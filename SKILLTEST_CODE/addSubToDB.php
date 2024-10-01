<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$server = 'localhost';
$user = 'root';
$pwd = '';
$database = 'SKILLTEST';

$connect = mysqli_connect($server, $user, $pwd);
$error = mysqli_connect_error();
if (!$connect) {
    die("Failed to connect: " . $error);
}

$createDB = "CREATE DATABASE IF NOT EXISTS $database;";
$result1 = mysqli_query($connect, $createDB);

$useDB = "USE $database;";
$result2 = mysqli_query($connect, $useDB);

$create_table = "CREATE TABLE IF NOT EXISTS SUBJECTS(sub_code VARCHAR(7), sub_name VARCHAR(20), sub_des VARCHAR(50));";
$table_result = mysqli_query($connect, $create_table);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $SubjectCode = $_POST['subjectCode'];
    $SubjectName = $_POST['subjectName'];
    $SubjectDetail = $_POST['subjectDetail'];
    
    $SubjectCode = mysqli_real_escape_string($connect, $SubjectCode);
    $SubjectName = mysqli_real_escape_string($connect, $SubjectName);
    $SubjectDetail = mysqli_real_escape_string($connect, $SubjectDetail);

    // Check if the subject code already exists in the database
    $check_query = "SELECT * FROM SUBJECTS WHERE sub_code = '$SubjectCode';";
    $check_result = mysqli_query($connect, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo '<script>alert("Subject already exists. Please choose a different subject code.");</script>';
        echo '<script>window.location.href = "subjects.php";</script>';
        exit;
    } else {
        $query = "INSERT INTO SUBJECTS(sub_code, sub_name, sub_des) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connect, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $SubjectCode, $SubjectName, $SubjectDetail);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            echo '<script>alert("Added successfully!!.");</script>';
            echo '<script>window.location.href = "subjects.php";</script>';
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    }
}

mysqli_close($connect);
?>
