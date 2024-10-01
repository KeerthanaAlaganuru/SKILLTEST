<?php
$server = 'localhost';
$user = 'root';
$pwd = '';
$database = 'SKILLTEST'; 

$connect = mysqli_connect($server, $user, $pwd, $database);
$error = mysqli_connect_error();
if (!$connect) {
    die("Failed to connect: " . $error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sub_code = $_GET['sub_code']; // Get the sub_code from the URL parameters

    $delete_query = "DELETE FROM MCQS WHERE id = ?";
    $stmt = mysqli_prepare($connect, $delete_query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // Redirect back to the questions page with the correct sub_code parameter
        header("Location: questions.php?sub_code=$sub_code");
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>
