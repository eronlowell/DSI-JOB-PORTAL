<!DOCTYPE html>

<?php

$results_per_page = 4;
$conn = new mysqli("localhost", "root", "", "jobpost_db");
$sql = "SELECT * FROM jobpost";
$all_jobs = $conn->query($sql);
$number_of_result = mysqli_num_rows($all_jobs);

$number_of_page = ceil($number_of_result / $results_per_page);


if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}


$page_first_result = ($page - 1) * $results_per_page;



?>



<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
        <img src="assets/jobportal_logo1.png" height="100px" width="275px"  class="d-inline-block align-text-top">
        
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mx-auto">
          
          <li class="nav-item">
            <a class="nav-link fs-3 fw-bold" href="index.html">Home</a>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link  fs-3 fw-bold " href="company-profiles.html">Company Profiles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-3 fw-bold " href="find-job.html">Find A Job</a>
          </li>
        </ul>
        <ul class="navbar-nav d-flex flex-row-reverse">
          <div class="dropdown">
            <a class="btn stud-btn2 dropdown-toggle text-center" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../no-profile.png" alt="" class="rounded-circle" height="40px">
            </a>
          
            <ul class="dropdown-menu dropdown-menu-right">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="#">Account Settings</a></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
          </div>
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
          <form action="find-job.php" method="GET">
            <div class="form-outline">
              <input type="search" name="search" id="search" class="form-control" placeholder="Search here.." />
            </div>
            <button type="submit" class="btn btn-danger">
              <i class="bi bi-search"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">

      <?php

      if (isset($_GET['search']) && !empty($_GET['search'])) {
        // Perform the search using $_GET['q']
        $search = $_GET['search'];
        // ...
      } else {
        // Display an error message or provide a default value
        $search = 'default value';
        // ...
      }

      if ($search == 'default value') {
        $sql = "SELECT *FROM jobpost LIMIT " . $page_first_result . ',' . $results_per_page;
      } else {
        $sql = "SELECT *FROM jobpost WHERE job_title LIKE '%$search%' LIMIT " . $page_first_result . ',' . $results_per_page;
      }
      $all_jobs = mysqli_query($conn, $sql);
      // $row = mysqli_fetch_assoc($all_jobs);
      while ($row = mysqli_fetch_assoc($all_jobs)) {
      ?>
        <div class="col-3 mb-5">
          <div class="card">
            <img src="<?php echo $row["company_logo"]; ?>" class="card-img-top" alt="..." width="100%" height="200px">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["job_title"]; ?> </h5>
              <p class="skills"> <b> Skills Required: </b> <?php echo $row["skills"]; ?> </p>
              <p class="job_type"> <b> Job Type: </b> <?php echo $row["job_type"]; ?> </p>
              <p class="salary"> <b> Salary: </b> <?php echo $row["salary"]; ?> </p>
              <p class="positions"> <b> Positions Offered: </b> <?php echo $row["positions"]; ?> </p>
              <a onclick="<?php setcookie("jobID", $row["id"]); ?>" href="Apply-Page.php" class="btn btn-primary">Apply Now</a>
              <button type="button" class="btn btn-secondary" target="_blank" onclick="window.location.href='company-profiles.html';"> <i class="bi bi-eye-fill"> </i> </button>
            </div>
          </div>
        </div>

      <?php
      }
      ?>

      <nav class="mx-auto" aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <?php
            $pageNumber = 1;
            if ($page >= 2) {
              echo '<a class="page-link" href="find-job.php?page=' . ($page - 1) . '" aria-label="Previous">';
              echo '<span aria-hidden="true">&laquo;</span>';
            } else {
              echo '<a class="page-link disabled" href="find-job.php?page=' . ($page - 1) . '" aria-label="Previous">';
              echo '<span aria-hidden="true" class="disabled">&laquo;</span>';
            }
            ?>
            </a>
          </li>
          <?php for ($page = 1; $page <= $number_of_page; $page++) {
            echo '    <li class="page-item"><a class="page-link" href = "find-job.php?page=' . $page . '"> ' . $page . '</a></li>';
          }

          if (!isset($_GET['page'])) {
            $page = 1;
          } else {
            $page = $_GET['page'];
          }
          ?>
          <li class="page-item">
            <?php
            if ($page < $number_of_page) {
              echo '<a class="page-link" href="find-job.php?page=' . ($page + 1) . '" aria-label="Next">';
            } else {
              echo '<a class="page-link disabled" href="find-job.php?page=' . ($page - 1) . '" aria-label="Next">';
            }
            ?>
            <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>

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