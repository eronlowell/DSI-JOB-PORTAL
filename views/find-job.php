<!DOCTYPE html>

<?php
    $conn = new mysqli("localhost", "root", "", "jobpost_db");
    $sql = "SELECT * FROM jobpost";
    $all_jobs = $conn->query($sql);
?>



<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <title>JOB PORTAL</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #800;">
    <div class="container-fluid">
      <a class="navbar-brand logo" href="index.html">
        <img src="../icon-3.png" alt="" width="60" height="40" class="d-inline-block align-text-top">
        Job Portal
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mx-auto">
          
          <li class="nav-item">
            <a class="nav-link ms-5" href="find-job.html">Find A Job</a>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link " href="#">Company Profiles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Career Guides</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link " href="#">Sign Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-5 div-margins">
    <div class="row">
      <div class="col-4 ml-auto">
        <p class="header-text">Latest Job post</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
          magna aliqua.</p>
      </div>
      <div class="col-2">
      </div>
      <div class="col-6 my-auto">
        <div class="input-group pr-auto">
          <div class="form-outline">
            <input type="search" id="form1" class="form-control" placeholder="Search here.." />
          </div>
          <button type="button" class="btn btn-danger">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">

    <?php
    while($row = mysqli_fetch_assoc($all_jobs)){

    ?>


      <div class="col-3 job-card">
        <div class="card">
          <img src="<?php echo $row["company_logo"]; ?>" class="card-img-top" alt="..." width="100%" height="200px">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row["job_title"]; ?> </h5>
            <p class="skills"> <b> Skills Required: </b> <?php echo $row["skills"]; ?> </p>
            <p class="job_type"> <b> Job Type: </b> <?php echo $row["job_type"]; ?> </p>
            <p class="salary"> <b> Salary: </b> <?php echo $row["salary"]; ?> </p>
            <p class="positions"> <b> Positions Offered: </b> <?php echo $row["positions"]; ?> </p>
            <a href="#" class="btn btn-primary">Apply Now</a>
          </div>
        </div>
      </div>

      <?php
        }
      ?>

    </div>
  </div>
  <div class="container-fluid mt-5 footer border-on">
    <div class="row">
      <div class="col-2 my-auto mr-5">
        <img src="../company-3-logo.png" alt="img" height="20%" width="100%">
      </div>
      <div class="col-4 ml-5 footer-margin">
        <ul class="list-unstyled">
          <li class="">
            <p class="footer-toc">Table of Contents</p>
          </li>
          <li class="">
            <a class=" " href="#">Home </a>
          </li>
          <li class="">
            <a class=" " href="#">Find A Job</a>
          </li>
          <li class="">
            <a class="" href="#">About Us</a>
          </li>
          <li class="">
            <a class=" " href="#">Contact</a>
          </li>
        </ul>
      </div>
      <div class="col-4 footer-two">
        <ul class="list-unstyled">
          <li class="">
            <p class="footer-toc "> </p>
          </li>
          <li class="">
            <a class=" " href="#">Career Guides</a>
          </li>
          <li class="">
            <a class=" " href="#">Blog 1</a>
          </li>
          <li class="">
            <a class="" href="#">Blog 2</a>
          </li>
          <li class="">
            <a class=" " href="#">Blog 3</a>
          </li>
        </ul>
      </div>
      <div class="col mt-auto ml-auto footer-cpw">
        <p>Job Portal Solutions © 2023 Grp 2 & 3</p>
        <p>All rights reserved</p>
      </div>
    </div>

  </div>
</body>

</html>