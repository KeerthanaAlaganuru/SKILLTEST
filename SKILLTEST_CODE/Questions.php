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
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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
  <?php
    $server = 'localhost';
    $user = 'root';
    $pwd = '';
    $database = 'SKILLTEST';

    $connect = mysqli_connect($server, $user, $pwd);
    $error = mysqli_connect_error();
    if (!$connect) {
      die("Failed to connect: " . $error);
    }
    $useDB = "USE $database;";
    $result2 = mysqli_query($connect, $useDB);

    if (isset($_GET['sub_code'])) {
      $sub_code = $_GET['sub_code'];
   
      $fetch_subject_query = "SELECT sub_name FROM SUBJECTS WHERE sub_code = ?";
      $stmt = mysqli_prepare($connect, $fetch_subject_query);
      
      if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $sub_code);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $sub_name);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
      }

      mysqli_close($connect);

      echo '<h2 class="mb-3">Add Questions to the subject: ' . $sub_name . '</h2>';
    }
  ?>
  <a href="addQuestion.php?sub_code=<?php echo $sub_code; ?>" class="btn btn-success mb-3">Add Question</a>
  <table class="table table-responsive">
    <thead>
      <tr>
        <th>SL_NO</th>
        <th>Question</th>
        <th>Option A</th>
        <th>Option B</th>
        <th>Option C</th>
        <th>Option D</th>
        <th>Correct Option</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
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

$useDB = "USE $database;";
$result2 = mysqli_query($connect, $useDB);

$serial = 1;

// Checking that if sub_code is set in the URL
if (isset($_GET['sub_code'])) {
    $sub_code = $_GET['sub_code']; 

    $query = "SELECT * FROM MCQS WHERE sub_code = ?";
    $stmt = mysqli_prepare($connect, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $sub_code);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $serial++;
            echo '<td>' . $row['question'] . '</td>';
            echo '<td>' . $row['Option_A'] . '</td>';
            echo '<td>' . $row['Option_B'] . '</td>';
            echo '<td>' . $row['Option_C'] . '</td>';
            echo '<td>' . $row['Option_D'] . '</td>';
            echo '<td>' . $row['Correct'] . '</td>';
            echo '<td>';
            echo '<td><a href="edit_question.php?id=' . $row['id'] . '&sub_code=' . $sub_code . '" class="btn btn-primary">Edit</a>';
            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            echo '<a href="delete_question.php?id=' . $row['id'] . '&sub_code=' . $sub_code . '" class="btn btn-danger">Delete</a></td>';
            
            echo "</tr>";
        }

        mysqli_stmt_close($stmt);
    }
} else {
    echo "Error: Missing 'sub_code' parameter in URL.";
}

mysqli_close($connect);
?>
    </tbody>
  </table>
</div>
</body>
</html>
