
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$server = 'localhost';
$user = 'root';
$pwd = '';
$database = 'SKILLTEST'; 

// Connect to the database
$connect = mysqli_connect($server, $user, $pwd);
$error = mysqli_connect_error();
if ($error) {
    die("Failed to connect: " . $error);
}

// Create the database if it doesn't exist
$createDB = "CREATE DATABASE IF NOT EXISTS $database;";
$result1 = mysqli_query($connect, $createDB);

// Select the database
$useDB = "USE $database;";
$result2 = mysqli_query($connect, $useDB);

// Create the questions table if it doesn't exist
$create_table = "CREATE TABLE IF NOT EXISTS MCQS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sub_code VARCHAR(7),
    question VARCHAR(100),
    Option_A VARCHAR(100),
    Option_B VARCHAR(100),
    Option_C VARCHAR(100),
    Option_D VARCHAR(100),
    Correct VARCHAR(20)
);";
$table_result = mysqli_query($connect, $create_table);

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sub_code = $_POST['sub_code'];
    $question = $_POST['question'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $correct_option = $_POST['correct_option'];

    // Prepare and execute the insert query
    $insert_query = "INSERT INTO MCQS  (sub_code, question, Option_A, Option_B, Option_C, Option_D, Correct) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $insert_query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssss", $sub_code, $question, $option_a, $option_b, $option_c, $option_d, $correct_option);
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($success) {
            // Display success message and redirect
            echo '<script>alert("Question added successfully!");</script>';
            echo '<script>window.location.href = "Questions.php?sub_code=' . $sub_code . '";</script>';
        } else {
            echo "Error: Failed to execute query.";
        }
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>
