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
  <h2 class="mb-3">Add Examination Subjects</h2>
  <a href="addsubject.php" class="btn btn-success">Add Subject</a>
  <table class="table table-responsive" align='center'>
    <thead>
      <tr >
        <th>SL-NO</th>
        <th>Subject-code</th>
        <th>Subject-Name</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      ini_set('display_errors', 1);
      error_reporting(E_ALL);

      $server = 'localhost';
      $user = 'root';
      $pwd = '';
      $database = 'SKILLTEST'; // Change this to your desired database name

      $connect = mysqli_connect($server, $user, $pwd);
      $error = mysqli_connect_error();
      if (!$connect) {
        die("Failed to connect: " . $error);
      }

      $createDB = "CREATE DATABASE IF NOT EXISTS $database;";
      $result1 = mysqli_query($connect, $createDB);

      $useDB = "USE $database;";
      $result2 = mysqli_query($connect, $useDB);

      $query = "SELECT * FROM SUBJECTS;";
      $result = mysqli_query($connect, $query);
      $serial = 1;
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $serial++ . "</td>";
          echo "<td>" . $row['sub_code'] . "</td>";
          echo "<td><a href='Questions.php?sub_code=" . $row['sub_code'] . "'>" . $row['sub_name'] . "</a></td>";
          echo "<td>" . $row['sub_des'] . "</td>";
          echo '<td>';
          echo '<a href="edit_subject.php?mode=edit&sub_code=' . $row['sub_code'] . '" class="btn btn-primary">Edit</a>';
          echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
          echo '<a href="delete_subject.php?sub_code=' . $row['sub_code'] . '" class="btn btn-danger">Delete</a>';
          echo '</td>';
          echo "</tr>";
        }
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
