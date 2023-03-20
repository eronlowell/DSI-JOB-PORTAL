<!DOCTYPE html>

<?php

$results_per_page = 20;
$conn = new mysqli("localhost", "root", "", "jobpost_db");
$sql = "SELECT * FROM company_db";
$all_company = $conn->query($sql);
$number_of_result = mysqli_num_rows($all_company);

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
  <title>Company List</title>
  <meta charset="UTF-4">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>


<body>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #800;">
    <div class="container-fluid">
      <a class="navbar-brand logo" href="index.html">
        <img src="../assets/jobportal_logo1.png" height="100px" width="275px" class="d-inline-block align-text-top">

      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
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
              <img src="./profile-pictures/no-profile.png" alt="" class="rounded-circle" height="40px">
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

  <div class="container justify-content-center mt-50 mb-50">
    <div class="row justify-content-center">
      <div class="col-10 center">
        <div class="card card-body">
          <div class="container">

            <div class="row ">
              <div class="col align-middle" style="padding-top: 10px">
                <h1 class="text-left">Company List</h1>
              </div>
              <div class="col" style="padding-left: 300px; padding-top: 15px;">

                <form class="form-inline" action="company-list.php" method="GET">

                  <div class="form-outline">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search here.." />
                  </div>

                  <div style="padding-left:10px;">
                    <button type="submit" class="btn btn-danger">
                      <i class="bi bi-search"></i>
                    </button>
                  </div>

                </form>

              </div>
            </div>
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
              $sql = "SELECT *FROM company_db LIMIT " . $page_first_result . ',' . $results_per_page;
            } else {
              $sql = "SELECT *FROM company_db WHERE company_name LIKE '%$search%' LIMIT " . $page_first_result . ',' . $results_per_page;
            }
            $all_company = mysqli_query($conn, $sql);
            // $row = mysqli_fetch_assoc($all_jobs);
            while ($row = mysqli_fetch_assoc($all_company)) {
            ?>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="row card-body">
                      <div class="col-6">
                        <h5 class="card-title"><?php echo $row["company_name"] ?></h5>
                        <p class="card-text"><?php echo $row["office_email"] .= $row["company_city"] ?></p>
                        <p class="card-text"><?php echo $row["business_nature"] ?></p>
                        <p class="card-text"><?php echo $row["contact_person"] ?></p>
                        <p class="card-text"><?php echo $row["cp_email"] .= $row["company_city"] ?></p>
                        <p class="card-text"><?php echo "tel no. : " . $row["tel_no"] . " / cel no. : " . $row["cel_no"] ?></p>
                        <a href="../company-profiles " class="btn btn-primary">See more</a>
                      </div>
                      <div class="col-6 position-relative">
                        <img class="col-6 position-absolute top-0 start-50" src="../student7.png" alt="sans" />
                      </div>
                    </div>
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
                    echo '<a class="page-link" href="company-list.php?page=' . ($page - 1) . '" aria-label="Previous">';
                    echo '<span aria-hidden="true">&laquo;</span>';
                  } else {
                    echo '<a class="page-link disabled" href="company-list.php?page=' . ($page - 1) . '" aria-label="Previous">';
                    echo '<span aria-hidden="true" class="disabled">&laquo;</span>';
                  }
                  ?>
                  </a>
                </li>
                <?php for ($page = 1; $page <= $number_of_page; $page++) {
                  echo '    <li class="page-item"><a class="page-link" href = "company-list.php?page=' . $page . '"> ' . $page . '</a></li>';
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
                    echo '<a class="page-link" href="company-list.php?page=' . ($page + 1) . '" aria-label="Next">';
                  } else {
                    echo '<a class="page-link disabled" href="company-list.php?page=' . ($page - 1) . '" aria-label="Next">';
                  }
                  ?>
                  <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
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