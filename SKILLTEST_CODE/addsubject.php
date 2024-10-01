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
<body id="page-body">
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
    <br><br><br><br><br><br><br><br>
    <h2 class=" mb-3">Add Examination Subject</h2>
    <form method="POST" action="addSubToDB.php">
    	<div class="mb-3">
        <label for="subjectCode" class="form-label">Subject Code</label>
        <input type="text" class="form-control" id="subjectCode" name="subjectCode" placeholder="Enter subject code" required>
      </div>
      <div class="mb-3">
        <label for="subjectName" class="form-label">Subject Name</label>
        <input type="text" class="form-control" id="subjectName" name="subjectName" placeholder="Enter subject name" required>
      </div>
      <div class="mb-3">
        <label for="subjectDetail" class="form-label">Subject Detail</label>
        <textarea class="form-control" id="subjectDetail" name="subjectDetail" rows="3" placeholder="Enter subject detail" required></textarea>
      </div>
      <button type="submit" class="btn btn-secondary">Save</button>
    </form>
  </div>

</body>  
</html>
