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
                <a class="nav-link" href="SkillTestWeb.html">Home</a>
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
    <h2 class=" mb-3">Add Questions for Subject</h2>
    <?php $sub_code = htmlspecialchars($_GET['sub_code']); ?>
   
     <form action="addQuesToDB.php" method="POST">
    <input type="hidden" name="sub_code" value="<?php echo $sub_code; ?>">
    <label for="question">Question:</label>
    <textarea name="question" id="question" rows="4" required></textarea><br>

    <label for="option_a">Option A:</label>
    <input type="text" name="option_a" id="option_a" required><br>

    <label for="option_b">Option B:</label>
    <input type="text" name="option_b" id="option_b" required><br>

    <label for="option_c">Option C:</label>
    <input type="text" name="option_c" id="option_c" required><br>

    <label for="option_d">Option D:</label>
    <input type="text" name="option_d" id="option_d" required><br>

    <label for="correct_option">Correct Option:</label>
    <select name="correct_option" id="correct_option" required>
      <option value="A">Option A</option>
      <option value="B">Option B</option>
      <option value="C">Option C</option>
      <option value="D">Option D</option>
    </select><br>

    <button type="submit">Add Question</button>
  </form>

</body>	
</html>
