<?php
// Database connection details for the student database
$server = 'localhost';
$user = 'root';
$pwd = '';
$database = 'SKILLTEST'; // Change this to your desired database name

// Establish a database connection for the student database
$connectStudent = mysqli_connect($server, $user, $pwd, $database);
$errorStudent = mysqli_connect_error();
if (!$connectStudent) {
    die("Failed to connect to the student database: " . $errorStudent);
}

// Retrieve stored results from the database
$retrieveResultsQuery = "SELECT subject, username, marks_gained FROM results";
$resultsResult = mysqli_query($connectStudent, $retrieveResultsQuery);
if (!$resultsResult) {
    echo "Error retrieving results: " . mysqli_error($connectStudent);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body style="background-color:#93c2b3;">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="text-center">Stored Results</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Username</th>
                        <th>Marks Gained</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Display stored results
                    while ($row = mysqli_fetch_assoc($resultsResult)) {
                        echo "<tr>";
                        echo "<td>{$row['subject']}</td>";
                        echo "<td>{$row['username']}</td>";
                        echo "<td>{$row['marks_gained']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="text-center mt-4">
                <a href="student_home.php" class="btn btn-outline-success">Back to Home</a>
            </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

