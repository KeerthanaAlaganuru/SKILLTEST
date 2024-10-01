<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

$server = 'localhost';
$user = 'root';
$pwd = '';
$database = 'SKILLTEST';

$connect = mysqli_connect($server, $user, $pwd, $database);
$error = mysqli_connect_error();
if (!$connect) {
    die("Failed to connect: " . $error);
}

$subjectsQuery = mysqli_query($connect, "SELECT * FROM SUBJECTS");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Select Your Subject</title>
  <link rel="icon" href="K.jpeg" type="image/png">
  <!-- Include necessary Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex vh-100 justify-content-center align-items-center">
  <div class="card shadow-lg p-4">
    <div class="card-body">
      <div class="text-center">
        <h1 class="mb-4">Select Your Subject</h1>
        <!-- Ensure the form action is set to 'test.php' -->
        <form action="Test.php" method="post" onsubmit="return validateForm();">
          <?php while ($row = mysqli_fetch_assoc($subjectsQuery)) : ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="selectedSubject" value="<?= $row['sub_code'] ?>" id="subject_<?= $row['sub_code'] ?>">
              <label class="form-check-label" for="subject_<?= $row['sub_code'] ?>">
                <?= $row['sub_code'] ?> - <?= $row['sub_name'] ?>
              </label>
            </div>
          <?php endwhile; ?>
          <button type="submit" class="btn btn-primary mt-3">Start Test</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Include necessary Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function validateForm() {
    var selectedRadio = document.querySelector('input[name="selectedSubject"]:checked');
    if (!selectedRadio) {
      alert("Please select a subject before proceeding.");
      return false;
    }
    return true;
  }
</script>
</body>
</html>
