<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://kit.fontawesome.com/d96e1e0d74.css" crossorigin="anonymous">
  <title>POST A JOB</title>


</head>


<body style="background-image: url('assets/postjob.jpg');">

<<<<<<< Updated upstream:views/jobpost.php
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #eab676;">
    <div class="container-fluid">
      <a class="navbar-brand logo" href="#">Job Portal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse login-nav" id="navbarTogglerDemo01">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active">
            <a class="nav-link " href="index.html">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="jobs.php">Jobs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Candidates</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="jobpost.php"> + Post a Job</a>
          </li>
          <li class="nav-item">
            <a class="icon-block " href="#"><i class="fa-regular fa-messages"> </i></a>
          </li>

          <li class="nav-item">
            <a class="icon-block " href="#"></a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

=======
  <include src= "company-header.html"> </include>
>>>>>>> Stashed changes:views/employer/jobpost.php
  <div id="PostJobCon" class="container-sm mt-5 py-5 p-5 bg-light login-form">
    <form action= jobpost_connect.php method= "post">
      <div class="form-group">
        <label for="company_logo">Company Logo</label> <br>
        <input type="file" class="file-upload-input" onchange="readURL(this)" accept="Image/*" name="company_logo">
      </div>
      <br>

      <div class="form-group">
        <label for="job_title">Job Title</label>
        <input type="text" class="form-control" name= "job_title" id="job_title" placeholder="Enter Job Title">
      </div>
      <br>

      <div class="form-group">
        <label for="skills">Skills</label>
        <input type="text" name= "skills" class="form-control" placeholder="Enter Skills">
      </div>
      <br>

      <div class="form-group">
        <label for="job_type">Job Type</label> <br> <br>
        <select id="job_type" name="job_type">
            <option value="Full-Time"> Full-Time </option>
            <option value="Part-Time"> Part-Time </option>
            <option value="Internship"> Internship </option>
        </select>
      </div>
      <br>

      <div class="form-group">
        <label for="exampleInputEmail1salary">Salary</label>
        <input type="tel" name= "salary" class="form-control" 
          placeholder="Enter Salary">
      </div>
      <br>

      <div class="form-group">
        <label for="positions">Positions Available</label>
        <input type="positions" name= "positions"  class="form-control" 
          placeholder="Enter Positions Available">
      </div>
      <br>
      
      <br>
      <button type="post" class="btn btn-primary">Post</button>
    </form>
  </div>

  <br> <br>
  <include src= "company-footer.html"> </include>
</body>

</html>