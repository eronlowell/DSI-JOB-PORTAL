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
  <title>Post a Job | Employer</title>


</head>
<style>
    .footer{
        background-color: #eab676;
    }

</style>

<body style="background-image: url('assets/postjob.jpg');">

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #eab676;">
    <div class="container-fluid">
      <img src="assets/jobportal_logo1.png" height="100px" width="275px"  class="d-inline-block align-text-top">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse login-nav" id="navbarTogglerDemo01">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active">
            <a class="nav-link fs-3 fw-bold" href="index.html">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-3 fw-bold" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-3 fw-bold" href="jobs.php">Jobs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-3 fw-bold" href="candidates.html">Candidates</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-3 fw-bold" href="jobpost.php"> + Post a Job</a>
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

  <div id="PostJobCon" class="container-sm mt-5 py-5 p-5 bg-light login-form">
    <form action= jobpost_connect.php method= "post">
      <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
      </div>
      <br>


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

      <div>
        <label for="job_summary">Job Summary</label>
        <textarea id="job_summary" class="form-control" name="job_summary" placeholder="Write Job Summary" required rows="8" cols="50"></textarea>
      </div> <br>

      <div>
        <label for="key_responsibility">Key Responsibilities</label>
        <textarea id="key_responsibility" class="form-control" name="key_responsibility" placeholder="Write Key Responsibilities" required rows="8" cols="50"></textarea>
      </div> <br>

      <div>
        <label for="job_reqs">Job Requirements</label>
        <textarea id="job_reqs" class="form-control" name="job_reqs" placeholder="Write Job Requirements" required rows="8" cols="50"></textarea>
      </div> <br>

      <div class="form-group">
        <label for="skills">Skills</label>
        <input type="text" name= "skills" class="form-control" placeholder="Enter Skills">
      </div>
      <br>

      <div class="form-group">
        <label for="job_category">Job Category</label> <br> <br>
        <select id="job_category" name="job_category">
            <option value="none"> Choose Job Category  </option>
            <option value="business"> Business and Financial Services  </option>
            <option value="construction"> Construction  </option>
            <option value="education"> Education  </option>
            <option value="restaurant"> Food & Beverage/Catering/Restaurant </option>
            <option value="health"> Health, Pharmaceuticals, and Biotech </option>
            <option value="hospitality"> Hospitality </option>
            <option value="it"> Information Technology </option>
            <option value="law"> Law Firm </option>
            <option value="estate"> Real Estate </option>
            <option value="transpo"> Transportation/Logistics  </option>
            <option value="distribution"> Wholesale/Retail and Distribution  </option>
            
        </select>
      </div>
      <br>

      <div class="form-group">
        <label for="job_type">Job Type</label> <br> <br>
        <select id="job_type" name="job_type">
            <option value="Full-Time"> Full-Time </option>
            <option value="Part-Time"> Part-Time </option>
        </select>
      </div>
      <br>

      <div class="form-group">
        <label for="exampleInputEmail1salary">Salary</label>
        <input type="tel" name= "salary" class="form-control" 
          placeholder="Enter Salary">
      </div>
      <br>
      
      <br>
      <button type="post" class="btn btn-primary">Post</button>
    </form>
  </div>

  <br> <br>
  <div class="footer_container">
  <div class="footer" style="border: 1px solid #eab676">
    <br>
      <div class="col mt-auto ml-auto footer-cpw">
        <p> <center>Job Portal Solutions © 2023 Grp 2 & 3</p>
        <p>All rights reserved</p></center>
      </div>
    </div>
  </div>
</body>

</html>