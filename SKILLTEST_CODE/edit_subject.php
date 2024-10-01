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

$sub_code = '';
$sub_name = '';
$sub_des = '';

if (isset($_GET['sub_code'])) {
    $sub_code = $_GET['sub_code'];
    $fetch_subject_query = "SELECT * FROM SUBJECTS WHERE sub_code = ?";
    $stmt = mysqli_prepare($connect, $fetch_subject_query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $sub_code);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $sub_name = $row['sub_name'];
            $sub_des = $row['sub_des'];
        }
        mysqli_stmt_close($stmt);
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $SubjectCode = $_POST['subjectCode'];
    $SubjectName = $_POST['subjectName'];
    $SubjectDetail = $_POST['subjectDetail'];

    $SubjectCode = mysqli_real_escape_string($connect, $SubjectCode);
    $SubjectName = mysqli_real_escape_string($connect, $SubjectName);
    $SubjectDetail = mysqli_real_escape_string($connect, $SubjectDetail);

    $update_query = "UPDATE SUBJECTS SET sub_name = ?, sub_des = ? WHERE sub_code = ?";
    $stmt = mysqli_prepare($connect, $update_query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $SubjectName, $SubjectDetail, $SubjectCode);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        echo '<script>alert("Updated successfully!!.");</script>';
    } else {
        echo "Error: " . mysqli_error($connect);
    }

    echo '<script>window.location.href = "subjects.php";</script>';
}

mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Skill Test</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" href="K.jpeg" type="image/png">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top-navbar">
    <a class="navbar-brand dflex" href="#about">
        <img src="K.jpeg" class="rounded-pill" height="50" width="100%">
        <span class="text-warning m-0 ml-2">SKILL TEST</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="admin_home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="subjects.php">Subjects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="SkillTestWeb.html">LOGOUT</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
  <br><br><br><br><br>
  <h2 class="mb-3">Edit Examination Subject</h2>
  <form method="POST" action="edit_subject.php">
    <input type="hidden" name="subjectCode" value="<?php echo $sub_code; ?>">
    <div class="mb-3">
        <label for="subjectName" class="form-label">Subject Name</label>
        <input type="text" class="form-control" id="subjectName" name="subjectName" value="<?php echo $sub_name; ?>" placeholder="Enter subject name" required>
    </div>
    <div class="mb-3">
        <label for="subjectDetail" class="form-label">Subject Detail</label>
        <textarea class="form-control" id="subjectDetail" name="subjectDetail" rows="3" placeholder="Enter subject detail" required><?php echo $sub_des; ?></textarea>
    </div>
    <button type="submit" class="btn btn-secondary">Update</button>
  </form>
</div>
</body>
</html>
