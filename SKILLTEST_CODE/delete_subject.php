<?php
$server = 'localhost';
$user = 'root';
$pwd = '';
$database = 'SKILLTEST'; 

// Connect to the database
$connect = mysqli_connect($server, $user, $pwd, $database);
$error = mysqli_connect_error();
if (!$connect) {
    die("Failed to connect: " . $error);
}

// Check if the request method is GET and the sub_code parameter is set
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['sub_code'])) {
    $sub_code = $_GET['sub_code'];

    // Prepare the DELETE query
    $delete_subject_query = "DELETE FROM SUBJECTS WHERE sub_code = ?";

    // Start transaction
    mysqli_begin_transaction($connect);

    try {
        // Prepare and execute the DELETE query
        $stmt = mysqli_prepare($connect, $delete_subject_query);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $sub_code);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        } else {
            throw new Exception("Error preparing query: " . mysqli_error($connect));
        }

        // Commit transaction
        mysqli_commit($connect);

        // Redirect back to the subjects page after deleting
        header("Location: subjects.php");
        exit();
    } catch (Exception $e) {
        // Rollback transaction on error
        mysqli_rollback($connect);
        echo $e->getMessage();
    }
}

// Close the database connection
mysqli_close($connect);
?>
