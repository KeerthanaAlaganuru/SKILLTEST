<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$server = 'localhost';
$user = 'root';
$pwd = '';
$database = 'SKILLTEST'; 

// Connecting to the database
$connect = mysqli_connect($server, $user, $pwd, $database);
$error = mysqli_connect_error();
if ($error) {
    die("Failed to connect: " . $error);
}

// Checking that if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $sub_code = $_POST['sub_code'];
    $question = $_POST['question'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $correct_option = $_POST['correct_option'];

    //Executing the update query
    $update_query = "UPDATE MCQS SET question = ?, Option_A = ?, Option_B = ?, Option_C = ?, Option_D = ?, Correct = ? WHERE id = ?";
    $stmt = mysqli_prepare($connect, $update_query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssssi", $question, $option_a, $option_b, $option_c, $option_d, $correct_option, $id);
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($success) {
            // Displaying the success message and redirecting
            echo '<script>alert("Question updated successfully!");</script>';
            echo '<script>window.location.href = "questions.php?sub_code=' . $sub_code . '";</script>';
        } else {
            echo "Error: Failed to execute query.";
        }
    } else {
        echo "Error: " . mysqli_error($connect);
    }
} else {
    // Fetching the question details for editing
    if (isset($_GET['id']) && isset($_GET['sub_code'])) {
        $id = $_GET['id'];
        $sub_code = $_GET['sub_code'];

        $fetch_query = "SELECT * FROM MCQS WHERE id = ?";
        $stmt = mysqli_prepare($connect, $fetch_query);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $question_data = mysqli_fetch_assoc($result);
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    } else {
        echo "Error: Missing 'id' or 'sub_code' parameter in URL.";
    }
}

mysqli_close($connect);
?>

<!-- Form for taking the updating values of the Question -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Question</title>
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
    <h2 class="mb-3">Edit Question for Subject: <?php echo $sub_code; ?></h2>
    <form action="edit_question.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $question_data['id']; ?>">
        <input type="hidden" name="sub_code" value="<?php echo $sub_code; ?>">
        
        <label for="question">Question:</label>
        <textarea name="question" id="question" rows="4" required><?php echo $question_data['question']; ?></textarea><br>

        <label for="option_a">Option A:</label>
        <input type="text" name="option_a" id="option_a" value="<?php echo $question_data['Option_A']; ?>" required><br>

        <label for="option_b">Option B:</label>
        <input type="text" name="option_b" id="option_b" value="<?php echo $question_data['Option_B']; ?>" required><br>

        <label for="option_c">Option C:</label>
        <input type="text" name="option_c" id="option_c" value="<?php echo $question_data['Option_C']; ?>" required><br>

        <label for="option_d">Option D:</label>
        <input type="text" name="option_d" id="option_d" value="<?php echo $question_data['Option_D']; ?>" required><br>

        <label for="correct_option">Correct Option:</label>
        <select name="correct_option" id="correct_option" required>
          <option value="A" <?php echo ($question_data['Correct'] === 'A') ? 'selected' : ''; ?>>Option A</option>
          <option value="B" <?php echo ($question_data['Correct'] === 'B') ? 'selected' : ''; ?>>Option B</option>
          <option value="C" <?php echo ($question_data['Correct'] === 'C') ? 'selected' : ''; ?>>Option C</option>
          <option value="D" <?php echo ($question_data['Correct'] === 'D') ? 'selected' : ''; ?>>Option D</option>
        </select><br>

        <button type="submit" class="btn btn-primary">Update Question</button>
    </form>
</div>
</body>
</html>
