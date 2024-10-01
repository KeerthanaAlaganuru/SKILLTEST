<?php
// Database connection details for the question database
$server = 'localhost';
$user = 'root';
$pwd = '';
$database = 'SKILLTEST'; // Change this to your desired database name

// Establish a database connection for the question database
$connectQuestion = mysqli_connect($server, $user, $pwd, $database);
$errorQuestion = mysqli_connect_error();
if (!$connectQuestion) {
    die("Failed to connect to the question database: " . $errorQuestion);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the selected subject and questions from the form submission
    $sub_code = $_POST['selectedSubject'];
    $questionsQuery = mysqli_query($connectQuestion, "SELECT * FROM MCQS WHERE sub_code='$sub_code'");
    $questions = mysqli_fetch_all($questionsQuery, MYSQLI_ASSOC);

    // Calculate the total score
    $totalScore = 0;
    foreach ($questions as $index => $question) {
        $selectedOption = $_POST['q' . $index];
        if ($selectedOption === $question['Correct']) {
            $totalScore++;
        }
    }
}
?> 

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

// Create the 'results' table if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS RESULTS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    marks_gained INT NOT NULL,
    subject VARCHAR(100) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$resultCreateTable = mysqli_query($connectStudent, $createTableQuery);
if (!$resultCreateTable) {
    echo "Error creating 'results' table: " . mysqli_error($connectStudent);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the selected subject and questions from the form submission
    $sub_code = $_POST['selectedSubject'];
    $questionsQuery = mysqli_query($connectQuestion, "SELECT * FROM MCQS WHERE sub_code='$sub_code'");
    $questions = mysqli_fetch_all($questionsQuery, MYSQLI_ASSOC);

    // Calculate the total score
    $totalScore = 0;
    foreach ($questions as $index => $question) {
        $selectedOption = $_POST['q' . $index];
        if ($selectedOption === $question['Correct']) {
            $totalScore++;
        }
    }

    // Insert results into the database using the logged-in username from the session
    $logged_in_username = $_SESSION['USERNAME'];

    $insertQuery = "INSERT INTO RESULTS (username, marks_gained, subject) VALUES ('$logged_in_username', $totalScore, '$sub_code')";
    $result = mysqli_query($connectStudent, $insertQuery);
    if (!$result) {
        echo "Error inserting results: " . mysqli_error($connectStudent);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Results</title>
    <link rel="icon" href="K.jpeg" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body style="background-color:#93c2b3;">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Display exam results -->
            <h1 class="text-center">Exam Results</h1>
            <p class="text-center">Subject: <?= $sub_code ?></p>
            <p class="text-center">Total Score: <?= $totalScore ?> out of <?= count($questions) ?></p>
            <!-- Back to exam button -->
            <div class="text-center mt-4">
                <a href="student_home.php" class="btn btn-outline-success">Back to Home</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

